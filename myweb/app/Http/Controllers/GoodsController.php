<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
   /*
	商品浏览
	/admin/goods/index
   */
  public function getIndex(Request $request){
    //模型类实现数据查找
    $data = DB::table('goods')->where(function($query) use($request){
      if($request->input('keyword')!=null){
        $query->where('gname','like','%'.$request->input('keyword').'%');
      }
    })->paginate($request->input('num',5));

    //查询所有商品
    return view('goods.index',['list'=>$data,'request'=>$request->all()]);

  }

	/*
	呈递商品添加表单
	/admin/goods/add
	*/
  public function getAdd(){
    return view('goods.add',['list'=>TypeController::getData()]);
  }
  
  /*
  	执行商品添加
  	admin/goods/insert
  */
  public function postInsert(Request $request){
      //实例化数据模型
      $g = new Goods;

      //数据处理
      $g = $this -> dealData($request,$g);

      //执行数据插入 (返回的布尔值)
      if($g -> save()){
        return redirect('/admin/detail/add')->with('success','添加成功');
      }else{
        return back()->with('error','添加失败');
      }
  }

  //自定义数据注入方法
  public function dealData($request,$g){
    //数据注入 ->将表单中的数据注入到对象中
    $g->id=$request->input('id');
    $g->tid=$request->input('tid');
    $g->gname=$request->input('gname');
    $g->pic=$request->input('pic');
    $g->price=$request->input('price');
    $g->desc=$request->input('desc');
    $g->store=$request->input('store');
    $g->status=$request->input('status');// 1 新上架 2 在售 3 下架

    //上传商品主图
    if($request->hasFile('pic')){
      //封装主图的保存名称
      $picname = time().rand(10000,99999).'.'.$request->file('pic')->getClientOriginalExtension();
     
      //执行图片上传
      $request->file('pic')->move(\Config::get('app.upload_dir'),$picname);

      //封装图片的路径
      $g -> pic = trim(\Config::get('app.upload_dir').$picname,'.');
    }

    return $g;

  }

  /*
    商品删除
    /admin/goods/del
  */
  public function getDel($id){
    //查找$id商品数据
    $g = Goods::findOrFail($id);//非关系型数据库, 找不到商品自动加载404页面
      // dd($g['pic']);
      if(file_exists('.'.$g['pic'])){
        unlink('.'.$g['pic']);
    }
      //执行删除该商品
      if($g->delete()){
        return redirect('/admin/goods/index')->with('success','删除成功');
      }else{
        return back()->with('error','删除失败');
      }
  }


  /*
  呈递商品修改模板
  /admin/goods/edit
  */
  public function getEdit($id){
    $g = Goods::findOrFail($id);
    return view('goods.edit',['vo'=>$g,'list'=>TypeController::getData()]);
  }

  /*
    商品修改
    /admin/goods/update
  */
  public function postUpdate(Request $request){
    // 获取请求数据     
    $data =$request->except('_token');
    if($request->hasFile('pic')){

        //删除原有的商品图片
        unlink('.'.DB::table('goods')->where('id',$request->input('id'))->first()['pic']);
        //封装新图片的保存路径
        $picname = time().rand(10000,99999).'.'.$request->file('pic')->getClientOriginalExtension();
        $request->file('pic')->move(\Config::get('app.upload_dir'),$picname);
        $data['pic'] = ltrim(\Config::get('app.upload_dir').$picname,'.');  //图片存进表里      
    }
    //执行修改
    $res = DB::table('goods')->where('id',$request->input('id'))->update($data);
       
    if($res){
      return redirect('/admin/goods/index')->with('success','修改成功');
    }else{
      return back()->with('error','修改失败');
    }
  }
   
}
