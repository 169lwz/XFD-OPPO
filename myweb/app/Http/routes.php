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


Route::get('/admin/index','AdminController@admin');//后台首页

//用户模块
Route::controller('/admin/user','Usercontroller');

Route::controller('/admin/type','TypeController');// 分类模块

Route::controller('/admin/goods','GoodsController');// 商品模块

