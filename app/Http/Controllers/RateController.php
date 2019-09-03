<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use DataTables;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.tarifa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.tarifa.crear');
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
            'monto' => 'required|min:0',
            'bonificacion' => 'required|min:0'
        ];

        $this->validate($request, $rules);

        $rate = new Rate();
        $rate->monto = $request->input('monto');
        $rate->bonificacion = $request->input('bonificacion');
        $rate->save(); 

        return redirect('/tarifas')->with('status', 'Tarifa agregada exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        //
        $rates = Rate::orderBy('monto');
        return DataTables::eloquent($rates)->addColumn('acciones', function (Rate $rates){ return '<form method="post" action="/tarifas/'.$rates->id.'/borrar" class="text-center"><a href="/tarifas/'.$rates->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar información de profesión"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar usuario"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $rate = Rate::findOrFail($id);
        return view('intranet.tarifa.editar')->with(compact('rate'));
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
            'monto' => 'required|min:0',
            'bonificacion' => 'required|min:0'
        ];

        $this->validate($request, $rules);

        $rate = Rate::findOrFail($id);
        $rate->monto = $request->input('monto');
        $rate->bonificacion = $request->input('bonificacion');
        $rate->save(); 

        return redirect('/tarifas')->with('status', 'Tarifa actualizada exitosamente'); 
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
        $rate = Rate::findOrFail($id);
        $rate->delete(); 

        return back()->with('status', 'Tarifa eliminado exitosamente');
    }
}
