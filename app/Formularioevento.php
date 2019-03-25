<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formularioevento extends Model
{
    use  SoftDeletes;

    protected $table = 'formulario_evento';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'id_evento'
];
}
