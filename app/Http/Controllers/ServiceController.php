<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.servicio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.servicio.crear');
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
            'imagen' => 'file',
            'descripcion' => 'required|min:3|max:199'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('imagen')){
            $servicio = new Service();
            $servicio->titulo = $request->input('titulo');

            $url =  Storage::disk('local')->put('public/servicios', $request->file('imagen'));
            $servicio->clase = substr($url, 7);

            $servicio->descripcion = $request->input('descripcion');
            $servicio->save(); 
        }

        return redirect('/servicios')->with('status', 'Servicio agregado exitosamente'); 
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
        $servicios = Service::orderBy('created_at');
        return DataTables::eloquent($servicios)->addColumn('acciones', function (Service $servicios){ return '<form method="post" action="/servicios/'.$servicios->id.'/borrar" class="text-center"><a href="/servicios/'.$servicios->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar Servicio"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar servicio"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $servicio = Service::findOrFail($id);
        return view('intranet.servicio.editar')->with(compact('servicio'));
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

        $slider = Service::findOrFail($id);
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
        $slider = Service::findOrFail($id);
        $slider->delete(); 

        return back()->with('status', 'Slider eliminado exitosamente');
    }
}
