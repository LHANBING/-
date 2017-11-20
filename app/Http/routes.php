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
	Route::get('/user/status/{status}/{id}','UserController@status');

	//管理员用户列表
	Route::resource('/manager','ManagerController');

	//分类子分类
	Route::get('/typechild/add','TypechildController@add');
	Route::resource('/typechild','TypechildController');

	//分类父分类列表
	Route::resource('/type','TypeController');

	//订单列表
	Route::resource('/order','OrderController');

	//钱袋已售出订单
	Route::resource('/wallet','WalletController');

	//广告列表
	Route::resource('/advs','AdvsController');
	

	//友情链接列表
	Route::resource('/friendlink','FriendLinkController');
	

});



//前台首页
Route::get('/','home\IndexController@index');

//进入前台注册页面
Route::post('/home/register/phone','home\HomeRegisterController@phone');
Route::resource('/home/register','home\HomeRegisterController');

//进入前台登录页面
Route::resource('/home/login','home\HomeLoginController');


//进入前台密码修改页面
Route::post('/home/change/phone','home\HomeChangeController@phone');
Route::resource('/home/change','home\HomeChangeController');



//个人中心
Route::group(['prefix'=>'home/center','namespace'=>'home\center'],function(){
	//个人中心主页
	Route::get('index','IndexController@index');
	//个人信息
	Route::get('/info/index','InfoController@index');
	Route::post('/info/edit','InfoController@edit');
	//地址管理
	Route::resource('/address','AddressController');
	//订单管理
	Route::get('/order/index','OrderController@index');
	//退换货
	Route::get('/change/index','ChangeController@index');
	//账单
	Route::get('/bill/index','BillController@index');
	Route::get('/bill/in','BillController@in');
	Route::get('/bill/out','BillController@out');
	//收藏
	Route::get('/collection/index','CollectionController@index');
	//足迹
	Route::get('/foot/index','FootController@index');
	//评论
	Route::get('/comment/index','CommentController@index');
	//消息
	Route::get('/news/index','NewsController@index');

});




