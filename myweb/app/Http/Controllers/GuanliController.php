<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuanliController extends Controller
{
	//加载添加后台管理员的表单
    public function getAdd(){
    	return view('guanli.add');
    }

    //执行添加
    public function postInsert(Request $request){
    	//1.验证
    	$this->validate($request, [
    		//自动闪存 -->但add页面value值同样要添加old属性
        	'name' => 'required',		//name字段必填
        	'username' => 'required|unique:adminuser',	//账号必填且唯一  unique:表名
        	'pass'=>'required',
        	'repass' => 'same:pass|required',	//密码必须相同
        	'phone' => 'required|digits:11|unique:adminuser'
    	],[
    		'name.required'=>'姓名须填写',
    		'username.required'=>'账号须填写',
    		'username.unique'=>'账号已存在',
    		'pass.required'=>'密码须填写',
    		'repass.same'=>'密码不一致',
    		'repass.required'=>'需确认密码',
    		'phone.required'=>'电话号码须填写',
    		'phone.digits'=>'电话号码格式错误',
    		'phone.unique'=>'电话号码已被注册'

    	]);
    	
    	//2.数据插入  (发送请求)
    	// dd($request->all());
    	$data = $request->except(['_token','repass']);
    	//数据处理
    		//Hash加密,每次密码加密结果不一样 . 解密用Hash::check() 加密Hash::make()
    	$data['pass'] = Hash::make($data['pass']);

    	$data['token'] = str_random(50);  //随机生成50个长度的字符串,作为邮箱注册的身份验证
    	
    	$res= DB::table('adminuser')->insert($data);
    	if($res){
    		return redirect('/admin/guanli/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');   		
    	}
    }


    public function getIndex(Request $request){
    	//获取搜索的数据
    	// var_dump($request->all());
    	$data = DB::table('adminuser')->where('recycle',1)->where(function($query) use($request){	//use给当前匿名函数引入外部的$request变量
    		if($request->input('keyword')!=null){ //$query就是数据库user的模型
    					//按照name字段分装搜索
    			$query->where('username','like','%'.$request->input('keyword').'%')
    				  	//按照phone字段分装搜索
    				  ->orWhere('phone','like','%'.$request->input('keyword').'%');
    		}

    	})->paginate($request->input('num',5));		//指定每页显示5条数据
    	//分页的页码
    	// dd($data->render());
    	return view('guanli.index',['list'=>$data,'request'=>$request->all()]);//加载模板
    }

    //删除方法(放入回收站)
    public function getHs($id){
    	$res = DB::table('adminuser')->where('id',$id)->update(['recycle' => 0, 'status' => 0]);
    	if($res){
    		return redirect('/admin/guanli/recycle')->with('success','放入回收站');
    	}else{
    		return back()->with('error','回收失败');
    	}
    }

    //回收站
     public function getRecycle(Request $request){
    	//获取搜索的数据
    	// var_dump($request->all());
    	//查询数据
    	$data = DB::table('adminuser')->where('recycle',0)->where(function($query) use($request){	//use给当前匿名函数引入外部的$request变量
    		if($request->input('keyword')!=null){ //$query就是数据库user的模型
    					//按照name字段分装搜索
    			$query->where('username','like','%'.$request->input('keyword').'%')
    				  	//按照email字段分装搜索
    				  ->orWhere('phone','like','%'.$request->input('keyword').'%');
    		}

    	})->paginate($request->input('num',5));		//指定每页显示5条数据
    	//分页的页码
    	// dd($data->render());
    	return view('guanli.recycle',['list'=>$data,'request'=>$request->all()]);//加载模板
    }

    //加载修改页面
    public function getEdit($id){
    	return view('guanli.edit',[
    		'vo'=>DB::table('adminuser')->where('id',$id)->first()	//获取单条数据时就用first,避免遍历
    		]);
    }

     //执行修改
    public function postUpdate(Request $request){
    	// dd($request);
    	$data = $request->only(['phone','status']);
    	//验证修改的数据
    	$this->validate($request, [
    		//自动闪存 -->add页面value值要添加old属性
        	'phone' => 'required|digits:11',
        	'status' => 'required'
    	],[
    		'phone.required'=>'电话号码须填写',
    		'phone.digits'=>'电话号码格式错误',
    		'status.required'=>'状态必须要选中'
    	]);
    	//执行修改
    	$res = DB::table('adminuser')->where('id',$request->input('id'))->update($data);
    	if($res){
    		return redirect('/admin/guanli/index')->with('success','修改成功');
    	}else{
    		return back()->with('error','修改失败');
    	}
    }

    //彻底删除
    public function getDel($id){
    	$res = DB::table('adminuser')->where('id',$id)->delete();
    	if($res){
    		return redirect('/admin/guanli/recycle')->with('success','删除成功');
    	}else{
    		return back()->with('error','删除失败');
    	}
    }

    //恢复使用
    public function getReuse($id){
    	$res = DB::table('adminuser')->where('id',$id)->update(['recycle' => 1]);
    	if($res){
    		return redirect('/admin/guanli/index')->with('success','账号恢复使用');
    	}else{
    		return back()->with('error','恢复失败');
    	}
    }
}
