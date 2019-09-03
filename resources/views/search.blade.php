@extends('layouts.home')

@section('title', 'LebenCo. - Búsqueda')

@section('content')

    <div class="page-contaiter">


        <!--Breadcrumb-->
        <section class="breadcrumb">
            <div class="breadcrumb-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="breadcrumb-title"><b>{{ $categoria->nombre }}</b></h1>
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
                    @forelse ($documentos as $item)
                        <!--Item-->
                        <div class="item pull-center">
                            <div class="product-item" style="max-width: 250px;">
                                <!--Product Img-->
                                <div class="product-item-img">
                                    <!--Image-->
                                    <a class="product-item-img-link">
                                        <img src="{{ asset($item->img) }}" alt="Product Item" height="300px" width="auto" />
                                    </a>
                                    <!--Add to Link-->
                                    @if(Auth::check())
                                        <div class="add-to-link">
                                            <a href="/documentos/descargar/{{ $item->id }}/" class="btn btn--primary btn--sm">Descargar</a>
                                        </div>
                                    @endif
                                    
                                    <!--Hover Icons-->
                                    <div class="hover-product-icon">
                                        <div class="product-icon-btn-wrap">
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Vista preliminar"><i class="ti-search"></i></a>
                                            <!--<a href="#" data-toggle="tooltip" data-placement="left" title="Add to Whishlist"><i class="ti-heart"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="ti-reload"></i></a>-->
                                        </div>
                                    </div>
                                </div>
                                <!--Product Content-->
                                <div class="product-item-content">
                                    <div class="tag"><a href="#">Minimal</a></div>
                                    <a href="product_detail.html" class="product-item-title"><span><b>{{ $item->titulo }}</b></span></a>
                                    <span><b>{{ $item->user->nombre }}</b></span>
                                    <p class="product-item-price">
                                        <span class="product-price-amount">
                                            <span class="product-price-currency-symbol"><b>${{ number_format($item->valor) }}</b></span>
                                        </span>
                                    </p>
                                    <div class="product-rating">
                                        <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                            <span style="width: 60%"></span>
                                        </div>
                                        <a href="#" class="product-rating-count"><span class="count">3</span> Descargas</a>
                                    </div>
                                    <p class="product-description">
                                        When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--Item-->
                    @empty  
                        <center><h4>Sin resultados.</h4></center>
                    @endforelse
                </div>
            </div>
        </section>
        <!--End Contact Form & Info-->

    </div>
@endsection