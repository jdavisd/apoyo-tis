<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEnterprise extends Model
{
    use HasFactory;

    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }

    public function advisor(){
        return $this->belongsTo(Advisor::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
