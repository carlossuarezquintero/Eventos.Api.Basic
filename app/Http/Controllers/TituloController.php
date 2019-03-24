<?php

namespace App\Http\Controllers;

use App\Titulo;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TituloController extends Controller
{
   
    public function index()
    {
        $titulos = Titulo::all();
        return $this->showAll($titulos);
    }
    public function indexu(Request $request,Titulo $titulo)
    {
        
        $titulos = Titulo::findOrFail($request->id);

        return $this->successResponse($titulos,200);
    }

    
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:titulo,nombre'
        ];
        $this->validate($request, $reglas);

        $titulos = new Titulo([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $titulos->save();
        return $this->successResponse('Registro exitoso',401);
    }


   
    public function update(Request $request, Titulo $titulo)
    {
        $titulos = Titulo::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $titulos->nombre = $request->nombre;
        $titulos->save();

        return $this->successResponse($titulos,200);
    }

   
    public function destroy(Request $request,Titulo $titulo)
    {
         $titulos = Titulo::findOrFail($request->id);

        $titulos->delete();
        return $this->successResponse($titulos,200);
    }
}
