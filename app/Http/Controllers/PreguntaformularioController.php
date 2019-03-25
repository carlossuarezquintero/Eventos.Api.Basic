<?php

namespace App\Http\Controllers;

use App\Preguntaformulario;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreguntaformularioController extends Controller
{
    public function index()
    {
        $preguntaformularios = Preguntaformulario::all();
        return $this->showAll($preguntaformularios);
    }

    public function indexu(Request $request,Preguntaformulario $Preguntaformulario)
    {
        
        $preguntaformularios = Preguntaformulario::findOrFail($request->id);

        return $this->successResponse($preguntaformularios,200);
    }
    public function create(Request $request)
    {
        $reglas = [
            'pregunta' =>'required',
            'id_user'=>'required|exists:usuarios,id',
            'id_tipop'=>'required|exists:tipospreguntas,id',
            'id_formulario'=>'required|exists:formulario_evento,id',
        ];
        $this->validate($request, $reglas);

        $preguntaformularios = new Preguntaformulario([
            'pregunta'    => ucfirst(strtoupper($request->nombre)),
            'id_formulario'=>$request->id_formulario,
            'id_tipop'=>$request->id_tipop,
            'id_user'=>$request->id_user,
        ]);

        $preguntaformularios->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Preguntaformulario $Preguntaformulario)
    {
        $preguntaformularios = Preguntaformulario::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'pregunta' =>'required',
            'id_user'=>'required|exists:usuarios,id',
            'id_tipop'=>'required|exists:tipospreguntas,id',
            'id_formulario'=>'required|exists:formulario_evento,id',
        ];
        $this->validate($request, $reglas);

        $preguntaformularios->pregunta = $request->pregunta;
        $preguntaformularios->id_user = $request->id_user;
        $preguntaformularios->id_tipop = $request->id_tipop;
        $preguntaformularios->id_formulario = $request->id_formulario;
        $preguntaformularios->save();

        return $this->successResponse($preguntaformularios,200);
    }

   
    public function destroy(Request $request,Preguntaformulario $Preguntaformulario)
    {
        $preguntaformularios = Preguntaformulario::findOrFail($request->id);

        $preguntaformularios->delete();
        return $this->successResponse($preguntaformularios,200);
    }
}
