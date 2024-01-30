<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwdUserAttribute extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'level_id',
        'directory_id',
        'attribute_name',
        'attribute_value',
        'lower_attribute_value',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'cwd_user_attributes';

    public function CwdUser()
    {
        $this->belongsTo(CwdUser::class, 'user_id', 'id');
//        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
