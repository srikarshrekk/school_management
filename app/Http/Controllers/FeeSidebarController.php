<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



use App\Models\StudentFee;
class FeeSidebarController extends Controller
{
    public function AllFeeView(){

    }
    public function SendFeeView($route){
        $side_bar['feevalues']=StudentFee::all();
        $side_bar['stat']=1;
        return redirect('$route',$side_bar);
    }
}
