<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function getMyaddress(){
    	$data=DB::table('address')->where('uid',session('user')['id'])->get();
    	$res = new LinksController();  //调用LinksController控制器里的自定义getLinksarr()方法
        $links = $res->getLinksarr();
    	return view('peisongdizhi.index',['list'=>$data,'links'=>$links]);
    }
}
