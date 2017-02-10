<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/index','AdminController@admin');//后台首页

Route::controller('/orders','OrdersController');   //订单管理

Route::controller('/admin/user','Usercontroller');	//用户模块

Route::controller('/admin/type','TypeController');// 分类模块

Route::controller('/admin/goods','GoodsController');// 商品模块

Route::controller('/admin/talk','TalkController');// 评论模块

Route::controller('/admin/detail','DetailController');// 后台商品详情

Route::controller('/home/detail','DetailController');// 前台商品详情





