<?php

namespace App\Http\Controllers;

use App\Areaponente;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AreaponenteController extends Controller
{
    public function index()
    {
        
        $areasponentes = Areaponente::all();
        return $this->showAll($areasponentes);
    }

    public function indexu(Request $request,Areaponente $Areaponente)
    {
        
        $areasponentes = Areaponente::findOrFail($request->id);

        return $this->successResponse($areasponentes,200);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:areasponentes,nombre'
        ];
        $this->validate($request, $reglas);

        $areasponentes = new Areaponente([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $areasponentes->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Areaponente $Areaponente)
    {
        $areasponentes = Areaponente::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $areasponentes->nombre = $request->nombre;
        $areasponentes->save();

        return $this->successResponse($areasponentes,200);
    }

   
    public function destroy(Request $request,Areaponente $Areaponente)
    {
        $areasponentes = Areaponente::findOrFail($request->id);

        $areasponentes->delete();
        return $this->successResponse($areasponentes,200);
    }
}
