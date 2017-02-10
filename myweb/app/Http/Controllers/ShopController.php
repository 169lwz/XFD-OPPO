<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
	public function postTxie(Request $request){ //在购物车页面点结算的时候 先清空session
		$data=$request->except('_token');
		session(['cart'=>[]]);
		$data['uid']=session('user')['id'];
		$request->session()->push('cart',$data);
		if(!empty(session('cart'))){
			echo 'yes';
		}else{
			echo 'no';
		}
	}

    public function getIndex(){ //购物车遍历
    	$uid=session('user')['id'];
    	$data=DB::table('shop')->where('uid',$uid)->get();
        // dd($data);
    	return view('gouwuche.index',['list'=>$data]);
    }

    public function postRequest(Request $request){ //修改购买数量
        $uid=session('user')['id'];
    	$num=$request->input('num');
    	$id=$request->input('id');
    	$res=DB::table('shop')->where('uid',$uid)->where('id',$id)->update(['num'=>$num]);
    	echo $id;
    }

    public function postDel(Request $request){ //删除购物车中的商品
        $uid=session('user')['id'];
    	$id=$request->input('id');
    	$data=DB::table('shop')->where('uid',$uid)->where('id',$id)->first();
    	$pic=$data['sf'];
    	$res=DB::table('shop')->where('uid',$uid)->where('id',$id)->delete();
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
        $uid=session('user')['id'];
    	$data=DB::table('shop')->where('uid',$uid)->get();
    	$pic=[];
    	foreach($data as $v){
    		$pic[]=$v['sf'];
    	}

    	$res=DB::table('shop')->where('uid',$uid)->delete();
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
        // dd($request->all()['obj']);
        $con0=[];
    	$con=$request->except(['_token']);
        $con1=$con['obj'];
        $con1['uid']=session('user')['id'];
    	// dd($con1);
        // $con0[]=$con1;
    	$data=DB::table('address')->insertGetId($con1);
    	if($data){
            echo 'yes';
    	}
    }

    public function getMyadd(){
        // dd(DB::table('address')->where('uid',session('user')['id'])->get());
        echo json_encode(DB::table('address')->where('uid',session('user')['id'])->get());
    }

    public function postDel1(Request $request){ //删除用户已存在的收货地址
        if(DB::table('address')->where('id',$request->input('id'))->delete()){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postEdit(Request $request){
        $id=$request->input('id');
        $data=DB::table('address')->where('id',$id)->first();
        if($data){
            echo json_encode($data);
        }
    }
}
