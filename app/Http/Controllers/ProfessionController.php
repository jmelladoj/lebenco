<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use DataTables;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.profesion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.profesion.crear');
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
            'nombre' => 'required|min:3|max:199|unique:professions'
        ];

        $this->validate($request, $rules);

        $profession = new Profession();
        $profession->nombre = $request->input('nombre');
        $profession->save(); 

        return redirect('/profesiones')->with('status', 'Profesión agregada exitosamente'); 
        
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
        $professions = Profession::orderBy('nombre');
        return DataTables::eloquent($professions)->addColumn('acciones', function (Profession $professions){ return '<form method="post" action="/profesiones/'.$professions->id.'/borrar" class="text-center"><a href="/profesiones/'.$professions->id.'/editar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Editar información de profesión"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar usuario"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);
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
        $profession = Profession::findOrFail($id);
        return view('intranet.profesion.editar')->with(compact('profession'));
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

        $profession = Profession::findOrFail($id);
        $profession->nombre = $request->input('nombre');
        $profession->save(); 

        return redirect('/profesiones')->with('status', 'Profesión actualizada exitosamente'); 
        
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
        $profession = Profession::findOrFail($id);
        $profession->delete(); 

        return back()->with('status', 'Profesión eliminado exitosamente');
    }
}
