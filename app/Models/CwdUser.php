<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;

class CwdUser extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'cwd_user';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'directory_id',
        'user_name',
        'password',
        'lower_user_name',
        'active',
        'created_date',
        'first_name',
        'lower_first_name',
        'last_name',
        'lower_last_name',
        'display_name',
        'lower_display_name',
        'email_address',
        'lower_email_address',
        'credential',
        'deleted_externally',
        'external_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

//    public function CwdUserAttributes(){
//        return $this->hasOne(CwdUserAttributes::class, 'id', 'user_id');
//    }
}
