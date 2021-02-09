<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey='name';
    public $incrementing = false;
    protected $keyType='string';

    protected $fillable=['name'];
    public function products(){
        return $this->belongsToMany(Product::class,'product_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
