<?php

namespace App\Http\Controllers;

use App\Eventoapp;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventoappController extends Controller
{
    public function index()
    {
        $eventosapp = Eventoapp::all();
        return $this->showAll($eventosapp);
    }
    public function indexu(Request $request,Eventoapp $Eventoapp)
    {
        
        $eventosapp = Eventoapp::findOrFail($request->id);

        return $this->successResponse($eventosapp,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            
            'colorprincipal' =>'required',
            'colordos' =>'required',
            'colortitulo' =>'required',
            'colorsubtitulos'=>'required',
            'colortexto'=>'required',
            'id_evento'=>'required|exists:eventos,id',
            'id_status' =>'required|exists:status,id',
            'id_usuario' =>'required|exists:usuarios,id',
           
        ];
        $this->validate($request, $reglas);

        $eventosapp = new Eventoapp([
            

            'colorprincipal' =>$request->colorprincipal,
            'colordos' =>$request->colordos,
            'colortitulo' =>$request->colortitulo,
            'colorsubtitulos'=>$request->colorsubtitulos,
            'colortexto'=>$request->colortexto,
            'id_evento'=>$request->id_evento,
            'id_status'=>$request->id_status,
            'id_usuario'=>$request->id_usuario,
        ]);

        $eventosapp->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Eventoapp $Eventoapp)
    {
        $eventosapp = Eventoapp::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_evento'=>'required|exists:eventos,id',
            'id_status' =>'required|exists:status,id',
            'id_usuario' =>'required|exists:usuarios,id',
            
        ];
        $this->validate($request, $reglas);

        if($request->has('colorprincipal')){
            $eventosapp->colorprincipal = $request->colorprincipal;
        }

        if($request->has('colortexto')){
            $eventosapp->colortexto = $request->colortexto;
        }

        if($request->has('colortitulo')){
            $eventosapp->colortitulo = $request->colortitulo;
        }
       
        if($request->has('colortexto')){
            $eventosapp->colortexto = $request->colortexto;
        }
      
        $eventosapp->id_evento = $request->id_evento;
        $eventosapp->id_usuario = $request->id_usuario;
        $eventosapp->id_status = $request->id_status;



        $eventosapp->save();

        return $this->successResponse($eventosapp,200);
    }

   
    public function destroy(Request $request,Eventoapp $Eventoapp)
    {
        $eventosapp = Eventoapp::findOrFail($request->id);

        $eventosapp->delete();
        Storage::delete($eventosapp->vista);
        return $this->successResponse($eventosapp,200);
    }
}
