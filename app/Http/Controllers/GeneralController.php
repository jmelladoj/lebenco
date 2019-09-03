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
            'servicios' => 'nullable|min:3'
        ];

        $this->validate($request, $rules);

        $pagina = General::findOrFail(1);

        if($request->hasFile('logo')){
            Storage::put('public/pagina', $request->file('logo'));
            $url = Storage::put('public/pagina', $request->file('file'));
            $pagina->url_logo = $url;
        }

        if($request->hasFile('favicon')){
            Storage::put('public/pagina', $request->file('favicon'));
            $url = Storage::put('public/pagina', $request->file('file'));
            $pagina->icon_url = $url;
        }

        if($request->hasFile('footer')){
            Storage::put('public/pagina', $request->file('footer'));
            $url = Storage::put('public/pagina', $request->file('file'));
            $pagina->logo_fot_url = $url;
        }

        $pagina->save();

        return redirect('/paginaDatos')->with('status', 'Datos de página actualizados correctamente'); 
    }
}
