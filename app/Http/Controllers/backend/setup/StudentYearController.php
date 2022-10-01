<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\StudentYear;
class StudentYearController extends Controller
{
    public function ViewStudentYear(){
        $data['allData']=StudentYear::all();
        return view('backend.setup.student_year.view_year',$data);

    }
    public function AddStudentYear(){
        return view('backend.setup.student_year.add_year');
    }
    public function StoreStudentYear(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:student_years,name',
      
        ]);
        $data =new StudentYear();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Year Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.year.view')->with($notification);

    }
    public function EditStudentYear($id){
        $editData=StudentYear::find($id);
        // dd($editData);
        return view('backend.setup.student_year.edit_year',compact('editData'));


    }
    public function UpdateStudentYear(Request $request,$id){
        $data=StudentYear::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:student_years,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Year Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.year.view')->with($notification);

    }
    public function DeleteStudentYear($id){
        $data=StudentYear::destroy($id);
        $notification=array(
            'message'=>'Year Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.year.view')->with($notification);

    }

}

    

