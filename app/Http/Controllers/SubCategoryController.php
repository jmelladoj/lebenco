<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('intranet.subcategoria.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('intranet.subcategoria.crear')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $rules = [
            'nombre' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        $subcategory = new SubCategory();
        $subcategory->nombre = $request->input('nombre');
        $subcategory->category_id = $id;
        $subcategory->save(); 

        return redirect('/categorias/'. $id .'/subcategoria')->with('status', 'SubCategoría agregada exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $categoria = $request->get('categoria');
        $subcategorias = SubCategory::where('category_id', $categoria)->orderBy('nombre');
        return DataTables::eloquent($subcategorias)->addColumn('acciones', function (SubCategory $subcategorias){ return '<form method="post" action="/subcategorias/'.$subcategorias->id.'/borrar" class="text-center"><a href="/subcategorias/'.$subcategorias->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar información de subcategoria"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar subcategoría"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $subcategory = SubCategory::findOrFail($id);
        return view('intranet.subcategoria.editar')->with(compact('subcategory'));
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
            'nombre' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->nombre = $request->input('nombre');
        $subcategory->save(); 

        return redirect('/categorias/'. $subcategory->category_id .'/subcategoria')->with('status', 'SubCategoría actualizada exitosamente'); 
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
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete(); 

        return back()->with('status', 'Subcategoría eliminada exitosamente');
    }
}
