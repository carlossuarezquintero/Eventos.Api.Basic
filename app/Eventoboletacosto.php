<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Eventoboletacosto extends Model
{
    
    use  SoftDeletes;

    protected $table = 'evento_boleta_costo';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id_evento',
      'id_user',
      'id_boleta',
      'id_moneda',
      'costo',
];
}
