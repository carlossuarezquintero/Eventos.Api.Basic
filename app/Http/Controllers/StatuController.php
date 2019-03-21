<?php

namespace App\Http\Controllers;

use App\Statu;
use Illuminate\Http\Request;

class StatuController extends Controller
{
    
    public function index()
    {
        $estados = Statu::all();
        return $this->showAll($estados);
    }

    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:status,nombre'
        ];
        $this->validate($request, $reglas);

        $estados = new Statu([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $estados->save();
        return $this->successResponse('Registro exitoso',401);
    }

  
  
    public function update(Request $request, Statu $statu)
    {
        $estados = Statu::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $estados->nombre = $request->nombre;
        $estados->save();

        return $this->successResponse($estados,200);
    }

    public function destroy(Request $request,Statu $statu)
    {
        $estados = Statu::findOrFail($request->id);

        $estados->delete();
        return $this->successResponse($estados,200);
    }
}
