<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;

use Session;
use DB;
use Hash;

class AdminloginController extends Controller
{
    //后台登录
    public function getLogin(){
    	return view('adminlogin.login');  //前一个login是文件夹名,后一个是模板名
    }

    //处理登录的数据
    public function postDologin(Request $request){   	
		//验证账号
        // $data = DB::table("user")->where("username",$request->input("username"))->orWhere('email',$request->input('email'))->first();
		$data = DB::table("adminuser")->where("username",$request->input("username"))->first();
		// dd($data);
      		if (Hash::check($request->input("pass"),$data['pass'])) {

       		if($data['status']==0){		//status=1 启用;status=0 禁用
          		return back()->with("error","该账号已被禁用");
        	}
        	session(['adminuser'=>$data]); //将用户信息存入session
        	// session(['user',$data]); //将用户信息存入session
        	return redirect("/admin/index");
        	// return redirect("/admin/user/recycle")->with("success","登录成功");		//跳转到前台首页
    	}else{
      		return back()->with("error","用户名或密码错误");
    	}
    }

    //退出
    public function getLogout(){
    	session()->forget('adminuser'); //清除session

    	echo "<script>alert('退出成功');window.location.href='/admin/login/login';</script>";	
    }
}
