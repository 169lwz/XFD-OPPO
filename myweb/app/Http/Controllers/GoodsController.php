<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
   public function getAdd(){
   
   	return view('goods.add');
   } 
}
