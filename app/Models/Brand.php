<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey='name';
    public $incrementing = false;
    protected $keyType='string';

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
