<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Titulo extends Model
{
    use  SoftDeletes;
    protected $table = 'titulo';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
  ];
}
