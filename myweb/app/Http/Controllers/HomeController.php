<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex(){
    	return view('home.index');
    }

    /*
		呈递商城页面
		/home/shangcheng
    */
	public function getShangcheng(){
		$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
     
    

       
         $data = DB::table('goods')
               ->join('type','type.id','=','goods.tid')
               ->join('gdetail','goods.id','=','gdetail.gid')
               ->select('type.tname','goods.id','goods.price','gdetail.con','gdetail.pic7','gdetail.color')         
               ->get();

                
       
		return view('shangcheng.index',['links'=>$links,'list'=>$data]);
	}

    
}
