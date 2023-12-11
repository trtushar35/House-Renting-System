<?php

namespace App\Models;

use App\Models\House;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedProperty extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

}
