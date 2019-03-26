<?php

namespace App\Http\Controllers;

use App\Notificacionfinal;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificacionfinalController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacionfinal::all();
        return $this->showAll($notificaciones);
    }
    public function indexu(Request $request,Notificacionfinal $Notificacionfinal)
    {
        
        $notificaciones = Notificacionfinal::findOrFail($request->id);

        return $this->successResponse($notificaciones,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'id_evento' =>'required|exists:eventos,id',
            'texto' =>'required'
        ];
        $this->validate($request, $reglas);

        $notificaciones = new Notificacionfinal([
            'id_evento'    => $request->id_evento,
            'texto'    => $request->texto,
        ]);

        $notificaciones->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Notificacionfinal $Notificacionfinal)
    {
        $notificaciones = Notificacionfinal::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'id_evento' =>'required|exists:eventos,id',
            'texto' =>'required'
        ];
        $this->validate($request, $reglas);

        $notificaciones->id_evento = $request->id_evento;
        $notificaciones->texto = $request->texto;
        $notificaciones->save();

        return $this->successResponse($notificaciones,200);
    }

   
    public function destroy(Request $request,Notificacionfinal $Notificacionfinal)
    {
        $notificaciones = Notificacionfinal::findOrFail($request->id);

        $notificaciones->delete();
        return $this->successResponse($notificaciones,200);
    }
}
