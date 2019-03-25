<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Disenoevento extends Model
{
    use  SoftDeletes;
    protected $table = 'disenoevento';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre' ,
        'vista',
        'id_evento',
];
}
