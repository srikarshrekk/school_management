<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
        

    }
}
