<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    //

    public function index(){
        //$pagina = General::findOrFail(1);
        return view('intranet.general_pagina.editar');
    }

    public function logo(Request $request){
        $rules = [
            'logo' => 'file',
            'favicon' => 'file',
            'footer' => 'file',
            'comunidad_pyme_uno' => 'nullable|min:3',
            'comunidad_pyme_dos' => 'nullable|min:3',
            'servicios' => 'nullable|min:3',
            'terminos' => 'file',
            'privacidad' => 'file',
            'satisfaccion' => 'file',
            'derecho' => 'file'
        ];

        $this->validate($request, $rules);

        $pagina = General::findOrFail(1);

        if($request->hasFile('logo')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('logo'));
            $pagina->logo_url = substr($url, 7);
        }

        if($request->hasFile('favicon')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('favicon'));
            $pagina->icon_url = substr($url, 7);
        }

        if($request->hasFile('footer')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('footer'));
            $pagina->logo_fot_url = substr($url, 7);
        }

        if($request->hasFile('terminos')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('terminos'));
            $pagina->terminos_url = substr($url, 7);
        }

        if($request->hasFile('privacidad')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('privacidad'));
            $pagina->privacidad_url = substr($url, 7);
        }

        if($request->hasFile('satisfaccion')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('satisfaccion'));
            $pagina->satisfaccion_url = substr($url, 7);
        }

        if($request->hasFile('derecho')){
            $url =  Storage::disk('local')->put('public/pagina', $request->file('derecho'));
            $pagina->derecho_url = substr($url, 7);
        }

        $pagina->save();

        return redirect('/paginaDatos')->with('status', 'Datos de página actualizados correctamente'); 
    }
}
