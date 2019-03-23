<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use  SoftDeletes;
    protected $table = 'paises';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'iso',
];
}
