<?php

namespace App\Http\Controllers;

use App\Dia;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DiaController extends Controller
{
    public function index()
    {
        $dias = Dia::all();
        return $this->showAll($dias);
    }
    public function indexu(Request $request,Dia $Dia)
    {
        
        $dias = Dia::findOrFail($request->id);

        return $this->successResponse($dias,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:dias,nombre'
        ];
        $this->validate($request, $reglas);

        $dias = new Dia([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $dias->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Dia $Dia)
    {
        $dias = Dia::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $dias->nombre = $request->nombre;
        $dias->save();

        return $this->successResponse($dias,200);
    }

   
    public function destroy(Request $request,Dia $Dia)
    {
        $dias = Dia::findOrFail($request->id);

        $dias->delete();
        return $this->successResponse($dias,200);
    }
}
