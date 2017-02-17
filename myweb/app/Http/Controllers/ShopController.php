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
		$request->session()->push('cart',$data); //将购买的商品存入session
		if(!empty(session('cart'))){
			echo 'yes';
		}else{
			echo 'no';
		}
	}

    public function postAdd(Request $request){ //从详情页添加到购物车
        // dd(session('user'));
        // die;
        if(empty(session('user'))){
            echo 'no';
            die;
        }
        $ys=$request->input('ys'); //选中的颜色
        $pic=$request->input('pic');//图片
        // dd($pic)
        $id=$request->input('id'); //商品id
        $num=$request->input('num'); //购买数量
        $dt=DB::table('shop')->where('uid',session('user')['id'])->get();
        // dd($dt);
        foreach($dt as $v){
            // dd($v);
            if($id==$v['goodsid'] && $ys==$v['ys']){
                $nnn=DB::table('shop')->where('uid',session('user')['id'])->where('goodsid',$id)->where('ys',$ys)->first();
                    // dd($nnn);
                $data=DB::table('shop')->where('uid',session('user')['id'])->where('goodsid',$id)->where('ys',$ys)->update(['num'=>$num+$nnn['num']]);
                if($data){
                    echo 'yes';
                    die;
                }
            }
        }
         $data=DB::table('shop')->insert(['uid'=>session('user')['id'],'ys'=>$ys,'goodsid'=>$id,'num'=>$num,'addtimes'=>time(),'pic'=>$pic]);
                if($data){
                    echo 'yes';
                }
        
    }

    public function getIndex(){ //购物车遍历
        // dd(session('user'));

    	$uid=session('user')['id'];
    	$data=DB::table('shop')->join('goods','goods.id','=','shop.goodsid')->select('shop.*','shop.pic','goods.desc','goods.gname','goods.price','goods.store')->where('shop.uid',$uid)->get();
        $da=DB::table('ggift')->get();
        foreach($data as &$v){ //一层一层的遍历
            foreach($da as $v1){
                if($v['goodsid']==$v1['gid']){ 
                    $v['zp1'][]=$v1;
                }
            }
        }
        // dd($data);
        $res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
    	return view('gouwuche.index',['list'=>$data,'links'=>$links]);
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
    	$pic=$data['pic'];
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
    		$pic[]=$v['pic'];
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
        $con=$request->except(['_token']);
        $con1=$con['obj'];
        $con1['uid']=session('user')['id'];
        $idzu=DB::table('address')->select('id')->get();
        foreach($idzu as $v){
            if($request->input('add_id')==$v['id']){
                $data=DB::table('address')->where('id',$request->input('add_id'))->update($con1);
                if($data){
                    echo 'yes';
                    return;
                }
            }
        }
            $data=DB::table('address')->insertGetId($con1);
            if($data){
                echo 'yes';
                return;
            }  
    }

    public function getMyadd(){
        // dd(DB::table('address')->where('uid',session('user')['id'])->get());
        // dd(session('user')['id']);
        echo json_encode(DB::table('address')->where('uid',session('user')['id'])->get()); //遍历当前用户的所以收货地址
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

    public static function num(){
        $data=DB::table('shop')->where('uid',session('user')['id'])->count();
        echo $data;
    }


    //在详情也判断购买数量是否超出库存

    public function getNumss(Request $request){
        $id=$request->input('id');
        $data=DB::table('goods')->where('id',$id)->first();
        echo $data['store'];
    }










}
