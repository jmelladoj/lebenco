<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Raffle;
use Illuminate\Support\Facades\Storage;
use App\RaffleDraw;
use Carbon\Carbon;
use App\User;

class RaffleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.rifa.index');
    }

    public function indexUser()
    {
        //
        return view('intranet.rifa.indexActivas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intranet.rifa.crear');
    }

    public function participantes($id)
    {
        //
        $rifa = Raffle::findOrFail($id);
        $participantes = RaffleDraw::where('raffle_id', 1)->get();

        return view('intranet.rifa.participantes')->with(compact('participantes', 'rifa'));
    }


    public function ganador($id)
    {
        //
        $rifas = Raffle::get();
        $rifa = $rifas->last();
        
        $rifa->user_id = $id;
        $rifa->estado = 2;
        $rifa->save();

        return redirect('/rifas')->with('status', 'Ganador marcado correctamente');
    }

    public function participar($id)
    {
        //

        $user = User::findOrFail(\Auth::user()->id);
        $rifa = Raffle::findOrFail($id);

        if($user->saldo >= $rifa->valor_registro){
            $user->saldo = $user->saldo - $rifa->valor_registro;
            $user->save();

            $sorteo = new RaffleDraw();
            $sorteo->raffle_id = $rifa->id;
            $sorteo->user_id = \Auth::user()->id;
            $sorteo->save();

            return back()->with('status', 'Estas participando exitosamente por un ' . $rifa->premio . ', recuerda que la fecha de termino es ' . $rifa->fecha_termino . '. Buena suerte');
        } else {
            return back()->with('error', 'Procura tener saldo antes de participar.'); 
        }
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
            'premio' => 'required|min:3|max:199',
            'fecha_termino' => 'required',
            'valor' => 'required|numeric|min:0',
            'file' => 'required|file'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('file')){
            Storage::put('public/rifas', $request->file('file'));
            $url = Storage::put('public/rifas', $request->file('file'));
        }

        $raffle = new Raffle();
        $raffle->titulo = $request->input('titulo');
        $raffle->premio = $request->input('premio');
        $raffle->fecha_termino = $request->input('fecha_termino');
        $raffle->valor_registro = $request->input('valor');
        $raffle->url = $url;
        $raffle->user_id = NULL;
        $raffle->estado = 1;
        $raffle->save(); 

        return redirect('/rifas')->with('status', 'Rifa agregada exitosamente'); 
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
        $raffles = Raffle::orderBy('created_at');
        return DataTables::eloquent($raffles)->addColumn('ganador', function (Raffle $raffles){ return $raffles->ganador; })->addColumn('acciones', function (Raffle $raffles){ return '<form method="post" action="/rifas/'.$raffles->id.'/borrar" class="text-center"><center><a href="/rifas/participantes/'.$raffles->id.'/" class="btn btn-success btn-simple" data-toggle="tooltip" title="Ver participantes"><i class="fa fa-plus"></i></a><a href="/rifas/'.$raffles->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar información de rifa"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar usuario"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></center></form>'; })->rawColumns(['ganador','acciones'])->make(true);
    }

    public function showUser()
    {
        //
        $hoy = Carbon::now();
        $raffles = Raffle::orderBy('created_at')->where('fecha_termino','>', $hoy);
        return DataTables::eloquent($raffles)->addColumn('acciones', function (Raffle $raffles){ return '<form method="post" action="rifas/participar/' . $raffles->id .'" class="text-center"><center><span data-toggle="tooltip" data-placement="bottom" title="Participar en Rifa"><button type="submit" class="btn btn-success btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Participaras en la rifa?" data-content="Participar en rifa"><i class="fa fa-plus"></i></button></span></center></form>'; })->rawColumns(['acciones'])->make(true);
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
        $raffle = Raffle::findOrFail($id);
        return view('intranet.rifa.editar')->with(compact('raffle'));
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
            'titulo' => 'required|min:3|max:199',
            'premio' => 'required|min:3|max:199',
            'fecha_termino' => 'required',
            'valor' => 'required|numeric|min:0'
        ];

        $this->validate($request, $rules);

        $raffle = Raffle::findOrFail($id);
        $raffle->titulo = $request->input('titulo');
        $raffle->premio = $request->input('premio');
        $raffle->fecha_termino = $request->input('fecha_termino');
        $raffle->valor_registro = $request->input('valor');
        $raffle->user_id = NULL;
        $raffle->estado = 1;
        $raffle->save(); 

        return redirect('/rifas')->with('status', 'Rifa actualizada exitosamente'); 
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
        $raffle = Raffle::findOrFail($id);
        Storage::delete($raffle->url);
        $raffle->delete(); 

        return back()->with('status', 'Rifa eliminada exitosamente');
    }
}
