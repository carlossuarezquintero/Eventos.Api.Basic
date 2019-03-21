<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipotelefono extends Model

{

    use  SoftDeletes;
    protected $table = 'tipostelefonos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
  ];
    //
}
