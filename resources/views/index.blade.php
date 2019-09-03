@extends('layouts.home')

@section('content')

    <div class="page-contaiter">
        <!--Intro-->
        <section id="intro" class="intro">
            <!--Slider Hero-->
            <div class="intro_slider1 owl-carousel owl-theme">
                @foreach($sliders as $slider)
                    <!--Item-->
                    @if($slider->lugar == 1)
                        <div class="item height-400px sm-height-400px">
                            <div class="background-image div-img" data-background="{{ asset(str_replace("public","storage",$slider->url)) }}" data-bg-posx="center" data-bg-posy="top" data-bg-overlay="0"></div>
                            <div class="container"> 
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                            <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                            <h1 class="intro-title">{{ $slider->contenido }}</h1>
                                            @if($slider->link != '' || $slider->link != null)<a href="{{ $slider->link }}" class="btn btn--primary space--1">Deseo saber más</a>@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--Item-->
                @endforeach
            </div>
            <!--End Slider Hero-->
        </section>    

        <!--Categories-->
        <section class="sec-padding">
            <div class="container">
                <div class="page-head">
                    <span class="page-sub-title"></span>
                    <h2 class="page-title">Documentos preferidos de la comunidad</h2>
                </div>
            </div>
            <div class="container">

                @foreach ($categories->chunk(4) as $categories)
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-lg-3 col-md-3"><a href="/busquedaCategoria/{{ $category->id }}" class="btn btn--primary space--button btn-block">{{ $category->nombre }}</a></div>
                        @endforeach
                    </div>
                @endforeach
                
            </div>
        </section>
        <!--Categories-->     

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
                                    <h1 class="intro-title">Sabemos que tu Pyme necesita prevención </h1>
                                    <a href="{{ url('/nuestrosservicios') }}" class="btn btn--primary">Encuentra el servicio que necesitas</a>
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
                                    <a href="{{ url('/home') }}" class="btn btn--primary">Solicita tu documento a pedido</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Item-->
            </div>
            <!--End Slider Hero-->
        </section>  

        <!--Products Slider-->
        <section class="sec-padding">
            <div class="container">
                <div class="page-head">
                    <span class="page-sub-title"></span>
                    <h2 class="page-title">Documentos más descargados</h2>
                </div>
            </div>
            <div class="container justify-content-center">
                <div class="product-item-4 owl-carousel owl-theme product-slider">
                    @foreach ($topDescargas as $item)
                        <!--Item-->
                        <div class="item">
                            <div class="product-item">
                                <!--Product Img-->
                                <div class="product-item-img">
                                    <!--Image-->
                                    <a class="product-item-img-link">
                                        <img src="{{ asset($item->img) }}" alt="Product Item" />
                                    </a>
                                    <!--Add to Link-->
                                    
                                    <div class="add-to-link">
                                        <a href="{{ asset($item->url) }}" class="btn btn--primary btn--sm"> PREVISUALIZAR</a>
                                        @if(Auth::check())<a href="/documentos/descargar/{{ $item->id }}/" class="btn btn--primary btn--sm"> Descargar</a>@endif
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                        <!--Item-->
                    @endforeach
                </div>
            </div>
        </section>
        <!--Products Slider-->
                
        <section id="intro" class="intro">
            <!--Slider Hero-->
            <div class="intro_slider1 owl-carousel owl-theme">

                @auth
                    <!--Item-->
                    <div class="item height-400px sm-height-400px">
                        <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D2.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                        <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                        <h1 class="intro-title">Tenemos rifas, sortes y mucho más ...</h1>
                                        <a href="{{ url('/login') }}" class="btn btn--primary">Presiona para participar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Item-->
                @else
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
                @endauth

            </div>
            <!--End Slider Hero-->
        </section>  
                
        <!--Products Slider-->
        <section class="sec-padding">
            <div class="container">
                <div class="page-head">
                    <span class="page-sub-title"></span>
                    <h2 class="page-title">Documentos nuevos</h2>
                </div>
            </div>
            <div class="container justify-content-center">
                <div class="product-item-4 owl-carousel owl-theme product-slider">
                    @foreach ($nuevos as $item)
                        <!--Item-->
                        <div class="item">
                            <div class="product-item">
                                <!--Product Img-->
                                <div class="product-item-img">
                                    <!--Image-->
                                    <a class="product-item-img-link">
                                        <img src="{{ asset($item->img) }}" alt="Product Item" />
                                    </a>
                                    <!--Add to Link-->
                                    @if(Auth::check())
                                        <div class="add-to-link">
                                            <div class="card"><p class="text-justify">{{ $item->descripcion }}</p></div>
                                            <br>
                                            <a class="btn btn--primary btn--sm">Descargar</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--Item-->
                    @endforeach
                </div>
            </div>
        </section>
        <!--Products Slider-->

    </div>
@endsection
