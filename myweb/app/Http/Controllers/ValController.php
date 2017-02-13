<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValController extends Controller
{
	/*
		浏览商品属性
		/admin/val/index
	*/
	public function getIndex(Request $request){
		$data = DB::table('goods')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('gname','like','%'.$request->input('keyword').'%')
					  ->orWhere('gcolor','like','%'.$request->input('keyword').'%')
					  ->orWhere('gversion','like','%'.$request->input('keyword').'%')
					  ->orWhere('gmemory','like','%'.$request->input('keyword').'%')
					  ->orWhere('gsize','like','%'.$request->input('keyword').'%');
			}
		})
			->join('gcolor','goods.id','=','gcolor.gid')
			->join('gversion','goods.id','=','gversion.gid')
			->join('gmemory','goods.id','=','gmemory.gid')
			->join('gsize','goods.id','=','gsize.gid')
			->select('goods.gname','goods.pic','gcolor.color','gversion.version','gmemory.memory','gsize.size')
			->paginate($request->input('num',5));
			
		return view('val.index',['list'=>$data,'request'=>$request->all()]);

	}


	//图片处理
	public static function dealPic($request){
			
		$data = $request->except('_token');		
			if($request->hasFile('gpic')){				
				$picname = time().rand(10000,99999).'.'.$request->file('gpic')->getClientOriginalExtension();
				$request->file('gpic')->move(\Config::get('app.upload_dir3'),$picname);
				$data['gpic'] = ltrim(\Config::get('app.upload_dir3').$picname,'.');			
			}
			return $data;				
		}
		
	

//-----------------------------------------------------------------------------------------

    //商品颜色开始
		/*
			商品颜色添加
			/admin/val/addcolor
		*/
		public function getAddcolor(){
			$data =	DB::table('goods')->get();
			return view('val.color.add',['list'=>$data]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsertcolor(Request $request){
			$newdata = self::dealPic($request);
			// dd($newdata);
			if(DB::table('gcolor')->insert($newdata)){
				return redirect('/admin/val/indexcolor')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

		/*
			浏览商品颜色
			/admin/val/indexcolor
		*/
		public function getIndexcolor(Request $request){
			$data = DB::table('gcolor')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'))
						  ->orWhere('color','like',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('val.color.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			删除商品颜色
			/admin/val/delcolor
		*/
		public function getDelcolor($id){
			$data = DB::table('gcolor')->where('id',$id)->first();
			//dd($data);
			
			if(DB::table('gcolor')->where('id',$id)->delete()){

				if(file_exists('.'.$data['gpic'])){
					unlink('.'.$data['gpic']);
				}	
				return redirect('/admin/val/indexcolor')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递修改商品颜色
			/admin/val/editcolor
		*/
		public function getEditcolor($id){
			$data = DB::table('goods')->get();
			$colordata = DB::table('gcolor')->where('id',$id)->first();
			return view('val.color.edit',['list'=>$data,'vo'=>$colordata]);
		}

		/*
			执行修改商品颜色
			/admin/val/updatecolor
		*/
		public function postUpdatecolor(Request $request){
			$newdata = self::dealPic($request);
			$data = DB::table('gcolor')->where('id',$request->input('id'))->first();

			if(DB::table('gcolor')->where('id',$request->input('id'))->update($newdata)){
				if(file_exists('.'.$data['gpic'])){
					unlink('.'.$data['gpic']);
				}
				return redirect('/admin/val/indexcolor')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}

		}


    //商品颜色结束
//-----------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------

	//商品版本开始

		/*
			商品版本添加
			/admin/val/addversion
		*/
		public function getAddversion(){
			$data =	DB::table('goods')->get();
			return view('val.version.add',['list'=>$data]);
		}

		/*
			执行商品版本插入
			/admin/val/insertversion
		*/
		public function postInsertversion(Request $request){
			$newdata = $request->except('_token');
			if(DB::table('gversion')->insert($newdata)){
				return redirect('/admin/val/indexversion')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

		/*
			浏览商品版本
			/admin/val/indexversion
		*/
		public function getIndexversion(Request $request){
			$data = DB::table('gversion')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'))
						  ->orWhere('version','like',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('val.version.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			删除商品版本
			/admin/val/delversion
		*/
		public function getDelversion($id){

			if(DB::table('gversion')->where('id',$id)->delete()){
				return redirect('/admin/val/indexversion')->with('success','删除成功');
			
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递修改商品版本页面
			/admin/val/editversion
		*/
		public function getEditversion($id){
			$data = DB::table('goods')->get();
			$colordata = DB::table('gversion')->where('id',$id)->first();
			return view('val.version.edit',['list'=>$data,'vo'=>$colordata]);
		}

		/*
			执行修改商品颜色
			/admin/val/updateversion
		*/
		public function postUpdateversion(Request $request){
			$newdata = $request->except('_token');

			if(DB::table('gversion')->where('id',$request->input('id'))->update($newdata)){
				return redirect('/admin/val/indexversion')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}

		}

	
	//商品版本结束
//-----------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------

	//商品内存开始

		/*
			商品内存添加
			/admin/val/addmemory
		*/
		public function getAddmemory(){
			$data =	DB::table('goods')->get();
			return view('val.memory.add',['list'=>$data]);
		}

		/*
			执行商品内存插入
			/admin/val/insertmemory
		*/
		public function postInsertmemory(Request $request){
			$newdata = $request->except('_token');
			if(DB::table('gmemory')->insert($newdata)){
				return redirect('/admin/val/indexmemory')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

		/*
			浏览商品内存
			/admin/val/indexmemory
		*/
		public function getIndexmemory(Request $request){
			$data = DB::table('gmemory')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'))
						  ->orWhere('memory','like',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('val.memory.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			删除商品内存
			/admin/val/delmemory
		*/
		public function getDelmemory($id){

			if(DB::table('gmemory')->where('id',$id)->delete()){
				return redirect('/admin/val/indexmemory')->with('success','删除成功');
			
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递修改商品内存页面
			/admin/val/editmemory
		*/
		public function getEditmemory($id){
			$data = DB::table('goods')->get();
			$colordata = DB::table('gmemory')->where('id',$id)->first();
			return view('val.memory.edit',['list'=>$data,'vo'=>$colordata]);
		}

		/*
			执行修改商品内存
			/admin/val/updatememory
		*/
		public function postUpdatememory(Request $request){
			$newdata = $request->except('_token');

			if(DB::table('gmemory')->where('id',$request->input('id'))->update($newdata)){
				return redirect('/admin/val/indexmemory')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}

		}

	
	//商品内存结束
//-----------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------

	//商品尺寸开始

		/*
			商品尺寸添加
			/admin/val/addsize
		*/
		public function getAddsize(){
			$data =	DB::table('goods')->get();
			return view('val.size.add',['list'=>$data]);
		}

		/*
			执行商品尺寸插入
			/admin/val/insertsize
		*/
		public function postInsertsize(Request $request){
			$newdata = $request->except('_token');
			if(DB::table('gsize')->insert($newdata)){
				return redirect('/admin/val/indexsize')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

		/*
			浏览商品尺寸
			/admin/val/indexsize
		*/
		public function getIndexsize(Request $request){
			$data = DB::table('gsize')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->where('gid',$request->input('keyword'))
						  ->orWhere('size','like',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			return view('val.size.index',['list'=>$data,'request'=>$request->all()]);
		}

		/*
			删除商品尺寸
			/admin/val/delsize
		*/
		public function getDelsize($id){

			if(DB::table('gsize')->where('id',$id)->delete()){
				return redirect('/admin/val/indexsize')->with('success','删除成功');
			
			}else{
				return back()->with('error','删除失败');
			}

		}

		/*
			呈递修改商品尺寸页面
			/admin/val/editsize
		*/
		public function getEditsize($id){
			$data = DB::table('goods')->get();
			$sizedata = DB::table('gsize')->where('id',$id)->first();
			return view('val.size.edit',['list'=>$data,'vo'=>$sizedata]);
		}

		/*
			执行修改商品尺寸
			/admin/val/updatesize
		*/
		public function postUpdatesize(Request $request){
			$newdata = $request->except('_token');

			if(DB::table('gsize')->where('id',$request->input('id'))->update($newdata)){
				return redirect('/admin/val/indexsize')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}

		}

	
	//商品尺寸结束
//-----------------------------------------------------------------------------------------


}
