<?php

namespace App\Http\Controllers;

use App\Usuarioinicio;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class UsuarioinicioController extends Controller
{
    public function index()
    {
        $usuariosinicios = Usuarioinicio::all();
        return $this->showAll($usuariosinicios);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'ip' =>'required|ipv4',
            'pais' =>'required',
            'fecha' =>'required',
            'id_usuario' =>'required|exists:usuarios,id',
        ];
        $this->validate($request, $reglas);

        $usuariosinicios = new Usuarioinicio([
            'ip'    => $request->ip,
            'pais' =>ucfirst(strtolower($request->pais)), 
            'fecha' =>$request->fecha,
            'id_usuario' =>$request->id_usuario,

        ]);

        $usuariosinicios->save();
        return $this->successResponse('Registro exitoso',401);
    }

   


   
    public function destroy(Request $request,Usuarioinicio $Usuarioinicio)
    {
        $usuariosinicios = Usuarioinicio::findOrFail($request->id);

        $usuariosinicios->delete();
        return $this->successResponse($usuariosinicios,200);
    }
}
