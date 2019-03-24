<?php

namespace App\Http\Controllers;

use App\Imagenevento;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageneventoController extends Controller
{
    public function index()
    {
        $imagenes = Imagenevento::all();
        return $this->showAll($imagenes);
    }

    public function indexu(Request $request,Imagenevento $Imagenevento)
    {
        
        $imagenes = Imagenevento::findOrFail($request->id);

        return $this->successResponse($imagenes,200);
    }
    
    public function create(Request $request)
    {
        $reglas = [
            'imagen' =>'required',
            'id_user'=>'required|exists:usuarios,id',
            'id_evento'=>'required|exists:eventos,id',
        ];
        $this->validate($request, $reglas);

        $imagenes = new Imagenevento([
            'nombre'    => $request->imagen->store(''),
            'id_user' => $request->id_user,
            'id_evento'=>$request->id_evento
        ]);

        $imagenes->save();
        return $this->successResponse('Registro exitoso',401);
    }

   

    public function update(Request $request, Imagenevento $Imagenevento)
    {
        $imagenes = Imagenevento::findOrFail($request->id);
        $reglas = [
            'id' =>'required',
            'imagen' =>'required',
            'id_user'=>'required|exists:usuarios,id',
            'id_evento'=>'required|exists:eventos,id',
        ];
        $this->validate($request, $reglas);


        if($request->hasfile('imagen')){
            Storage::delete($imagenes->nombre);
            $imagenes->nombre = $request->imagen->store('');
        }
       
        $imagenes->id_user = $request->id_user;
        $imagenes->id_evento = $request->id_evento;
        $imagenes->save();

        return $this->successResponse($imagenes,200);
    }

   
    public function destroy(Request $request,Imagenevento $Imagenevento)
    {
        $imagenes = Imagenevento::findOrFail($request->id);
        
        $imagenes->delete();
        Storage::delete($imagenes->nombre);
        return $this->successResponse($imagenes,200);
    }
}
