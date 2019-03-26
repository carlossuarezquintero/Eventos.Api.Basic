<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Traductor extends Model
{
    use  SoftDeletes,Notifiable;
    protected $table = 'traductores';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombres',
      'apellidos',
      'identificacion',
      'email',
      'pin',
];
}
