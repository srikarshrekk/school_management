<?php
namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;

use App\Models\StudentClass;
use App\Models\StudentFee;


class StudentFeeAmountController extends Controller

{
    public function ViewStudentFee_Amount(){
        // $data['allData']=FeeCategoryAmount::all();
       $data['allData']=FeeCategoryAmount::select('student_fee_id')->groupBy('student_fee_id')->get();
        return view('backend.setup.student_fee_amount.view_fee_amount',$data);

    }
    public function AddStudentFee_Amount(){
        $data['fee_categories']=StudentFee::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.student_fee_amount.add_fee_amount',$data);
    }
    public function StoreStudentFee_Amount(Request $request){
        

        $countClass=count($request->student_class_id);
        if($countClass!=NULL){
            for($i=0;$i<$countClass;$i++){
                $fee_amount=new FeeCategoryAmount();
                $fee_amount->student_fee_id=$request->student_fee_id;
                $fee_amount->student_class_id=$request->student_class_id[$i];
                $fee_amount->amount=$request->amount[$i];
                $fee_amount->save();

            }

            $notification=array(
                'message'=>'Amount Added to Fee Category',
                'alert-type'=>'info'
            );
            return redirect()->route('student.fee_amount.view')->with($notification);

        }
    }
    public function EditStudentFee_Amount($student_fee_id){
        $data['editData']=FeeCategoryAmount::where('student_fee_id',$student_fee_id)->orderBy('student_class_id','asc')->get();
        // dd($data['editData']->toArray());
        $data['fee_categories']=StudentFee::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.student_fee_amount.edit_fee_amount',$data);
    
     }
     public function UpdateStudentFee_Amount(Request $request,$student_fee_id){
        if($request->student_class_id==null){
            $notification=array(
                'message'=>'No Classes Selected',
                'alert-type'=>'error',
               


            );
            return redirect()->route('student.fee_amount.edit',$student_fee_id)->with($notification);

        }else{
            // dd($request);
        FeeCategoryAmount::where('student_fee_id',$student_fee_id)->delete();
        // StudentFeeAmount::destroy($data);


        // dd($data);
        $countClass=count($request->student_class_id);
        for($i=0;$i<$countClass;$i++){
            $data=new FeeCategoryAmount();
            $data->student_fee_id=$request->student_fee_id;
            $data->student_class_id=$request->student_class_id[$i];
            $data->amount=$request->amount[$i];
            $data->save();
           
           }

        } $notification=array(
            'message'=>'Changes to Fees Made',
            'alert-type'=>'info'
        );
        return redirect()->route('student.fee_amount.view')->with($notification);
        }

        public function DeleteStudentFee_Amount($student_fee_id){
            FeeCategoryAmount::where('student_fee_id',$student_fee_id)->delete();
            $notification=array(
                'message'=>'Fee category deleted',
                'alert-type'=>'info'
            );
            return redirect()->route('student.fee_amount.view')->with($notification);


        }
        public function DetailStudentFee_Amount($student_fee_id){
           $data['detailData']=FeeCategoryAmount::where('student_fee_id',$student_fee_id)->orderBy('student_class_id','asc')->get();
           
           return view('backend.setup.student_fee_amount.detail_fee_amount',$data);


        }
  
}