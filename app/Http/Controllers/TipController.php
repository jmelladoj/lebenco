<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tip;
use DataTables;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.tip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.tip.crear');
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
            'nombre' => 'required|min:3|max:199|unique:tips'
        ];

        $this->validate($request, $rules);

        $tip = new Tip();
        $tip->nombre = $request->input('nombre');
        $tip->save(); 

        return redirect('/tips')->with('status', 'Tip agregado exitosamente'); 
        
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
        $tips = Tip::orderBy('id');
        return DataTables::eloquent($tips)->addColumn('acciones', function (Tip $tips){ return '<form method="post" action="/tips/'.$tips->id.'/borrar" class="text-center"></i></a><a href="/tips/'.$tips->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar Tip"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar tip"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $tip = Tip::findOrFail($id);
        return view('intranet.tip.editar')->with(compact('tip'));
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

        $tip = Tip::findOrFail($id);
        $tip->nombre = $request->input('nombre');
        $tip->save(); 

        return redirect('/tips')->with('status', 'Tip actualizado exitosamente');
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
        $tip = Tip::findOrFail($id);
        $tip->delete(); 

        return back()->with('status', 'Tip eliminado exitosamente');
    }
}
