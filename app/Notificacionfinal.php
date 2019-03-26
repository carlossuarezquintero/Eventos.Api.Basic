<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacionfinal extends Model
{
    use  SoftDeletes;

    protected $table = 'notificacion_final';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id_evento',
      'texto',
];
}
