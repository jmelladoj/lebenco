<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.slider.crear');
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
            'contenido' => 'required|min:3|max:199',
            'color' => 'required|min:3|max:199',
            'imagen' => 'required|file',
            'ubicacion' => 'required',
        ];

        $this->validate($request, $rules);

        if($request->hasFile('imagen')){
            Storage::put('public/sliders', $request->file('imagen'));
            $url = Storage::put('public/sliders', $request->file('imagen'));
        }

        $slider = new Slider();
        $slider->contenido = $request->input('contenido');
        $slider->color = $request->input('color');
        $slider->url = $url;
        $slider->link = $request->input('link', null);
        $slider->lugar = $request->input('ubicacion');
        $slider->save(); 

        return redirect('/sliders')->with('status', 'Slider creado exitosamente.'); 
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
        $sliders = Slider::orderBy('created_at');
        return DataTables::eloquent($sliders)->addColumn('acciones', function (Slider $sliders){ return '<form method="post" action="/sliders/'.$sliders->id.'/borrar" class="text-center"><a href="/sliders/'.$sliders->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar Slider"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar slider"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->addColumn('color_slider', function (Slider $sliders){ return '<button class="btn btn-block" style="background: '.$sliders->color.'">COLOR</button>'; })->rawColumns(['acciones','color_slider'])->make(true);
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
        $slider = Slider::findOrFail($id);
        return view('intranet.slider.editar')->with(compact('slider'));
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
            'contenido' => 'required|min:3|max:199',
            'color' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        $slider = Slider::findOrFail($id);
        $slider->contenido = $request->input('contenido');
        $slider->color = $request->input('color');
        $slider->save(); 

        return redirect('/sliders')->with('status', 'Slider actualizado exitosamente'); 
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
        $slider = Slider::findOrFail($id);
        $slider->delete(); 

        return back()->with('status', 'Slider eliminado exitosamente');
    }
}
