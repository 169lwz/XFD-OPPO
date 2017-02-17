<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
   //前台详情

		/*
			ajax实现选择颜色切换图片
			/admin/detail/indexj
		*/
		public function postIndexqj(Request $request){
			$req = $request->except('_token');
			
			$data = DB::table('goods')
				  ->where('goods.id',$req['id'])->where('color',$req['color'])
				  ->join('gdetail','gdetail.gid','=','goods.id')
				  ->join('gparameter','gparameter.gid','=','goods.id')
				  ->select('goods.desc','gdetail.*')
				  ->first();

				  echo json_encode($data);
			}


	    /*
		呈递商品详情页面
		/home/detail/indexq
	    */
		public function getIndexq($id,$color){

			$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        	$links = $res->getLinksarr();
			
			// dd($id,$color);
			// $goodsdata = DB::table('goods')->where('id',$id)->first();						
			$gversion = DB::table('gversion')->where('gid',$id)->get();
			$gmemory = DB::table('gmemory')->where('gid',$id)->get();
			// $name = DB::table('gdetail')->where('gid',$id)->where('color',$color)->first();
			$gcolor = DB::table('gdetail')->where('gid',$id)->get();
			$gparameter = DB::table('gparameter')->where('gid',$id)->get();
			$gdetail = DB::table('gdetail')->where('gid',$id)->where('color',$color)->get();
			$ggift = DB::table('ggift')->where('gid',$id)->get();
			// dd($id,$color);
			$data = DB::table('goods')					
				->join('gdetail','goods.id','=','gdetail.gid')						
				->select('goods.*','gdetail.color','gdetail.con','gdetail.pic7')
				->where('goods.id',$id)->where('color',$color)
				->get();
			 // dd($data);
			$newdata=$data[0];
			return view('detailq.index',[
				'data'=>$newdata,
				'detail'=>$gdetail,
				'parameter'=>$gparameter,
				'color'=>$gcolor,
				'memory'=>$gmemory,
				'version'=>$gversion,
				'gift'=>$ggift,
				'links'=>$links
				
				]);
		}


//------------------------------------------------------------------------------------------------
	//后台详情
		/*
			呈递详情浏览页面
			/admin/detail/indexh
		*/
		

		public function getIndexh(Request $request){
			// dd($request->all());
			// 获取图片数据	
			$data = DB::table('gdetail')->where(function($query) use($request){
				if($request->input('keyword')!=null){
					$query->orWhere('color','like',$request->input('keyword'));
				}
			})->paginate($request->input('num',5));
			
			return view('detailh.index',['list'=>$data,'request'=>$request->all()]);
		}

		//获取商品名称
		public static function getGname($gid){
			$gname = DB::table('goods')->where('id',$gid)->first()['gname'];
			return $gname;
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
			// dd($request->all());
			$pic = $this->dealPic($request);
			// dd($pic);
			// $pic['gid'] = $request->input('gid');
			// unset($pic['id']);
			// dd($pic);
			if(DB::table('gdetail')->insert($pic)){
				return redirect('/admin/detail/indexh')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');

			}

		}

		// //自定义图片处理
		// public function dealRequest($request){
		// // dd($request->all());
		// $data = $request->except('_token');

		// // dd($data);
		// //如果有图片上传
		// for($i=1;$i<8;$i++){
		// 	if($request->hasFile('pic'.$i)){			
		// 		$picname = time().rand(10000,99999).'.'.$request->file('pic'.$i)->getClientOriginalExtension();
		// 		$request->file('pic'.$i)->move(\Config::get('app.upload_dir1'),$picname);
		// 		$data['pic'.$i] = ltrim(\Config::get('app.upload_dir1').$picname,'.');  //图片存进表里
		// 	}
		// }
		// return $data;
		
		// }

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
			for($i=1;$i<8;$i++){
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
				for($i=1;$i<8;$i++){
					if($request->hasFile('pic'.$i)){
						unlink('.'.$data['pic'.$i]);
					}
				}
				return redirect('/admin/detail/indexh')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}

		public function getIndex() {
			echo 1;
		}
}
