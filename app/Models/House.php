<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function fav()
    {
        return $this->belongsTo(House::class,'user_id');
    }

    // public function 
}

