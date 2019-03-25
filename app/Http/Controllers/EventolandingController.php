<?php

namespace App\Http\Controllers;

use App\Eventolanding;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventolandingController extends Controller
{
    public function index()
    {
        $eventoslanding = Eventolanding::all();
        return $this->showAll($eventoslanding);
    }
    public function indexu(Request $request,Eventolanding $Eventolanding)
    {
        
        $eventoslanding = Eventolanding::findOrFail($request->id);

        return $this->successResponse($eventoslanding,200);
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

        $eventoslanding = new Eventolanding([
            

            'colorprincipal' =>$request->colorprincipal,
            'colordos' =>$request->colordos,
            'colortitulo' =>$request->colortitulo,
            'colorsubtitulos'=>$request->colorsubtitulos,
            'colortexto'=>$request->colortexto,
            'id_evento'=>$request->id_evento,
            'id_status'=>$request->id_status,
            'id_usuario'=>$request->id_usuario,
        ]);

        $eventoslanding->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Eventolanding $Eventolanding)
    {
        $eventoslanding = Eventolanding::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_evento'=>'required|exists:eventos,id',
            'id_status' =>'required|exists:status,id',
            'id_usuario' =>'required|exists:usuarios,id',
            
        ];
        $this->validate($request, $reglas);

        if($request->has('colorprincipal')){
            $eventoslanding->colorprincipal = $request->colorprincipal;
        }

        if($request->has('colortexto')){
            $eventoslanding->colortexto = $request->colortexto;
        }

        if($request->has('colortitulo')){
            $eventoslanding->colortitulo = $request->colortitulo;
        }
       
        if($request->has('colortexto')){
            $eventoslanding->colortexto = $request->colortexto;
        }
      
        $eventoslanding->id_evento = $request->id_evento;
        $eventoslanding->id_usuario = $request->id_usuario;
        $eventoslanding->id_status = $request->id_status;



        $eventoslanding->save();

        return $this->successResponse($eventoslanding,200);
    }

   
    public function destroy(Request $request,Eventolanding $Eventolanding)
    {
        $eventoslanding = Eventolanding::findOrFail($request->id);

        $eventoslanding->delete();
        Storage::delete($eventoslanding->vista);
        return $this->successResponse($eventoslanding,200);
    }
}
