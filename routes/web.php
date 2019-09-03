<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
Route::get('/sobrenosotros', 'IndexController@about');
Route::get('/precios', 'IndexController@rate');
Route::get('/contacto', 'IndexController@contact');
Route::get('/nuestrosservicios', 'IndexController@servicios');

Route::get('/ranking', function () {
    return view('ranking');
});

Route::get('/busquedaCategoria/{categoria}', 'IndexController@search');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index');
    Route::get('/perfil', 'UserController@perfil');

    Route::get('/usuarios/', 'UserController@index');
    Route::get('/usuarios/{id}/editar', 'UserController@edit');
    Route::post('/usuarios/{id}/editar', 'UserController@update');
    Route::get('/usuarios/{id}/cargar', 'UserController@cargar');
    Route::post('/usuarios/{id}/cargar', 'UserController@realizarCarga');
    Route::post('/usuarios/{id}/borrar', 'UserController@destroy');
    Route::get('/obtenerUsuarios', 'UserController@show');

    Route::post('/usuarios/{id}/actualizarClave', 'UserController@editPassword');

    Route::get('/profesiones', 'ProfessionController@index');
    Route::get('/profesiones/crear', 'ProfessionController@create');
    Route::post('/profesiones', 'ProfessionController@store');
    Route::get('/profesiones/{id}/editar', 'ProfessionController@edit');
    Route::post('/profesiones/{id}/editar', 'ProfessionController@update');
    Route::post('/profesiones/{id}/borrar', 'ProfessionController@destroy');
    Route::get('/obtenerProfesiones', 'ProfessionController@show');

    Route::get('/categorias', 'CategoryController@index');
    Route::get('/categorias/crear', 'CategoryController@create');
    Route::post('/categorias', 'CategoryController@store');
    Route::get('/categorias/{id}/editar', 'CategoryController@edit');
    Route::post('/categorias/{id}/editar', 'CategoryController@update');
    Route::post('/categorias/{id}/borrar', 'CategoryController@destroy');
    Route::get('/obtenerCategorias', 'CategoryController@show');

    Route::get('/tips', 'TipController@index');
    Route::get('/tips/crear', 'TipController@create');
    Route::post('/tips', 'TipController@store');
    Route::get('/tips/{id}/editar', 'TipController@edit');
    Route::post('/tips/{id}/editar', 'TipController@update');
    Route::post('/tips/{id}/borrar', 'TipController@destroy');
    Route::get('/obtenerTips', 'TipController@show');

    Route::get('/promociones', 'PromotionController@index');
    Route::get('/promociones/crear', 'PromotionController@create');
    Route::post('/promociones', 'PromotionController@store');
    Route::get('/promociones/{id}/editar', 'PromotionController@edit');
    Route::post('/promociones/{id}/editar', 'PromotionController@update');
    Route::post('/promociones/{id}/borrar', 'PromotionController@destroy');
    Route::get('/obtenerPromociones', 'PromotionController@show');

    Route::get('/categorias/{id}/subcategoria', 'SubCategoryController@index');
    Route::get('/subcategorias/{id}/crear', 'SubCategoryController@create');
    Route::post('/subcategorias/{id}/crear', 'SubCategoryController@store');
    Route::get('/subcategorias/{id}/editar', 'SubCategoryController@edit');
    Route::post('/subcategorias/{id}/editar', 'SubCategoryController@update');
    Route::post('/obtenerSubCategorias', 'SubCategoryController@show');
    Route::post('/subcategorias/{id}/borrar', 'SubCategoryController@destroy');

    Route::get('/documentosAprobados', 'DocumentController@index');
    Route::get('/documentosPendientes', 'DocumentController@indexPendientes');
    Route::get('/documentos/crear', 'DocumentController@create');
    Route::post('/documentos', 'DocumentController@store');
    Route::get('/documentos/{id}/editar', 'DocumentController@edit');
    Route::post('/documentos/{id}/editar', 'DocumentController@update');
    Route::post('/documentos/{id}/borrar', 'DocumentController@destroy');
    Route::get('/obtenerDocumentosAprobados', 'DocumentController@showAprobados');
    Route::get('/obtenerDocumentosPendientes', 'DocumentController@showPendientes');
    Route::get('/obtenerDocumentosusuario', 'DocumentController@showUsuario');

    Route::get('/documentos/descargar/{id}', 'DocumentController@download');

    Route::get('/documento/subir', 'DocumentController@subirUsuario');
    Route::post('/documento/subir', 'DocumentController@guardarDocumentoUsuario');

    Route::get('/sliders', 'SliderController@index'); 
    Route::get('/sliders/crear', 'SliderController@create');
    Route::post('/sliders', 'SliderController@store');
    Route::get('/sliders/{id}/editar', 'SliderController@edit');
    Route::post('/sliders/{id}/editar', 'SliderController@update');
    Route::get('/obtenerSliders', 'SliderController@show');
    Route::post('/sliders/{id}/borrar', 'SliderController@destroy');

    Route::get('/nosotros', 'PageUsController@index');
    Route::post('/nosotros', 'PageUsController@update');

    Route::get('/sugerencias/', 'SuggestionController@index');
    Route::get('/sugerencias/crear', 'SuggestionController@create');
    Route::post('/sugerencias/', 'SuggestionController@store');
    Route::get('/sugerencias/{id}/leer', 'SuggestionController@leer');
    Route::post('/sugerencias/{id}/leer', 'SuggestionController@guardarRespuesta');
    Route::get('/obtenerSugerencias', 'SuggestionController@show');
    Route::post('/sugerencias/{id}/borrar', 'SuggestionController@destroy');

    Route::get('/tarifas', 'RateController@index');
    Route::get('/tarifas/crear', 'RateController@create');
    Route::post('/tarifas', 'RateController@store');
    Route::get('/tarifas/{id}/editar', 'RateController@edit');
    Route::post('/tarifas/{id}/editar', 'RateController@update');
    Route::post('/tarifas/{id}/borrar', 'RateController@destroy');
    Route::get('/obtenerTarifas', 'RateController@show');

    Route::get('/busqueda/{stars}', 'SearchController@index');
    Route::post('/busquedaArchivos', 'SearchController@show');

    Route::post('/busqueda', 'SearchController@indexWord');
    Route::post('/busquedaPorPalabra', 'SearchController@showWord');

    Route::get('/busquedaCategoriaIntranet/{categoria}', 'SearchController@indexCategory');
    Route::post('/busquedaPorCategoria', 'SearchController@showCategory');

    Route::get('/recargar', 'RechargeController@index');
    Route::post('/recargar', 'RechargeController@store')->name('/recargar');
    Route::post('/registrarVenta', 'RechargeController@registrarVenta')->name('/registrarVenta');
    Route::post('/finalizarVenta', 'RechargeController@finalizarVenta')->name('/finalizarVenta');

    Route::post('/obtenerComunas', 'CommuneController@show');
    
    Route::get('/categoriasUsuario', 'CategoryUserController@index');
    Route::get('/categoriasUsuario/crear', 'CategoryUserController@create');
    Route::post('/categoriasUsuario', 'CategoryUserController@store');
    Route::get('/categoriasUsuario/{id}/editar', 'CategoryUserController@edit');
    Route::post('/categoriasUsuario/{id}/editar', 'CategoryUserController@update');
    Route::post('/categoriasUsuario/{id}/borrar', 'CategoryUserController@destroy');
    Route::get('/obtenerCategoriasUsuario', 'CategoryUserController@show');

    Route::get('/rifas', 'RaffleController@index');
    Route::get('/rifasActivas', 'RaffleController@indexUser');
    Route::get('/obtenerRifas', 'RaffleController@show');
    Route::get('/obtenerRifasActivas', 'RaffleController@showUser');
    Route::get('/rifas/crear', 'RaffleController@create');
    Route::post('/rifas', 'RaffleController@store');
    Route::get('/rifas/{id}/editar', 'RaffleController@edit');
    Route::post('/rifas/{id}/editar', 'RaffleController@update');
    Route::post('/rifas/{id}/borrar', 'RaffleController@destroy');
    Route::post('rifas/participar/{id}', 'RaffleController@participar');
    Route::get('/rifas/participantes/{id}', 'RaffleController@participantes');
    Route::post('/rifas/ganador/{id}', 'RaffleController@ganador');
   
    Route::get('/informeVentas', 'ReportController@informeVentas');
    Route::post('/informeVentas', 'ReportController@informeVentasRango');

    Route::get('/informeUsuarios', 'ReportController@informeUsuarios');
    Route::post('/informeUsuarios', 'ReportController@informeUsuariosRango');

    Route::get('/paginaDatos', 'GeneralController@index');
    Route::post('/paginaDatos', 'GeneralController@logo');

    Route::get('/servicios', 'ServiceController@index'); 
    Route::get('/servicios/crear', 'ServiceController@create');
    Route::post('/servicios', 'ServiceController@store');
    Route::get('/servicios/{id}/editar', 'ServiceController@edit');
    Route::post('/servicios/{id}/editar', 'ServiceController@update');
    Route::get('/obtenerServicios', 'ServiceController@show');
    Route::post('/servicios/{id}/borrar', 'ServiceController@destroy');
    
});

