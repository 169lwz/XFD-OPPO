<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DingdanController extends Controller
{

    public function getIndex(){
        return view('dingdan.index');
    }

    public function getAddress(){ //填写订单地址 前台遍历订单地址
        $uid=session('user')['id'];
        $data1=DB::table('address')->where('uid',$uid)->get();
        // dd(session('user'));
        $data2=[];
        $data3=session('cart')[0]['arr'];
        foreach($data3 as $v){
            $data2[]=DB::table('shop')->where('id',$v)->first();
        }
    	return view('txdingdan.index',['arr'=>$data1,'arr1'=>$data2]);
    }


    public function postScorders(){ //生成订单

        $order_num=date('YmdHis',time());
        $data=session('cart')[0]['arr'];
        foreach($data as $v){
            $arr=DB::table('shop')->where('id',$v)->first();
            // dd($arr);
            $a=DB::table('orders')->insert(['uid'=>session('user')['id'],'addtime'=>time(),'goodsid'=>$arr['goodsid'],'num'=>$arr['num'],'price'=>$arr['price'],'order_num'=>$order_num]);
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
        $ss=DB::table('orders')->where('order_num',$order_num)->first();
        if($ss){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function getZhifu(){
        return view('zhifu.index');
    }









    public static function diqu($id){
        $data=DB::table('district')->where('id',$id)->first();
        // dd($data);
        echo $data['name'];
        // return $data;
    }
}
