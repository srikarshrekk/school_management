<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\StudentClass;
use App\Models\SubjectType;
class AssignSubject extends Model
{
    use HasFactory;
    protected $table='assign_subjects';
    protected $fillable = [
        'student_class_id',
        'student_types_id',
        'full_mark',
        'pass_mark',
        'subjective_mark',
        

     
    ];
    public function StudentClass(){
        return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }
    public function StudentSubject(){
        return $this->belongsTo(SubjectType::class,'subject_types_id','id');
    }
}

