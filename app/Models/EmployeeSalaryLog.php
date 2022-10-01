<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class EmployeeSalaryLog extends Model
{
    use HasFactory;
    public function Designation(){
        return $this->belongsTo(User::class,'designation_id','id');
    }
}
