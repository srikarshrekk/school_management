<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\StudentFee;

class FeeCategoryAmount extends Model
{
    use HasFactory;
    protected $table='fee_category_amounts';
    protected $fillable = [
        
        'amount',
        'student_class_id',
        'student_fee_id',

        
    ];
    public function Student_Fee(){
        return $this->belongsTo(StudentFee::class,'student_fee_id','id');
    }
    public function Class_Name(){
        return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }
}
