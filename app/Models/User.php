<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function products(){
        return $this->hasMany(Product::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class,'id');
    }

    public function cart(){
        return $this->hasOne(Cart::class,'id','id');
    }

    public function mainCart(){
         return $this->hasOne(MainCart::class,'id','id');
    }


    public function orders(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function mainOrders(){
        return $this->belongsToMany(MainProduct::class)->withPivot('quantity');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($user){
            $user->profile()->delete();
            $user->products()->delete();
            $user->orders()->delete();
            $user->mainOrders()->delete();
            $user->cart()->delete();
            $user->mainCart()->delete();
        });
    }



}
