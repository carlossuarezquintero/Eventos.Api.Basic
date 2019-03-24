<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('prueba',function(){
    return 1;
});






Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
      
    });
});


Route::group(['prefix' => 'u'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('usuarios', 'UsuarioinicioController@index');
        Route::post('usuarioscreate', 'UsuarioinicioController@create');
        Route::PUT('usuariosupdate', 'UsuarioinicioController@update');
        Route::DELETE('usuariosdelete', 'UsuarioinicioController@destroy');
      
    });
});


Route::group(['prefix' => 'rol'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('roles', 'StatuController@index');
        Route::get('roles/{id}', 'StatuController@indexu');
        Route::post('rolescreate', 'StatuController@create');
        Route::PUT('rolesupdate', 'StatuController@update');
        Route::DELETE('rolesdelete', 'StatuController@destroy');

        Route::get('modulos', 'ModulowebController@index');
        Route::get('modulos/{id}', 'ModulowebController@indexu');
        Route::post('moduloscreate', 'ModulowebController@create');
        Route::PUT('modulosupdate', 'ModulowebController@update');
        Route::DELETE('modulosdelete', 'ModulowebController@destroy');

    });
});


Route::group(['prefix' => 'tipos'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('tiposid', 'TipoidController@index');
        Route::get('tiposid/{id}', 'TipoidController@indexu');
        Route::post('tiposidcreate', 'TipoidController@create');
        Route::PUT('tiposidupdate', 'TipoidController@update');
        Route::DELETE('tiposidelete', 'TipoidController@destroy');

        Route::get('tipospr', 'TipopreguntaController@index');
        Route::get('tipospr/{id}', 'TipopreguntaController@indexu');
        Route::post('tiposprcreate', 'TipopreguntaController@create');
        Route::PUT('tiposprupdate', 'TipopreguntaController@update');
        Route::DELETE('tiposprdelete', 'TipopreguntaController@destroy');

        Route::get('tipospqr', 'TipopqrController@index');
        Route::get('tipospqr/{id}', 'TipopqrController@indexu');
        Route::post('tipospqrcreate', 'TipopqrController@create');
        Route::PUT('tipospqrupdate', 'TipopqrController@update');
        Route::DELETE('tipospqrdelete', 'TipopqrController@destroy');


      
    });
});

Route::group(['prefix' => 'ponent'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('ponentes', 'AreaponenteController@index');
        Route::get('ponentes/{id}', 'AreaponenteController@indexu');
        Route::post('ponentescreate', 'AreaponenteController@create');
        Route::PUT('ponentesupdate', 'AreaponenteController@update');
        Route::DELETE('ponentesdelete', 'AreaponenteController@destroy');

        Route::get('niveles', 'NivelponenteController@index');
        Route::get('niveles/{id}', 'NivelponenteController@indexu');
        Route::post('nivelescreate', 'NivelponenteController@create');
        Route::PUT('nivelesupdate', 'NivelponenteController@update');
        Route::DELETE('nivelesdelete', 'NivelponenteController@destroy');

        Route::get('categorias', 'CategoriaponenteController@index');
        Route::get('categorias/{id}', 'CategoriaponenteController@indexu');
        Route::post('categoriascreate', 'CategoriaponenteController@create');
        Route::PUT('categoriasupdate', 'CategoriaponenteController@update');
        Route::DELETE('categoriasdelete', 'CategoriaponenteController@destroy');
      
    });
});

Route::group(['prefix' => 'ev'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('eventos', 'EventoController@index');
        Route::get('eventos/{id}', 'EventoController@indexu');
        Route::post('eventoscreate', 'EventoController@create');
        Route::PUT('eventosupdate', 'EventoController@update');
        Route::PUT('eventoscounts', 'EventoController@updatecontadores');
        Route::DELETE('eventosdelete', 'EventoController@destroy');

        Route::get('admin', 'EventousuarioadminController@index');
        Route::get('admin/{id}', 'EventousuarioadminController@indexuser');
        Route::post('admincreate', 'EventousuarioadminController@create');
        Route::PUT('adminupdate', 'EventousuarioadminController@update');
        Route::DELETE('admindelete', 'EventousuarioadminController@destroy');

        Route::get('inscripcion', 'EventousuarioinscripcionController@index');
        Route::post('inscripcioncreate', 'EventousuarioinscripcionController@create');
        Route::PUT('inscripcionupdate', 'EventousuarioinscripcionController@update');
        Route::DELETE('inscripciondelete', 'EventousuarioinscripcionController@destroy');


        Route::get('categorias', 'CategoriaeventoController@index');
        Route::get('categorias/{id}', 'CategoriaeventoController@indexu');
        Route::post('categoriascreate', 'CategoriaeventoController@create');
        Route::PUT('categoriasupdate', 'CategoriaeventoController@update');
        Route::DELETE('categoriasdelete', 'CategoriaeventoController@destroy');

        Route::get('lugares', 'LugarController@index');
        Route::get('lugares/{id}', 'LugarController@indexu');
        Route::post('lugarescreate', 'LugarController@create');
        Route::PUT('lugaresupdate', 'LugarController@update');
        Route::DELETE('lugaresdelete', 'LugarController@destroy');



      
    });
});


Route::group(['prefix' => 'country'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('paises', 'PaisController@index');
        Route::get('paises/{id}', 'PaisController@indexu');
        Route::post('paisescreate', 'PaisController@create');
        Route::PUT('paisesupdate', 'PaisController@update');
        Route::DELETE('paisesdelete', 'PaisController@destroy');

        Route::get('ciudades', 'CiudadController@index');
        Route::get('ciudades/{id}', 'CiudadController@indexu');
        Route::post('ciudadescreate', 'CiudadController@create');
        Route::PUT('ciudadesupdate', 'CiudadController@update');
        Route::DELETE('ciudadesdelete', 'CiudadController@destroy');
      
    });
});


Route::group(['prefix' => 'money'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('monedas', 'MonedaController@index');
        Route::get('monedas/{id}', 'MonedaController@indexu');
        Route::post('monedascreate', 'MonedaController@create');
        Route::PUT('monedasupdate', 'MonedaController@update');
        Route::DELETE('monedasdelete', 'MonedaController@destroy');
      
    });
});

Route::group(['prefix' => 'ent'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('entidades', 'EntidadController@index');
        Route::get('entidades/{id}', 'EntidadController@indexu');
        Route::post('entidadescreate', 'EntidadController@create');
        Route::PUT('entidadesupdate', 'EntidadController@update');
        Route::DELETE('entidadesdelete', 'EntidadController@destroy');
      
    });
});

Route::group(['prefix' => 'setting'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('dias', 'DiaController@index');
        Route::get('dias/{id}', 'DiaController@indexu');
        Route::post('diascreate', 'DiaController@create');
        Route::PUT('diasupdate', 'DiaController@update');
        Route::DELETE('diasdelete', 'DiaController@destroy');
      
    });
});

Route::group(['prefix' => 'tel'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('telefonos', 'TipotelefonoController@index');
        Route::get('telefonos/{id}', 'TipotelefonoController@indexu');
        Route::post('telefonoscreate', 'TipotelefonoController@create');
        Route::PUT('telefonosupdate', 'TipotelefonoController@update');
        Route::DELETE('telefonosdelete', 'TipotelefonoController@destroy');
      
    });
});

Route::group(['prefix' => 'title'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('titulos', 'TituloController@index');
        Route::get('titulos/{id}', 'TituloController@indexu');
        Route::post('tituloscreate', 'TituloController@create');
        Route::PUT('titulosupdate', 'TituloController@update');
        Route::DELETE('titulosdelete', 'TituloController@destroy');
      
    });
});


Route::group(['prefix' => 'status'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('estados', 'StatuController@index');
        Route::get('estados/{id}', 'StatuController@indexu');
        Route::post('estadoscreate', 'StatuController@create');
        Route::PUT('estadosupdate', 'StatuController@update');
        Route::DELETE('estadosdelete', 'StatuController@destroy');
      
    });
});



Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
  
});