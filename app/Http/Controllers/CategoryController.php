<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DataTables;
use App\SubCategory;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        return view('intranet.categoria.index');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('intranet.categoria.crear');
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
            'nombre' => 'required|min:3|max:199|unique:categories'
        ];

        $this->validate($request, $rules);

        $category = new Category();
        $category->nombre = $request->input('nombre');
        $category->save(); 

        return redirect('/categorias')->with('status', 'Categoría agregada exitosamente'); 
        
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
        $categories = Category::orderBy('nombre');
        return DataTables::eloquent($categories)->addColumn('acciones', function (Category $categories){ return '<form method="post" action="/categorias/'.$categories->id.'/borrar" class="text-center"><a href="/categorias/'.$categories->id.'/subcategoria" class="btn btn-success btn-simple" data-toggle="tooltip" title="Agregar subcategorias"><i class="fa fa-plus"></i></a><a href="/categorias/'.$categories->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar información de categoria"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar categoría"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $category = Category::findOrFail($id);
        return view('intranet.categoria.editar')->with(compact('category'));
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
            'nombre' => 'required|min:3|max:199|unique:professions'
        ];

        $this->validate($request, $rules);

        $category = Category::findOrFail($id);
        $category->nombre = $request->input('nombre');
        $category->save(); 

        return redirect('/categorias')->with('status', 'Categoría actualizada exitosamente'); 
        
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
        
        $category = Category::findOrFail($id);

        $category->sub_categorias()->delete();
        $category->delete(); 

        return back()->with('status', 'Categoría eliminado exitosamente');
    }
}
