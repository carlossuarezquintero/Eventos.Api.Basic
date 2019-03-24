<?php

namespace App\Http\Controllers;

use App\Eventousuarioadmin;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class EventousuarioadminController extends Controller
{
    public function index()
    {
        $eventousuarioadmin = Eventousuarioadmin::all();
        return $this->showAll($eventousuarioadmin);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'id_user' =>'required|exists:usuarios,id|numeric',
            'id_evento' =>'required|exists:eventos,id|numeric',
           
            
           
        ];
        $this->validate($request, $reglas);

        $eventousuarioadmin = new Eventousuarioadmin([

            
            'id_user' =>$request->id_user,
            'id_evento'=>$request->id_evento,
            
        ]);

        $eventousuarioadmin->save();
        return $this->successResponse('Registro exitoso',401);
    }

    public function indexuser(Request $request,Eventousuarioadmin $Eventousuarioadmin)
    {
        // POR REVISAR
       // return $request->id;
      // $eventousuarioadmin = DB::table('eventosusuarioadmin')->select('*')->where('id_user', $request->id)->get();

        $eventousuarioadmin = Eventousuarioadmin::find('id_user',$request->id);

        return $this->successResponse($eventousuarioadmin,200);
    }
   

    public function update(Request $request,Eventousuarioadmin $Eventousuarioadmin)
    {
        $eventousuarioadmin = Eventousuarioadmin::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_user' =>'required',
            'id_evento'=>'required',
        ];
        $this->validate($request, $reglas);

        $eventousuarioadmin->id_user = $request->id_user;
        $eventousuarioadmin->id_evento = $request->id_evento;
        $eventousuarioadmin->save();

        return $this->successResponse($eventousuarioadmin,200);
    }

   
    public function destroy(Request $request,Eventousuarioadmin $Eventousuarioadmin)
    {
        $eventousuarioadmin = Eventousuarioadmin::findOrFail($request->id);

        $eventousuarioadmin->delete();
        return $this->successResponse($eventousuarioadmin,200);
    }
}
