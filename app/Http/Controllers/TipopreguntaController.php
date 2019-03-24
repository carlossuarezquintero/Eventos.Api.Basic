<?php

namespace App\Http\Controllers;

use App\Tipopregunta;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TipopreguntaController extends Controller
{
    
    public function index()
    {
        $tipospreguntas = Tipopregunta::all();
        return $this->showAll($tipospreguntas);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:tipospreguntas,nombre'
        ];
        $this->validate($request, $reglas);

        $tipospreguntas = new Tipopregunta([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $tipospreguntas->save();
        return $this->successResponse('Registro exitoso',401);
    }
    public function indexu(Request $request,Tipopregunta $tipopregunta)
    {
        
        $tipospreguntas = Tipopregunta::findOrFail($request->id);

        return $this->successResponse($tipospreguntas,200);
    }
   

    public function update(Request $request, Tipopregunta $tipopregunta)
    {
        $tipospreguntas = Tipopregunta::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $tipospreguntas->nombre = $request->nombre;
        $tipospreguntas->save();

        return $this->successResponse($tipospreguntas,200);
    }

   
    public function destroy(Request $request,Tipopregunta $tipopregunta)
    {
        $tipospreguntas = Tipopregunta::findOrFail($request->id);

        $tipospreguntas->delete();
        return $this->successResponse($tipospreguntas,200);
    }
}
