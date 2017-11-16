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
Route::get('admin/login','AdminLoginController@login');
//处理后台登录
Route::post('/admin/dologin','AdminLoginController@dologin');
//验证码
Route::get('/admin/code','AdminLoginController@code');

//进入后台首页
Route::group([],function(){
	//后台首页
	Route::get('/admin/index','AdminController@index');

	//用户列表
	Route::get('/admin/user/index','UserController@index');
	//用户添加
	Route::get('/admin/user/add','UserController@add');

	//管理员用户列表
	Route::get('/admin/manager/index','ManagerController@index');
	//管理员用户添加
	Route::get('/admin/manager/add','ManagerController@add');

	//分类父分类列表
	Route::get('/admin/type/father','TypeController@father');
	//分类子分类
	Route::get('/admin/type/son','TypeController@son');

	//订单列表
	Route::get('/admin/order/index','OrderController@index');

	//地址列表
	Route::get('/admin/address/index','AddressController@index');

	//钱袋已售出订单
	Route::get('/admin/wallet/index','WalletController@index');
	//售后
	Route::get('/admin/wallet/service','WalletController@service');

	//广告列表
	Route::get('/admin/advs/index','AdvsController@index');
	//广告添加
	Route::get('/admin/advs/add','AdvsController@add');

	//友情链接列表
	Route::get('/admin/friendlink/index','FriendLinkController@index');
	//友情链接添加
	Route::get('/admin/friendlink/add','FriendLinkController@add');

});


//进入前台登录
Route::get('/home/login','HomeLoginController@login');
//处理前台登录
Route::post('/home/dologin','HomeLoginController@dologin');
//进入注册页面
Route::get('/home/register','HomeLoginController@register');


/*//进入前台首页
Route::group([],function(){
	//前台首页
	Route::get('home/index','HomeController@index');

});*/









