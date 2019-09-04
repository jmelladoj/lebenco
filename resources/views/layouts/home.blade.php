<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LebenCo. - Inicio')</title>

    <!-- Fonts -->
    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $pagina->icon_url) }}">
    <link rel="icon" href="{{ asset('storage/' . $pagina->icon_url) }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $pagina->icon_url) }}">
    <link rel="apple-touch-icon" href="{{ asset('storage/' . $pagina->icon_url)  }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public_index/css/estilos_home.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="site-wraper">
        <header id="header" class="header header--sticky" data-header-hover="true">

            <!--Header Navigation-->
            <nav id="navigation" class="header-nav">
                <div class="container-fluid">
                    <div class="row">
                        <!--Logo-->
                        <div class="site-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('storage/' . $pagina->logo_url) }}" class="logo-dark"  alt="LebenCo.">
                            </a>
                        </div>
                        <!--End Logo-->

                        <!--Navigation Menu-->
                        <div class="nav-menu">
                            <ul>
                                <li class="nav-menu-item">
                                    <a href="{{ url('/') }}" class="{{ (request()->is('/')) ? 'sale-color' : '' }}">Inicio</a>
                                </li>
                                <li class="nav-menu-item mega-menu">
                                    <a href="{{ url('/sobrenosotros') }}" class="{{ (request()->is('sobrenosotros')) ? 'sale-color' : '' }}">Comunidad LebenCo.</a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="{{ url('/ranking') }}" class="{{ (request()->is('ranking')) ? 'sale-color' : '' }}">Comunidad Pyme</a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="{{ url('/nuestrosservicios') }}" class="{{ (request()->is('nuestrosservicios')) ? 'sale-color' : '' }}">Nuestros Servicios</a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="https://www.youtube.com/channel/UC78DsrgVX7KslItHoTuw8uQ?view_as=subscriber" target="__blank" style="font-size: 30px; color: #8AB733;"> <i class="ti-youtube"></i> </a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="https://www.facebook.com/prevencion.lebenco.3" target="__blank" style="font-size: 30px; color: #8AB733;"> <i class="ti-facebook"></i> </a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="https://www.instagram.com/prevencionlebenco.cl/?hl=es-la" target="__blank" style="font-size: 30px; color: #8AB733;"> <i class="ti-instagram"></i> </a>
                                </li>
                                <li class="nav-menu-item">
                                    <a href="https://www.linkedin.com/in/prevenci%C3%B3n-lebenco-62b632184/" target="__blank" style="font-size: 30px; color: #8AB733;"> <i class="ti-linkedin"></i> </a>
                                </li>
                                
                            </ul>
                        </div>
                        <!--End Navigation Menu-->

                        <!--Nav Icons-->
                        <div class="nav-icons">
                            <ul>
                                <li class="nav-icon-item d-lg-none">
                                    <div class="nav-icon-trigger menu-mobile-btn" title="Menú de navegación"><span><i class="ti-menu"></i></span></div>
                                </li>
                                <li class="nav-icon-item">
                                    <div class="nav-icon-trigger dropdown--trigger" title="Ingreso de usuario"><span><a href="{{ url('/login') }}" class="{{ (request()->is('login')) ? 'sale-color' : '' }} ">@if(Auth::check()) <font style="font-size: 17px;"> {{ Auth::user()->nombre }} </font> @else <i class="ti-user"></i> <font style="font-size: 17px;"> Ingresa </font> @endif</a></span></div>
                                </li> 
                            </ul>
                        </div>
                        <!--End Nav Icons-->

                        <!--Search Bar-->
                        <div class="searchbar-menu">
                            <div class="searchbar-menu-inner">
                                <!--Search Bar-->
                                <div class="search-form-wrap">
                                    <form>
                                        <button class="search-icon btn--lg"><i class="ti-search"></i></button>
                                        <input class="search-field input--lg" placeholder="Buscar aquí..." value="" name="s" title="Search..." type="search" autocomplete="off" />
                                        <span class="search-close-icon"><i class="ti-close"></i></span>
                                    </form>
                                </div>
                                <!--End Search Bar-->
                                <!--Search Result Bar-->
                                <div class="search-results-wrap">
                                    <div class="search-results-loading">
                                        <span class="fa fa-spinner fa-spin"></span>
                                    </div>
                                    <div class="search-results-text woocommerce">
                                        <ul>
                                            <li>Sin resultados</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--End Search Result Bar-->
                            </div>
                        </div>
                        <!--End Search Bar-->
                    </div>
                </div>
            </nav>
            <!--End Header Navigation-->
        </header>
        <!-- End Header -->

        @if(session('error'))
            <!-- Modal -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 20%;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header alert-danger">
                            <h4 class="modal-title" id="myModalLabel">Problema</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>{{ session('error') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        @endif



        <div class="page-container">
            @yield('content')
        </div>

        @if(request()->is('/'))
            <!--Brand Slider-->
            <section class="sec-padding">
                <div class="container">
                    <div class="brand-logo-slider owl-carousel owl-theme">
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://www.achs.cl" target="__blank">
                                    <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZR_c-lAnb50_xyW69vgaZxX3BglsamSQDm68Wm75iwXUPZIua') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://www.mutual.cl"  target="__blank">
                                    <img src="{{ url('https://www.mutual.cl/portal/wcm/connect/7d503151-1f4f-4cbc-9f7c-df7804ce173d/logoMutual.png?MOD=AJPERES&CONVERT_TO=url&CACHEID=ROOTWORKSPACE-7d503151-1f4f-4cbc-9f7c-df7804ce173d-mxSLM3T') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://www.ist.cl"  target="__blank">
                                    <img src="{{ url('http://www.ist.cl/wp-content/uploads/2019/01/logo-web.png') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://www.isl.gob.cl/"  target="__blank">
                                    <img src="{{ url('https://www.isl.gob.cl/wp-content/uploads/logo.png') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://www.dt.gob.cl"  target="__blank">
                                    <img src="{{ url('https://www.dt.gob.cl/portal/1626/channels-912_imagen_portada.thumb_i652x340.jpg') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="http://seremi13.redsalud.gob.cl/"  target="__blank">
                                    <img src="{{ url('http://seremi13.redsalud.gob.cl/wrdprss_minsal/wp-content/themes/minsal-wp-template/assets/img/header/logo.jpg') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="item">
                            <div class="brand-item">
                                <a href="https://mma.gob.cl/"  target="__blank">
                                    <img src="{{ url('https://mma.gob.cl/wp-content/uploads/2018/11/logo-mma.png') }}" alt="brand" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Brand Slider-->
        @endif

        <!--Footer-->
        <footer class="footer bg--dark">
            <!--Footer Widget Bar-->
            <section class="footer-widget-area">
                <div class="container">
                    <div class="row text-dark">
                        <div class="col-md-4">
                            <div class="col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <img src="{{ asset('storage/' . $pagina->logo_fot_url) }}" class="footer-logo mb-4" alt="LebenCO" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('/sobrenosotros') }}" class="{{ (request()->is('sobrenosotros')) ? 'sale-color' : 'text-dark' }}" style="opacity: 1;">Comunidad LebenCo.</a></h6>
                            </div>
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('/nuestrosservicios') }}" class="{{ (request()->is('nuestrosservicios')) ? 'sale-color' : 'text-dark' }}" style="opacity: 1;">Nuestros Servicios</a></h6>
                            </div>
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('/servicios') }}" class="text-dark" style="opacity: 1;">Trabaja en LebenCo.</a></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('/ranking') }}" class="{{ (request()->is('ranking')) ? 'sale-color' : 'text-dark' }}" style="opacity: 1;">Comunidad Pyme</a></h6>
                            </div>
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('/contacto') }}" class="text-dark" style="opacity: 1;">Contáctanos</a></h6>
                            </div>
                            <div class="footer-widget col-sm-12 col-md-12 col-lg-12 mb-lg-0 mb-4 text-center">
                                <h6 class="footer-widget-title"><a href="{{ url('#') }}" class="text-dark" style="opacity: 1;">Nuestras Políticas</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <!--Footer-->
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-md-center">
                        <p class="footer-copyright text-dark">La comunidad LebenCo. agradece tu confianza. ¡Súmate! <br> <a href="https://www.youtube.com/channel/UC78DsrgVX7KslItHoTuw8uQ?view_as=subscriber" target="_blank">© 2019 Prevención LebenCo.</a>, Desarrollado por <a href="https://atupy.cl/sitio/" target="_blank">Atupy</a></p>
                    </div>
                    <!--<div class="col-md-6 text-center text-md-right">
                        <img src="{{ url('') }}" alt="payment logos" />
                    </div>-->
                </div>
            </div>
        </section>
        <!--Footer-->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('public_index/js/plugins_home.js') }}"></script>
    <script src="{{ asset('js/plugins_general.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    
    <script>
        $(document).ready(function(){
            $("#ingreso").click(function(){
                $( "#ingreso" ).removeClass( "my-account-box" ).addClass( "my-account-box-selected" );
                $( "#registro" ).removeClass( "my-account-box-selected" ).addClass( "my-account-box" );
            });

            $("#registro").click(function(){
                $( "#registro" ).removeClass( "my-account-box" ).addClass( "my-account-box-selected" );
                $( "#ingreso" ).removeClass( "my-account-box-selected" ).addClass( "my-account-box" );
            });

            $.extend($.fn.dataTableExt.oStdClasses, {
                "sFilterInput": "form-control col-md-10",
                "sLengthSelect": "form-control col-md-10"
            });

            $('.datatables').DataTable({ "paging": false, "ordering": true, "info": false, "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json", searchPlaceholder: "Ingresa un criterio de búsqueda" }, stateSave: true });
        }); 
    </script>

    @if(session('error'))
        <script>
            $(document).ready(function(){
                $("#myModal").modal("show");
            });
        </script>
    @endif
</body>
</html>
