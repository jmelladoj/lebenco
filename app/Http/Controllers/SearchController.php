<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use DataTables;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($stars)
    {
        //
        $estrellas = $stars;
        return view('intranet.busqueda.index')->with(compact('estrellas'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexWord(Request $request)
    {
        //
        $palabra = $request->input('busqueda');
        return view('intranet.busqueda.indexWord')->with(compact('palabra'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexCategory($categoria)
    {
        //
        $category = $categoria;
        return view('intranet.busqueda.indexCategory')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $estrellas = $request->get('estrellas');
        $documents = Document::where([['estado', 2], ['clasificacion', $estrellas]])->orderBy('titulo');
        return DataTables::eloquent($documents)->addColumn('costo', function (Document $documents){ return number_format($documents->valor); })->addColumn('autor', function (Document $documents){ return $documents->user->nombre; })->addColumn('acciones', function (Document $documents){ return '<form method="post" action="/documentos/'.$documents->id.'/borrar" class="text-center"><a href="/documentos/descargar/'.$documents->id.'/" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Descargar documento"><i class="fa fa-download"></i></a></form>'; })->rawColumns(['autor', 'costo','acciones'])->make(true);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function showWord(Request $request)
    {
        //
        $palabra = $request->get('palabra');
        $documents = Document::where([['titulo', 'LIKE', '%'.$palabra.'%'], ['estado', 2]])->orderBy('titulo');
        return DataTables::eloquent($documents)->addColumn('costo', function (Document $documents){ return number_format($documents->valor); })->addColumn('autor', function (Document $documents){ return $documents->user->nombre; })->addColumn('acciones', function (Document $documents){ return '<form method="post" action="/documentos/'.$documents->id.'/borrar" class="text-center"><a href="/documentos/descargar/'.$documents->id.'/" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Descargar documento"><i class="fa fa-download"></i></a></form>'; })->rawColumns(['autor', 'costo','acciones'])->make(true);
    }
 
    public function showCategory(Request $request)
    {
        //
        $categoria = $request->get('categoria');
        $documents = Document::where([['category_id', $categoria], ['estado', 2]])->orderBy('titulo');
        return DataTables::eloquent($documents)->addColumn('costo', function (Document $documents){ return number_format($documents->valor); })->addColumn('autor', function (Document $documents){ return $documents->user->nombre; })->addColumn('acciones', function (Document $documents){ return '<form method="post" action="/documentos/'.$documents->id.'/borrar" class="text-center"><a href="/documentos/descargar/'.$documents->id.'/" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Descargar documento"><i class="fa fa-download"></i></a></form>'; })->rawColumns(['autor', 'costo','acciones'])->make(true);
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
    }
}
