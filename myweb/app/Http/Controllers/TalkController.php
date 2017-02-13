<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TalkController extends Controller
{
   
    /*
		查看评论
		/admin/talk/index
    */
    public function getIndex(){
    //获取表中的数据
    $res = DB::table('talk')->get();
    return view('talk.index',['list'=>$res]);
    }

    /*
		呈递回复评论页面
		/admin/talk/replay
    */
}
