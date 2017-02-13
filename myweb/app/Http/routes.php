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

Route::controller('/admin/login','AdminloginController'); //后台登录模块

Route::group(['middleware'=>'adminlogin'],function(){ //后台路由组

	Route::controller('/orders','OrdersController');  //(后台)订单管理

	Route::get('/admin/index','AdminController@admin');//后台首页

	Route::controller('/admin/user','Usercontroller');	//用户模块


	Route::controller('/admin/guanli','Guanlicontroller');//管理员模块


	Route::controller('/admin/talk','TalkController');// 商品评论模块

	Route::controller('/admin/lunbo','LunboController');  //轮播图模块

	Route::controller('/admin/guanggao','GuanggaoController');  //广告模块

	Route::controller('/admin/links','LinksController');  //链接模块

	Route::controller('/admin/type','TypeController');// 后台分类模块

	Route::controller('/admin/goods','GoodsController');// 后台商品模块

	Route::controller('/admin/detail','DetailController');// 后台商品详情


	Route::controller('/admin/parameter','ParameterController');// 后台商品参数

	Route::controller('/admin/val','ValController');// 后台商品属性

	Route::controller('/home/detail','DetailController');// 前台商品详情

	Route::controller('/admin/guanli','Guanlicontroller');// 管理员模块

	Route::get("/admin/logout","LoginController@logout"); //退出操作

});


Route::controller('/dingdan','DingdanController');  //(前台)订单管理

Route::controller('/home/login','LoginController'); //前台登录模块

Route::post("/home/zhuce","AjaxController@zhuce");//ajax验证注册的账号

Route::post("/home/homelogin","AjaxController@homelogin");//ajax验证登录的账号

Route::post("/home/registeremail","AjaxController@registeremail");//ajax验证注册的邮箱

Route::post("/home/registerphone","AjaxController@registerphone");//ajax验证注册的手机号

Route::post("/home/forget","AjaxController@forget");//ajax验证忘记密码

Route::post("/home/code","AjaxController@code");//ajax验证手机验证码



Route::group(['middleware'=>'login'],function(){ //前台路由组


	Route::get("/home/logout","LoginController@logout"); //退出操作

	Route::post("/home/chongzhi","AjaxController@chongzhi");//ajax重置密码


});

Route::controller('/home','HomeController'); //前台商城主页

Route::get("/home/forget","LoginController@forget"); //忘记密码

Route::controller('/shop','ShopController');  //购物车模块

// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });



