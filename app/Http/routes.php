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
Route::get('/code','AdminLoginController@code');

//进入后台首页
Route::group(['prefix'=>'admin'],function(){
	//后台首页
	Route::get('/index','AdminController@index');

	//用户列表
	Route::get('/user/index','UserController@index');
	//用户添加
	Route::get('/user/add','UserController@add');

	//管理员用户列表
	Route::get('/manager/index','ManagerController@index');
	//管理员用户添加
	Route::get('/manager/add','ManagerController@add');

	//分类父分类列表
	Route::get('/type/father','TypeController@father');
	//分类子分类
	Route::get('/type/son','TypeController@son');

	//订单列表
	Route::get('/order/index','OrderController@index');

	//地址列表
	Route::get('/address/index','AddressController@index');

	//钱袋已售出订单
	Route::get('/wallet/index','WalletController@index');
	//售后
	Route::get('/wallet/service','WalletController@service');

	//广告列表
	Route::get('/advs/index','AdvsController@index');
	//广告添加
	Route::get('/advs/add','AdvsController@add');

	//友情链接列表
	Route::get('/friendlink/index','FriendLinkController@index');
	//友情链接添加
	Route::get('/friendlink/add','FriendLinkController@add');

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









