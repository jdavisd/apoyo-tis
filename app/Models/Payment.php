<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['details','project_enterprise_id','status'];
    use HasFactory;
    public function payment(){
        return $this->belongsTo(ProjectEnterprise::class);
    }
}
