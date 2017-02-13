<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getIndex(){
    	return view('orders.index');
    }

    //订单回收站
    public function getIndex1(){
        return view('orders.index1');
    }

    public function getShow(Request $request){
        $key = $request->input('key');
    	$num = $request->input('num');   //每页 显示的最大条数
    	$page = ($request->input('page')-1)*$num; //显示的起始位置
    	$data = DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->skip($page)->take($num)->where('recycle',0)->where('order_num','like','%'.$key.'%')->groupBy('order_num')->get();
        $count = DB::table('orders')->where('order_num','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        foreach($data as $k=>$v){
            $time=date("Y-m-d H:i:s",$v['addtime']);
            $data[$k]['addtime']=$time;
        }
        $data[count($data)]=$maxpage;

        // dd($data);
    	echo json_encode($data);
    }


    public function getShow1(Request $request){
        $key = $request->input('key');
        $num = $request->input('num');   //每页 显示的最大条数
        $page = ($request->input('page')-1)*$num; //显示的起始位置
        $data = DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->skip($page)->take($num)->where('recycle',1)->where('order_num','like','%'.$key.'%')->groupBy('order_num')->get();
        $count = DB::table('orders')->where('order_num','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        foreach($data as $k=>$v){
            $time=date("Y-m-d H:i:s",$v['addtime']);
            $data[$k]['addtime']=$time;
        }
        $data[count($data)]=$maxpage;

        // dd($data);
        echo json_encode($data);
    }

    public function postEdit(Request $request){
        $id= $request->input('editid');
        $val=$request->input('editval');
        $res= DB::table('orders')->where('id',$id)->update(['status'=>$val]);
        if($res>0){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postDetail(Request $request){
        $id=$request->input('order_num'); //订单号
        $data = DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','goods.price','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('orders.order_num',$id)->get();
        
        // dd($data);
        echo json_encode($data);                        
    }

    public function postDel(Request $request){
        $id=$request->input('id');//订单号
        $res=DB::table('orders')->where('order_num',$id)->update(['recycle'=>1]);
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }
}