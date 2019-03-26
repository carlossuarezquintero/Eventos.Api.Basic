<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Configuracion extends Model
{
    use  SoftDeletes;

    protected $table = 'configuracion';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'logo' ,
        'colorprincipal',
        'colorsegun' ,
        'titulo' ,
        'footer' ,
        'mensajebienv' ,
        'linksistema' ,
        'version' ,
        'telefono' ,
        'direccion' ,
        'email' ,
        'id_idioma' ,
        'online' ,
];
}
