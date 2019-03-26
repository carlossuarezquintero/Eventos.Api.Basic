<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Facades\DB;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $config = Configuracion::all();
        return $this->showAll($config);
    }
    public function indexu(Request $request,Configuracion $Configuracion)
    {
        
        $config = Configuracion::findOrFail($request->id);

        return $this->successResponse($config,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [

            'logo' =>'required',
            'colorprincipal'=> 'required',
            'colorsegun' =>'required',
            'titulo' =>'required',
            'footer' =>'required',
            'mensajebienv'=> 'required',
            'linksistema' =>'required',
            'version' =>'required',
            'telefono' =>'required',
            'direccion' =>'required',
            'email' =>'required|email',
            'id_idioma' =>'required|exists:idiomas,id',
            'online' =>'required'
        ];
        $this->validate($request, $reglas);

        $config = new Configuracion([
            'logo'    => $request->logo->store(''),
            'colorprincipal'=> $request->colorprincipal,
            'colorsegun' =>$request->colorsegun,
            'titulo' =>$request->titulo,
            'footer' =>$request->footer,
            'mensajebienv'=> $request->mensajebienv,
            'linksistema' =>$request->linksistema,
            'version' =>$request->version,
            'telefono' =>$request->telefono,
            'direccion' =>$request->direccion,
            'email' =>$request->email,
            'id_idioma' =>$request->id_idioma,
            'online' =>$request->online
        ]);

        $config->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Configuracion $Configuracion)
    {
        $config = Configuracion::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'logo' =>'required',
            'colorprincipal'=> 'min:6',
            'colorsegun' =>'min:6',
            'titulo' =>'min:5',
            'footer' =>'min:12',
            'mensajebienv'=> 'min:9',
            'linksistema' =>'min:7',
            'version' =>'min:3',
            'telefono' =>'min:7',
            'direccion' =>'min:9',
            'email' =>'email',
            'id_idioma' =>'required|exists:idiomas,id',
            'online' =>'min:1'
        ];
        $this->validate($request, $reglas);

        if($request->hasfile('logo')){
            Storage::delete($config->logo);
            $config->logo = $request->logo->store('');
        }

        $config->colorprincipal = $request->colorprincipal;
        $config->colorsegun = $request->colorsegun;
        $config->titulo = $request->titulo;
        $config->footer = $request->footer;
        $config->mensajebienv = $request->mensajebienv;
        $config->linksistema = $request->linksistema;
        $config->version = $request->version;
        $config->telefono = $request->telefono;
        $config->direccion = $request->direccion;
        $config->email = $request->email;
        $config->id_idioma = $request->id_idioma;
        $config->online = $request->online;
        

        $config->save();

        return $this->successResponse($config,200);
    }

   
    public function destroy(Request $request,Configuracion $Configuracion)
    {
        $config = Configuracion::findOrFail($request->id);

        $config->delete();
        return $this->successResponse($config,200);
    }
}
