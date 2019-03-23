<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use  SoftDeletes;
    protected $table = 'ciudades';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_pais' ,
        'nombre',
];
}
