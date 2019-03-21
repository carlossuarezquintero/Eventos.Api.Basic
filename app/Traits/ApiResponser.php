<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{


  
    Public function successResponse($data,$code){
        
        return response()->json($data,$code);
    }

    Public function errorResponse($data,$code){
        return response()->json(['error'=>$data,'code'=>$code],$code);
    }

    Public  function showAll(Collection $collection,$code = 200){
        return $this->successResponse(['data' => $collection], $code);
    }

    private function showOne(Model $instance,$code =200){
        return $this->successResponse(['data'=>$collection],$code);
    }

}