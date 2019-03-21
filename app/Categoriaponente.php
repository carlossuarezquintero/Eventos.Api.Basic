<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categoriaponente extends Model
{
    use  SoftDeletes;

    protected $table = 'categoriaponentes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
