<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function brand(){
        return $this->hasOne(Brand::class,'name','brand');
    }

    public function user(){
        return $this->belongsTo(GeneralUser::class,'user_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'name','category');
    }

    public function addedIntoCarts(){
        return $this->belongsToMany(Cart::class);
    }

    public function orderMakers(){
        return $this->belongsToMany(GeneralUser::class);
    }

}
