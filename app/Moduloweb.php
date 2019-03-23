<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moduloweb extends Model
{

    use  SoftDeletes;
    protected $table = 'modulosweb';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre' ,
        'icono',
        'tipo' ,
        'url' ,
];

}
