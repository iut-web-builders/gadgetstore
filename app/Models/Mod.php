<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mod extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    protected $guard = 'mod';

    protected $fillable = [
        'name','email','password',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function products(){
        return $this->hasMany(MainProduct::class);
    }

    public function profile(){
        return $this->hasOne(ModProfile::class);
    }


    public function approval(){
        return $this->hasOne(Approve::class);
    }

}
