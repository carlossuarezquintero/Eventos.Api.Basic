<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable , SoftDeletes;

    protected $table = 'usuarios';
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'id_titulo',
            'nombres',
            'apellidos',
            'identificacion',
            'id_entidad',
            'id_rol',
            'id_tipotel',
            'telefono',
            'email',
            'tipo_identificacion',
            'password',
            'ultimoinicio'   ,
            'ultimaip'   ,
            'unavegador'   ,
            'isline'    ,
            'active',
            'activation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];
}
