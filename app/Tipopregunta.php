<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipopregunta extends Model
{
    use  SoftDeletes;
    protected $table = 'tipospreguntas';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
