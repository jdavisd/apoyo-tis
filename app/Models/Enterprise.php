<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
protected $fillable=['short_name','long_name','address','phone','email','type','logo','project_id','adviser_id','period'];
   //s protected $guarded=['status'];

    public function projectEnterprises1(){
        return $this->hasMany(ProjectEnterprise::class);
       // return $this->belongsToMany(Project::class,'project_enterprises','enterprise_id','project_id');  
    }
    public function enterpriseUser(){
        return $this->hasMany(User::class);
    }
    
}