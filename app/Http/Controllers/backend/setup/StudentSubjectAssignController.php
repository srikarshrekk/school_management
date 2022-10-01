<?php

namespace App\Http\Controllers\backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SubjectType;
class StudentSubjectAssignController extends Controller
{
    public function ViewStudentSubjectAssign(){
        $data['allData']=AssignSubject::select('student_class_id')->groupBy('student_class_id')->orderBy('student_class_id','asc')->get();;
    //    $data['allData']=FeeCategoryAmount::select('student_fee_id')->groupBy('student_fee_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);

    }
    public function AddStudentSubjectAssign(){
        $data['subjectTypes']=SubjectType::all();
        $data['classes']=StudentClass::all();
        
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }
    public function StoreStudentSubjectAssign(Request $request){

        $countClass=count($request->subject_types_id);
        if($countClass!=NULL){
            for($i=0;$i<$countClass;$i++){
                $assign_subjects=new AssignSubject();
                $assign_subjects->student_class_id=$request->student_class_id;
                $assign_subjects->subject_types_id=$request->subject_types_id[$i];
                $assign_subjects->full_mark=$request->full_mark[$i];
                $assign_subjects->pass_mark=$request->pass_mark[$i];
                $assign_subjects->subjective_mark=$request->subjective_mark[$i];
                $assign_subjects->save();

            }

            $notification=array(
                'message'=>'Added subjects to Class',
                'alert-type'=>'info'
            );
            return redirect()->route('student.subject_assign.view')->with($notification);

        }
    }
    public function EditStudentSubjectAssign($student_class_id){
        $data['editData']=AssignSubject::where('student_class_id',$student_class_id)->orderBy('subject_types_id','asc')->get();
        // dd($data['editData']->toArray());q
        $data['subject_types']=SubjectType::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject',$data);
    
     }
     public function UpdateStudentSubjectAssign(Request $request,$student_class_id){
        if($request->student_class_id==null){
            $notification=array(
                'message'=>'No Classes Selected',
                'alert-type'=>'error',
               


            );
            return redirect()->route('student.assign_subject.edit',$student_fee_id)->with($notification);

        }else{
            // dd($request);
        AssignSubject::where('student_class_id',$student_class_id)->delete();
        // StudentFeeAmount::destroy($data);


        // dd($data);
        $countClass=count($request->subject_types_id);
        for($i=0;$i<$countClass;$i++){
            $data=new AssignSubject();
            $data->student_class_id=$request->student_class_id;
            $data->subject_types_id=$request->subject_types_id[$i];
            $data->full_mark=$request->full_mark[$i];
            $data->pass_mark=$request->pass_mark[$i];
            $data->subjective_mark=$request->subjective_mark[$i];
            
            $data->save();
           
           }

        } $notification=array(
            'message'=>'Changes Made to Class Subjects ',
            'alert-type'=>'info'
        );
        return redirect()->route('student.subject_assign.view')->with($notification);
        }

        public function DeleteStudentSubjectAssign($student_class_id){
            AssignSubject::where('student_class_id',$student_class_id)->delete();
            $notification=array(
                'message'=>'ALl Subjects deleted for the class deleted',
                'alert-type'=>'info'
            );
            return redirect()->route('student.subject_assign.view')->with($notification);


        }
        public function DetailStudentSubjectAssign($student_class_id){
           $data['detailData']=AssignSubject::where('student_class_id',$student_class_id)->orderBy('subject_types_id','asc')->get();
           
           
           return view('backend.setup.assign_subject.detail_assign_subject',$data);


        }
  
}
