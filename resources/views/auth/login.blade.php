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
                    <div class="my-account-box mb-4" id="ingreso" name="ingreso">
                        <form class="form-full-height" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2>Inicia tu sesión</h2>
                            <p class="large text-justify">Bienvenido a tu comunidad LebenCo.</p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full run" name="run" id="run" autocomplete="run" value="" type="text" placeholder="RUN personal o RUT si eres una Pyme" value="{{ old('run') }}" required>
                            </p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full" name="password" id="password" autocomplete="current-password" type="password" placeholder="Ingresa tu clave" required>
                            </p>
                            <p class="form-field-wrapper">
                                <label class="">
                                    <input class="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                    <span>Recuérdame</span>
                                </label>
                            </p>
                            <p class="form-field-wrapper form-row">
                                <button type="submit" class="btn btn--lg btn--primary" name="login" value="Log in">Ingresar</button>
                            </p>
                            <p class="form-field-wrapper lost_password">
                                <a href="#" class="sale-color">Olvide mi clave</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-account-box" id="registro" name="registro">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2>Regístrate</h2>
                            <p class="large text-justify">La comunidad LebenCo. dispone de herramientas para Estudiantes del área, Prevencionistas o Personas encargadas de la prevención y nuestras Pymes.</p> 
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="estudiante" name="tipo_persona" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="estudiante"> Estudiante</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="persona" name="tipo_persona" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="persona"> Prevencionista</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="empresa" name="tipo_persona" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="empresa"> Pyme</label>
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input class="input--lg form-full" name="nombre" id="nombre" value="" type="text" placeholder="Nombre completo o Razón social si eres una Pyme" value="{{ old('nombre') }}" required>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input class="input--lg form-full run" name="run" id="run" value="" type="text" placeholder="RUN personal o RUT si eres una Pyme" value="{{ old('run') }}" required>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper">
                                <input class="input--lg form-full" name="email" id="email" value="" type="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                            </p>
                            <p class="form-field-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full" name="clave_uno" id="clave_uno" value="" type="password" placeholder="Crea tu clave (6 caracteres)" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input class="input--lg form-full" name="clave_dos" id="clave_dos" value="" type="password" placeholder="Repite esa clave" required>
                                    </div>
                                </div>
                            </p>
                            <p class="form-field-wrapper text-justify">
                                Sus datos personales se utilizarán para respaldar su experiencia en nuestro sitio web, para administrar el acceso a su cuenta y para otros fines descritos en nuestras Políticas: 
                                <a href="{{ asset('storage/' . $pagina->terminos_url ) }}" style="color: #009bdb;" target="_blank">i.- Términos y condiciones <a>, 
                                <a href="{{ asset('storage/' . $pagina->privacidad_url ) }}" style="color: #009bdb;" target="_blank">ii.- Política de privacidad <a>, 
                                <a href="{{ asset('storage/' . $pagina->satisfaccion_url ) }}" style="color: #009bdb;" target="_blank">iii.- Política de satisfacción <a>, 
                                <a href="{{ asset('storage/' . $pagina->derecho_url ) }}" style="color: #009bdb;" target="_blank">iv.- Derechos de autor <a>.
                                <br><br> Al registrarse usted acepta nuestros términos de uso y condiciones de privacidad, que han sido establecidas por Prevención LebenCo. SpA.
                            </p>
                            <p class="form-field-wrapper">
                                <label class="">
                                    <input class="" name="mailing" id="mailing" {{ old('mailing') ? 'checked' : '' }} type="checkbox">
                                    <span>Quiero recibir notificaciones importantes de la comunidad LebenCo.</span>
                                </label>
                            </p>
                            <br>
                            <p class="form-field-wrapper form-row">
                                <button type="submit" class="btn btn--lg btn--primary" name="register" value="Register">Registrar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Forms-->

@endsection

