<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
   
    public function index()
    {
        $roles = Rol::all();
        return $this->showAll($roles);
    }

    public function indexu(Request $request,Rol $rol)
    {
        
        $roles = Rol::findOrFail($request->id);

        return $this->successResponse($roles,200);
    }
    
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:titulos,nombre'
        ];
        $this->validate($request, $reglas);

        $roles = new Rol([
            'nombre'    => ucfirst(strtolower($request->nombre)),
        ]);

        $roles->save();
        return $this->successResponse('Registro exitoso',401);
    }

  
   
    public function update(Request $request, Rol $rol)
    {
        $roles = Rol::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $roles->nombre = $request->nombre;
        $roles->save();

        return $this->successResponse($roles,200);
    }

   
    public function destroy(Request $request,Rol $rol)
    {
        $roles = Rol::findOrFail($request->id);

        $roles->delete();
        return $this->successResponse($roles,200);
    }
}
