<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LebenCo. - @yield('title', 'Intranet')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $pagina->icon_url) }}">
    <link rel="icon" href="{{ asset('storage/' . $pagina->icon_url) }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $pagina->icon_url) }}">
    <link rel="apple-touch-icon" href="{{ asset('storage/' . $pagina->icon_url) }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public_intranet/css/estilos_intranet.css') }}" rel="stylesheet">

</head>
<body class="fixed-layout skin-green">
    <div id="app">
        <div id="main-wrapper">
                <!--Header-->
                <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-header">
                            <center>
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <!-- Logo icon --><b>
                                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                            <!-- Dark Logo icon -->
                                            <img src="{{ asset('public_intranet/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                                            <!-- Light Logo icon -->
                                            <img src="{{ asset('public_intranet/images/logo-icon.png') }}" alt="homepage" class="light-logo" />
                                        </b>
                                        <!--End Logo icon -->
                                        <!-- Logo text -->
                                        <span>
                                            <!-- dark Logo text -->
                                            <img src="{{ asset('public_intranet/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                                            <!-- Light Logo text -->    
                                            <img src="{{ asset('public_intranet/images/logo-text.png') }}" class="light-logo" alt="homepage" />
                                        </span> 
                                    </a>
                            </center>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav mr-auto">
                                <!-- This is  -->
                                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->
                                <li class="nav-item">
                                    <form class="app-search d-none d-md-block d-lg-block" method="post" action="{{ url('busqueda') }}">
                                        @csrf
                                        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Búsqueda de contenido">
                                    </form>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="{{ url('/home') }}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu"> Escritorio</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav my-lg-0">
                                <!-- ============================================================== -->
                                <!-- Comment -->
                                <!-- ============================================================== -->
                                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="{{ asset('img/salir.png') }}" height="40px" width="40px"><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></a></li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- User Profile-->
                        <div class="user-profile">
                            <div class="user-pro-body">
                                <div><img src="{{ asset(str_replace("public","storage", Auth::user()->foto_perfil_url)) }}" alt="user-img" class="img-circle"></div>
                                <div class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>{{ Auth::user()->nombre }}</b>@if(Auth::user()->categoria_id != null && Auth::user()->tipo_usuario == 3)<br><b>{{ Auth::user()->categoriaUsuario->nombre . ' - ' . Auth::user()->categoriaUsuario->nivel }}</b>@endif<span class="caret"></span></a>
                                    <div class="dropdown-menu animated flipInY">
                                        <a href="{{ url('/perfil') }}" class="dropdown-item"><i class="ti-user"></i> Mi perfil</a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                @if(Auth::user()->tipo_usuario == 3)
                                    <li class="nav-small-cap">--- LEBEN CO</li>
                                    <li> <a class="waves-effect waves-dark" onclick="pedirAsesoria();" href="#" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="hide-menu"> SOLICITAR ASESORÍA</span></a></li>
                                    <li> <a class="waves-effect waves-dark" onclick="pedirCotizacion();"   href="#" aria-expanded="false"><i class="fa fa-usd"></i><span class="hide-menu"> COTIZAR</span></a></li>
                                    <li> <a class="waves-effect waves-dark" onclick="compartir();"  href="#" aria-expanded="false"><i class="fa fa-share-alt"></i><span class="hide-menu"> RECOMENDAR</span></a></li>
                                    <li> <a class="waves-effect waves-dark" onclick="solicitarDocumento();"  href="#" aria-expanded="false"><i class="fa fa-search"></i><span class="hide-menu"> PIDE DOCUMENTO</span></a></li>
                                @endif
                                {{--<li class="nav-small-cap">--- BUSCAR DOCUMENTOS</li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-file-text" aria-hidden="true"></i>
                                    <span class="hide-menu">CATEGORÍAS: </span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ url('/busquedaCategoriaIntranet/' . $category->id) }}">{{ strToUpper($category->nombre) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="hide-menu">CLASIFICACIÓN: </span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ url('/busqueda/3') }}"><span><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star" aria-hidden="true"></i></span></a></li>
                                        <li><a href="{{ url('/busqueda/2') }}"><span><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star-o" aria-hidden="true"></i></span></a></li>
                                        <li><a href="{{ url('/busqueda/1') }}"><span><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star-o" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-star-o" aria-hidden="true"></i></span></a></li>
                                    </ul></li>--}}

                                <li class="nav-small-cap">--- MENÚ</li>
                                @if(Auth::user()->tipo_usuario == 3)<li> <a class="waves-effect waves-dark" href="{{ url('/recargar') }}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">RECARGAR</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario == 3)<li> <a class="waves-effect waves-dark" href="{{ url('/documento/subir') }}" aria-expanded="false"><i class="fa fa-cloud-upload"></i><span class="hide-menu">SUBIR DOCUMENTO</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario == 3)<li> <a class="waves-effect waves-dark" href="{{ url('/rifasActivas') }}" aria-expanded="false"><i class="fa fa-list-ol"></i><span class="hide-menu">RIFAS</span></a></li>@endif
                                <li> <a class="waves-effect waves-dark" href="{{ url('/perfil') }}" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">MI PERFIL</span></a></li>
                                <li> <a class="waves-effect waves-dark" href="{{ url('/sugerencias') }}" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="hide-menu">SUGERENCIAS</span></a></li>
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/sliders') }}" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">SLIDERS</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/promociones') }}" aria-expanded="false"><i class="fa fa-tag"></i><span class="hide-menu">PROMOCIONES</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-folder-o" aria-hidden="true"></i><span class="hide-menu">PÁGINAS </span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ url('/paginaDatos') }}">GENERAL</a></li>
                                        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
                                        <li><a href="{{ url('/tarifas') }}">TARIFAS</a></li>
                                        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/rifas') }}" aria-expanded="false"><i class="fa fa-list-ol"></i><span class="hide-menu">RIFAS</span></a></li>@endif
                                



                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-file" aria-hidden="true"></i><span class="hide-menu">INFORMES </span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ url('/informeVentas') }}">VENTAS</a></li>
                                        <li><a href="{{ url('/informeUsuarios') }}">USUARIOS</a></li>
                                    </ul>
                                </li>
                                @endif


                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/categorias') }}" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">CATEGORÍAS</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/tips') }}" aria-expanded="false"><i class="fa fa-exclamation"></i><span class="hide-menu">TIPS</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/profesiones') }}" aria-expanded="false"><i class="fa fa-address-card"></i><span class="hide-menu">PROFESIONES</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/usuarios') }}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">USUARIOS</span></a></li>@endif
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="waves-effect waves-dark" href="{{ url('/categoriasUsuario') }}" aria-expanded="false"><i class="fa fa-trophy"></i><span class="hide-menu">CATEGORÍA USUARIO</span></a></li>@endif
                                
                                
                                @if(Auth::user()->tipo_usuario != 3)<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-folder-o" aria-hidden="true"></i><span class="hide-menu">DOCUMENTOS </span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ url('/documentosAprobados') }}">APROBADOS</a></li>
                                        <li><a href="{{ url('/documentosPendientes') }}">PENDIENTES</a></li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </aside>
                <div class="page-wrapper">
                    <div class="container-fluid">
                        <div class="row page-titles">
                            <div class="col-md-5 align-self-center">
                                <h4 class="text-themecolor">@yield('seccion', 'Escritorio')</h4>
                            </div>
                            <div class="col-md-7 align-self-center text-right">
                                <div class="d-flex justify-content-end align-items-center">
                                    <ol class="breadcrumb">
                                        <li> <a class="breadcrumb-item active" href="https://www.youtube.com/channel/UC78DsrgVX7KslItHoTuw8uQ?view_as=subscriber" target="_blank" aria-expanded="false"><i class="fa fa-youtube" style="font-size: 20px; padding-left: 5px; padding-right: 5px;"></i></a></li>
                                        <li> <a class="breadcrumb-item active" href="https://www.facebook.com/prevencion.lebenco.3" target="_blank" aria-expanded="false"><i class="fa fa-facebook" style="font-size: 20px; padding-left: 5px; padding-right: 5px;"></i></a></li>
                                        <li> <a class="breadcrumb-item active" href="https://www.instagram.com/prevencionlebenco.cl/?hl=es-la" target="_blank" aria-expanded="false"><i class="fa fa-instagram" style="font-size: 20px; padding-left: 5px; padding-right: 5px;"></i></a></li>
                                        <li> <a class="breadcrumb-item active" href="https://www.linkedin.com/in/prevenci%C3%B3n-lebenco-62b632184/" target="_blank" aria-expanded="false"><i class="fa fa-linkedin" style="font-size: 20px; padding-left: 5px; padding-right: 5px;"></i></a></li>
                                    </ol>
                                    <!--<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>-->
                                
                                </div>
                            </div>
                        </div>

                        @if($errors->any())
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if(Auth::user()->created_at == Auth::user()->last_login && Auth::user()->tipo_usuario > 2)
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                            ¡Felicidades! Ya eres parte de nuestra comunidad LebenCo. y para celebrar, te damos un documento de muestra ¡gratis!, búscalo en nuestras secciones.
                                    </div>
                                </div>
                            </div>
                        @endif
  
                        @if(session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            </div>
                        @endif
            
                        @yield('content')
                    </div>
                </div>
                <footer class="footer">
                    © 2018 Prevención LebenCo. IS Online. Todos los derechos reservados.
                </footer>
            </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins_general.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script src="{{ asset('public_intranet/js/plugins_intranet.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>
        function pedirAsesoria(){
            Swal.fire({
                position: 'top-center',
                type: 'success',
                title: 'Has solicitado una asesoría, pronto te contactaremos',
                showConfirmButton: false
            })
        }

        function pedirCotizacion(){
            Swal.fire({
                position: 'top-center',
                type: 'success',
                title: 'Has solicitado una cotización, pronto te contactaremos',
                showConfirmButton: false
            })
        }

        function compartir(){
            Swal.fire({
                title: 'Ingresa el correo de tu amigo',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Compartir',
                CancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        'Problemas al enviar el correo'
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.value) {
                    Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                    })
                }
            })
        }

        function solicitarDocumento(){
            Swal.fire({
                title: 'Solicitud de documento',
                html:
                '<input id="swal-input1" class="swal2-input" placeholder="Monto oferta por documento">' +
                '<input id="swal-input2" class="swal2-input" placeholder="Descripción sobre documento">',
                showCancelButton: true,
                confirmButtonText: 'Compartir',
                CancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        'Problemas al enviar el correo'
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.value) {
                    Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                    })
                }
            })
        }
    </script>

    @yield('script')
</body>
</html>
