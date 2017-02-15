<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function admin(){
    	// $res = session('adminuser')['username'];

    	// return view('layout.adminindex',['res'=>$res]);
    	return view('layout.adminindex');
    }
}
