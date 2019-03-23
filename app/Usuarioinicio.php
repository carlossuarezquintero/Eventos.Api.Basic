<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Usuarioinicio extends Model
{
    use  SoftDeletes;

    protected $table = 'usuariosinicios';
    protected $dates = ['deleted_at'];

    protected $fillable = [
            'ip' ,
            'pais' ,
            'fecha',
            'id_usuario',
];


}
