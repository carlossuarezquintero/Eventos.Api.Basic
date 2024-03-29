<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{

    private function successResponse($data,$code){
        return response()->json($data,$data);
    }

    private function errorResponse($data,$code){
        return response()->json(['error'=>$message,'code'=>$code],$code);
    }

    private function showAll(Collection $collection,$code =200){
        return $this->successResponse(['data' => $collection], $code);
    }

    private function showOne(Model $instance,$code =200){
        return $this->successResponse(['data'=>$collection],$code);
    }

}