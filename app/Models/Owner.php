<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
