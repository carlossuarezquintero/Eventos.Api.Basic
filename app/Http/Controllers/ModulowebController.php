<?php

namespace App\Http\Controllers;

use App\Moduloweb;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class ModulowebController extends Controller
{
    public function index()
    {
        $modulosweb = Moduloweb::all();
        return $this->showAll($modulosweb);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'nombre' =>'required|unique:modulosweb,nombre',
            'tipo' =>'required|numeric',
            'url' =>'required',
            
           
        ];
        $this->validate($request, $reglas);

        $modulosweb = new Moduloweb([

            'nombre' =>ucfirst(strtolower($request->nombre)),
            'tipo' =>$request->tipo,
            'icono'=>$request->icono,
            'url' =>$request->url,
       
            

        ]);

        $modulosweb->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Moduloweb $Moduloweb)
    {
        $Moduloweb = Moduloweb::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'min:3',
            'tipo' =>'min:1',
            'url' =>'min:4',
        ];
        $this->validate($request, $reglas);

        $Moduloweb->nombre = $request->nombre;
        $Moduloweb->save();

        return $this->successResponse($Moduloweb,200);
    }

   
    public function destroy(Request $request,Moduloweb $Moduloweb)
    {
        $modulosweb = Moduloweb::findOrFail($request->id);

        $modulosweb->delete();
        return $this->successResponse($modulosweb,200);
    }
}
