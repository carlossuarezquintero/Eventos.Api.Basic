<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Imagenevento extends Model
{
    use  SoftDeletes;

    protected $table = 'imagenes_eventos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
      'id_user',
    'id_evento',
];
}
