<?php

namespace App\Http\Controllers;

use App\Traductor;
use Illuminate\Http\Request;
use App\Notifications\translatemessage;
use App\User;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TraductorController extends Controller
{
    
    public function index()
    {
        $traductores = Traductor::all();
        return $this->showAll($traductores);
    }
    public function indexu(Request $request,Traductor $titulo)
    {
        
        $traductores = Traductor::findOrFail($request->id);

        return $this->successResponse($traductores,200);
    }

    
    public function create(Request $request)
    {
       
        $reglas = [
            'nombres' =>'required',
            'apellidos' =>'required',
            'identificacion' =>'required|numeric',
            'email' =>'required|email|unique:traductores,email',
           
            
        ];
        $this->validate($request, $reglas);

        $traductores = new Traductor([
            'nombres'    => ucfirst(strtoupper($request->nombres)),
            'apellidos'    => ucfirst(strtoupper($request->apellidos)),
            'identificacion'    => $request->identificacion,
            'email'=>$request->email,
            'pin'=> mt_rand(1,999999),
        ]);

        $traductores->save();
        $traductores->notify(new translatemessage($traductores));
        return $this->successResponse('Registro exitoso',401);
    }


   
    public function update(Request $request, Traductor $traductor)
    {
        $traductores = Traductor::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombres' =>'min:5',
            'apellidos' =>'min:5',
            'identificacion' =>'min:5|numeric',
            'email' =>'email',
            
        ];
        $this->validate($request, $reglas);

        $traductores->nombres = ucfirst(strtoupper($request->nombres));
        $traductores->apellidos = ucfirst(strtoupper($request->apellidos));
        $traductores->identificacion = $request->identificacion;
        $traductores->email = $request->email;
        $traductores->save();

        return $this->successResponse($traductores,200);
    }

   
    public function destroy(Request $request,Traductor $traductor)
    {
         $traductores = Traductor::findOrFail($request->id);

        $traductores->delete();
        return $this->successResponse($traductores,200);
    }
}
