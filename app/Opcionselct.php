<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opcionselct extends Model
{
    use  SoftDeletes;

    protected $table = 'opciones_select';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'id_pregunta_for',
      
];
}
