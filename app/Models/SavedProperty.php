<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedProperty extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function favorite()
    {
        return $this->belongsTo(House::class);
    }
}
