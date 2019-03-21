<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    protected $table = 'entidades';
    use  SoftDeletes;
   

                    protected $fillable = [
                    'id',
                    'nit',
                    'nombre',
                    'representante',
                    'contacto',
                    'direccion',
                    'telefonoemp',
                    'facebook',
                    'twitter',
                    'instagram',
                    'google',
                    'logo',
                ];
}
