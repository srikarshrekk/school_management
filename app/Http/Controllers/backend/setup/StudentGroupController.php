<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\StudentGroup;
class StudentGroupController extends Controller
{
    public function ViewStudentGroup(){
        $data['allData']=StudentGroup::all();
        return view('backend.setup.student_group.view_group',$data);

    }
    public function AddStudentGroup(){
        return view('backend.setup.student_group.add_group');
    }
    public function StoreStudentGroup(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:student_groups,name',
      
        ]);
        $data =new StudentGroup();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Group Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group.view')->with($notification);

    }
    public function EditStudentGroup($id){
        $editData=StudentGroup::find($id);
        // dd($editData);
        return view('backend.setup.student_group.edit_group',compact('editData'));


    }
    public function UpdateStudentGroup(Request $request,$id){
        $data=StudentGroup::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:student_groups,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'Group Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.group.view')->with($notification);

    }
    public function DeleteStudentGroup($id){
        $data=StudentGroup::destroy($id);
        $notification=array(
            'message'=>'Group Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.group.view')->with($notification);

    }
}
