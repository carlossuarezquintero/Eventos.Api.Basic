<?php

namespace App\Http\Controllers;

use App\Tipoboleta;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class TipoboletaController extends Controller
{
    public function index()
    {
        $tiposboletas = Tipoboleta::all();
        return $this->showAll($tiposboletas);
    }
    public function indexu(Request $request,Tipoboleta $Tipoboleta)
    {
        
        $tiposboletas = Tipoboleta::findOrFail($request->id);

        return $this->successResponse($tiposboletas,200);
    }
    public function create(Request $request)
    {
       
        $reglas = [
            'nombre' =>'required|unique:tiposboleta,nombre',
            'id_user'=>'required|exists:usuarios,id',
        ];
        $this->validate($request, $reglas);

        $tiposboletas = new Tipoboleta([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'id_user' =>$request->id_user,
        ]);

        $tiposboletas->save();
        return $this->successResponse('Registro exitoso',401);
        
    }

  
    public function update(Request $request,Tipoboleta $Tipoboleta)
    {
        $tiposboletas = Tipoboleta::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required',
            'id_user'=>'required|exists:usuarios,id',
        ];
        $this->validate($request, $reglas);

        $tiposboletas->nombre = $request->nombre;
        $tiposboletas->id_user = $request->id_user;
        $tiposboletas->save();

        return $this->successResponse($tiposboletas,200);
    }

    public function destroy(Request $request)
    {
        $tiposboletas = Tipoboleta::findOrFail($request->id);

        $tiposboletas->delete();
        return $this->successResponse($tiposboletas,200);
    }
}
