<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
	public function postTxie(Request $request){
		$data=$request->except('_token');
		session(['cart'=>[]]);
		$data['username']='admin';
		$request->session()->push('cart',$data);
		if(!empty(session('cart'))){
			echo 'yes';
		}else{
			echo 'no';
		}
	}

    public function getIndex(){ //购物车遍历
    	$reckon=0;
    	$data=DB::table('shop')->where('username','admin')->where('status',1)->get();
    	foreach($data as $v){
    		$reckon+=$v['num'];
    	}
    	return view('gouwuche.index',['list'=>$data]);
    }

    public function postRequest(Request $request){ //修改购买数量
    	$num=$request->input('num');
    	$id=$request->input('id');
    	$res=DB::table('shop')->where('username','admin')->where('id',$id)->update(['num'=>$num]);
    	echo $id;
    }

    public function postDel(Request $request){ //删除购物车中的商品
    	$id=$request->input('id');
    	$data=DB::table('shop')->where('username','admin')->where('id',$id)->first();
    	$pic=$data['sf'];
    	$res=DB::table('shop')->where('username','admin')->where('id',$id)->delete();
    	if($res){
    		if(file_exists('./image/'.$pic)){
    			unlink('./image/'.$pic);
    		}
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }

    public function postClear(Request $request){
    	$username=$request->input('username');
    	$data=DB::table('shop')->where('username',$username)->get();
    	$pic=[];
    	foreach($data as $v){
    		$pic[]=$v['sf'];
    	}

    	$res=DB::table('shop')->where('username',$username)->delete();
    	if($res){
    		foreach($pic as $v1){
    			if(file_exists('./image/'.$v1)){
    				unlink('./image/'.$v1);
    			}
    		}
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }


    public function postSite(Request $request){ //城级联动
    	$upid=$request->input('upid');
    	$data=DB::table('district')->where('upid',$upid)->get();
    	// dd($data);
    	echo json_encode($data);
    }

    public function postBiao(Request $request){ //将填写的地址插入表里
    	$con=$request->except(['_token']);
    	// dd($con);
    	$data=DB::table('address')->insert($con);
    	if($data){
    		echo 'yes';
    	}else{
    		echo 'no';
    	}
    }
}
