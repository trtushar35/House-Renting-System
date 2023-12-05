<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedProperty extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function house()
    {
        return $this->belongsTo(House::class, "house_id", "id");
    }

}
