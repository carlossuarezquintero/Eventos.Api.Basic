<?php

namespace App\Http\Controllers;

use App\Categoriaevento;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriaeventoController extends Controller
{
    public function index()
    {
        $categorias = Categoriaevento::all();
        return $this->showAll($categorias);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:categoriaeventos,nombre',
            'id_usuario'    => 'required|numeric|exists:usuarios,id',
        ];
        $this->validate($request, $reglas);

        $categorias = new Categoriaevento([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'id_usuario'=>$request->id_usuario,
        ]);

        $categorias->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Categoriaevento $Categoriaevento)
    {
        $categorias = Categoriaevento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required|min:4',
            'id_usuario'    => 'required|numeric|exists:usuarios,id',
        ];
        $this->validate($request, $reglas);

        $categorias->nombre = $request->nombre;
        $categorias->id_usuario =$request->id_usuario;
        $categorias->save();

        return $this->successResponse($categorias,200);
    }

   
    public function destroy(Request $request,Categoriaevento $Categoriaevento)
    {
        $categorias = Categoriaevento::findOrFail($request->id);
        $categorias->delete();
        return $this->successResponse($categorias,200);
    }
}
