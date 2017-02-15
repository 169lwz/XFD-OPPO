<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Session;

class AjaxController extends Controller
{
     public function zhuce(){
    	$res = DB::table("user")->where("username",$_POST['info'])->count();
    	if($res){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }

    public function homelogin(){    //验证是否是账号
    	$res = DB::table("user")->where("username",$_POST['info'])->count();
    	if($res){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }

    public function homemailogin(){  //验证是否是邮箱
        $res = DB::table("user")->where("email",$_POST['info'])->count();
        if($res){
            echo "yes";
        }else{
            echo "no";
        }
    }

    public function registeremail(){
    	$res = DB::table("user")->where("email",$_POST['info'])->count();
    	if($res){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }

    public function registerphone(){
    	$res = DB::table("user")->where("phone",$_POST['info'])->count();
    	if($res){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }

    public function forget(){
    	$res = DB::table("user")->where("phone",$_POST['info'])->count();
    	if($res){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }

    public function code(){
    	if($_POST['info']==session('ycode')){
    		echo "yes";
    	}else{
    		echo "no";
    	}
    }


    public function chongzhi(){
        echo 'yes';
        

        // $res = session('user')['pass'];

        // if(Hash::check($res),$_POST['info']){
        //     echo "yes";
        // }else{
        //     echo "no";
        // }
    }


}
