<?php

namespace App\Http\Controllers;

use App\Moneda;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonedaController extends Controller
{
    public function index()
    {
        $monedas = Moneda::all();
        return $this->showAll($monedas);
    }

   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:monedas,nombre'
        ];
        $this->validate($request, $reglas);

        $monedas = new Moneda([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $monedas->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Moneda $Moneda)
    {
        $monedas = Moneda::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $monedas->nombre = $request->nombre;
        $monedas->save();

        return $this->successResponse($monedas,200);
    }

   
    public function destroy(Request $request,Moneda $Moneda)
    {
        $monedas = Moneda::findOrFail($request->id);

        $monedas->delete();
        return $this->successResponse($monedas,200);
    }
}
