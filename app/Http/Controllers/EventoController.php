<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return $this->showAll($eventos);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'nombre' =>'required|min:4|exists:eventos,nombre',
            'codigo' =>'required|min:4|exists:eventos,codigo',
            'slogan' => 'required|min:4',
            'descripcion'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'id_categoria'=>'required|exists:categoriaeventos,id',
            'contacton'=>'required|min:5',
            'contactot'=>'required|min:5',
            'id_lugar'=>'required|exists:lugares,id',
            'costopromedio'=>'required',
            'id_entidad'=>'required|exists:lugares,id',

            
            
           
        ];
        $this->validate($request, $reglas);

        $eventos = new Evento([

            'nombre' =>ucfirst(strtolower($request->nombre)),
            'tipo' =>$request->tipo,
            'icono'=>$request->icono,
            'url' =>$request->url,
       
            

        ]);

        $eventos->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Evento $Evento)
    {
        $Evento = Evento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'min:3',
            'tipo' =>'min:1',
            'url' =>'min:4',
        ];
        $this->validate($request, $reglas);

        $Evento->nombre = $request->nombre;
        $Evento->save();

        return $this->successResponse($Evento,200);
    }

   
    public function destroy(Request $request,Evento $Evento)
    {
        $eventos = Evento::findOrFail($request->id);

        $eventos->delete();
        return $this->successResponse($eventos,200);
    }
}
