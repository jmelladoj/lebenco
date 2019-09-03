<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   

        $messages = [
            'run.unique' => 'Este Run / Rut (según sea Pyme o no) ya está en uso, ¡utiliza otro!.',
            'email.unique' => 'Este correo eléctronico ya está en uso, ¡utiliza otro!.',
            'email.email' => 'El correo electrónico no corresponde con una dirección de email válida.',
            'clave_uno.min' => 'Las claves deben de contener al menos 6 caracteres.',
            'clave_dos.min' => 'Las claves deben de contener al menos 6 caracteres.',
            'clave_dos.same' => 'Las claves no coinciden.'
        ];

        return Validator::make($data, [
            'run' => ['required', 'string', 'max:255', 'unique:users'],
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'clave_uno' => ['required','string','min:6'],
            'clave_dos' => ['required','string','min:6','same:clave_uno'],
        ], $messages);
    }

    /** 
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'run' => $data['run'],
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['clave_dos']),
            'tipo_persona' => $data['tipo_persona']
        ]);
    }
}
