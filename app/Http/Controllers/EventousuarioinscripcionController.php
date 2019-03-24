<?php

namespace App\Http\Controllers;

use App\Eventousuarioinscripcion;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class EventousuarioinscripcionController extends Controller
{
    public function index()
    {
        $Eventousuarioinscripcion = Eventousuarioinscripcion::all();
        return $this->showAll($Eventousuarioinscripcion);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'id_user' =>'required|exists:usuarios,id|numeric',
            'id_evento' =>'required|exists:eventos,id|numeric',
            'id_status'=>'required|exists:status,id|numeric',
            'uipapp' =>'ipv4',
         
        ];
        $this->validate($request, $reglas);

        $Eventousuarioinscripcion = new Eventousuarioinscripcion([

            
            'id_user' =>$request->id_user,
            'id_evento'=>$request->id_evento,
            'id_status'=>$request->id_status,
            'uipapp'=>$request->ipapp,
            
        ]);

        $Eventousuarioinscripcion->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Eventousuarioinscripcion $Eventousuarioinscripcion)
    {
        $Eventousuarioinscripcion = Eventousuarioinscripcion::findOrFail($request->id);
        $reglas = [

            'id' =>'required',
            'id_user' =>'required|exists:usuarios,id|numeric',
            'id_evento' =>'required|exists:eventos,id|numeric',
            'id_status'=>'required|exists:status,id|numeric',
            'uipapp' =>'ipv4'
        ];
        $this->validate($request, $reglas);

        $Eventousuarioinscripcion->id_user = $request->id_user;
        $Eventousuarioinscripcion->id_evento = $request->id_evento;
        $Eventousuarioinscripcion->id_status = $request->id_status;
        $Eventousuarioinscripcion->uipapp = $request->ipapp;
        $Eventousuarioinscripcion->save();

        return $this->successResponse($Eventousuarioinscripcion,200);
    }

   
    public function destroy(Request $request,Eventousuarioinscripcion $Eventousuarioinscripcion)
    {
        $Eventousuarioinscripcion = Eventousuarioinscripcion::findOrFail($request->id);

        $Eventousuarioinscripcion->delete();
        return $this->successResponse($Eventousuarioinscripcion,200);
    }
}
