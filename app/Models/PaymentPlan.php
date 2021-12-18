<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;
    protected $fillable=['dueDate','percentage','amount','description','project_enterprise_id'];
    public function paymentPlan(){
        return $this->belongsTo(ProjectEnterprise::class);
    }
}
