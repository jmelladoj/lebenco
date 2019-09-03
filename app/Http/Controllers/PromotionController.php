<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use DataTables;
use App\CategoriaUser;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.promocion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = CategoriaUser::orderBy('nombre')->get();
        return view('intranet.promocion.crear')->with(compact('categorias'));
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
            'file' => 'required|file'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('file')){
            Storage::put('public/promociones', $request->file('file'));
            $url = Storage::put('public/promociones', $request->file('file'));
        }

        $promotion = new Promotion();
        $promotion->titulo = $request->input('titulo');
        $promotion->url = $url;
        $promotion->user_category_id = $request->input('categoria');
        $promotion->save(); 

        return redirect('/promociones')->with('status', 'Promoción agregada exitosamente'); 
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
        $promotions = Promotion::orderBy('created_at');
        return DataTables::eloquent($promotions)->addColumn('categoria', function (Promotion $promotions){ return $promotions->userCategory($promotions->user_category_id)->nombre; })->addColumn('acciones', function (Promotion $promotions){ return '<form method="post" action="/promociones/'.$promotions->id.'/borrar" class="text-center"><center><a href="/promociones/'.$promotions->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar información de promoción"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar promoción"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></center></form>'; })->rawColumns(['categoria','acciones'])->make(true);
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
        $promocion = Promotion::findOrFail($id);
        $categorias = CategoriaUser::orderBy('nombre')->get();
        return view('intranet.promocion.editar')->with(compact('categorias', 'promocion'));
        
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
        $rules = [
            'titulo' => 'required|min:3|max:199',
            'file' => 'file'
        ];

        $this->validate($request, $rules);

        $promotion = Promotion::findOrFail($id);
        $promotion->titulo = $request->input('titulo');

        if($request->hasFile('file')){
            Storage::put('public/promociones', $request->file('file'));
            $url = Storage::put('public/promociones', $request->file('file'));
            $promotion->url = $url;
        }

        $promotion->user_category_id = $request->input('categoria');
        $promotion->save(); 

        return redirect('/promociones')->with('status', 'Promoción actualizada exitosamente'); 
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
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
    }
}
