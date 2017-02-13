<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParameterController extends Controller
{
	
		/*
			呈递参数浏览页面
			/admin/parameter/index
		*/
		public function getIndex(Request $request){
			//获取图片数据
			$data = DB::table('gparameter')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('parameter.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			呈递参数添加页面
			/admin/parameter/add
		*/
		public function getAdd(){
			$data = DB::table('goods')->get();
			return view('parameter.add',['list'=>$data]);
		}

		/*
			执行参数添加
			/admin/parameter/insert
		*/

		public function postInsert(Request $request){
			//图片处理的结果
			$pic = $this->dealRequest($request);
			$pic['gid'] = $request->input('gid');
			unset($pic['id']);
			// dd($pic);
			if(DB::table('gparameter')->insert($pic)){
				return redirect('/admin/parameter/index')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');

			}

		}

		//自定义图片处理
		public function dealRequest($request){
		// dd($request->all());
		$data = $request->except('_token');
		// dd($data);
		//如果有图片上传
		if($request->hasFile('ppic1') || $request->hasFile('ppic2') || $request->hasFile('ppic3') || $request->hasFile('ppic4') || $request->hasFile('ppic5') || $request->hasFile('ppic6')){
			
			for($i=1;$i<7;$i++){
				$picname = time().rand(10000,99999).'.'.$request->file('ppic'.$i)->getClientOriginalExtension();
				$request->file('ppic'.$i)->move(\Config::get('app.upload_dir2'),$picname);
				$data['ppic'.$i] = ltrim(\Config::get('app.upload_dir2').$picname,'.');  //图片存进表里
			}
			return $data;
			}
		
		
		}

		/*
		删除商品参数
		/admin/parameter/del
		*/

		public function getDel($id){
			//获取要删除的数据
			$data = DB::table('gparameter')->where('id',$id)->first();
			
			//dd($res);
			// 如果数据删除成功,name执行图片的删除
			if(DB::table('gparameter')->where('id',$id)->delete()){
				foreach($data as $k=>$v){
					if(file_exists('.'.$v)){
						unlink('.'.$v);
					}							
				}
				return redirect('/admin/parameter/index')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递参数修改页面
			/admin/parameter/edit
		*/
		public function getEdit($id){
			$list = DB::table('goods')->get();
			$data = DB::table('gparameter')->where('id',$id)->first();
			return view('parameter.edit',['vo'=>$data,'list'=>$list]);
		}

		//自定义图片处理
		public function dealPic($request){
			
			$data = $request->except('_token');
			//
			for($i=1;$i<7;$i++){
				if($request->hasFile('ppic'.$i)){				
					$picname = time().rand(10000,99999).'.'.$request->file('ppic'.$i)->getClientOriginalExtension();
					$request->file('ppic'.$i)->move(\Config::get('app.upload_dir2'),$picname);
					$data['ppic'.$i] = ltrim(\Config::get('app.upload_dir2').$picname,'.');			
				}				
			}
			return $data;
		}

		/*
			执行参数图片的修改
		*/
		public function postUpdate(Request $request){
			//获取请求数据中的图片数据
			$req = $this->dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('gparameter')->where('id',$request->input('id'))->first();

			if(DB::table('gparameter')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<7;$i++){
					if($request->hasFile('ppic'.$i)){
						unlink('.'.$data['ppic'.$i]);
					}
				}
				return redirect('/admin/parameter/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
			
		
			

		}


}

