<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Document;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use App\Chat;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.sugerencia.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documents = Document::where('estado',2)->orderBy('titulo');
        return view('intranet.sugerencia.crear')->with(compact('documents'));
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
            'asunto' => 'required|min:3|max:199',
            'mensaje' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        $suggestion = new Suggestion();
        $suggestion->asunto = $request->input('asunto');
        $suggestion->detalle = $request->input('mensaje');
        $suggestion->document_id = $request->input('documento', NULL);
        $suggestion->user_id = \Auth::user()->id;
        $suggestion->save();

        return redirect('/sugerencias')->with('status', 'Sugerencia enviada exitosamente'); 
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function guardarRespuesta(Request $request, $id)
    {
        //
        $rules = [
            'respuesta' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        $suggestion = Suggestion::findOrFail(Crypt::decryptString($id));
        $suggestion->estado = 2;
        $suggestion->save();

        $chat = new Chat();
        $chat->detalle = $request->input('respuesta');
        $chat->suggestion_id = Crypt::decryptString($id);
        $chat->save();

        return redirect('/sugerencias')->with('status', 'Sugerencia respondida exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show()
     {
        //
        if(\Auth::user()->tipo_usuario == 3){
            $suggestions = Suggestion::where('user_id', \Auth::user()->id)->orderBy('created_at');
            return DataTables::eloquent($suggestions)->addColumn('acciones', function (Suggestion $suggestions){ return '<center><a href="/sugerencias/'. Crypt::encryptString($suggestions->id).'/leer" class="btn btn-success btn-simple" data-toggle="tooltip" title="Ver hilo de conversa"><i class="fa fa-plus"></i></a></center>'; })->addColumn('valor_estado', function (Suggestion $suggestions){ if($suggestions->estado == 1){ return '<center>LEÍDO</center>';} else { return '<center>NO LEÍDO</center>';}  })->rawColumns(['acciones', 'valor_estado'])->make(true); 
        } else {
            $suggestions = Suggestion::orderBy('created_at');
            return DataTables::eloquent($suggestions)->addColumn('acciones', function (Suggestion $suggestions){ return '<center><form method="post" action="/sugerencias/'.$suggestions->id.'/borrar" class="text-center"><a href="/sugerencias/'.Crypt::encryptString($suggestions->id).'/leer" class="btn btn-success btn-simple" data-toggle="tooltip" title="Ver conversa"><i class="fa fa-plus"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar conversa"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form></center>'; })->addColumn('valor_estado', function (Suggestion $suggestions){ if($suggestions->estado == 1){ return '<center>LEÍDO</center>';} else { return '<center>NO LEÍDO</center>';}  })->rawColumns(['acciones', 'valor_estado'])->make(true);
        }

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function leer($id)
    {
        //
        $suggestion = Suggestion::findOrFail(Crypt::decryptString($id));
        $suggestion->estado = 1;
        $suggestion->save();

        $chats = Chat::where('suggestion_id', Crypt::decryptString($id))->orderBy('created_at', 'DESC')->get();
        
        return view('intranet.sugerencia.leer')->with(compact('suggestion', 'chats'));
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
        
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->chats()->delete();
        $suggestion->delete(); 

        return back()->with('status', 'Sugerencía eliminada exitosamente');
    }
}
