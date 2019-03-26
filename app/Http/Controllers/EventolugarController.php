<?php

namespace App\Http\Controllers;

use App\Eventolugar;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class EventolugarController extends Controller
{
    public function index()
    {
        $eventolugar = Eventolugar::all();
        return $this->showAll($eventolugar);
    }

    public function indexu(Request $request,Eventolugar $Eventolugar)
    {
        
        $eventolugar = Eventolugar::findOrFail($request->id);

        return $this->successResponse($eventolugar,200);
    }
    public function create(Request $request)
    {
        $reglas = [

            'id_user' =>'required|exists:usuarios,id|numeric',
            'id_evento' =>'required|exists:eventos,id|numeric',
            'id_lugar' =>'required|exists:lugares,id|numeric',
           
            
           
        ];
        $this->validate($request, $reglas);

        $eventolugar = new Eventolugar([

            
            'id_user' =>$request->id_user,
            'id_evento'=>$request->id_evento,
            'id_lugar'=>$request->id_lugar,
            
        ]);

        $eventolugar->save();
        return $this->successResponse('Registro exitoso',401);
    }

    public function indexuser(Request $request,Eventolugar $Eventolugar)
    {
        // POR REVISAR
       // return $request->id;
      // $eventolugar = DB::table('eventosusuarioadmin')->select('*')->where('id_user', $request->id)->get();

        $eventolugar = Eventolugar::find('id_user',$request->id);

        return $this->successResponse($eventolugar,200);
    }
   

    public function update(Request $request,Eventolugar $Eventolugar)
    {
        $eventolugar = Eventolugar::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_user' =>'required|exists:usuarios,id|numeric',
            'id_evento' =>'required|exists:eventos,id|numeric',
            'id_lugar' =>'required|exists:lugares,id|numeric',
        ];
        $this->validate($request, $reglas);

        $eventolugar->id_user = $request->id_user;
        $eventolugar->id_evento = $request->id_evento;
        $eventolugar->id_lugar = $request->id_lugar;
        $eventolugar->save();

        return $this->successResponse($eventolugar,200);
    }

   
    public function destroy(Request $request,Eventolugar $Eventolugar)
    {
        $eventolugar = Eventolugar::findOrFail($request->id);

        $eventolugar->delete();
        return $this->successResponse($eventolugar,200);
    }
}
