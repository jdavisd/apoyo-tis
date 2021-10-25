<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function imageable(){
        return $this->morphTo();
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('imageable_type', $type);
    }
}
