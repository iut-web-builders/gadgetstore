<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModProfile extends Model
{
    use HasFactory;

    public function mod(){
        return $this->belongsTo(Mod::class);
    }
}
