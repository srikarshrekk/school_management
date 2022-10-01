<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudentClass(){
        $data['allData']=StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
    public function AddStudentClass(){
        return view('backend.setup.student_class.add_class');
    }
    public function StoreStudentClass(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:student_classes,name',
      
        ]);
        $data =new StudentClass();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Class Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function EditStudentClass($id){
        $editData=StudentClass::find($id);
        // dd($editData);
        return view('backend.setup.student_class.edit_class',compact('editData'));


    }
    public function UpdateStudentClass(Request $request,$id){
        $data=StudentClass::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:student_classes,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Class Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.class.view')->with($notification);

    }
    public function DeleteStudentClass($id){
        $data=StudentClass::destroy($id);
        $notification=array(
            'message'=>'Class Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.class.view')->with($notification);

    }

}
