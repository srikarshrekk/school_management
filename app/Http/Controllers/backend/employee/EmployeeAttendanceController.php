<?php

namespace App\Http\Controllers\backend\employee;
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
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeLeave;
use App\Models\Designation;
use App\Models\LeavePurpose;
use DB;
use PDF;
class EmployeeAttendanceController extends Controller
{
    public function AttendanceView(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
    	// $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }
}
