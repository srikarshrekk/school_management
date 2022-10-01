<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;

use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $user=User::find($id);
        
        return view('backend.user.view_profile',compact('user'));

    }
    public function ProfileEdit(){
        $id=Auth::user()->id;
        $editData=User::find($id);
       
        // dd($editDetail);
        return view('backend.user.edit_profile',compact('editData'));
    }
    public function ProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        // dd($request);
        $data->name=$request->name;
        $data->email=$request->email;        
        $data->mobile=$request->mobile;
        $data->gender=$request->gender;
        $data->address=$request->address;
        $data->age=$request->age;
        if($request->hasfile('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            $file_extension =date('YmdHi').$file->getClientOriginalName();
            // @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $destination_path = public_path('upload/user_images/');
            $filename = $file_extension;
            // $filename=date('YmdHi').$file->getClientOriginalName();
            // $file->move(public_path('upload/user_images',$filename));
            $request->file('profile_photo_path')->move($destination_path, $filename);
            $data['profile_photo_path']=$filename;
            }
        $data->save();
        
        
        $notification=array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('profile.view')->with($notification);
    }
    public function ProfilePasswordview(){
        $data=User::find(Auth::user()->id);
        return view('backend.user.user_change_password',compact('data'));
    }
    public function ProfilePasswordupdate(Request $request){
        $validatedData=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
            // 'password_confirmation'=>'required|confirmed',
            
        ]);
        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::user()->id);
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();return redirect()->route('login');


        }else{
            return redirect()->back();
        }


    }
}