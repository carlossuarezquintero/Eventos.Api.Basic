<?php

namespace App\Http\Controllers;

use App\Opcionselct;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpcionselctController extends Controller
{
    public function index()
    {
        $opciones = Opcionselct::all();
        return $this->showAll($opciones);
    }
    public function indexu(Request $request,Opcionselct $Opcionselct)
    {
        
        $opciones = Opcionselct::findOrFail($request->id);

        return $this->successResponse($opciones,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:opciones_select,nombre',
            'id_pregunta_for'=>'required|exists:preguntas_formulario,id',
        ];
        $this->validate($request, $reglas);

        $opciones = new Opcionselct([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'id_pregunta_for'=>$request->id_pregunta_for,
        ]);

        $opciones->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Opcionselct $Opcionselct)
    {
        $opciones = Opcionselct::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required',
            'id_pregunta_for'=>'required|exists:preguntas_formulario,id',
        ];
        $this->validate($request, $reglas);

        $opciones->nombre = $request->nombre;
        $opciones->id_pregunta_for = $request->id_pregunta_for;
        $opciones->save();

        return $this->successResponse($opciones,200);
    }

   
    public function destroy(Request $request,Opcionselct $Opcionselct)
    {
        $opciones = Opcionselct::findOrFail($request->id);

        $opciones->delete();
        return $this->successResponse($opciones,200);
    }
}
