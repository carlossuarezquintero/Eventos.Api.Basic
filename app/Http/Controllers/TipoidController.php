<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tipoid;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;


class TipoidController extends Controller
{
    public function index()
    {
        $listaid = Tipoid::all();
        return $this->showAll($listaid);
    }

    public function create(Request $request)
    {
       
        $reglas = [
            'nombre' =>'required|unique:tiposid,nombre'
        ];
        $this->validate($request, $reglas);

        $tipo = new Tipoid([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $tipo->save();
        return $this->successResponse('Registro exitoso',401);
        
    }



    public function indexu(Request $request,Tipoid $tipoid)
    {
        
        $tipoid = Tipoid::findOrFail($request->id);

        return $this->successResponse($tipoid,200);
    }
  
    public function update(Request $request,Tipoid $tipoid)
    {
        $tipoid = Tipoid::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $tipoid->nombre = $request->nombre;
        $tipoid->save();

        return $this->successResponse($tipoid,200);
    }

    public function destroy(Request $request)
    {
        $tipoid = Tipoid::findOrFail($request->id);

        $tipoid->delete();
        return $this->successResponse($tipoid,200);
    }

}
