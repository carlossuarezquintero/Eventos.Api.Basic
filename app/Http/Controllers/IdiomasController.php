<?php

namespace App\Http\Controllers;

use App\Idiomas;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class IdiomasController extends Controller
{
    public function index()
    {
        $idiomas = Idiomas::all();
        return $this->showAll($idiomas);
    }
    public function indexu(Request $request,Idiomas $Idiomas)
    {
        
        $idiomas = Idiomas::findOrFail($request->id);

        return $this->successResponse($idiomas,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:idiomas,nombre',
            'alias' =>'required|unique:idiomas,alias'
        ];
        $this->validate($request, $reglas);

        $idiomas = new Idiomas([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'alias'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $idiomas->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Idiomas $Idiomas)
    {
        $idiomas = Idiomas::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required',
            'alias' =>'required'
        ];
        $this->validate($request, $reglas);

        $idiomas->nombre = $request->nombre;
        $idiomas->alias = $request->alias;
        $idiomas->save();

        return $this->successResponse($idiomas,200);
    }

   
    public function destroy(Request $request,Idiomas $Idiomas)
    {
        $idiomas = Idiomas::findOrFail($request->id);

        $idiomas->delete();
        return $this->successResponse($idiomas,200);
    }
}
