@extends('layouts.home')

@section('title', 'LebenCo. - Servicios')

@section('content')

    <div class="page-contaiter">

        <!--Breadcrumb-->
        <section class="breadcrumb">
            <div class="breadcrumb-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="breadcrumb-title">Nuestros Servicios</h2>
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
                            Conoce nuestros servicios lo cuales te presentamos:
                        </p>   
                    </div>
                </div>
                @if(count($servicios) > 0)
                    <div class="row">
                        @foreach ($servicios as $item)

                            <div class="col-md-6 col-lg-4">
                                    <!--Blog Item-->
                                <div class="blog-item">
                                    <div class="blog-item-content">
                                        <h4 class="blog-title"><a href="#">{{ $item->titulo }}</a></h4>
                                        <div class="blog-description-content">
                                            <p>
                                                {{ $item->descripcion }}
                                            </p>
                                        </div>
                                        <p class="info text-center" style="font-size: 80px">
                                            {!! $item->clase !!}
                                        </p>
                                    </div>
                                </div>
                                <!--End Blog Item-->
                            </div>

                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <!--End Contact Form & Info-->

    </div>
@endsection