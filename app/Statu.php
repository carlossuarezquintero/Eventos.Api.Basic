<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statu extends Model
{
    use  SoftDeletes;

    protected $table = 'status';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'nombre',
];
}
