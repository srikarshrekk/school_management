<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Designation;
class DesignationController extends Controller
{ 
    public function ViewStudentDesignation(){
    $data['allData']=Designation::all();
    return view('backend.setup.designation.view_designation',$data);
}
public function AddStudentDesignation(){
    return view('backend.setup.designation.add_designation');

}

public function StoreStudentDesignation(Request $request){
    $validatedData=$request->validate([
        'name'=>'required|unique:Designations,name',
  
    ]);
    $data =new Designation();
    $data->name=$request->name;
    $data->save();
    $notification=array(
        'message'=>'New Designation Added',
        'alert-type'=>'success'
    );
    return redirect()->route('student.designation.view')->with($notification);
}
public function EditStudentDesignation($id){
    $editData=Designation::find($id);
    // dd($editData);
    return view('backend.setup.designation.edit_designation',compact('editData'));


}
public function UpdateStudentDesignation(Request $request,$id){
    $data=Designation::find($id);
    $validatedData=$request->validate([
        'name'=>'required|unique:designations,name,'.$data->id
    ]);
    
    $data->name=$request->name;
    $data->save();
    $notification=array(
        'message'=>'Designation Updated',
        'alert-type'=>'info'
    );
    return redirect()->route('student.designation.view')->with($notification);

}
public function DeleteStudentDesignation($id){
    $data=Designation::destroy($id);
    $notification=array(
        'message'=>'Designation Deleted',
        'alert-type'=>'warning'
    );

    return redirect()->route('student.designation.view')->with($notification);

}

}
