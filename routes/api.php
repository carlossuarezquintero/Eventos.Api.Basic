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

Route::group(['prefix' => 'rol'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('roles', 'StatuController@index');
        Route::post('rolescreate', 'StatuController@create');
        Route::PUT('rolesupdate', 'StatuController@update');
        Route::DELETE('rolesdelete', 'StatuController@destroy');
      
    });
});





Route::group(['prefix' => 'tipos'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('tiposid', 'TipoidController@index');
        Route::post('tiposidcreate', 'TipoidController@create');
        Route::PUT('tiposidupdate', 'TipoidController@update');
        Route::DELETE('tiposidelete', 'TipoidController@destroy');

        Route::get('tipospr', 'TipopreguntaController@index');
        Route::post('tiposprcreate', 'TipopreguntaController@create');
        Route::PUT('tiposprupdate', 'TipopreguntaController@update');
        Route::DELETE('tiposprdelete', 'TipopreguntaController@destroy');


      
    });
});

Route::group(['prefix' => 'ponent'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('ponentes', 'AreaponenteController@index');
        Route::post('ponentescreate', 'AreaponenteController@create');
        Route::PUT('ponentesupdate', 'AreaponenteController@update');
        Route::DELETE('ponentesdelete', 'AreaponenteController@destroy');

        Route::get('niveles', 'NivelponenteController@index');
        Route::post('nivelescreate', 'NivelponenteController@create');
        Route::PUT('nivelesupdate', 'NivelponenteController@update');
        Route::DELETE('nivelesdelete', 'NivelponenteController@destroy');

        Route::get('categorias', 'CategoriaponenteController@index');
        Route::post('categoriascreate', 'CategoriaponenteController@create');
        Route::PUT('categoriasupdate', 'CategoriaponenteController@update');
        Route::DELETE('categoriasdelete', 'CategoriaponenteController@destroy');
      
    });
});

Route::group(['prefix' => 'ent'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('entidades', 'EntidadController@index');
        Route::post('entidadescreate', 'EntidadController@create');
        Route::PUT('entidadesupdate', 'EntidadController@update');
        Route::DELETE('entidadesdelete', 'EntidadController@destroy');
      
    });
});

Route::group(['prefix' => 'tel'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('telefonos', 'TipotelefonoController@index');
        Route::post('telefonoscreate', 'TipotelefonoController@create');
        Route::PUT('telefonosupdate', 'TipotelefonoController@update');
        Route::DELETE('telefonosdelete', 'TipotelefonoController@destroy');
      
    });
});

Route::group(['prefix' => 'title'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('titulos', 'TituloController@index');
        Route::post('tituloscreate', 'TituloController@create');
        Route::PUT('titulosupdate', 'TituloController@update');
        Route::DELETE('titulosdelete', 'TituloController@destroy');
      
    });
});


Route::group(['prefix' => 'status'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('estados', 'StatuController@index');
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