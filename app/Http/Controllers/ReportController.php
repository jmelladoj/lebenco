<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Sale;
use App\User;

class ReportController extends Controller
{
    public function informeVentas(){
        $fecha_inicio = null;
        $fecha_termino = null;

        $ventas = Sale::whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();
        return view('intranet.informe.ventas')->with(compact('ventas', 'fecha_inicio', 'fecha_termino'));
    }
 
    public function informeVentasRango(Request $request){
        $rules = [
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after_or_equal:fecha_inicio'
        ];

        $this->validate($request, $rules);

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_termino = $request->input('fecha_termino');

        $ventas = Sale::whereBetween('created_at', [$fecha_inicio, $fecha_termino])->get();
        return view('intranet.informe.ventas')->with(compact('ventas', 'fecha_inicio', 'fecha_termino'));
    }

    public function informeUsuarios(){
        $fecha_inicio = null;
        $fecha_termino = null;

        $users = User::whereDate('created_at', Carbon::now()->format('Y-m-d'))->where('tipo_usuario', 3)->get();
        return view('intranet.informe.usuarios')->with(compact('users', 'fecha_inicio', 'fecha_termino'));
    }
 
    public function informeUsuariosRango(Request $request){
        $rules = [
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after_or_equal:fecha_inicio'
        ];

        $this->validate($request, $rules);

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_termino = $request->input('fecha_termino');

        $users = User::whereBetween('created_at', [$fecha_inicio, $fecha_termino])->where('tipo_usuario', 3)->get();
        return view('intranet.informe.usuarios')->with(compact('users', 'fecha_inicio', 'fecha_termino'));
    }
}
