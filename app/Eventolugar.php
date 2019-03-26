<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Eventolugar extends Model
{
    use  SoftDeletes;

    protected $table = 'evento_lugar';
    protected $dates = ['deleted_at'];

    protected $fillable = [
            
            'id_user' ,
            'id_evento' ,
            'id_lugar',
            
];
}
