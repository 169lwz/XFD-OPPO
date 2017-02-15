<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TyController extends Controller
{
    public function getIndex(){
    	$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
    	return view('tiyandian.index',['links'=>$links]);
    }

    public function getSelect(Request $request){
    	$upid=$request->input('upid');
    	$data=DB::table('district')->where('upid',$upid)->get();
    	echo json_encode($data);
    }



    //=====================后台==========================================

    public function getAdindex(){
    	return view('tiyandian.adtyd');
    }

    public function getAdd(){
    	return view('tiyandian.add');
    }

    public function getTtt(Request $request){ //插入数据
    	$all=$request->all();
    	// dd($all);
    	$res=DB::table('tyd')->insert($all);
    	if($res){
    		echo 'yes';
    	}
    }

}
