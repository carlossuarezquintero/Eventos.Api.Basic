<?php

namespace App\Http\Controllers;

use App\Nivelponente;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NivelponenteController extends Controller
{
    public function index()
    {
        $nivelesponentes = Nivelponente::all();
        return $this->showAll($nivelesponentes);
    }

    public function indexu(Request $request,Nivelponente $Nivelponente)
    {
        
        $nivelesponentes = Nivelponente::findOrFail($request->id);

        return $this->successResponse($nivelesponentes,200);
    }
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:nivelesponentes,nombre'
        ];
        $this->validate($request, $reglas);

        $nivelesponentes = new Nivelponente([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $nivelesponentes->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Nivelponente $Nivelponente)
    {
        $nivelesponentes = Nivelponente::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $nivelesponentes->nombre = $request->nombre;
        $nivelesponentes->save();

        return $this->successResponse($nivelesponentes,200);
    }

   
    public function destroy(Request $request,Nivelponente $Nivelponente)
    {
        $nivelesponentes = Nivelponente::findOrFail($request->id);

        $nivelesponentes->delete();
        return $this->successResponse($nivelesponentes,200);
    }
}
