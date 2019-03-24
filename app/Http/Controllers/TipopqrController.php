<?php

namespace App\Http\Controllers;

use App\Tipopqr;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
class TipopqrController extends Controller
{
    public function index()
    {
        $tipopqr = Tipopqr::all();
        return $this->showAll($tipopqr);
    }
    public function indexu(Request $request,Tipopqr $Tipopqr)
    {
        
        $tipopqr = Tipopqr::findOrFail($request->id);

        return $this->successResponse($tipopqr,200);
    }
    public function create(Request $request)
    {
       
        $reglas = [
            'nombre' =>'required|unique:tiposid,nombre'
        ];
        $this->validate($request, $reglas);

        $tipopqr = new Tipopqr([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
        ]);

        $tipopqr->save();
        return $this->successResponse('Registro exitoso',401);
        
    }

  
    public function update(Request $request,Tipopqr $Tipopqr)
    {
        $tipopqr = Tipopqr::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'required'
        ];
        $this->validate($request, $reglas);

        $tipopqr->nombre = $request->nombre;
        $tipopqr->save();

        return $this->successResponse($tipopqr,200);
    }

    public function destroy(Request $request)
    {
        $tipopqr = Tipopqr::findOrFail($request->id);

        $tipopqr->delete();
        return $this->successResponse($tipopqr,200);
    }
}
