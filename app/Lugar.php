<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lugar extends Model
{
    use  SoftDeletes;
    protected $table = 'lugares';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'id_user',
      'latitud',
      'logitud',
      'id_ciudad',
];
}
