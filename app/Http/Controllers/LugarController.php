<?php

namespace App\Http\Controllers;

use App\Lugar;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LugarController extends Controller
{
    public function index()
    {
        $lugares = Lugar::all();
        return $this->showAll($lugares);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:Lugares,nombre',
            'id_usuario'    => 'required|numeric|exists:usuarios,id',
            'id_ciudad'    => 'required|numeric|exists:ciudades,id',
            'latitud'=>'required',
            'longitud'=>'required',
        ];
        $this->validate($request, $reglas);

        $lugares = new Lugar([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'id_usuario'=>$request->id_usuario,
            'id_ciudad'=>$request->id_ciudad,
            'latitud'=>$request->latitud,
            'longitud'=>$request->logitud,
        ]);

        $lugares->save();
        return $this->successResponse('Registro exitoso',401);
    }

    public function indexu(Request $request,Lugar $Lugar)
    {
        
        $lugares = Lugar::findOrFail($request->id);

        return $this->successResponse($lugares,200);
    }

    public function update(Request $request, Lugar $Lugar)
    {
        $lugares = Lugar::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required|min:4',
            'id_usuario'    => 'required|numeric|exists:usuarios,id',
            'id_ciudad'    => 'required|numeric|exists:ciudades,id',
            'latitud'=>'required',
            'longitud'=>'required',
        ];
        $this->validate($request, $reglas);

        $lugares->nombre = $request->nombre;
        $lugares->id_usuario =$request->id_usuario;
        $lugares->id_ciudad =$request->id_ciudad;
        $lugares->latitud =$request->latitud;
        $lugares->longitud =$request->longitud;
        
        $lugares->save();

        return $this->successResponse($lugares,200);
    }

   
    public function destroy(Request $request,Lugar $Lugar)
    {
        $lugares = Lugar::findOrFail($request->id);
        $lugares->delete();
        return $this->successResponse($lugares,200);
    }
}
