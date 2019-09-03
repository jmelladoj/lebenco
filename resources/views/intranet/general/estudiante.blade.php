<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar información de usuario</h4>
                    <input type="hidden" id="comuna_id" name="comuna_id" value="{{ Auth::user()->commune_id }}">
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('usuarios/'. $user->id .'/editar') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            @if(Auth::user()->tipo_usuario != 3)
                                <div class="form-group m-t-40 row">
                                    <label id="tipo_usuario" class="col-2 control-label">Tipo de usuario</label>
                                    <div class="col-10">
                                        <select class="form-control custom-select" data-placeholder="Seleccione una opción ..." tabindex="1" id="tipo_usuario" name="tipo_usuario" required="">
                                            <option value="1" {{ old('tipo_usuario', $user->tipo_usuario) == 1 ? 'selected' : '' }}>ADMINISTRADOR</option>
                                            <option value="2" {{ old('tipo_usuario', $user->tipo_usuario) == 2 ? 'selected' : '' }}>SUB - ADMINISTRADOR</option>
                                            <option value="3" {{ old('tipo_usuario', $user->tipo_usuario) == 3 ? 'selected' : '' }}>USUARIO</option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group m-t-40 row">
                                <label for="clave_dos" class="col-2 col-form-label">Nombre *</label>
                                <div class="col-4">
                                    <input type="text" id="nombre" name="nombre" class="form-control" required="" value="{{ old('run', $user->nombre) }}" readonly>
                                </div>

                                <label for="nombre" class="col-2 col-form-label">Run *</label>
                                <div class="col-4">
                                    <input type="text" id="run" name="run" class="form-control" run required="" value="{{ old('run', $user->run) }}" readonly>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="email" class="col-2 col-form-label">Email *</label>
                                <div class="col-4">
                                    <input type="text" id="email" name="email" class="form-control" required="" value="{{ old('email', $user->email) }}">
                                </div>

                                <label for="nombre" class="col-2 col-form-label">Teléfono *</label>
                                <div class="col-4">
                                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="fecha_nacimiento" class="col-2 col-form-label">Fecha Nacimiento *</label>
                                <div class="col-4">
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required="" value="{{ old('fecha_nacimiento') }}">
                                </div>

                                <label for="direccion" class="col-2 col-form-label">Dirección *</label>
                                <div class="col-4">
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="provincia_referencia" class="col-2 control-label">Provincia</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" data-placeholder="Seleccione una opción ..." tabindex="1" id="provincia" name="provincia" onchange="obtenerComunas()" required="">
                                        <option value="">Seleccionar una opción</option>
                                        @foreach($provincias as $provincia)
                                            <option value="{{ $provincia->id }}" {{ old('provincia', Auth::user()->province_id) == $provincia->id ? 'selected' : '' }}>{{$provincia->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label id="referencia_comuna" class="col-2 control-label">Comuna</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" data-placeholder="Seleccione una opción ..." tabindex="1" id="comuna" name="comuna" required="">
                                        <option value="">Seleccionar una opción</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="estado_civil" class="col-2 col-form-label">Estado Civil *</label>
                                <div class="col-4">
                                    <input type="text" id="estado_civil" name="estado_civil" class="form-control" required="" value="{{ old('estado_civil') }}">
                                </div>

                                <label for="hijos" class="col-2 col-form-label">Hijos *</label>
                                <div class="col-4">
                                    <input type="number" id="hijos" name="hijos" class="form-control" value="{{ old('hijos') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="casa_estudio" class="col-2 col-form-label">¿Cuál fue tu casa de estudios? *</label>
                                <div class="col-4">
                                    <input type="text" id="casa_estudio" name="casa_estudio" class="form-control" required="" value="{{ old('casa_estudio') }}">
                                </div>

                                <label for="ramo_favorito" class="col-2 col-form-label">¿Cuál fue tu ramo favorito? *</label>
                                <div class="col-4">
                                    <input type="text" id="ramo_favorito" name="ramo_favorito" class="form-control" value="{{ old('ramo_favorito') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="ramo_no_favorito" class="col-2 col-form-label">¿Cuál fue tu ramo menos favorito? *</label>
                                <div class="col-4">
                                    <input type="text" id="ramo_no_favorito" name="ramo_no_favorito" class="form-control" value="{{ old('ramo_no_favorito') }}">
                                </div>

                                <label for="titulo" class="col-2 col-form-label">¿Cuál es el título que obtendrás? *</label>
                                <div class="col-4">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="" class="col-2 col-form-label">¿En que fecha obtendrás tu certificado de título? *</label>
                                <div class="col-4">
                                    <input type="date" id="" name="" class="form-control">
                                </div>

                                <label for="" class="col-2 col-form-label">¿Dónde realizarás tu práctica profesional? *</label>
                                <div class="col-4">
                                    <input type="text" id="" name="" class="form-control" required="" value="">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="" class="col-12 control-label">¿Qué tipos de softwares utilizas y cuál es tu nivel de experiencia? </label>
                                <div class="col-12">
                                    <textarea name="" id="" cols="20" rows="10" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="" class="col-2 col-form-label">Certificado de alumno regular *</label>
                                <div class="col-2">
                                    <input type="file" id="" name="" class="form-control">
                                </div>

                                <label for="" class="col-2 col-form-label">Cédula de identidad por ambos lados *</label>
                                <div class="col-2">
                                    <input type="file" id="" name="" class="form-control" required="" value="">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="descripcion" class="col-12 control-label">Háblanos sobre ti</label>
                                <div class="col-12">
                                    <textarea name="descripcion" id="descripcion" cols="20" rows="10" class="form-control" required>{{ old('descripcion', $user->descripcion) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                    <label id="provincia_referencia" class="col-2 control-label">Profesión</label>
                                    <div class="col-4">
                                        <select class="form-control custom-select" data-placeholder="Seleccione una opción ..." tabindex="1" id="profesion" name="profesion" required="">
                                            <option value="">Seleccionar una opción</option>
                                            @foreach($profesiones as $profesion)
                                            <option value="{{ $profesion->id }}" {{ old('profesion', Auth::user()->profession_id) == $profesion->id ? 'selected' : '' }}>{{$profesion->nombre}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <label for="actividad" class="col-2 col-form-label">Actividad *</label>
                                    <div class="col-4">
                                        <input type="text" id="actividad" name="actividad" class="form-control" value="{{ old('actividad', $user->actividad) }}">
                                    </div>
                                </div>

                            <div class="form-group m-t-40 row">
                                <label for="clave_dos" class="col-12 col-form-label">Foto de perfil *</label>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/1.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto1" name="foto" checked value="public/users/perfil/1.jpg"> Opción 1</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/2.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto2" name="foto" value="public/users/perfil/2.jpg"> Opción 2</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/5.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto3" name="foto" value="public/users/perfil/5.jpg"> Opción 3</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/6.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto4" name="foto" value="public/users/perfil/6.jpg"> Opción 4</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/7.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto5" name="foto" value="public/users/perfil/7.jpg"> Opción 5</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset(str_replace("public","storage",'public/users/perfil/8.jpg')) }}" alt="" class="img-thumbnail mx-auto d-block" style="width: 150px;"><br>
                                    <div class="radio text-center">
                                        <label><input type="radio" id="foto6" name="foto" value="public/users/perfil/8.jpg"> Opción 6</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <center class="col-md-12"><h4> O Sube tu imagen</h4></center>
                            </div>

                            <div class="form-group m-t-40 row">
                                <div class="col-12">
                                    <input type="file" id="file" name="file" class="dropify" onchange="desmarcarRadios();" data-allowed-file-extensions="jpg jpeg png"/>
                                </div>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Actualizar perfil</button>
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Modificar clave</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/usuarios/'. $user->id .'/actualizarClave') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="clave_uno" class="col-2 col-form-label">Nueva contraseña *</label>
                                <div class="col-4">
                                    <input type="password" id="clave_uno" name="clave_uno" class="form-control" required="">
                                </div>

                                <label for="clave_dos" class="col-2 col-form-label">Confirmar contraseña *</label>
                                <div class="col-4">
                                    <input type="password" id="clave_dos" name="clave_dos" class="form-control" required="">
                                </div>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Cambiar clave</button>
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>