<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Eventoapp extends Model
{
    use  SoftDeletes;
    protected $table = 'evento_app';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_evento',
        'colorprincipal',
        'colordos',	
        'colortitulo',	
        'colorsubtitulos',
        'colortexto',
        'id_status',
        'id_usuario',

];
}
