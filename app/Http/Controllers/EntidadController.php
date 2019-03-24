<?php

namespace App\Http\Controllers;

use App\Entidad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Storage;
use Illuminate\Support\Facades\DB;

class EntidadController extends Controller
{
    
    public function index()
    {
        $entidades = Entidad::all();
        return $this->showAll($entidades);
    }

  
    public function create(Request $request)
    {
        $reglas = [
          
            'nit' => 'required|numeric|unique:entidades,nit',
            'nombre'=> 'required',
            'representante'=> 'required|min:8',
            'contacto'=> 'required|digits_between:6,11',
            'direccion' => 'required|min:8',
            'telefonoemp'=> 'required|digits_between:4,10',
           
           
          //  'logo'=> 'required',
        ];
        $this->validate($request, $reglas);
       
  

        $entidad = new Entidad([
          
            'nit'=> $request->nit,
            'nombre'=> ucfirst(strtolower($request->nombre)),
            'representante'=> ucfirst(strtolower($request->representante)),
            'contacto'=> $request->contacto,
            'direccion' => $request->direccion,
            'telefonoemp'=> $request->telefonoemp,
            'facebook'=> $request->facebook,
            'twitter'=> $request->twitter,
            'instagram'=> $request->instagram,
            'google'=> $request->google,
            'logo'=>$request->logo->store(''),
           // 'logo'=> 'required',
        ]);

        $entidad->save();
        return $this->successResponse('Registro de entidad exitoso',401);
    }

    public function indexu(Request $request,Entidad $entidad)
    {
        
        $entidad = Entidad::findOrFail($request->id);

        return $this->successResponse($entidad,200);
    }

    public function update(Request $request, Entidad $entidad)
    {
        $entidad = Entidad::findOrFail($request->id);
        $reglas = [
          
            'nombre'=> 'min:4',
            'representante'=> 'min:4',
            'contacto'=> 'digits_between:6,11',
            'direccion' => 'min:8',
            'telefonoemp'=> 'digits_between:4,10',
        ];

        if($request->has('nombre')){
            $entidad->nombre = $request->nombre;
        }
        if($request->has('representante')){
            $entidad->representante = $request->representante;
        }
        if($request->has('contacto')){
            $entidad->contacto = $request->contacto;
        }
        if($request->has('direccion')){
            $entidad->direccion = $request->direccion;
        }
        if($request->has('telefonoemp')){
            $entidad->telefonoemp = $request->telefonoemp;
        }

        if($request->hasfile('logo')){
            Storage::delete($entidad->logo);
            $entidad->logo = $request->logo->store('');
        }
 
        $entidad->save();
        return $this->successResponse($entidad,200);


    }

    public function destroy(Request $request)
    {
        $entidad = Entidad::findOrFail($request->id);
        Storage::delete($entidad->logo);
        $entidad->delete();
        return $this->successResponse($entidad,200);
    }
}
