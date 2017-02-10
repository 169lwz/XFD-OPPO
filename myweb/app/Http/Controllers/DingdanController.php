<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DingdanController extends Controller
{
    public function getAddress(){ //填写订单地址
    	$code=date('YmdHis',time());
    	$data=session('cart')[0]['arr'];
    	foreach($data as $v){
    		$arr=DB::table('shop')->where('id',$v)->first();
    		// dd($arr);
    		$a=DB::table('orders')->insert(['uid'=>1,'addtime'=>time(),'goodsid'=>$arr['goodsid'],'num'=>$arr['num'],'price'=>$arr['price'],'code'=>$code]);
    		if($a){
    			$b=DB::table('shop')->where('id',$v)->first();
    			$pic=$b['sf'];
    			$res=DB::table('shop')->where('id',$v)->delete();
    			if($res){
    				if(file_exists('./image/'.$pic)){
    					unlink('./image/'.$pic);
    				}
    			}
    		}
    	}
    	return view('txdingdan.index');
    }

    // public function 
}
