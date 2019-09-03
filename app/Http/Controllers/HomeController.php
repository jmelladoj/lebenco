<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raffle;
use App\RaffleDraw;
use Carbon\Carbon;
use App\Sale;
use App\User;
use App\Document;
use App\Promotion;
use App\Tip;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $martes = Carbon::parse('Tuesday this week')->format('Y-m-d');
        $miercoles = Carbon::parse('wednesday this week')->format('Y-m-d');
        $jueves = Carbon::parse('thursday this week')->format('Y-m-d');
        $viernes = Carbon::parse('friday this week')->format('Y-m-d');
        $sabado = Carbon::parse('saturday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');

        $lunesR = Sale::whereDate('created_at', $lunes)->get()->count();
        $lunesU = User::where('tipo_usuario', 3 )->whereDate('created_at', $lunes)->get()->count();
        $lunesD = Document::where('estado', 2)->whereDate('updated_at', $lunes)->get()->count();

        $martesR = Sale::whereDate('created_at', $martes)->get()->count();
        $martesU = User::where('tipo_usuario', 3 )->whereDate('created_at', $martes)->get()->count();
        $martesD = Document::where('estado', 2)->whereDate('updated_at', $martes)->get()->count();

        $miercolesR = Sale::whereDate('created_at', $miercoles)->get()->count();
        $miercolesU = User::where('tipo_usuario', 3 )->whereDate('created_at', $miercoles)->get()->count();
        $miercolesD = Document::where('estado', 2)->whereDate('updated_at', $miercoles)->get()->count();

        
        $juevesR = Sale::whereDate('created_at', $jueves)->get()->count();
        $juevesU = User::where('tipo_usuario', 3 )->whereDate('created_at', $jueves)->get()->count();
        $juevesD = Document::where('estado', 2)->whereDate('updated_at', $jueves)->get()->count();

        
        $viernesR = Sale::whereDate('created_at', $viernes)->get()->count();
        $viernesU = User::where('tipo_usuario', 3 )->whereDate('created_at', $viernes)->get()->count();
        $viernesD = Document::where('estado', 2)->whereDate('updated_at', $viernes)->get()->count();

        
        $sabadoR = Sale::whereDate('created_at', $sabado)->get()->count();
        $sabadoU = User::where('tipo_usuario', 3 )->whereDate('created_at', $sabado)->get()->count();
        $sabadoD = Document::where('estado', 2)->whereDate('updated_at', $sabado)->get()->count();

        
        $domingoR = Sale::whereDate('created_at', $domingo)->get()->count();
        $domingoU = User::where('tipo_usuario', 3 )->whereDate('created_at', $domingo)->get()->count();
        $domingoD = Document::where('estado', 2)->whereDate('updated_at', $domingo)->get()->count();

        $rifas = Raffle::get()->count();
        $tips = Tip::get();

        $promociones = Promotion::where('user_category_id', \Auth::user()->categoria_id)->get();
        $imagenes = array();

        foreach ($promociones as $p) {
            array_push($imagenes, $p->url);
        } 

        return view('home')->with(compact('tips','lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'lunesR', 'lunesU', 'lunesD', 'martesR', 'martesU', 'martesD', 'miercolesR', 'miercolesU', 'miercolesD', 'juevesR', 'juevesU', 'juevesD', 'viernesR', 'viernesU', 'viernesD', 'sabadoR', 'sabadoU', 'sabadoD', 'domingoR', 'domingoU', 'domingoD', 'rifas', 'imagenes'));
    }
}
