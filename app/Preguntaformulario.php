<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preguntaformulario extends Model
{
    use  SoftDeletes;

    protected $table = 'preguntas_formulario';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'pregunta',
      'id_user',
      'id_formulario',
      'id_tipop',
];
}
