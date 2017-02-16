<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Hash;
use Session;

class HomeController extends Controller
{
    public function getIndex(){

        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        // dd($links);

        $lun = DB::table('lunbo')->where('status',0)->get();
        $ggao = DB::table('guanggao')->where('status',0)->get();

    	return view('home.index',['lun'=>$lun,'ggao'=>$ggao,'links'=>$links]);
    }


    // public function getMyorders(){
    //     $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
    //     $links = $res->getLinksarr();

    // 	return view('home.myorders',['links'=>$links]);
    // }
    public function getMyhome(){
    	$res = session('user');
    	return view('home.myhome',['res'=>$res]);
    }

    public function getRepass(){
    	// dd(session('user'));
    	$id = session('user')['id'];
    	// dd($id);
    	return view('home.repass',['id'=>$id]);
    }

    public function postDorepass(Request $request){
    	//将修改的新密码写入数据库
        $data['pass']=Hash::make($request->input('pass'));
        if(DB::table('user')->where('id',$request->input('id'))->update($data)){

        	session()->forget('user');	//密码被修改,清除原session
            return redirect('/home/login/login');
        }else{
            echo '修改失败';
            // return back()->with('error','修改密码失败');
        }
    }

    public function getRemessage(){
    	$res = session('user');
    	// dd($res);
    	return view('home.remessage',['res'=>$res]);
    }


    public function postDoremessage(Request $request){
    	//将修改的所有的新信息写入数据库
    	$data = $request->except('_token');
    	

        if(DB::table('user')->where('id',$request->input('id'))->update($data)){
        	$info = DB::table('user')->where('id',$request->input('id'))->first();

        	session(['user'=>$info]); //将新的用户信息存入session,覆盖原session
            return redirect('/home/myhome');
        }else{
            // echo '修改失败';
            return back()->with('error','未修改任何信息');
        }
    }


    //退出
    public function getLogout(){
    	session()->forget('user');	//清除session
      	return redirect("/home/index");	//(跳转到前台首页)-->没有session值,受LoginMiddleware限制,会跳转到登录页面
    }

    /*
		呈递商城页面
		/home/shangcheng
    */
	public function getShangcheng(){
		$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
     
    

       
         $data = DB::table('goods')
               ->join('type','type.id','=','goods.tid')
               ->join('gdetail','goods.id','=','gdetail.gid')
               ->select('type.tname','goods.id','goods.price','gdetail.con','gdetail.pic7','gdetail.color')         
               ->get();

                
       
		return view('shangcheng.index',['links'=>$links,'list'=>$data]);
	}

    
}
 
