<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function homelogin(){
    	$res = DB::table("user")->where("username",$_POST['info'])->count();
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


}
