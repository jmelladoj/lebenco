<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Slider;
use App\Document;
use App\Pages;
use App\Rate;
use App\Service;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('nombre')->get();
        $sliders = Slider::orderBy('created_at')->get();
        $topDescargas = Document::where([['estado', 2]])->orderBy('cantidad_descargas','desc')->limit(20)->get();
        $nuevos = Document::where([['estado', 2]])->orderBy('updated_at', 'desc')->limit(20)->get();
        return view('index')->with(compact('categories','sliders','topDescargas', 'nuevos'));
    }

    public function search($categoria)
    {
        //
        $documentos = Document::where([['estado', 2], ['category_id', $categoria]])->orderBy('titulo')->get();
        $categoria = Category::findOrFail($categoria);
        return view('search')->with(compact('categoria', 'documentos'));
    }

    public function servicios()
    {
        //
        $servicios = Service::orderBy('titulo')->get();
        return view('servicios')->with(compact('servicios'));
    }

    public function contact(){
        return view('contact');
    }

    public function rate(){
        $tarifas = Rate::orderBy('monto')->get();
        return view('tarifas')->with(compact('tarifas'));
    }

    public function about(){
        $contenido = Pages::findOrFail(1);
        return view('aboutUs')->with(compact('contenido'));
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
    public function show($id)
    {
        //
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
