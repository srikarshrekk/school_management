<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\StudentFee;
class StudentFeeController extends Controller
{
    public function ViewStudentFee(){
        $data['allData']=StudentFee::all();
        return view('backend.setup.student_fee.view_fee',$data);
    }
    public function AddStudentFee(){
        return view('backend.setup.student_fee.add_fee');
    }
    public function StoreStudentFee(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:student_fees,name',
      
        ]);
        $data =new StudentFee();
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'fee Added',
            'alert-type'=>'success'
        );
        return redirect()->route('student.fee.view')->with($notification);
    }
    public function EditStudentFee($id){
        $editData=StudentFee::find($id);
        // dd($editData);
        return view('backend.setup.student_fee.edit_fee',compact('editData'));


    }
    public function UpdateStudentFee(Request $request,$id){
        $data=Studentfee::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:student_fees,name,'.$data->id
        ]);
        
        $data->name=$request->name;
        $data->save();
        $notification=array(
            'message'=>'fee Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('student.fee.view')->with($notification);

    }
    public function DeleteStudentFee($id){
        $data=StudentFee::destroy($id);
        $notification=array(
            'message'=>'fee Deleted',
            'alert-type'=>'warning'
        );

        return redirect()->route('student.fee.view')->with($notification);

    }

}
