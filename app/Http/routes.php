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
    // 用户的状态改变
	Route::get('/user/status/{status}/{id}','UserController@status');
	// 用户的删除
	Route::post('/user/delete','UserController@delete');

	//执行管理员修改页面
	Route::post('/manager/doedit','ManagerController@doedit');
	//管理员修改头像页面
	Route::get('/manager/editpic','ManagerController@editpic');
	
	//管理员退出
	Route::get('/manager/logout','ManagerController@logout');
	//管理员用户列表
	Route::resource('/manager','ManagerController');


	//分类子分类
	Route::get('/typechild/add','TypechildController@add');
	Route::get('/typechild/shows','TypechildController@shows');
	Route::resource('/typechild','TypechildController');

	//分类父分类列表
	Route::resource('/type','TypeController');

	//订单列表
	Route::get('/order/index','OrderController@index');
	Route::get('/order/online','OrderController@online');
	Route::get('/order/show','OrderController@show');
	
	//钱袋总进账金额
	Route::resource('/wallet','WalletController');
	//钱袋总支出金额
	Route::resource('/wallets','WalletsController');

	
    //修改广告状态
	Route::post('/advs/statu','AdvsController@status');
	Route::post('/advs/delete','AdvsController@delete');
	//广告列表
	Route::resource('/advs','AdvsController');
	
	//修改友情链接状态
	Route::post('/friendlink/status','FriendLinkController@status');
	// 删除友情链接
	Route::post('/friendlink/delete','FriendLinkController@delete');
	//友情链接列表
	Route::resource('/friendlink','FriendLinkController');
	

	//网站配置
	Route::get('/peizhi','peizhiController@peizhi');
	Route::get('/dupeizhi','peizhiController@dupeizhi');
	

});


 
//前台首页   //搜索
Route::get('/','home\IndexController@index');
//前台搜索功能
Route::get('/home/search','home\IndexController@search');

// 获取注册验证码
Route::post('/home/register/phone','home\HomeRegisterController@phone');
//进入前台注册页面
Route::resource('/home/register','home\HomeRegisterController');

// 退出登录
Route::get('/home/logout','home\HomeLoginController@logout');
//进入前台登录页面
Route::resource('/home/login','home\HomeLoginController');

//获取密码找回验证码
Route::post('/home/change/phone','home\HomeChangeController@phone');
//进入前台密码找回页面
Route::resource('/home/change','home\HomeChangeController');


//进入个人中心
Route::group(['middleware'=>'homelogin','prefix'=>'home/center','namespace'=>'home\center'],function(){

	//首页
	Route::get('index','IndexController@index');
	//个人信息页面
	Route::get('/info/index','InfoController@index');

	// 进入修改个人资料页面
	Route::get('/info/edit','InfoController@edit');
	// 修改个人资料
	Route::post('/info/doedit','InfoController@doedit');
	// 修改头像
	Route::post('/info/douserphoto','InfoController@douserphoto');

	// 进入修改密码页面
	Route::get('/info/user_change','InfoController@user_change');
	//修改密码
	Route::post('/info/douser_change','InfoController@douser_change');


	//删除收货地址
	Route::post('/address/delete','AddressController@delete');
	//处理修改收货地址
	Route::post('/address/edit','AddressController@editself');
	//收货地址管理
	Route::resource('/address','AddressController');
	


	//订单管理
	Route::get('/order/index','OrderController@index');
	Route::post('/order/list1','OrderController@list1');
	Route::post('/order/list','OrderController@list');
	Route::get('/order/pay','OrderController@pay');
	Route::post('/order/sure','OrderController@sure');

	//退换货
	Route::get('/change/index','ChangeController@index');
	Route::get('/change/add','ChangeController@add');
	Route::post('/change/stro','ChangeController@stro');
    
    //退换货
    Route::get('/rechange/index','rechangeController@index');
    Route::post('/rechange/save','rechangeController@save');

	//进入充值页面
	Route::get('/recharge/index','RechargeController@index');
	//处理充值   
	Route::post('/dorecharge','RechargeController@dorecharge');
	
	//进入账单明细页面
	Route::get('/bill/index','BillController@index');
	//进入收入页面
	Route::get('/bill/in','BillController@in');
	//进入支出页面
	Route::get('/bill/out','BillController@out');



	//收藏
	Route::post('/collection/del','CollectionController@del');
	Route::get('/collection/index','CollectionController@index');
	//足迹
	Route::get('/foot/index','FootController@index');
	//评论
	Route::get('/comment/index','CommentController@index');
	Route::get('/comment/add','CommentController@add');
	Route::post('/comment/stro','CommentController@stro');
	Route::post('/comment/del','CommentController@del');
	//消息
	Route::get('/news/index','NewsController@index');
	Route::post('/news/add','NewsController@add');
	Route::post('/news/addm','NewsController@addm');
	Route::get('/news/readed','NewsController@readed');
	Route::post('/news/del','NewsController@del');
	//出售订单
	// Route::get('','shouchuOrderController@index');
	//发布二手
	
	Route::post('/fabu/type','fabuController@type');
	Route::post('/fabu/uploadimg','fabuController@uploadimg');
	Route::resource('/fabu','fabuController');

	//我的二手
	Route::resource('/myershou','myershouController');
	Route::get('/myersho/xiajia/{id}','myershouController@xiajia');
	Route::get('/myersho/shangjia/{id}','myershouController@shangjia');

	//我的二手/修改二手
	Route::resource('xiugaidata','xiugaidataController');

	//出售二手/订单管理
	Route::get('maiOrder/wuliu','maiOrderController@wuliu');
	Route::post('maiOrder/wuliu','maiOrderController@dowuliu');
	Route::resource('maiOrder','maiOrderController');
	Route::post('maiOrder/quxiao','maiOrderController@quxiao');
	Route::post('maiOrder/pingjia','maiOrderController@pingjia');
	Route::post('maiOrder/chapingjia','maiOrderController@chapingjia');
	


});

//进入前台
// Route::group(['middleware'=>'homelogin','prefix'=>'home','namespace'=>'home'],function(){
Route::group(['prefix'=>'home','namespace'=>'home'],function(){
	//商品分类列表
	Route::resource('/listtype','ListTypeController');

	//商品详情页
	Route::resource('/listdetail','ListDetailController');
	
	
	
});
//付款
Route::group(['middleware'=>'homelogin','prefix'=>'home','namespace'=>'home'],function(){
	
	//点击进入结算页面
	Route::get('/gopay','PayController@gopay');
	//订单生成,待付款页面
	Route::post('/pay','PayController@pay');
	//确认付款
	Route::get('/overpay','PayController@overpay');
	//收藏
	Route::post('/collect','PayController@collect');
	//设置默认地址
	Route::post('/default','PayController@default');
	//修改地址
	Route::get('pay/edit','PayController@edit');
	Route::post('pay/edit','PayController@doedit');
	//添加地址
	Route::get('pay/add','PayController@add');
	Route::post('pay/add','PayController@doadd');
	//删除地址信息
	Route::post('/pay/del','PayController@del');
});
