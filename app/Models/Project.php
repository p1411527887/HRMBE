<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $table = 'project';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'pname',
        'URL',
        'LEAD',
        'DESCRIPTION',
        'pkey',
        'pcounter',
        'ASSIGNEETYPE',
        'AVATAR',
        'ORIGINALKEY',
        'PROJECTTYPE',
    ];
}
