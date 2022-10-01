<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SubjectType;
class SubjectTypeController extends Controller
{
    public function ViewStudentSubject(){
        $data['allData']=SubjectType::all();
        return view('backend.setup.subject_type.view_subject',$data);
    }
    public function AddStudentSubject(){
        return view('backend.setup.subject_type.add_subject');

    }

    public function StoreStudentSubject(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:subject_types,name',
      
        ]);
        $data =new SubjectType();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'subject Type Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.subject.view')->with($notification);
    }
    public function EditStudentSubject($id){
        $editData=SubjectType::find($id);
        // dd($editData);
        return view('backend.setup.subject_type.edit_subject',compact('editData'));


    }
    public function UpdateStudentSubject(Request $request,$id){
        $data=SubjectType::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:subject_types,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'subject Type Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.subject.view')->with($notification);

    }
    public function DeleteStudentSubject($id){
        $data=SubjectType::destroy($id);
        $notification=array(
            'message'=>'subject Type Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.subject.view')->with($notification);

    }
}
