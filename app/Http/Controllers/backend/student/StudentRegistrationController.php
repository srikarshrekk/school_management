<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentFee;
use DB;
use PDF;
class StudentRegistrationController extends Controller
{
    public function ViewStudentRegistration(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['year_id']=StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id']=StudentClass::orderBy('id','desc')->first()->id;
        
       
        $data['allData']=AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();

      
            // $data['allData']=AssignStudent::all();

        // dd($data['allData']->toArray());
        return view('backend.student.student_reg.view_student',$data);


    }
    public function AddStudentRegistration(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['shifts']=StudentShift::all();
        
        return view('backend.student.student_reg.add_student',$data);



    }
    public function StoreStudentRegistration(Request $request){
        DB::transaction(function() use($request){
            $checkYear=StudentYear::find($request->year_id)->name;
            $student=User::where('usertype','Student')->orderBy('id','DESC')->first();
            // dd($student);
            if($student==NULL){
                $firstReg=0;
                $studentId=$firstReg+1;
                if($studentId<10){
                    $id_no='000'.$studentId;

                }else if($studentId<100){
                    $id_no='00'.$studentId;
                }else if($studentId<1000){
                    $id_no='0'.$studentId;
                }}else{
                    $student=User::where('usertype','Student')->orderBy('id','DESC')->first();
                    $studentId=$student->id+1;
                    
                    
                    
                    if($studentId<10){
                        $id_no='000'.$studentId;
    
                    }else if($studentId<100){
                        $id_no='00'.$studentId;
                    }else if($studentId<1000){
                        $id_no='0'.$studentId;
                    }
                    

                }
            
            
            $final_id_no=$checkYear.$id_no;
            $user=new User();
            
            
            $code=rand(0000,9999);
 
            $user->id_no= $final_id_no;
            $user->name=$request->name;
            $user->password=bcrypt($code);
            $user->code=$code;
            $user->usertype='Student';
            
            $user->f_name=$request->f_name;
            $user->m_name=$request->m_name;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            if($request->hasfile('profile_photo_path')){
                $file=$request->file('profile_photo_path');
                $file_extension =date('YmdHi').$file->getClientOriginalName();
                // @unlink(public_path('upload/user_images/'.$user->profile_photo_path));
                $destination_path = public_path('upload/student_images/');
                $filename = $file_extension;
                // $filename=date('YmdHi').$file->getClientOriginalName();
                // $file->move(public_path('upload/user_images',$filename));
                $request->file('profile_photo_path')->move($destination_path, $filename);
                $user['profile_photo_path']=$filename;
                }
                $user->save();
            $value=new AssignStudent();
            $value->assign_student_id=$user->id;
            $value->class_id=$request->class_id;
            $value->year_id=$request->year_id;
            $value->group_id=$request->group_id; 
            $value->shift_id=$request->shift_id;
            $value->save();

            $fee_registration_id=StudentFee::where('name','Registration')->first()->id;
            // dd($fee_category_id);   
           

            $discount_student=new DiscountStudent();
            $discount_student->assign_student_id=$value->id;
            $discount_student->fee_category_id=$fee_registration_id;
            $discount_student->discount=$request->discount;
            $discount_student->save();
           
            


        });
        $notification=array(
            'message'=>'Student Added',
            'alert-type'=>'success'
        );
       
        return redirect()->route('student.registration.view')->with($notification);

       

    }
    public function SearchStudentRegistration(Request $request){
        
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['year_id']=$request->year_id;
        $data['class_id']=$request->class_id;
        $data['search']=$request->search;
        
        

       
        
        $data['allData']=AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        
        return view('backend.student.student_reg.view_student',$data);


    }
    public function EditStudentRegistration($assign_student_id){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['shifts']=StudentShift::all();
        
        $data['editData']=AssignStudent::with(['Data_Student','Discount_Student'])->where('assign_student_id',$assign_student_id)->first();
        

        return view('backend.student.student_reg.edit_student',$data);

    }
    public function UpdateStudentRegistration(Request $request,$assign_student_id){
       

        $data=User::where('id',$assign_student_id)->first();
        
            
        
            $data->name=$request->name;      
            $data->f_name=$request->f_name;
            $data->m_name=$request->m_name;
            $data->mobile=$request->mobile;
            $data->address=$request->address;
            $data->gender=$request->gender;
            $data->religion=$request->religion;
            $data->dob=date('Y-m-d',strtotime($request->dob));
            if($request->hasfile('profile_photo_path')){
                $file=$request->file('profile_photo_path');
                $file_extension =date('YmdHi').$file->getClientOriginalName();
                @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
                $destination_path = public_path('upload/student_images/');
                $filename = $file_extension;
                // $filename=date('YmdHi').$file->getClientOriginalName();
                // $file->move(public_path('upload/user_images',$filename));
                $request->file('profile_photo_path')->move($destination_path, $filename);
                $data['profile_photo_path']=$filename;
                }
                $data->save();
            $value=AssignStudent::where('id',$request->id)->where('assign_student_id',$assign_student_id)->first();
            
            
            $value->class_id=$request->class_id;
            $value->year_id=$request->year_id;
            $value->group_id=$request->group_id; 
            $value->shift_id=$request->shift_id;
            $value->save();

            
            
           

            $discount_student=DiscountStudent::where('assign_student_id',$request->id)->first();
            
            
            
            $discount_student->discount=$request->discount;
            $discount_student->save();
            $notification=array(
                'message'=>' Changes Made',
                'alert-type'=>'info'
            );
            return redirect()->route('student.registration.view')->with($notification);


        

    }
    public function DeleteStudentRegistration($assign_student_id){

        
        $value=AssignStudent::where('assign_student_id',$assign_student_id)->first();
        $value_id=AssignStudent::where('assign_student_id',$assign_student_id)->first()->id;
        $value->delete();
        
        $discount_student=DiscountStudent::where('assign_student_id',$value_id)->first();
        $discount_student->delete();
        $data=User::where('id',$assign_student_id)->first();
        $data->delete();
        
        $notification=array(
            'message'=>' Student Data Deleted',
            'alert-type'=>'warning'
        );
        return redirect()->route('student.registration.view')->with($notification);

    }
    public function PromoteStudentRegistration($assign_student_id){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['shifts']=StudentShift::all();
        
        $data['editData']=AssignStudent::with(['Data_Student','Discount_Student'])->where('assign_student_id',$assign_student_id)->first();
        

        return view('backend.student.student_reg.promotion_student',$data);
    }
    public function Promote_updateStudentRegistration(Request $request,$assign_student_id){
        $value=AssignStudent::where('id',$request->id)->where('assign_student_id',$assign_student_id)->first();
            
            
        $value->class_id=$request->class_id;
        $value->year_id=$request->year_id;
        $value->group_id=$request->group_id; 
        $value->shift_id=$request->shift_id;
        $value->save();
        $notification=array(
            'message'=>' Student Succesfully Promoted',
            'alert-type'=>'success'
        );
        return redirect()->route('student.registration.view')->with($notification);

    }
    public function DetailStudentRegistration($assign_student_id){
       
        
        $data['details']=AssignStudent::with(['Data_Student','Discount_Student'])->where('assign_student_id',$assign_student_id)->first();
        // dd($data['details']->toArray());
        
        $pdf = PDF::loadView('backend.student.student_reg.detail_student_pdf', $data);
        // download PDF file with download method
        
        return $pdf->stream('pdf_file.pdf');
        

        

    }
  

}
