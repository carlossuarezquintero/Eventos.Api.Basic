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

            'nombre' =>'required|min:4|unique:eventos,nombre',
            'codigo' =>'required|min:4|unique:eventos,codigo',
            'slogan' => 'required|min:4',
            'descripcion'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'id_categoria'=>'required|exists:categoriaeventos,id',
            'contacton'=>'required|min:5',
            'contactot'=>'required|min:5',
            'id_lugar'=>'required|exists:lugares,id',
            'costopromedio'=>'required',
            'id_entidad'=>'required|exists:entidades,id',
            'id_usuario'=>'required|exists:usuarios,id',
            'id_ciudad'=>'required|exists:ciudades,id',
            'id_pais'=>'required|exists:paises,id',
            'venta'=> 'required|numeric'

            
            
           
        ];
        $this->validate($request, $reglas);

        $eventos = new Evento([

            

            'nombre' =>ucfirst(strtolower($request->nombre)),
            'codigo' =>$request->codigo,
            'slogan' => $request->slogan,
            'descripcion'=>$request->descripcion,
            'fecha'=>$request->fecha,
            'hora'=>$request->hora,
            'id_categoria'=>$request->id_categoria,
            'contacton'=>$request->contacton,
            'contactot'=>$request->contactot,
            'id_lugar'=>$request->id_lugar,
            'costopromedio'=>$request->costopromedio,
            'id_entidad'=>$request->id_entidad,
            'id_usuario'=>$request->id_usuario,
            'id_ciudad'=>$request->id_ciudad,
            'id_pais'=>$request->id_pais,
            'venta'=>$request->venta,
            'countasis'=>0,
            'count'=>0,
            'shares'=>0,
       
            

        ]);

        

        $eventos->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Evento $Evento)
    {
        $Evento = Evento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'min:4',
            'codigo' =>'min:4',
            'slogan' => 'min:4',
            'descripcion'=>'min:6',
            'id_categoria'=>'exists:categoriaeventos,id',
            'contacton'=>'min:5',
            'contactot'=>'min:5',
            'id_lugar'=>'exists:lugares,id',
            'costopromedio'=>'required',
            'id_entidad'=>'exists:entidades,id',
            'id_usuario'=>'exists:usuarios,id',
            'id_ciudad'=>'exists:ciudades,id',
            'id_pais'=>'exists:paises,id',
            'venta'=> 'numeric'

        ];
        $this->validate($request, $reglas);

       
        $Evento->nombre=ucfirst(strtolower($request->nombre));
        $Evento->codigo =$request->codigo;
        $Evento->slogan = $request->slogan;
        $Evento->descripcion=$request->descripcion;
        $Evento->fecha=$request->fecha;
        $Evento->hora=$request->hora;
        $Evento->id_categoria=$request->id_categoria;
        $Evento->contacton=$request->contacton;
        $Evento->contactot=$request->contactot;
        $Evento->id_lugar=$request->id_lugar;
        $Evento->costopromedio=$request->costopromedio;
        $Evento->id_entidad=$request->id_entidad;
        $Evento->id_usuario=$request->id_usuario;
        $Evento->id_ciudad=$request->id_ciudad;
        $Evento->id_pais=$request->id_pais;
        $Evento->venta=$request->venta;
      
        $Evento->save();

        return $this->successResponse($Evento,200);
    }

    public function indexu(Request $request,Evento $Evento)
    {
        
        $eventos = Evento::findOrFail($request->id);

        return $this->successResponse($eventos,200);
    }
    public function updatecontadores(Request $request,Evento $Evento)
    {
       
        $Evento = Evento::findOrFail($request->id);
        $reglas = [
            'id'=>'required|exists:eventos,id',
            'countasis'=>'numeric',
            'count'=>'numeric',
            'shares'=>'numeric',


        ];


        $this->validate($request, $reglas);

        $Evento->countasis= $Evento->countasis+$request->countasis;
        $Evento->count = $Evento->count+$request->count;
        $Evento->shares = $Evento->shares+$request->shares;
       
      
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
