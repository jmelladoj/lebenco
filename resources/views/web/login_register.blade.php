@section('title', 'LebenCo. - Usuarios')

@extends('layouts.home')

@section('content')

    <!--Forms-->
    <section class="sec-padding">
        <div class="container">
            <div class="row justify-content-around">               
                @if($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif        
                <div class="col-md-6">
                    <div class="my-account-box mb-4">
                        <form class="form-full-height" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2>Inicia Sesión</h2>
                            <p class="large">Si ya creaste tu cuenta: Ingresa tú Correo y clave:</p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full" name="email" id="email" autocomplete="email" value="" type="email" placeholder="Correo" value="{{ old('email') }}" required>
                            </p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full" name="password" id="password" autocomplete="current-password" type="password" placeholder="Clave" required>
                            </p>
                            <p class="form-field-wrapper">
                                <label class="">
                                    <input class="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                    <span>Recordarme</span>
                                </label>
                            </p>
                            <p class="form-field-wrapper form-row">
                                <button type="submit" class="btn btn--lg btn--primary" name="login" value="Log in">Ingresar</button>
                            </p>
                            <p class="form-field-wrapper lost_password">
                                <a href="#">Olvide mi clave</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-account-box">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2>Registrate</h2>
                            <p class="large">Regístrate y Descubre lo que tenemos para tí:</p> 
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full" name="nombre" id="nombre" value="" type="text" placeholder="Nombre completo" value="{{ old('nombre') }}" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full run" name="run" id="run" value="" type="text" placeholder="RUN" value="{{ old('run') }}" required>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full" name="email" id="email" value="" type="email" placeholder="Correo" value="{{ old('email') }}" required>
                            </p>
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full" name="clave_uno" id="clave_uno" value="" type="password" placeholder="Clave" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full" name="clave_dos" id="clave_dos" value="" type="password" placeholder="Repetir clave" required>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper">
                                Sus datos personales se utilizarán para respaldar su experiencia en este sitio web, para administrar el acceso a su cuenta y para otros fines descritos en nuestros <a href="#">acuerdos de privacidad.</a>.
                            </p>
                            <p class="form-field-wrapper form-row">
                                <button type="submit" class="btn btn--lg btn--primary" name="register" value="Register">Registrar</button>
                            </p>
                            <p class="form-field-wrapper lost_password">
                                <input class="" name="mailing" id="mailing" value="1" type="checkbox">
                                <span>Recibir información por correo</span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Forms-->

@endsection