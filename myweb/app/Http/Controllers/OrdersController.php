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
    	$data = DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->join('user','user.id','=','orders.uid')->select('orders.*','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi','user.username')->skip($page)->take($num)->where('recycle1',0)->where('order_num','like','%'.$key.'%')->orderBy('orders.addtime')->groupBy('order_num')->groupBy('uid')->get();
        $count = DB::table('orders')->where('order_num','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        // dd($data);
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
        $data = DB::table('orders')->join('user','user.id','=','orders.uid')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi','user.username')->skip($page)->take($num)->where('recycle1',1)->where('order_num','like','%'.$key.'%')->groupBy('order_num')->groupBy('uid')->orderBy('orders.addtime')->get();
        $count = DB::table('orders')->where('order_num','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        // dd($data);
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
        $uid=$request->input('uid');
        $res= DB::table('orders')->where('uid',$uid)->where('order_num',$id)->update(['status'=>$val]);
        // dd($id);
        if($res>0){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postDetail(Request $request){
        $id=$request->input('order_num'); //订单号
        $uid=$request->input('uid'); //用户id
        $data = DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','goods.price','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('orders.uid',$uid)->where('orders.order_num',$id)->get();
        // dd($id);
        // dd($data);
        echo json_encode($data);                        
    }

    public function postDel(Request $request){
        $id=$request->input('id');//订单号
        $uid=$request->input('uid'); //用户id
        $res=DB::table('orders')->where('uid',$uid)->where('order_num',$id)->update(['recycle1'=>1]);
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postDel1(Request $request){
        $id=$request->input('id');//订单号
        $uid=$request->input('uid'); //用户id
        $res=DB::table('orders')->where('order_num',$id)->where('uid',$uid)->delete();
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

}