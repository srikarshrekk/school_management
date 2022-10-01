<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentFee;
use DB;
use PDF;

class RegistrationFeeController extends Controller
{
    public function RegFeeView(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        return view('backend.student.student_roll.view_roll_gen',$data);
        
    }
}
