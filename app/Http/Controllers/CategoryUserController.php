<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaUser;
use DataTables;

class CategoryUserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        return view('intranet.categoria_usuario.index');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('intranet.categoria_usuario.crear');
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
            'nombre' => 'required|min:3|max:199|unique:categoria_users',
            'dias' => 'required|min:0'
        ];

        $this->validate($request, $rules);

        $category = new CategoriaUser();
        $category->nombre = $request->input('nombre');
        $category->tiempo = $request->input('dias');
        $category->save(); 

        return redirect('/categoriasUsuario')->with('status', 'Categoría agregada exitosamente'); 
        
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
        $categories = CategoriaUser::orderBy('nombre');
        return DataTables::eloquent($categories)->addColumn('acciones', function (CategoriaUser $categories){ return '<form method="post" action="/categoriasUsuario/'.$categories->id.'/borrar" class="text-center"><a href="/categoriasUsuario/'.$categories->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar información de categoria"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar categoría"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $category = CategoriaUser::findOrFail($id);
        return view('intranet.categoria_usuario.editar')->with(compact('category'));
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
            'nombre' => 'required|min:3|max:199|unique:categoria_users',
            'dias' => 'required|min:0'
        ];

        $this->validate($request, $rules);

        $category = CategoriaUser::findOrFail($id);
        $category->nombre = $request->input('nombre');
        $category->tiempo = $request->input('dias');
        $category->save(); 

        return redirect('/categoriasUsuario')->with('status', 'Categoría actualizada exitosamente'); 
        
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
        
        $category = CategoriaUser::findOrFail($id);
        $category->delete(); 

        return back()->with('status', 'Categoría eliminado exitosamente');
    }
}
