@extends('layouts.intranet')

@section('content')

    <input type="hidden" id="lunes" name="lunes" value="{{ $lunes }}">
    <input type="hidden" id="martes" name="martes" value="{{ $martes }}">
    <input type="hidden" id="miercoles" name="miercoles" value="{{ $miercoles }}"> 
    <input type="hidden" id="jueves" name="jueves" value="{{ $jueves }}">
    <input type="hidden" id="viernes" name="viernes" value="{{ $viernes }}">
    <input type="hidden" id="sabado" name="sabado" value="{{  $sabado }}">
    <input type="hidden" id="domingo" name="domingo" value="{{ $domingo }}">

    <input type="hidden" id="lunesR" name="lunesR" value="{{ $lunesR }}">
    <input type="hidden" id="lunesU" name="lunesU" value="{{ $lunesU }}">
    <input type="hidden" id="lunesD" name="lunesD" value="{{ $lunesD }}">

    <input type="hidden" id="martesR" name="martesR" value="{{ $martesR }}">
    <input type="hidden" id="martesU" name="martesU" value="{{ $martesU }}">
    <input type="hidden" id="martesD" name="martesD" value="{{ $martesD }}">
    
    <input type="hidden" id="miercolesR" name="miercolesR" value="{{ $miercolesR }}">
    <input type="hidden" id="miercolesU" name="miercolesU" value="{{ $miercolesU }}">
    <input type="hidden" id="miercolesD" name="miercolesD" value="{{ $miercolesD }}">
        
    <input type="hidden" id="juevesR" name="juevesR" value="{{ $juevesR }}">
    <input type="hidden" id="juevesU" name="juevesU" value="{{ $juevesU }}">
    <input type="hidden" id="juevesD" name="juevesD" value="{{ $juevesD }}">

    <input type="hidden" id="viernesR" name="viernesR" value="{{ $viernesR }}">
    <input type="hidden" id="viernesU" name="viernesU" value="{{ $viernesU }}">
    <input type="hidden" id="viernesD" name="viernesD" value="{{ $viernesD }}">
        
    <input type="hidden" id="sabadoR" name="sabadoR" value="{{ $sabadoR }}">
    <input type="hidden" id="sabadoU" name="sabadoU" value="{{ $sabadoU }}">
    <input type="hidden" id="sabadoD" name="sabadoD" value="{{ $sabadoD }}">
        
    <input type="hidden" id="domingoR" name="domingoR" value="{{ $domingoR }}">
    <input type="hidden" id="domingoU" name="domingoU" value="{{ $domingoU }}">
    <input type="hidden" id="domingoD" name="domingoD" value="{{ $domingoD }}">

    @if(Auth::user()->tipo_usuario == 1)
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-user"></i></h3>
                                    <p class="text-muted">Nuevos usuarios</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">{{ Auth::user()->nuevosUsuariosPorSemana }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-note"></i></h3>
                                    <p class="text-muted">Documentos pendientes</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">{{  Auth::user()->documentosPendiente }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted">Nuevos documentos</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{  Auth::user()->documentosNuevos }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-money"></i></h3>
                                    <p class="text-muted">Número de recargas</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">{{ number_format(Auth::user()->totalCantidadVentasSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-users"></i></h3>
                                    <p class="text-muted">Total saldo usuarios</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">${{ number_format(Auth::user()->totalSaldoSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-usd"></i></h3>
                                    <p class="text-muted">Total ventas</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">${{ number_format(Auth::user()->totalVentasSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    @elseif (Auth::user()->tipo_usuario == 2)
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-user"></i></h3>
                                    <p class="text-muted">Total saldo usuarios</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">${{ number_format(Auth::user()->totalSaldoSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-usd"></i></h3>
                                    <p class="text-muted">Total ventas</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">${{ number_format(Auth::user()->totalVentasSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="fa fa-money"></i></h3>
                                    <p class="text-muted">Número de recargas</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">{{ number_format(Auth::user()->totalCantidadVentasSemana) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo_usuario == 3)
        <div class="card-group">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-credit-card"></i></h3>
                                    <p class="text-muted">MI SALDO</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">${{ number_format(Auth::user()->saldo) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">                   
                                <div class="col-md-12">
                                    <a href="{{ url('/recargar') }}" class="btn btn-btn btn-success btn-block" data-toggle="tooltip" title="Recargar Saldo">Recargar Saldo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-md-12">
            @if (Auth::user()->tipo_usuario != 3)
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-40 align-items-center no-block">
                            <h5 class="card-title ">RESUMEN SEMANAL</h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle" style="color: #8AB733;"></i> Recargas</li>
                                    <li><i class="fa fa-circle" style="color: #E8ECD1;"></i> Usuarios</li>
                                    <li><i class="fa fa-circle" style="color: #3F8A24;"></i> Documentos</li>
                                </ul>
                            </div>
                        </div>
                        <div id="morris-area-chart" style="height: 340px;"></div> 
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <h5 class="card-title ">DOCUMENTOS RECOMENDADOS</h5>
                                </div>
                                <div class="col-lg-6">
                                    @if($rifas > 0)
                                        <a href="{{ url('/rifasActivas') }}" class="btn btn-btn btn-warning pull-right" data-toggle="tooltip" title="Ver rifas">Ver rifas</a>                              
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="tablaDocumentos" class="table table-bordered table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th>TITULO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <!-- Column -->
                <div class="col-md-12">     
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @if (Auth::user()->tipo_usuario != 3)
                                        <div class="carousel-item active">
                                            <h4 class="cmin-height">Juan Mellado <span class="font-medium">Se ha registrado</span></h4>
                                            <div class="d-flex no-block">
                                                <span><img src="{{ asset('public_intranet/images/users/1.jpg') }}" alt="user" width="50" class="img-circle"></span>
                                                <span class="m-l-10">
                                            <h4 class="text-white m-b-0">Ingeniero</h4>
                                            <p class="text-white">Usuario nuevo</p> 
                                            </span>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <h4 class="cmin-height">Franco Vergara <span class="font-medium">Ha adquirido un documento</span></h4>
                                            <div class="d-flex no-block">
                                                <span><img src="{{ asset('public_intranet/images/users/2.jpg') }}" alt="user" width="50" class="img-circle"></span>
                                                <span class="m-l-10">
                                            <h4 class="text-white m-b-0">Arquitecto</h4>
                                            <p class="text-white">Usuario nuevo</p>
                                            </span>
                                            </div>
                                        </div>   
                                    @else
                                        @if(count($imagenes) > 0)
                                            <div class="carousel-inner">
                                                @foreach ($imagenes as $img)
                                                    <div class="carousel-item  @if($loop->first) active @endif">
                                                        <img src="{{ asset(str_replace("public","storage", $img)) }}" alt="" class="img-responsive">
                                                    </div>  
                                                @endforeach
                                            </div>
                                        @endif

                                    @endif                            
                                </div>    
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-12">     
                    <div class="card bg-cyan text-white">
                        <div class="card-body">
                            <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @if(count($tips) > 0)
                                        <div class="carousel-inner">
                                            @foreach ($tips as $tip)
                                                <div class="carousel-item  @if($loop->first) active @endif">
                                                    <div class="col-12 m-t-20 text-center">
                                                        <h5>{{$tip->nombre }}</h5>
                                                    </div>
                                                </div>  
                                            @endforeach
                                        </div>
                                    @endif                          
                                </div>    
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tablaDocumentos').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerDocumentosusuario') }}',
                columns:[
                            { data: 'titulo', name: 'titulo' },
                        ]
            });

            $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            // other options
            });

        });
    </script>
@endsection


