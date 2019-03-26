<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pqr extends Model
{
  

protected $table = 'pqrs';
protected $dates = ['deleted_at'];

protected $fillable = [
  'nombres',
  'apellidos',
  'id_user',
  'email',
  'id_evento',
  'id_status',
  'id_tipopqrs',
  'descripcion',
  'fecha',
];
}
