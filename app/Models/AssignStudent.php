<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use App\Models\DiscountStudent;
class AssignStudent extends Model
{
    use HasFactory;


    public function Data_Student(){
        return $this->belongsTo(User::class,'assign_student_id','id');
    }
    public function Class_Student(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function Year_Student(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function Shift_Student(){
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
    public function Group_Student(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }
    public function Discount_Student(){
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
}
