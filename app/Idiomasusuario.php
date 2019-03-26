<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Idiomasusuario extends Model
{
    use  SoftDeletes;

    protected $table = 'idiomas_traductor';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id_traductor',
      'id_idioma',
];
}
