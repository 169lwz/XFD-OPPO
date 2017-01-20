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
    	$data = DB::table('orders')->skip($page)->take($num)->where('status','like','%'.$key.'%')->get();

        $count = DB::table('orders')->where('status','like','%'.$key.'%')->count();
    
        $maxpage= ceil($count/$num);
    	$data[count($data)]=$maxpage;
    	echo json_encode($data);
    }
    // public function getDel($id){
    // 	$res=DB::table('orders')->
    // }
}
