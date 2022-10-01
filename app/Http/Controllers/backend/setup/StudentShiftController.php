<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewStudentShift(){
        $data['allData']=StudentShift::all();
        return view('backend.setup.student_shift.view_shift',$data);
    }
    public function AddStudentShift(){
        return view('backend.setup.student_shift.add_shift');
    }
    public function StoreStudentShift(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:student_shifts,name',
      
        ]);
        $data =new StudentShift();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'shift Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function EditStudentShift($id){
        $editData=StudentShift::find($id);
        // dd($editData);
        return view('backend.setup.student_shift.edit_shift',compact('editData'));


    }
    public function UpdateStudentShift(Request $request,$id){
        $data=StudentShift::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:student_shifts,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'shift Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.shift.view')->with($notification);

    }
    public function DeleteStudentShift($id){
        $data=StudentShift::destroy($id);
        $notification=array(
            'message'=>'shift Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }
}
