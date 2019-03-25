<?php

namespace App\Http\Controllers;

use App\Eventoboletacosto;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class EventoboletacostoController extends Controller
{
    public function index()
    {
        $eventoboletacosto = Eventoboletacosto::all();
        return $this->showAll($eventoboletacosto);
    }
    public function indexu(Request $request,Eventoboletacosto $Eventoboletacosto)
    {
        
        $eventoboletacosto = Eventoboletacosto::findOrFail($request->id);

        return $this->successResponse($eventoboletacosto,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
           
            'id_evento'=>'required|exists:eventos,id',
            'id_boleta'=>'required|exists:tiposboleta,id',
            'id_moneda'=>'required|exists:monedas,id',
            'id_user' =>'required|exists:usuarios,id',
            'costo'=>'required',
           
        ];
        $this->validate($request, $reglas);

        $eventoboletacosto = new Eventoboletacosto([
            

            'id_evento'=>$request->id_evento,
            'id_boleta'=>$request->id_boleta,
            'id_moneda'=>$request->id_moneda,
            'id_user' =>$request->id_user,
            'costo'=>$request->costo,
        ]);

        $eventoboletacosto->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Eventoboletacosto $Eventoboletacosto)
    {
        $eventoboletacosto = Eventoboletacosto::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_evento'=>'required|exists:eventos,id',
            'id_boleta'=>'required|exists:tiposboleta,id',
            'id_moneda'=>'required|exists:monedas,id',
            'id_user' =>'required|exists:usuarios,id',
            'costo'=>'required',
            
        ];
        $this->validate($request, $reglas);

        if($request->has('id_evento')){
            $eventoboletacosto->id_evento = $request->id_evento;
        }

        if($request->has('id_boleta')){
            $eventoboletacosto->id_boleta = $request->id_boleta;
        }

        if($request->has('id_moneda')){
            $eventoboletacosto->id_moneda = $request->id_moneda;
        }
       
        if($request->has('id_user')){
            $eventoboletacosto->id_user = $request->id_user;
        }
      
        $eventoboletacosto->costo = $request->costo;
       


        $eventoboletacosto->save();

        return $this->successResponse($eventoboletacosto,200);
    }

   
    public function destroy(Request $request,Eventoboletacosto $Eventoboletacosto)
    {
        $eventoboletacosto = Eventoboletacosto::findOrFail($request->id);

        $eventoboletacosto->delete();
        return $this->successResponse($eventoboletacosto,200);
    }
}
