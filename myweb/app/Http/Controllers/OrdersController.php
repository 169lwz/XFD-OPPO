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

    public function getShow(Request $request){
        $key = $request->input('key');
    	$num = $request->input('num');   //每页 显示的最大条数
    	$page = ($request->input('page')-1)*$num; //显示的起始位置
    	$data = DB::table('orders')->skip($page)->take($num)->where('username','like','%'.$key.'%')->get();
        $count = DB::table('orders')->where('username','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        foreach($data as $k=>$v){
            $time=date("Y-m-d H:i:s",$v['addtime']);
            $data[$k]['addtime']=$time;
        }
        $data[count($data)]=$maxpage;
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
        $id=$request->input('id');
        $data=DB::table('orders')
                                ->join('detail','orders.id','=','detail.orderid')
                                ->join('goods','detail.goodsid','=','goods.id')
                                ->join('type','goods.typeid','=','type.id')    
                                ->select('orders.username','orders.address','orders.phone','detail.nam','detail.num','detail.price','type.tname')
                                ->where('orders.id','=',$id)
                                ->get(); 
        echo json_encode($data);                        
    }

    public function postDel(Request $request){
        $id=$request->input('id');
        $res=DB::table('orders')->where('id',$id)->delete();
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }
}