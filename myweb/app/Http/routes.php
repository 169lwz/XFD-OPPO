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

Route::controller('/orders','OrdersController');   //(后台)订单管理

Route::controller('/dingdan','DingdanController');  //(前台)订单管理

Route::controller('/admin/user','Usercontroller');	//用户模块

Route::controller('/admin/type','TypeController');// 分类模块

Route::controller('/admin/goods','GoodsController');// 商品模块

Route::controller('/home','HomeController');   //前台首页

Route::controller('/shop','ShopController');  //购物车模块

// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });