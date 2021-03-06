<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DingdanController extends Controller
{

    public function getZbd(){
        return view('errors.zbd');
    }

    public function getD(){
        return view('homeindex.home');
    }

    public function getIndex(){ //所有订单遍历页
        $data=DB::table('orders')->join('gdetail','gdetail.color','=','orders.yanse')->join('address','address.id','=','orders.address_id')->join('goods','goods.id','=','orders.goodsid')->select('gdetail.pic7','orders.*','goods.gname','goods.pic','address.name','address.phone','address.email','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('orders.uid',session('user')['id'])->groupBy('order_num')->orderBy('addtime','desc')->get(); 
        // dd($data);

        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        return view('dingdan.index',['list'=>$data,'links'=>$links]);

    }

    public function getAddress(){ //遍历选中的商品清单  在购物车买
        $uid=session('user')['id'];
        // dd(session('user'));
        $data2=[];
        $data3=session('cart')[0]['arr']; //选中购买的购物车id
        foreach($data3 as $v){
            $data2[]=DB::table('shop')->join('goods','goods.id','=','shop.goodsid')->select('shop.*','goods.desc','goods.gname','goods.price')->where('shop.id',$v)->first();
        }
        // dd($data3);
        // dd($data2);
        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
    	return view('txdingdan.index',['arr1'=>$data2,'links'=>$links]);
    }

    public function getLjgm($id,$color,$num){  //立即购买
        $data=DB::table('goods')->join('gdetail','gdetail.gid','=','goods.id')->select('gdetail.pic7 as pic','goods.id','goods.desc','goods.gname','goods.price','gdetail.color')->where('gdetail.color',$color)->where('goods.id',$id)->get();
        foreach($data as &$v){
            $v['num']=$num;
        } 
        // $data['num']=$num;
        // dd($data);

        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();        
        return view('txdingdan.index1',['arr1'=>$data,'links'=>$links]);
    }


    public function postScorders(Request $request){ //生成订单
        $order_num=date('YmdHis',time());//订单号
        session(['order_num'=>[]]);
        session(['order_num'=>$order_num]); //将订单号存入sessio 唯一表示
        session(['address_id'=>[]]);
        session(['address_id'=>$request->input('address_id')]);
        if(empty(session('cart'))){
            echo 'no';
            die;
        }
        $data=session('cart')[0]['arr'];
        // dd($data);

        foreach($data as $v){
            $arr=DB::table('shop')->where('id',$v)->first();
            // dd($arr);
            $a=DB::table('orders')->insert(['uid'=>session('user')['id'],'addtime'=>time(),'goodsid'=>$arr['goodsid'],'num'=>$arr['num'],'order_num'=>$order_num,'total'=>$request->input('yftotal'),'address_id'=>$request->input('address_id'),'yanse'=>$arr['ys'],'pic'=>$arr['pic']]);
            if($a){
                $b=DB::table('shop')->where('id',$v)->first();
                $res1=DB::table('shop')->where('id',$v)->delete();
            }
        }
        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        $ss=DB::table('orders')->where('order_num',$order_num)->first();
        if($ss){
            session(['cart'=>[]]);
            echo 'yes';
        }else{
            echo 'no';
        }
    }


    public function postScorders1(Request $request){ //生成订单
        $order_num=date('YmdHis',time());//订单号
        session(['order_num'=>[]]);
        session(['order_num'=>$order_num]); //将订单号存入sessio 唯一表示
        session(['address_id'=>[]]);
        session(['address_id'=>$request->input('address_id')]);

        $all=$request->except(['_token']);
        // dd($all);
        $zou=DB::table('orders')->insert(['uid'=>session('user')['id'],'addtime'=>time(),'goodsid'=>$all['goodsid'],'num'=>$all['num'],'order_num'=>$order_num,'total'=>$all['yftotal'],'address_id'=>$all['address_id'],'yanse'=>$all['color'],'pic'=>$all['pic']]);
        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        $ss=DB::table('orders')->where('order_num',$order_num)->first();
        if($ss){
            echo 'yes';
        }else{
            echo 'no';
        }
    }    



    public function postEdit1(Request $request){ //当点击立即支付的时候 改变订单状态
        $res=DB::table('orders')->where('uid',session('user')['id'])->where('order_num',$request->input('order_num'))->update(['status'=>1]);
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
        $data=DB::table('orders')->join('address','address.uid','=','orders.uid')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.desc','goods.gname','address.name','address.phone','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('order_num',$order_num)->where('address.id',$address_id)->where('orders.uid',session('user')['id'])->get();
        $dt=DB::table('ggift')->get(); //赠品信息
        $dt1=DB::table('gdetail')->join('goods','goods.id','=','gdetail.gid')->join('orders','orders.yanse','=','gdetail.color')->where('order_num',$order_num)->get();

        foreach($data as &$v){
            foreach($dt as $v1){
                if($v['goodsid']==$v1['gid']){
                    $v['zp1'][]=$v1['gift'];
                }                
            }
            foreach($dt1 as &$v2){
                if($v['yanse']==$v2['color']){
                    $v['yanse1']=$v2['pic7'];
                }
            }
        }
        // dd($data);
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
        $id=DB::table('orders')->select('yanse')->where('uid',session('user')['id'])->where('order_num',$order_num)->get(); //某个订单号的商品id组 
          $data=DB::table('orders')->join('goods','goods.id','=','orders.goodsid')->select('orders.*','goods.desc','goods.gname','goods.price')->where('order_num',$order_num)->where('orders.uid',session('user')['id'])->get();  

          $aa=DB::table('ggift')->get();
          foreach($data as &$v){
            foreach($aa as &$v1){
                if($v['goodsid']==$v1['gid']){
                    $v['zp1'][]=$v1;
                }
            }
          }
          // dd($data);
        $data1=DB::table('orders')->where('uid',session('user')['id'])->where('order_num',$order_num)->sum('num');
        $data2=DB::table('orders')->join('address','address.id','=','orders.address_id')->select('orders.*','address.name','address.phone','address.email','address.sheng1','address.shi1','address.xian1','address.jiedao1','address.xiangxi')->where('order_num',$order_num)->first(); 
        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
        return view('ddxiangqing.index',['list'=>$data,'list1'=>$data2,'list2'=>$data1,'links'=>$links]);
    }


    //订单个数
    public static function num(){
        $data=DB::table('orders')->where('uid',session('user')['id'])->groupBy('order_num')->get();
        $num=count($data);
        echo $num;
    }

    //前台用户修改确认收货
    public function postXiu(Request $request){
        $uid=session('user')['id'];
        $order_num=$request->input('order_num');
        $res=DB::table('orders')->where('uid',$uid)->where('order_num',$order_num)->update(['status'=>3]);
        if($res){
            echo $order_num;
        }else{
            echo 'no';
        }
    }
}
