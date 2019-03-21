<?php

namespace App\Http\Controllers;

use App\Categoriaponente;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriaponenteController extends Controller
{
    public function index()
    {
        $categoriasponentes = Categoriaponente::all();
        return $this->showAll($categoriasponentes);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:categoriasponentes,nombre'
        ];
        $this->validate($request, $reglas);

        $categoriasponentes = new Categoriaponente([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $categoriasponentes->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Categoriaponente $Categoriaponente)
    {
        $categoriasponentes = Categoriaponente::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $categoriasponentes->nombre = $request->nombre;
        $categoriasponentes->save();

        return $this->successResponse($categoriasponentes,200);
    }

   
    public function destroy(Request $request,Categoriaponente $Categoriaponente)
    {
        $categoriasponentes = Categoriaponente::findOrFail($request->id);

        $categoriasponentes->delete();
        return $this->successResponse($categoriasponentes,200);
    }
}
