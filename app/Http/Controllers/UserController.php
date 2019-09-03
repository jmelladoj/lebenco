<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profession;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.usuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $users = User::orderBy('nombre');

        foreach($users AS $item){
            $item['categoria_usuario'] = 'XXXXXXXXXXXXX';
        }



        return DataTables::eloquent($users)->addColumn('acciones', function (User $users){ return '<form method="post" action="/usuarios/'.$users->id.'/borrar" class="text-center"><a href="/usuarios/'.$users->id.'/cargar" class="btn btn-success btn-simple" data-toggle="tooltip" title="Agregar saldo a usuario"><i class="fa fa-usd"></i></a><a href="/usuarios/'.$users->id.'/editar" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Editar información de usuario"><i class="fa fa-edit"></i></a><span data-toggle="tooltip" data-placement="bottom" title="Eliminar usuario"><button type="submit" class="btn btn-danger btn-simple" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-title="¿Desea eliminar el registro?" data-content="Si borra el registro, este desaparecera"><i class="fa fa-times"></i></button></span></form>'; })->rawColumns(['acciones'])->make(true);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfil()
    {
        //
        $user = User::findOrFail(Auth::user()->id);
        $profesiones = Profession::orderBy('nombre')->get();
        return view('intranet.usuario.editar')->with(compact('user', 'profesiones'));
    }

    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $profesiones = Profession::orderBy('nombre')->get();
        return view('intranet.usuario.editar')->with(compact('user', 'profesiones'));
    }

    public function cargar($id)
    {
        //
        $usuario = User::findOrFail($id);
        return view('intranet.usuario.cargarSaldo')->with(compact('usuario'));
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
            'email' => 'required|string|min:6',
            'telefono' => 'nullable|min:0',
            'provincia' => 'required',
            'profesion' => 'required',
            'comuna' => 'required',
            'descripcion' => 'required|string|min:10'
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->province_id = $request->input('provincia');
        $user->profession_id = $request->input('profesion');
        $user->actividad = $request->input('actividad');
        $user->commune_id = $request->input('comuna');
        $user->descripcion = $request->input('descripcion', null);
        $user->tipo_usuario = $request->input('tipo_usuario', 3);

        if($request->hasFile('file')){
            Storage::put('public/users/perfil', $request->file('file'));
            $url = Storage::put('public/users/perfil', $request->file('file'));
            $user->foto_perfil_url = $url;
        } else {
            $user->foto_perfil_url = $request->input('foto', 'public_intranet/images/users/1.jpg');
        }

        $user->save();

        return back()->with('status', 'Información de usuario actualizado exitosamente');
    }

    public function editPassword(Request $request, $id)
    {
        //
        $rules = [
            'clave_uno' => 'required|string|min:6',
            'clave_dos' => 'required|string|min:6|same:clave_uno'
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->input('clave_uno'));
        $user->save();

        return back()->with('status', 'Contraseña actualizada exitosamente');
    }

    public function realizarCarga(Request $request, $id)
    {
        //
        $rules = [
            'saldo' => 'required|numeric|min:1'
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $user->saldo = $user->saldo + $request->input('saldo');
        $user->save();

        return back()->with('status', 'Se han cargado ' . $request->input('saldo') . ' al usuario ' . $user->nombre);
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
        $user = User::findOrFail($id);
        $user->delete(); 

        return back()->with('status', 'Usuario eliminado exitosamente');
    }
}
