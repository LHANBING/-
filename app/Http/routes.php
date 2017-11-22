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
	Route::get('/order/index','OrderController@index');
	Route::get('/order/online','OrderController@online');
	
	//钱袋总进账金额
	Route::resource('/wallet','WalletController');
	//钱袋总支出金额
	Route::resource('/wallets','WalletsController');

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
Route::get('/home/logout','home\HomeLoginController@logout');

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
	Route::get('/info/edit','InfoController@edit');
	Route::post('/info/doedit','InfoController@doedit');
	Route::get('/info/perfect','InfoController@perfect');
	Route::post('/info/doperfect','InfoController@doperfect');
	Route::get('/info/user_change','InfoController@user_change');
	Route::post('/info/douser_change','InfoController@douser_change');


	//地址管理
	Route::resource('/address','AddressController');

	//订单管理
	Route::get('/order/index','OrderController@index');
	Route::post('/order/list','OrderController@list');

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
	//出售订单
	// Route::get('','shouchuOrderController@index');
	//发布二手
	Route::post('/fabu/type','fabuController@type');
	Route::resource('/fabu','fabuController');

	//我的二手
	Route::resource('/myershou','myershouController');
	Route::get('/myersho/xiajia/{id}','myershouController@xiajia');
	Route::get('/myersho/shangjia/{id}','myershouController@shangjia');
	


});




