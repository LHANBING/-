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


//进入后台首页
Route::group(['prefix'=>'admin','namespace'=>'admins'],function(){

	//后台首页
	Route::resource('/','AdminController');

	//用户
	Route::resource('/user','UserController');
	Route::get('/user/status/{status}/{id}','UserController@status');
	

});


// Route::get('/home/lcr', function () {
//     return view('homes/lcr');
// });

//进入前台注册页面
Route::post('/home/register/phone','homes\HomeRegisterController@phone');
// Route::post('/home/register/code','HomeRegisterController@code');
Route::resource('/home/register','homes\HomeRegisterController');

//进入前台登录页面
Route::resource('/home/login','homes\HomeLoginController');


//进入前台密码修改页面
Route::post('/home/change/phone','homes\HomeChangeController@phone');
Route::resource('/home/change','homes\HomeChangeController');










