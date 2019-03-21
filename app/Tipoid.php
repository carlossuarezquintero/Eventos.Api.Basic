<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipoid extends Model
{
    use  SoftDeletes;

    protected $table = 'tiposid';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
    //
}
