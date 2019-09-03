@extends('layouts.home')

@section('content')

    <div class="page-contaiter">

        <!--Breadcrumb-->
        <section class="breadcrumb">
            <div class="background-image" data-background="img/bg_img/bg_001.jpg" data-bg-posx="center" data-bg-posy="center" data-bg-overlay="4"></div>
            <div class="breadcrumb-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="breadcrumb-title">Tarifas</h1>
                            <nav class="breadcrumb-link">
                                <span><a href="home.html">Inicio</a></span>
                                <span>Contáctanos</span>
                            </nav>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!--Breadcrumb-->

        <!--Contact Form & Info-->
        <section class="sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            Al recargar tu cuenta puedes consiguir un aumento en tu tipo de cuenta, si lograste esto participa en un sorteo de un disco duro externo, más información 
                            <a href="javascript:void(0)">pincha acá</a>.
                        </p>   
                    </div>
                </div>
                <div class="row">
                    @foreach ($tarifas as $tarifa)
                        <div class="col-md-4">
                            <div class="card text-white bg-success text-center">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">RECARGA ${{ number_format($tarifa->monto) }}</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <h3 class="text-white">
                                                Y OBTÉN <br>
                                                @if ($tarifa->bonificacion > 0)
                                                    <b>${{ number_format($tarifa->bonificacion) }}</b>
                                                @else
                                                    No hay bonificacion
                                                @endif
                                            </h3>
                                        </div>
                                    </form>
                                </div>
                                @if(Auth::check())
                                    <div class="card-footer">
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Recargar</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End Contact Form & Info-->

    </div>
@endsection