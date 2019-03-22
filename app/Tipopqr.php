<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tipopqr extends Model
{
    use  SoftDeletes;

    protected $table = 'tipospqr';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
