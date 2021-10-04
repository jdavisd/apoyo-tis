<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $guarded=['status'];

    public function projectEnterprises(){
        return $this->hasMany(ProjectEnterprise::class);
    }
}
