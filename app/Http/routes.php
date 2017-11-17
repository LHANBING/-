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

//进入后台登录
Route::get('admin/login','admins\AdminLoginController@login');

//忘了密码可以这样添加管理员
Route::get('mima','admins\AdminLoginController@mima');

//处理后台登录
Route::post('/admin/dologin','admins\AdminLoginController@dologin');
//验证码
Route::get('/code','admins\AdminLoginController@code');

//进入后台首页
Route::group(['middleware'=>'adminlogin','prefix'=>'admin','namespace'=>'admins'],function(){
	//后台首页
	Route::resource('/','AdminController');

	//用户
	Route::resource('/user','UserController');

	//管理员用户列表
	Route::resource('/manager','ManagerController');

	//分类父分类列表
	Route::resource('/type','TypeController');

	//分类子分类
	Route::resource('/typechild','TypechildController');

	//订单列表
	Route::resource('/order','OrderController');

	//钱袋已售出订单
	Route::resource('/wallet','WalletController');

	//广告列表
	Route::resource('/advs','AdvsController');
	

	//友情链接列表
	Route::resource('/friendlink','FriendLinkController');
	

});


//进入前台登录
Route::get('/home/login','HomeLoginController@login');
//处理前台登录
Route::post('/home/dologin','HomeLoginController@dologin');
//进入注册页面
Route::get('/home/register','HomeLoginController@register');

Route::post('/home/doregister','HomeLoginController@doregister');



//个人中心
Route::get('/home/center/index','HomeCenterController@index');
Route::get('/home/center/info','HomeCenterController@info');

//前台订单管理页面
Route::resource('/home/order','HomeOrderController');







