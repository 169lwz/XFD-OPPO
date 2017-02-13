<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class LunboController extends Controller
{
    public function getAdd(){
    	return view ('lunbo.add');
    }

    public function postInsert(Request $request){
    	//1.验证
    	$this->validate($request, [
    		//自动闪存 -->但add页面value值同样要添加old属性
        	'pic' => 'required',		//pic字段必填
        	'desc' => 'required',	//pic字段必填
        	
    	],[
    		'pic.required'=>'图片需添加',
    		'desc.required'=>'描述内容须填写',
    	]);

    	//2.数据插入  (发送请求)
    	// dd($request->all());
    	//处理数据
		$data = $this->dealRequest($request); //调用方法处理数据
		// dd($data);
		//数据插入
		if(DB::table('lunbo')->insert($data)){
			return redirect('/admin/lunbo/index')->with('success','插入成功');
		}else{
			return back()->with('error','插入失败');
		}    	
    }

    public function dealRequest($request){
		// dd($request->all());
		$data = $request->except('_token');
		//如果有图片上传
		if($request->hasFile('pic')){
			//图片名称
			$picname = time().rand(1000,9999).'.'.$request->file('pic')->getClientOriginalExtension();

			$request->file('pic')->move(\Config::get('app.lunbo_dir'),$picname);
			$data['pic'] = ltrim(\Config::get('app.lunbo_dir').$picname,'.');  //图片存进表里
		
			//在php脚本中路径是相对的 在html中路径是绝对的
		}
		return $data;   //返回值
	}

	public function getIndex(){  //浏览
		$data = DB::table('lunbo')->get();  //获取轮播表里的所有数据
		return view('lunbo.index',['list'=>$data]);
	}

	public function getDel($id){
		//删除 表中的数据和文件夹中的图片
			//先查出数据,储存起来
		$vo = DB::table('lunbo')->where('id',$id)->first();
		
		//删除数据
		if(DB::table('lunbo')->where('id',$id)->delete()){
			//删除主图		
			if(file_exists('.'.$vo['pic'])){
				unlink('.'.$vo['pic']);
			}
			return redirect('/admin/lunbo/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');
		}
	}

	//修改
	public function getEdit($id){
		return view('lunbo.edit',['vo'=>DB::table('lunbo')->where('id',$id)->first()]);
	}

	//执行修改
	public function postUpdate(Request $request){
		//处理数据
		$data = $this->dealRequest($request);
		// dd($data);

		//先查出数据,储存起来
		$vo = DB::table('lunbo')->where('id',$request->input('id'))->first();
		
		//删除原来的数据
		if(!empty($data['pic'])){  //如果原文章主图被修改			
			// 删除原来的主图		
			if(file_exists('.'.$vo['pic'])){
				unlink('.'.$vo['pic']);
			}
		}
		
		if(DB::table('lunbo')->where('id',$request->input('id'))->update($data)){
			return redirect('/admin/lunbo/index')->with('success','修改成功');
		}else{
			return back()->with('error','修改失败');
		}
	}


}
