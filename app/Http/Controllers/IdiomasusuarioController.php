<?php

namespace App\Http\Controllers;

use App\Idiomasusuario;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IdiomasusuarioController extends Controller
{
    public function index()
    {
        $itraductor = Idiomasusuario::all();
        return $this->showAll($itraductor);
    }
    public function indexu(Request $request,Idiomasusuario $Idiomasusuario)
    {
        
        $itraductor = Idiomasusuario::findOrFail($request->id);

        return $this->successResponse($itraductor,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'id_idioma' =>'required|exists:idiomas,id',
            'id_traductor'=>'required|exists:traductores,id'
        ];
        $this->validate($request, $reglas);

        $itraductor = new Idiomasusuario([
            'id_idioma'    => $request->id_idioma,
            'id_traductor'    => $request->id_traductor,
        ]);

        $itraductor->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Idiomasusuario $Idiomasusuario)
    {
        $itraductor = Idiomasusuario::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_idioma' =>'required|exists:idiomas,id',
            'id_traductor'=>'required|exists:traductores,id'
        ];
        $this->validate($request, $reglas);

        $itraductor->id_idioma = $request->id_idioma;
        $itraductor->id_traductor = $request->id_traductor;
        $itraductor->save();

        return $this->successResponse($itraductor,200);
    }

   
    public function destroy(Request $request,Idiomasusuario $Idiomasusuario)
    {
        $itraductor = Idiomasusuario::findOrFail($request->id);

        $itraductor->delete();
        return $this->successResponse($itraductor,200);
    }
}
