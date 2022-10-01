<?php

namespace App\Http\Controllers\backend\employee;
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
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use DB;
use PDF;
class EmployeeRegistrationController extends Controller
{
    public function EmployeeRegistrationView(){
        $data['allData']=User::where('usertype','Employee')->get();
        return view('backend.employee.view_employee_reg',$data);


    }
    public function EmployeeRegistrationAdd(){
        $data['designations']=Designation::all();
        return view('backend.employee.add_employee_reg',$data);
    }

    public function EmployeeRegistrationStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear=date('Ym',strtotime($request->join_date));
            $employee=User::where('usertype','Employee')->orderBy('id','DESC')->first();
            // dd($student);
            if($employee==NULL){
                $firstReg=0;
                $employeeId=$firstReg+1;
                if($employeeId<10){
                    $id_no='000'.$employeeId;

                }else if($studentId<100){
                    $id_no='00'.$employeeId;
                }else if($employeeId<1000){
                    $id_no='0'.$employeeId;
                }}else{
                    $employee=User::where('usertype','Employee')->orderBy('id','DESC')->first();
                    $employeeId=$employee->id+1;
                    
                    
                    
                    if($employeeId<10){
                        $id_no='000'.$employeeId;
    
                    }else if($employeeId<100){
                        $id_no='00'.$employeeId;
                    }else if($employeeId<1000){
                        $id_no='0'.$employeetId;
                    }
                    

                }
            
            
            $final_id_no=$checkYear.$id_no;
            $user=new User();
            
            
            $code=rand(0000,9999);
 
            $user->id_no= $final_id_no;
            $user->name=$request->name;
            $user->password=bcrypt($code);
            $user->code=$code;
            $user->usertype='Employee';
            
            $user->f_name=$request->f_name;
            $user->m_name=$request->m_name;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->salary=$request->salary;
            $user->designation_id=$request->designation;
            
            $user->join_date=date('Y-m-d',strtotime($request->join_date));
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            if($request->hasfile('profile_photo_path')){
                $file=$request->file('profile_photo_path');
                $file_extension =date('YmdHi').$file->getClientOriginalName();
                // @unlink(public_path('upload/user_images/'.$user->profile_photo_path));
                $destination_path = public_path('upload/employee_images/');
                $filename = $file_extension;
                // $filename=date('YmdHi').$file->getClientOriginalName();
                // $file->move(public_path('upload/user_images',$filename));
                $request->file('profile_photo_path')->move($destination_path, $filename);
                $user['profile_photo_path']=$filename;
                }
                $user->save();
            
            
            $salary=new EmployeeSalaryLog();
            $salary->employee_id=$user->id;
            $salary->present_salary=$request->salary;
            $salary->effected_salary=date('Y-m-d',strtotime($request->join_date));
            $salary->previous_salary=$request->salary;
            $salary->increment_salary='0';
           
            $salary->save();

           
           

           
            


        });
        $notification=array(
            'message'=>'Employee Added',
            'alert-type'=>'success'
        );
       
        return redirect()->route('employee.registration.view')->with($notification);

    }
    public function EmployeeRegistrationEdit($id){
        $data['editData']=User::find($id);
        $data['designations']=Designation::all();
        $data['salary']=EmployeeSalaryLog::where('employee_id',$id)->get();

        return view('backend.employee.edit_employee_reg',$data);

    }
    public function EmployeeRegistrationDelete($id){
        User::find($id)->delete();
        EmployeeSalaryLog::where('employee_id',$id)->delete();

        return redirect()->route('employee.registration.view');

    }
    public function EmployeeRegistrationDetail($id){
        
        $data['details']=User::find($id);
        $data['salary']=EmployeeSalaryLog::where('employee_id',$id)->first();

        // dd($data['details']->toArray());
        
        $pdf = PDF::loadView('backend.employee.detail_employee_pdf', $data);
        // download PDF file with download method
        
        return $pdf->stream('pdf_file.pdf');
    }
    

}
