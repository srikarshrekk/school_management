<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class UserController extends Controller
{
    public function userview(){
        // $allData=User::all();
        $data['allData']=User::all();
        return view('backend.user.user_view',$data);

    }
    public function useradd(){
        return view('backend.user.user_add');

    }
    public function userstore(Request $request){
        $validatedData=$request->validate([
            'email'=>'required|unique:users',
            'name'=>'required',
        ]);
        $data=new User();
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->save();
        $notification=array(
            'message'=>'User Inserted Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);
    }
    public function useredit($id){
        $editData= User::find($id);
        return view('backend.user.user_edit',compact('editData'));

    }
    public function userupdate(Request $request,$id){
        $validatedData=$request->validate([
            'email'=>'required|unique:users',
            'name'=>'required',
        ]);
        $data= User::find($id);
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->save();
        $notification=array(
            'message'=>'User Inserted Updated',
            'alert-type'=>'info'
        );
        return redirect()->route('user.view')->with($notification);

    }
    public function userdelete($id){
        $user=User::find($id);
        $user->delete();
        $notification=array(
            'message'=>'User deleted',
            'alert-type'=>'warning'
        );
        return redirect()->route('user.view')->with($notification);
    }
}