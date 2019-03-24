<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventousuarioinscripcion extends Model
{
    use  SoftDeletes;

    protected $table = 'eventosusuarioinscripcion';
    protected $dates = ['deleted_at'];

    protected $fillable = [
            
            'id_user' ,
            'id_evento' ,
            'id_status',
            'uingresoapp', // ultima fecha
            'uipapp', // ultima ip
            
];
}
