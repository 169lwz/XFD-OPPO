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
    	return view('peisongdizhi.index',['list'=>$data]);
    }
}
