<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SelectController extends Controller
{
	//呈递列表页面
	public function getShowliebiao(){
		$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();

    	return view('shangcheng.liebiao',['links'=>$links]);
	}
	//搜索手机
    public function getPhoneselect(Request $request){
    	$data = DB::table('type')
    			->join('goods','goods.tid','=','type.id')
    			->join('gdetail','gdetail.gid','=','goods.id')
    			->select('goods.price','gdetail.con','gdetail.pic7','gdetail.color','goods.id')
    			->where('tname',$request->only('tname'))
    			->get();

    	echo json_encode($data);
		
		
    }
}
