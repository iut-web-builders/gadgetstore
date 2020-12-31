<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCart extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'id','id');
    }

    public function mainProducts(){
        return $this->hasMany(MainProduct::class);
    }

}
