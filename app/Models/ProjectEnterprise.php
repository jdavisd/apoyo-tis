<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEnterprise extends Model
{
    use HasFactory;
    protected $fillable=['users_id','project_id'];
    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}