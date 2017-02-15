<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TyController extends Controller
{
    public function getIndex(){
    	$num=DB::table('tyd')->count();
    	$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
    	return view('tiyandian.index',['links'=>$links,'num'=>$num]);
    }

    public function getSelect(Request $request){ //城市联动
    	$upid=$request->input('upid');
    	$data=DB::table('district')->where('upid',$upid)->get();
    	echo json_encode($data);
    }

    public function getHong(Request $request){  //找出所有经纬度
    	// dd($request->input('q'));
    	$data=DB::table('tyd')->where('sheng',$request->input('sheng'))->get();
    	// dd($data);
    	echo json_encode($data);
    }

    public function getHong1(Request $request){  //找出所有经纬度
    	// dd($request->input('q'));
    	$data=DB::table('tyd')->where('sheng',$request->input('q'))->get();
    	// dd($data);
    	return redirect('/ty/index');
    } 

    public function getPpl(Request $request){
    	$p=$request->input('p');
    	$cou=DB::table('tyd')->count();
    	$maxpage=ceil($cou/5);
    	// dd($maxpage);
    	$size=5;
    	$dqy=($p-1)*$size;
    	
    	$data=DB::table('tyd')->skip($dqy)->take($size)->get();
    	// dd($data);
    	// var_dump($data);
    	echo json_encode($data);
    }   

    //=====================前台详情=====================================

  	public function getXiang($id){
  		$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        $data=DB::table('tyd')->where('id',$id)->first();

        // dd($data);
  		return view('tiyandian.tydxq',['links'=>$links,'list'=>$data]);
  	}

  	public function getXiang1(Request $request){
  		$id=$request->input('tydid');
  		$data=DB::table('tyd')->where('id',$id)->first();
  		echo json_encode($data);
  	}

    //=====================后台==========================================

    public function getAdindex(){
    	return view('tiyandian.adtyd');
    }

    public function getShow(Request $request){
        $key = $request->input('key');
    	$num = $request->input('num');   //每页 显示的最大条数
    	$page = ($request->input('page')-1)*$num; //显示的起始位置
    	$data = DB::table('tyd')->skip($page)->take($num)->where('shi','like','%'.$key.'%')->get();
        $count = DB::table('tyd')->where('shi','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        // dd($data);
        // foreach($data as $k=>$v){
        //     $time=date("Y-m-d H:i:s",$v['addtime']);
        //     $data[$k]['addtime']=$time;
        // }
        $data[count($data)]=$maxpage;

        // dd($data);
    	echo json_encode($data);
    }

    public function postDetail(Request $request){  //查看详细信息
        $id=$request->input('id'); //订单号
        $data=DB::table('tyd')->where('id',$id)->first();
        // dd($id);
        // dd($data);
        echo json_encode($data);                        
    }

    public function postEdit(Request $request){ //修改店面状态
    	// dd($request->input('id'));	
    	$res=DB::table('tyd')->where('id',$request->input('id'))->update(['type'=>$request->input('type')]);
    	if($res){
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }

    public function postEdit1(Request $request){ //修改店面状态
    	// dd($request->input('id'));	
    	$res=DB::table('tyd')->where('id',$request->input('id'))->update(['jobtime'=>$request->input('jobtime')]);
    	if($res){
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }

    public function postDel(Request $request){
    	$res=DB::table('tyd')->where('id',$request->input('id'))->delete();
    	if($res){
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }



    public function getAdd(){
    	return view('tiyandian.add');
    }

    public function getTtt(Request $request){ //插入数据
    	$all=$request->all();
    	// dd($all);
    	$res=DB::table('tyd')->insert($all);
    	if($res){
    		echo 'yes';
    	}
    }










}
