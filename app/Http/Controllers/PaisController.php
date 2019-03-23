<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return $this->showAll($paises);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'iso' =>'required|unique:paises,iso',
            'nombre' =>'required|unique:paises,nombre',
            
            
           
        ];
        $this->validate($request, $reglas);

        $paises = new Pais([
            'iso' =>ucfirst(strtoupper($request->iso)),
            'nombre' =>ucfirst(strtolower($request->nombre)),
        ]);

        $paises->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Pais $Pais)
    {
        $Pais = Pais::findOrFail($request->id);
        $reglas = [

          
            'id' =>'required',
            'iso' =>'min:2',
            'nombre' =>'min:3',
        ];
        $this->validate($request, $reglas);

        $Pais->nombre = $request->nombre;
        $Pais->save();

        return $this->successResponse($Pais,200);
    }

   
    public function destroy(Request $request,Pais $Pais)
    {
        $paises = Pais::findOrFail($request->id);

        $paises->delete();
        return $this->successResponse($paises,200);
    }
}
