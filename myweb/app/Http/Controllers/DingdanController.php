<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DingdanController extends Controller
{

    public function getD(){
        return view('homeindex.home');
    }

    public function getIndex(){ //所有订单遍历页
        $data=DB::table('orders')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','goods.pic','address.name','address.phone','address.email','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('orders.uid',session('user')['id'])->groupBy('order_num')->orderBy('addtime','desc')->get(); 
        // dd($data);
        return view('dingdan.index',['list'=>$data]);

    }

    public function getAddress(){ //遍历选中的商品清单
        $uid=session('user')['id'];
        // dd(session('user'));
        $data2=[];
        $data3=session('cart')[0]['arr']; //选中购买的购物车id
        foreach($data3 as $v){
            $data2[]=DB::table('shop')->join('goods','goods.id','=','shop.goodsid')->select('shop.*','goods.pic','goods.desc','goods.gname','goods.price')->where('shop.id',$v)->first();
        }
        // dd($data3);
        // dd($data2);
    	return view('txdingdan.index',['arr1'=>$data2]);
    }


    public function postScorders(Request $request){ //生成订单
        $order_num=date('YmdHis',time());//订单号
        session(['order_num'=>[]]);
        session(['order_num'=>$order_num]); //将订单号存入sessio 唯一表示
        $data=session('cart')[0]['arr'];
        session(['address_id'=>[]]);
        $address_id=session(['address_id'=>$request->input('address_id')]);
        foreach($data as $v){
            $arr=DB::table('shop')->where('id',$v)->first();
            // dd($arr);
            $a=DB::table('orders')->insert(['uid'=>session('user')['id'],'addtime'=>time(),'goodsid'=>$arr['goodsid'],'num'=>$arr['num'],'order_num'=>$order_num,'total'=>$request->input('yftotal'),'address_id'=>$request->input('address_id')]);
            if($a){
                $b=DB::table('shop')->where('id',$v)->first();
                $res=DB::table('shop')->where('id',$v)->delete();
            }
        }
        $ss=DB::table('orders')->where('order_num',$order_num)->first();
        if($ss){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postEdit1(Request $request){ //当点击立即支付的时候 改变订单状态
        $res=DB::table('orders')->where('order_num',$request->input('order_num'))->update(['status'=>1]);
        // dd($res);
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postAddressnum(){ //显示'查看更多地址'
        $uid=session('user')['id'];
        $data=DB::table('address')->where('uid',$uid)->count();
        echo $data;
    }

    public function getZhifu(){ 
        return view('zhifu.index');
    }

    public function postXbl(){ //遍历提交订单的订单遍历
        $order_num= session('order_num');//新生成的订单id;
        $address_id= session('address_id'); //提交的收货地址id;
        $data=DB::table('orders')->join('address','address.uid','=','orders.uid')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('order_num',$order_num)->where('address.id',$address_id)->get();
        echo json_encode($data);
    }

    public function postShow(){
        $uid=session('user')['id'];
        // $data=DB::table('orders')->where('uid',session('user')['id'])->groupBy('order_num')->select('order_num')->get();
        $data=DB::select('select order_num,count(*) as count from orders where uid='.$uid.' group by order_num');//分组查询(订单号) 每类订单号有几个商品
        // dd($data);
        echo json_encode($data);
    }

    public function postEdit(Request $request){
        $data=DB::table('orders')->where('order_num',$request->input('order_num'))->update(['status'=>5]);
        if($data){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    //订单详情
    public function getXx($order_num){
        $data=DB::table('orders')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.desc','goods.gname','goods.price','goods.pic','goods.desc')->where('uid',session('user')['id'])->where('order_num',$order_num)->get();
        // dd($data);
        $data1=DB::table('orders')->where('uid',session('user')['id'])->where('order_num',$order_num)->sum('num');
        $data2=DB::table('orders')->join('address','address.id','=','orders.address_id')->select('orders.*','address.name','address.phone','address.email','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('order_num',$order_num)->first(); 
        dd($data1);
        return view('ddxiangqing.index',['list'=>$data,'list1'=>$data2,'list2'=>$data1]);
    }


    //订单个数
    public static function num(){
        $data=DB::table('orders')->where('uid',session('user')['id'])->groupBy('order_num')->get();
        $num=count($data);
        echo $num;
    }










}
