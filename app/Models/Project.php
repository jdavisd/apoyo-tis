<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=['status'];
    public function projectEnterprises(){
        return $this->hasMany(ProjectEnterprise::class,'project_enterprises');
    }
}
