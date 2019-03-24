<?php

namespace App\Http\Controllers;

use App\Tipotelefono;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TipotelefonoController extends Controller
{
    
    public function index()
    {
        $listatipo = Tipotelefono::all();
        return $this->showAll($listatipo);
    }

    public function indexu(Request $request,Tipotelefono $tipotelefono)
    {
        
        $tipotelefono = Tipotelefono::findOrFail($request->id);

        return $this->successResponse($tipotelefono,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:tipostelefonos,nombre'
        ];
        $this->validate($request, $reglas);

        $tipotelefono = new Tipotelefono([
            'nombre'    => ucfirst(strtolower($request->nombre)),
        ]);

        $tipotelefono->save();
        return $this->successResponse('Registro exitoso',401);
    }

   
    

   
    public function update(Request $request, Tipotelefono $tipotelefono)
    {
        $tipotel = Tipotelefono::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $tipotel->nombre = $request->nombre;
        $tipotel->save();

        return $this->successResponse($tipotel,200);
    }

  
    public function destroy(Request $request,Tipotelefono $tipotelefono)
    {
        $tipotel = Tipotelefono::findOrFail($request->id);

        $tipotel->delete();
        return $this->successResponse($tipotel,200);
    }
}
