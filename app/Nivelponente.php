<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivelponente extends Model
{
    use  SoftDeletes;

    protected $table = 'nivelesponentes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
