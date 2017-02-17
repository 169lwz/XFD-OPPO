<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Gregwar\Captcha\CaptchaBuilder;
use Session;
use DB;
use Hash;
use Mail;

class LoginController extends Controller
{
	//前台登录
    public function getLogin(){
    	return view('login.login');  //前一个login是文件夹名,后一个是模板名
    }

    public function postDologin(LoginRequest $request){
    	if(session('code')==$request->input('code')){
    		//验证账号 是否是邮箱
            $info = $request->input("shuru");
            $reg = '/\w+@\w+(\.com|\.cn){1,2}/';
            if(preg_match($reg,$info)==1){
                $data = DB::table("user")->where("email",$request->input("shuru"))->first();  
            }else{
                $data = DB::table("user")->where("username",$request->input("shuru"))->first();
            }
            // dd($data);
            // $data = DB::table("user")->where("username",$request->input("username"))->orWhere('email',$request->input('email'))->first();
        }	


        if (Hash::check($request->input("pass"),$data['pass'])) {
       		if($data['status']==0){		//status=1 启用;status=0 禁用
          	     return back()->with("error","该用户已被禁用,请先激活账号或联系客服");
            }else{
                session(['user'=>$data]); //登录成功,将用户信息存入session
                // session(['user',$data]); //将用户信息存入session
                return redirect("/home/index");
                // return redirect("/admin/user/recycle")->with("success","登录成功");      //跳转到前台首页
            }     	
    	}else{
      		return back()->with("error","密码错误");
    	}        	
    }

    public function getCode(){  //验证码
    	//生成验证码图片的Builder对象，配置相应属性
    	 $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 120, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把验证码的内容存入session
        // Session::flash('milkcaptcha', $phrase);
        session(['code'=>$phrase]);

        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        // exit();
    }

    

    //忘记密码
    public function forget(){
      return view("login.forget");
    }

    //注册
    public function getRegister(){
    	return view('login.register');
    }

    //执行注册
    public function postDoregister(Request $request){
    	// dd($request->all());
    	if(session('code')==$request->input('code')){
    		//匹配正确
    		$data = $request->only(['username','pass','email','phone']);

    		$data['pass']= Hash::make($request->input('pass'));    		

    		$data['status']=0;// 默认不激活
    		$data['token']=str_random(50);
            // $data['recycle']=1;
    		    		
    		if($id = DB::table('user')->insertGetId($data)){  //获取自增id(插入成功后才能获取)
    			// 添加成功的话, 发送邮件
                self::sendMail($data,$id);
                return redirect('/home/login/login');
    		}else{
    			echo '添加失败';
    		}
    	}else{
    		return back()->with('error','注册失败');
    	}
    }

   //发送激活 邮件
    public static function sendMail($data,$id){
        // 发送laravel中的一个模板
        //         模板名称           模板参数                               方法名           
        Mail::send('email.jihuo',['token'=>$data['token'],'id'=>$id],function($message) use($data){
            //设置发送的邮件地址
            $message->to($data['email']);
            //设置邮件的标题
            $message->subject('oppo账号激活邮件');
        });
    }

    //点击邮件 激活
    public function getJihuo(Request $request){
      $id = $request -> input('id');
      $token = $request ->input("token");
      if($token == DB::table("user")->where("id",$id)->first()['token']){
            // return redirect('/home/login/login');
	        if(DB::table("user")->where("id",$id)->update(['status'=>1])){
	            // echo "激活成功";
	            // $newtoken = str_random(50);
	            // DB::table("user")->where("id",$id)->update(['token'=>$newtoken]);
	            return redirect('/home/login/login');
	        }else{
	            echo "激活失败";
	        }
	    }else{
	        echo "这是非法链接";
            // return redirect('/home/login/login');
	    }
    }

    //加载忘记密码方法
    public function getForget(){
        return view('login.forget');
    }

    //注册新浪云,实名认证

    //执行忘记密码方法 同时加载视图
    public function postDoforget(Request $request){

      //给$request->input('phone')这个手机号发送短信
      $id = DB::table('user')->where('phone',$request->input('phone'))->first()['id'];  //获取用户的id
      // dd($id);
      $curl = new \Curl\Curl();
      //随机生成一个验证码
      $code = rand(1000,9999);
      session(['ycode'=>$code]);  //存入session,为验证做准备

      // dd($curl);
      //发送请求
      // $curl->get('http://xianfengdui.applinzi.com/index.php?to='15952262127'&code=1234');
      $curl->get('http://xianfengdui.applinzi.com/index.php?to='.$request->input('phone').'&code='.$code);

      if($curl->error){
        echo $curl->error_code;
      }else{
        $res = $curl->response;
        //json_decode 将json格式转换成数组
        $res = json_decode($res,true); //true 返回数组  false 返回对象
        if($res['resp']['respCode']=='000000'){
            //短信发送成功
            // echo '短信发送成功';
            return view('login.reset',['id'=>$id]);
        }else{
            短信发送失败;
        }
      }
    }


   //完成重置密码
   public function postDoreset(Request $request){
        //将重置的新密码写入数据库
        $data['pass']=Hash::make($request->input('pass'));
        if(DB::table('user')->where('id',$request->input('id'))->update($data)){
            return redirect('/home/login/login');
        }else{
            echo '修改失败';
            // return back()->with('error','重置密码失败');
        }
   } 

}
