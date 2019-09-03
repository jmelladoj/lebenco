<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use DataTables;
use App\Category;
use App\User;
use App\Download;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.documento.indexAprobados');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function subirUsuario()
     {
         //
         $categories = Category::orderBy('nombre')->get();
         return view('intranet.documento.crearUsuario')->with(compact('categories'));
     }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function guardarDocumentoUsuario(Request $request)
    {
        //
        $rules = [
            'titulo' => 'required|min:3|max:199',
            'categoria' => 'required|numeric',
            'file' => 'required|file'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('file')){
            Storage::put('public/documentos/aprobados', $request->file('file'));
            $url = Storage::put('public/documentos/aprobados', $request->file('file'));
        }

        $document = new Document();
        $document->titulo = $request->input('titulo');
        $document->url = $url;
        $document->extension = $request->file('file')->getClientOriginalExtension();
        $document->user_id = \Auth::user()->id;
        $document->category_id = $request->input('categoria');
        $document->estado = 1;
        $document->save(); 

        return redirect('/documento/subir')->with('status', 'Gracias por compartir tu documento con nosotros, durante las próximas horas y lo validaremos para su posterior publicación.'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function indexPendientes()
     {
         //
         return view('intranet.documento.indexPendientes');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('nombre')->get();
        return view('intranet.documento.crear')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'titulo' => 'required|min:3|max:199',
            'descripcion' => 'required|min:10',
            'valor' => 'required|min:0',
            'codigo' => 'required|min:0',
            'codigo_interno' => 'required|min:0',
            'clasificacion' => 'required|numeric|min:0',
            'categoria' => 'required|numeric',
            'file' => 'required|file'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('file')){
            Storage::put('public/documentos/aprobados', $request->file('file'));
            $url = Storage::put('public/documentos/aprobados', $request->file('file'));
        }

        $document = new Document();
        $document->titulo = $request->input('titulo');
        $document->descripcion = $request->input('descripcion');
        $document->codigo = $request->input('codigo');
        $document->codigo_interno = $request->input('codigo_interno');
        $document->url = $url;
        $document->valor = $request->input('valor');
        $document->clasificacion = $request->input('clasificacion');
        $document->extension = $request->file('file')->getClientOriginalExtension();
        $document->user_id = \Auth::user()->id;
        $document->category_id = $request->input('categoria');
        $document->estado = 2;
        $document->save(); 

        return redirect('/documentosAprobados')->with('status', 'Documento agregado exitosamente'); 
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function download($id)
    {
        
        $user = User::findOrFail(Auth::user()->id);
        $document = Document::findOrFail($id);

        if($user->saldo >= $document->valor && $user->tipo_usuario == 3){
            $document->cantidad_descargas = $document->cantidad_descargas + 1;
            $document->save(); 

            $user->saldo = $user->saldo - $document->valor;
            $user->save();

            $descarga = new Download();
            $descarga->detalle = $document->titulo . ' V' . $document->version;
            $descarga->document_id = $document->id;
            $descarga->user_id = \Auth::user()->id;
            $descarga->save();
            
            return Storage::download($document->url);
        } else if($user->tipo_usuario != 3){
            return Storage::download($document->url);
        } else {
            return back()->with('error', 'Saldo insuficiente para la descarga. Por favor recuerda cargar saldo antes de adquirir el documento.'); 
        }


        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAprobados()
    {
        //
        $documents = Document::where('estado',2)->orderBy('created_at');

        return DataTables::eloquent($documents)->addColumn('autor', function (Document $documents){ return $documents->user->nombre; })->addColumn('acciones', function (Document $documents){ return '<form method="post" action="/documentos/'.$documents->id.'/borrar" class="text-center"><a href="/documentos/descargar/'.$documents->id.'/" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Descargar documento"><i class="fa fa-download"></i></a><a href="/documentos/'.$documents->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar información de archivo"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar documento"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['autor','acciones'])->make(true);
    }

    public function showPendientes()
    {
        //
        $documents = Document::where('estado',1)->orderBy('created_at');

        return DataTables::eloquent($documents)->addColumn('autor', function (Document $documents){ return $documents->user->nombre; })->addColumn('acciones', function (Document $documents){ return '<form method="post" action="/documentos/'.$documents->id.'/borrar" class="text-center"><a href="/documentos/descargar/'.$documents->id.'/" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Descargar documento"><i class="fa fa-download"></i></a><a href="/documentos/'.$documents->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar información de archivo"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar documento"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['autor','acciones'])->make(true);
    }   

    public function showUsuario()
    {
        //
        $documents = Document::where([['user_id', \Auth::user()->id], ['estado', 2]])->orderBy('titulo');

        return DataTables::eloquent($documents)->make(true);
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::orderBy('nombre')->get();
        $document = Document::findOrFail($id);
        return view('intranet.documento.editar')->with(compact('document','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $rules = [
            'titulo' => 'required|min:3|max:199',
            'valor' => 'required|numeric|min:0',
            'codigo' => 'required|min:0',
            'codigo_interno' => 'required|min:0',
            'clasificacion' => 'required|numeric|min:0',
            'categoria' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        $document = Document::findOrFail($id);
        $document->titulo = $request->input('titulo');
        $document->descripcion = $request->input('descripcion', null);
        $document->valor = $request->input('valor', 0);
        $document->codigo = $request->input('codigo');
        $document->codigo_interno = $request->input('codigo_interno');
        $document->clasificacion = $request->input('clasificacion');

        if($request->hasFile('file')){
            Storage::delete($document->url);
            $document->version = $document->version + 1;

            Storage::put('public/documentos/aprobados', $request->file('file'));
            $url = Storage::put('public/documentos/aprobados', $request->file('file'));

            $document->url = $url;
        }

        
        $document->category_id = $request->input('categoria');
        $document->estado = 2;
        $document->save(); 

        return redirect('/documentosAprobados')->with('status', 'Documento actualizado exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $document = Document::findOrFail($id);
        Storage::delete($document->url);
        $document->delete(); 

        return back()->with('status', 'Documento eliminado exitosamente');
    }
}
