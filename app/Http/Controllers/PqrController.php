<?php

namespace App\Http\Controllers;

use App\Pqr;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PqrController extends Controller
{
    public function index()
    {
        $pqrs = Pqr::all();
        return $this->showAll($pqrs);
    }

    public function indexu(Request $request,Pqr $Pqr)
    {
        
        $pqrs = Pqr::findOrFail($request->id);

        return $this->successResponse($pqrs,200);
    }
    public function create(Request $request)
    {
        $reglas = [
          
            'nombres' =>'required',
            'apellidos' =>'required',
            'id_user'=>'required|exists:usuarios,id',
            'email'=>'required|email',
            'id_evento' =>'required|exists:eventos,id',
            'id_status'=>'required|exists:status,id',
            'id_tipopqrs'=>'required|exists:tipospqr,id',
            'descripcion'=>'required',
        ];
        $this->validate($request, $reglas);

        $pqrs = new Pqr([
            'nombres'    => ucfirst(strtoupper($request->nombres)),
            'apellidos'    => ucfirst(strtoupper($request->apellidos)),
            'id_user'=>$request->id_user,
            'email'=>$request->email,
            'id_evento'=>$request->id_evento,
            'id_status'=>$request->id_status,
            'id_tipopqrs'=>$request->id_tipopqrs,
            'descripcion'=>$request->descripcion,
        ]);

        $pqrs->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Pqr $Pqr)
    {
        $pqrs = Pqr::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombres' =>'min:4',
            'apellidos' =>'min:4',
            'id_user'=>'required|exists:usuarios,id',
            'email'=>'email',
            'id_evento' =>'required|exists:eventos,id',
            'id_status'=>'required|exists:status,id',
            'id_tipopqrs'=>'required|exists:tipospqr,id',
            'descripcion'=>'min:6',
        ];
        $this->validate($request, $reglas);

        $pqrs->nombres = $request->nombres;
        $pqrs->apellidos = $request->apellidos;
        $pqrs->id_user = $request->id_user;
        $pqrs->email = $request->email;
        $pqrs->id_evento = $request->id_evento;
        $pqrs->id_status = $request->id_status;
        $pqrs->id_tipopqrs = $request->id_tipopqrs;
        $pqrs->descripcion = $request->descripcion;
        $pqrs->save();

        return $this->successResponse($pqrs,200);
    }

   
    public function destroy(Request $request,Pqr $Pqr)
    {
        $pqrs = Pqr::findOrFail($request->id);

        $pqrs->delete();
        return $this->successResponse($pqrs,200);
    }
}
