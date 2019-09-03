@extends('layouts.home')

@section('title', 'LebenCo. - Comunidad LebenCo.')

@section('content')

    <div class="page-contaiter">

        <!--Contact Form & Info-->
        <section class="sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $contenido->contenido !!}
                    </div>
                </div>
                @if($contenido->video != null)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="auto" height="auto" src="{{ $contenido->video }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!--End Contact Form & Info-->

        <section id="intro" class="intro">
            <!--Slider Hero-->
            <div class="intro_slider1 owl-carousel owl-theme">
                <!--Item-->
                <div class="item height-400px sm-height-400px">
                    <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D1.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                    <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                    <h1 class="intro-title">SLIDER 1</h1>
                                    <!--<a href="#" class="btn btn--primary space--1">Shop Now</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Item-->

            <!--Item-->
                <div class="item height-400px sm-height-400px">
                    <div class="background-image div-img" data-background="{{ asset('public_index/img/descanso_img/D1.jpg') }}" data-bg-posx="center" data-bg-overlay="0" style="transform: inherit;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="intro-caption intro-caption-middel text-center intro-caption-fade sec-padding--lg">
                                    <!--<p class="intro-subtitle"># Women Fashion</p>-->
                                    <h1 class="intro-title">SLIDER 2</h1>
                                    <!--<a href="#" class="btn btn--primary space--1">Shop Now</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Item-->
            </div>
            <!--End Slider Hero-->
        </section>  

    </div>
@endsection
