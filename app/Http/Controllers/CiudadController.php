<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::all();
        return $this->showAll($ciudades);
    }

   
    public function create(Request $request)
    {
        $reglas = [

            'nombre' =>'required|unique:ciudades,nombre',
            'id_pais' =>'required|exists:paises,id|numeric',
           
            
           
        ];
        $this->validate($request, $reglas);

        $ciudades = new Ciudad([

            'nombre' =>ucfirst(strtolower($request->nombre)),
            'id_pais' =>$request->id_pais,
           
        ]);

        $ciudades->save();
        return $this->successResponse('Registro exitoso',401);
    }


    public function update(Request $request,Ciudad $Ciudad)
    {
        $Ciudad = Ciudad::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'min:3',
            'id_pais'=>'required|exists:paises,id|numeric',
        ];
        $this->validate($request, $reglas);

        $Ciudad->nombre = $request->nombre;
        $Ciudad->save();

        return $this->successResponse($Ciudad,200);
    }

   
    public function destroy(Request $request,Ciudad $Ciudad)
    {
        $ciudades = Ciudad::findOrFail($request->id);

        $ciudades->delete();
        return $this->successResponse($ciudades,200);
    }
}
