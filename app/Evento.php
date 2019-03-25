<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use  SoftDeletes;

    protected $table = 'eventos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
            
            'nombre' ,
            'codigo' ,
            'slogan' ,
            'descripcion',
            'fecha',
            'hora',
            'id_categoria',
            'contacton',
            'contactot',
            'id_lugar',
            'costopromedio',
            'countasis',
            'count',
            'shares',
            'id_entidad',
            'id_user',
            'id_ciudad',
            'id_pais',
            'venta',
];
}
