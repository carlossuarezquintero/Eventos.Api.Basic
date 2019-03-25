<?php

namespace App\Http\Controllers;

use App\Formularioevento;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FormularioeventoController extends Controller
{
    public function index()
    {
        $formularioseventos = Formularioevento::all();
        return $this->showAll($formularioseventos);
    }

    public function indexu(Request $request,Formularioevento $Formularioevento)
    {
        
        $formularioseventos = Formularioevento::findOrFail($request->id);

        return $this->successResponse($formularioseventos,200);
    }
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:formulario_evento,nombre',
            'id_evento'=>'required|exists:eventos,id',
        ];
        $this->validate($request, $reglas);

        $formularioseventos = new Formularioevento([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'id_evento'=>$request->id_evento,
        ]);

        $formularioseventos->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Formularioevento $Formularioevento)
    {
        $formularioseventos = Formularioevento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required',
            'id_evento'=>'required',
        ];
        $this->validate($request, $reglas);

        $formularioseventos->nombre = $request->nombre;
        $formularioseventos->id_evento = $request->id_evento;
        $formularioseventos->save();

        return $this->successResponse($formularioseventos,200);
    }

   
    public function destroy(Request $request,Formularioevento $Formularioevento)
    {
        $formularioseventos = Formularioevento::findOrFail($request->id);

        $formularioseventos->delete();
        return $this->successResponse($formularioseventos,200);
    }
}
