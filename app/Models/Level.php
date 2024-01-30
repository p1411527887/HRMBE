<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;
    protected $table = 'levels';

    protected $fillable = [
        'name',
        'rate',
    ];
}
