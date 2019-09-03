@extends('layouts.home')

@section('title', 'LebenCo. - Comunidad PYME')

@section('content')

    <div class="page-contaiter">

            <section id="intro" class="intro">
                <!--Slider Hero-->
                <div class="intro_slider1 owl-carousel owl-theme">
                    <div class="item height-400px sm-height-400px">
                        <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D1.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                        <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                        <h1 class="intro-title">¿No tienes cuenta?</h1>
                                        <a href="{{ url('/login') }}" class="btn btn--primary">Se parte de nuestra comunidad</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Item-->
    
                <!--Item-->
                    <div class="item height-400px sm-height-400px">
                        <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D2.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                        <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                        <h1 class="intro-title">¿Necesitas proveedores confiables?</h1>
                                        <a href="{{ url('/ranking') }}" class="btn btn--primary">Conoce a nuestra comunidad</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Item-->
    
                    <!--Item-->
                    <div class="item height-400px sm-height-400px">
                        <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D2.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                        <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                        <h1 class="intro-title">¡Sabemos que tu Pyme necesita prevención! </h1>
                                        <a href="{{ url('/servicios') }}" class="btn btn--primary">Solicita tu documento a pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Item-->
    
                    <!--Item-->
                    <div class="item height-400px sm-height-400px">
                        <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D2.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                        <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                        <h1 class="intro-title">¿No encuentras la información que necesitas? </h1>
                                        <a href="{{ url('/servicios') }}" class="btn btn--primary">Presiona para participar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Item-->
                </div>
                <!--End Slider Hero-->
            </section>    

        <br><br>

        <!--Breadcrumb-->
        <section class="breadcrumb">
            <div class="breadcrumb-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="breadcrumb-title">Top five en nuestra comunidad Pyme</h2>
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
                            Para aparecer aquí, recuerda entregar lo mejor de tu servicio e indicarles a tus clientes que te refieran.
                        </p>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped datatables">
                                <thead>
                                    <tr align="center">
                                        <th>Posición</th>
                                        <th>Nombre de la Pyme</th>
                                        <th>Comuna</th>
                                        <th>Rubro</th>
                                        <th>Me gusta</th>
                                        <th>No me gusta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1er lugar</td>
                                        <td>Empresa 1</td>
                                        <td>Concepción</td>
                                        <td>Maestranza</td>
                                        <td align="center">5  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">6  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2do lugar</td>
                                        <td>Empresa 2</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">1  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">2  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>3er lugar</td>
                                        <td>Empresa 3</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">1  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">2  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>4to lugar</td>
                                        <td>Empresa 4</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">1  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">2  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>5to lugar</td>
                                        <td>Empresa 5</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">1  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">2  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Form & Info-->

        <!--Call & Action-->
        <section class="sec-padding--lg section-dark">
            <div class="background-image" data-background="{{ asset('public_index/img/descanso_img/D1.jpg') }}" data-bg-posx="center" data-bg-posy="center" data-bg-overlay="4"></div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-head">
                            <h2 class="page-title">¿No tienes cuenta?</h2>
                        </div>
                        <a href="{{ url('/login') }}" class="btn btn--primary">Se parte de nuestra comunidad</a>
                    </div>
                </div>


            </div>
        </section>
        <!--Call & Action-->

        <br><br>

        <!--Breadcrumb-->
        <section class="breadcrumb">
            <div class="breadcrumb-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="breadcrumb-title">Nuestra comunidad Pyme</h2>
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
                            Para aparecer aquí, recuerda entregar lo mejor de tu servicio e indicarles a tus clientes que te refieran.
                        </p>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped datatables">
                                <thead>
                                    <tr align="center">
                                        <th>Nombre de la Pyme</th>
                                        <th>Comuna</th>
                                        <th>Rubro</th>
                                        <th>Me gusta</th>
                                        <th>No me gusta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Empresa 1</td>
                                        <td>Concepción</td>
                                        <td>Maestranza</td>
                                        <td align="center">23  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">5  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Empresa 2</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">1  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">6  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Empresa 3</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">7  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">1  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Empresa 4</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">90  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">1  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Empresa 5</td>
                                        <td>Hualpen</td>
                                        <td>Constructora</td>
                                        <td align="center">50  <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #8ab733;"></td>
                                        <td align="center">45  <i class="fa fa-thumbs-down" aria-hidden="true" style="color: #8ab733;"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Form & Info-->


    </div>
@endsection
