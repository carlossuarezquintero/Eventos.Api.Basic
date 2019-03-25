<?php

namespace App\Http\Controllers;

use App\Disenoevento;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisenoeventoController extends Controller
{ 
    
    public function index()
    {
        $disenos = Disenoevento::all();
        return $this->showAll($disenos);
    }
    public function indexu(Request $request,Disenoevento $Disenoevento)
    {
        
        $disenos = Disenoevento::findOrFail($request->id);

        return $this->successResponse($disenos,200);
    }
   
    public function create(Request $request)
    {
        $reglas = [
            'nombre' =>'required|unique:disenoevento,nombre',
            'vista' =>'required',
            'id_evento'=>'required|exists:eventos,id',

        ];
        $this->validate($request, $reglas);

        $disenos = new Disenoevento([
            'nombre'    => ucfirst(strtoupper($request->nombre)),
            'vista'=>$request->vista->store(''),
            'id_evento'=>$request->id_evento,
        ]);

        $disenos->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Disenoevento $Disenoevento)
    {
        $disenos = Disenoevento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'nombre' =>'min:8',
            'vista' =>'required',
            'id_evento'=>'required|exists:eventos,id',
            
        ];
        $this->validate($request, $reglas);

        $disenos->nombre = $request->nombre;
        if($request->hasfile('vista')){
            Storage::delete($disenos->vista);
            $disenos->vista = $request->vista->store('');
        }
        $disenos->id_evento = $request->id_evento;
        $disenos->save();

        return $this->successResponse($disenos,200);
    }

   
    public function destroy(Request $request,Disenoevento $Disenoevento)
    {
        $disenos = Disenoevento::findOrFail($request->id);

        $disenos->delete();
        Storage::delete($disenos->vista);
        return $this->successResponse($disenos,200);
    }
}
