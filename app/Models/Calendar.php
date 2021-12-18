<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $guarded=['status'];
    public function calendar(){
        return $this->belongsTo(ProjectEnterprise::class);
    }
}
