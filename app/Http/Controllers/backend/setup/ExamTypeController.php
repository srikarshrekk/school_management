<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\ExamType;
class ExamTypeController extends Controller
{
    public function ViewStudentExam(){
        $data['allData']=ExamType::all();
        return view('backend.setup.exam_type.view_exam',$data);
    }
    public function AddStudentExam(){
        return view('backend.setup.exam_type.add_exam');

    }

    public function StoreStudentExam(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:exam_types,name',
      
        ]);
        $data =new ExamType();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Exam Type Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.exam.view')->with($notification);
    }
    public function EditStudentExam($id){
        $editData=ExamType::find($id);
        // dd($editData);
        return view('backend.setup.exam_type.edit_exam',compact('editData'));


    }
    public function UpdateStudentExam(Request $request,$id){
        $data=ExamType::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:exam_types,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Exam Type Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.exam.view')->with($notification);

    }
    public function DeleteStudentExam($id){
        $data=ExamType::destroy($id);
        $notification=array(
            'message'=>'Exam Type Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.exam.view')->with($notification);

    }

}
