<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areaponente extends Model
{
    use  SoftDeletes;

    protected $table = 'areasponentes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
