<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Mod::class,'mod_id');
    }

    public function addedIntoCarts(){
        return $this->belongsToMany(Cart::class);
    }

    public function orderMakers(){
        return $this->belongsToMany(User::class);
    }
}
