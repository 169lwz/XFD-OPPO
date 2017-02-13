<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
	//前台详情

	    /*
		呈递商品详情页面
		/home/detail/indexq
	    */
		public function getIndexq($id){
			$data = Goods::findOrFail($id);
			// $data =DB::table('goods')->where('id',$id)->first();
			//dd($data);
			return view('detailq.index',['v'=>$data]);
		}


	//后台详情
		/*
			呈递详情浏览页面
			/admin/detail/indexh
		*/
		public function getIndexh(Request $request){
			//获取图片数据
			$data = DB::table('gdetail')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('detailh.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			呈递详情添加页面
			/admin/detail/add
		*/
		public function getAdd(){
			$data = DB::table('goods')->get();
			return view('detailh.add',['list'=>$data]);
		}

		/*
			执行详情添加
			/admin/detail/insert
		*/

		public function postInsert(Request $request){
			//图片处理的结果
			$pic = $this->dealRequest($request);
			$pic['gid'] = $request->input('gid');
			unset($pic['id']);
			// dd($pic);
			if(DB::table('gdetail')->insert($pic)){
				return redirect('/admin/detail/indexh')->with('success','添加成功');
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
		if($request->hasFile('pic1') || $request->hasFile('pic2') || $request->hasFile('pic3') || $request->hasFile('pic4') || $request->hasFile('pic5') || $request->hasFile('pic6')){
			
			for($i=1;$i<7;$i++){
				$picname = time().rand(10000,99999).'.'.$request->file('pic'.$i)->getClientOriginalExtension();
				$request->file('pic'.$i)->move(\Config::get('app.upload_dir1'),$picname);
				$data['pic'.$i] = ltrim(\Config::get('app.upload_dir1').$picname,'.');  //图片存进表里
			}
			return $data;
			}
		
		
		}

		/*
		删除商品详情
		/admin/detail/del
		*/

		public function getDel($id){
			//获取要删除的数据
			$data = DB::table('gdetail')->where('id',$id)->first();
			//dd($res);
			// 如果数据删除成功,name执行图片的删除
			if(DB::table('gdetail')->where('id',$id)->delete()){
				foreach($data as $k=>$v){
					if(file_exists('.'.$v)){
						unlink('.'.$v);
					}							
				}
				return redirect('/admin/detail/indexh')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递详情修改页面
			/admin/detail/edit
		*/
		public function getEdit($id){
			$list = DB::table('goods')->get();
			$data = DB::table('gdetail')->where('id',$id)->first();
			return view('detailh.edit',['vo'=>$data,'list'=>$list]);
		}

		//自定义图片处理
		public function dealPic($request){
			
			$data = $request->except('_token');
			//
			for($i=1;$i<7;$i++){
				if($request->hasFile('pic'.$i)){				
					$picname = time().rand(10000,99999).'.'.$request->file('pic'.$i)->getClientOriginalExtension();
					$request->file('pic'.$i)->move(\Config::get('app.upload_dir1'),$picname);
					$data['pic'.$i] = ltrim(\Config::get('app.upload_dir1').$picname,'.');			
				}				
			}
			return $data;
		}

		/*
			执行详情图片的修改
		*/
		public function postUpdate(Request $request){
			//获取请求数据中的图片数据
			$req = $this->dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('gdetail')->where('id',$request->input('id'))->first();

			if(DB::table('gdetail')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<7;$i++){
					if($request->hasFile('pic'.$i)){
						unlink('.'.$data['pic'.$i]);
					}
				}
				return redirect('/admin/detail/indexh')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
			
		
			

		}


}
