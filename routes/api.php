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


        Route::get('tboletas', 'TipoboletaController@index');
        Route::get('tboletas/{id}', 'TipoboletaController@indexu');
        Route::post('tboletascreate', 'TipoboletaController@create');
        Route::PUT('tboletasupdate', 'TipoboletaController@update');
        Route::DELETE('tboletasdelete', 'TipoboletaController@destroy');

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

        Route::get('pqr', 'PqrController@index');
        Route::get('pqr/{id}', 'PqrController@indexu');
        Route::post('pqrcreate', 'PqrController@create');
        Route::PUT('pqrupdate', 'PqrController@update');
        Route::DELETE('pqrdelete', 'PqrController@destroy');


      
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

        Route::get('elugar', 'EventolugarController@index');
        Route::get('elugar/{id}', 'EventolugarController@indexu');
        Route::post('elugarcreate', 'EventolugarController@create');
        Route::PUT('elugarupdate', 'EventolugarController@update');
        Route::PUT('elugarcounts', 'EventolugarController@updatecontadores');
        Route::DELETE('elugardelete', 'EventolugarController@destroy');

        Route::get('notificacion', 'NotificacionfinalController@index');
        Route::get('notificacion/{id}', 'NotificacionfinalController@indexu');
        Route::post('notificacioncreate', 'NotificacionfinalController@create');
        Route::PUT('notificacionupdate', 'NotificacionfinalController@update');
        Route::PUT('notificacioncounts', 'NotificacionfinalController@updatecontadores');
        Route::DELETE('notificaciondelete', 'NotificacionfinalController@destroy');

        Route::get('app', 'EventoappController@index');
        Route::get('app/{id}', 'EventoappController@indexu');
        Route::post('appcreate', 'EventoappController@create');
        Route::PUT('appupdate', 'EventoappController@update');
        Route::DELETE('appdelete', 'EventoappController@destroy');


        Route::get('form', 'FormularioeventoController@index');
        Route::get('form/{id}', 'FormularioeventoController@indexu');
        Route::post('formcreate', 'FormularioeventoController@create');
        Route::PUT('formupdate', 'FormularioeventoController@update');
        Route::DELETE('formdelete', 'FormularioeventoController@destroy');

        Route::get('pform', 'PreguntaformularioController@index');
        Route::get('pform/{id}', 'PreguntaformularioController@indexu');
        Route::post('pformcreate', 'PreguntaformularioController@create');
        Route::PUT('pformupdate', 'PreguntaformularioController@update');
        Route::DELETE('pformdelete', 'PreguntaformularioController@destroy');

        Route::get('opciones', 'OpcionselctController@index');
        Route::get('opciones/{id}', 'OpcionselctController@indexu');
        Route::post('opcionescreate', 'OpcionselctController@create');
        Route::PUT('opcionesupdate', 'OpcionselctController@update');
        Route::DELETE('opcionesdelete', 'OpcionselctController@destroy');

        Route::get('bcosto', 'EventoboletacostoController@index');
        Route::get('bcosto/{id}', 'EventoboletacostoController@indexu');
        Route::post('bcostocreate', 'EventoboletacostoController@create');
        Route::PUT('bcostoupdate', 'EventoboletacostoController@update');
        Route::DELETE('bcostodelete', 'EventoboletacostoController@destroy');


        Route::get('landing', 'EventolandingController@index');
        Route::get('landing/{id}', 'EventolandingController@indexu');
        Route::post('landingcreate', 'EventolandingController@create');
        Route::PUT('landingupdate', 'EventolandingController@update');
        Route::DELETE('landingdelete', 'EventolandingController@destroy');

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

Route::group(['prefix' => 'img'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('imagenes', 'ImageneventoController@index');
        Route::get('imagenes/{id}', 'ImageneventoController@indexu');
        Route::post('imagenescreate', 'ImageneventoController@create');
        Route::PUT('imagenesupdate', 'ImageneventoController@update');
        Route::DELETE('imagenesdelete', 'ImageneventoController@destroy');

        Route::get('diseno', 'DisenoeventoController@index');
        Route::get('diseno/{id}', 'DisenoeventoController@indexu');
        Route::post('disenocreate', 'DisenoeventoController@create');
        Route::PUT('disenoupdate', 'DisenoeventoController@update');
        Route::DELETE('disenodelete', 'DisenoeventoController@destroy');
      
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
      
        Route::get('config', 'ConfiguracionController@index');
        Route::get('config/{id}', 'ConfiguracionController@indexu');
        Route::post('configcreate', 'ConfiguracionController@create');
        Route::PUT('configupdate', 'ConfiguracionController@update');
        Route::DELETE('configdelete', 'ConfiguracionController@destroy');
    });
});


Route::group(['prefix' => 'lang'], function () {
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('idiomas', 'IdiomasController@index');
        Route::get('idiomas/{id}', 'IdiomasController@indexu');
        Route::post('idiomascreate', 'IdiomasController@create');
        Route::PUT('idiomasupdate', 'IdiomasController@update');
        Route::DELETE('idiomasdelete', 'IdiomasController@destroy');

        Route::get('traductor', 'TraductorController@index');
        Route::get('traductor/{id}', 'TraductorController@indexu');
        Route::post('traductorcreate', 'TraductorController@create');
        Route::PUT('traductorupdate', 'TraductorController@update');
        Route::DELETE('traductordelete', 'TraductorController@destroy');


        Route::get('itraductor', 'IdiomasusuarioController@index');
        Route::get('itraductor/{id}', 'IdiomasusuarioController@indexu');
        Route::post('itraductorcreate', 'IdiomasusuarioController@create');
        Route::PUT('itraductorupdate', 'IdiomasusuarioController@update');
        Route::DELETE('itraductordelete', 'IdiomasusuarioController@destroy');
      
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