<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventousuarioadmin extends Model
{
    use  SoftDeletes;

    protected $table = 'eventosusuarioadmin';
    protected $dates = ['deleted_at'];

    protected $fillable = [
            
            'id_user' ,
            'id_evento' ,
            
];
}
