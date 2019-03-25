<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipoboleta extends Model
{
    use  SoftDeletes;

    protected $table = 'tiposboleta';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'id_user'
];
}
