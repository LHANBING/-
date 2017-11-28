<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Useraddress;
use DB;
class AddressController extends Controller
{
    /**
     * 显示收回地址管理页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        // 从session中获取用于的id
        $user_id = session('uid');
        // 获取用户全部的收货地址
        $res2 = DB::table('useraddress')->where('user_id',$user_id)->orderBy('id','desc')->get();
        // 判断用户现存到数据库的地址是否为空
        if($res2)
        {
            return view('homes.center.address',['res'=>$res2]); 
        }else
        {
            return view('homes.center.address',['res'=>null]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * 处理用户添加收货地址信息
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
         // 从session中获取用户的id
         $user_id = session('uid');
         // 获取用户全部的收货地址 
         $res1 = DB::select('select * from useraddress where user_id = '.$user_id);
        // 判断用户现存到数据库的地址是否为空
        if($res1)
        {        
                 // 将用户的收货地址的status设为0
                $info1 = Useraddress::where('user_id',$user_id)->update(['status'=>0]);
                // 判断$info1
                if($info1)
                {    
                      //获取city的值
                    $city = $request->input('city');
                      //获取除_token,city的值 
                    $res = $request->except('_token','city');
                    //从文件中读取数据到PHP变量
                    $json_string = file_get_contents('./homes/city/script/list.json');
                         
                    // 把JSON字符串转成PHP数组
                    $data = json_decode($json_string, true);
                     // 判断city的值是否为空
                    if($city != false)
                    {
                        $res['city']  = $data[$city];
                    }else
                    {
                        $res['city']  = $city;
                    }

                    $res['user_id'] = $user_id;
                    $res['status'] = 1 ;
                    $res['province'] = $data[$res['province']];    
                    $res['area'] = $data[$res['area']];    
                    // 将数据添加到数据库
                    $info =Useraddress::insert($res);
                    
                    if($info)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }
                }else
                {
                    $city = $request->input('city');
                    
                    
                    $res = $request->except('_token','city');
                    //从文件中读取数据到PHP变量
                    $json_string = file_get_contents('./homes/city/script/list.json');
                         
                    // 把JSON字符串转成PHP数组
                    $data = json_decode($json_string, true);
                     
                    if($city != false)
                    {
                        $res['city']  = $data[$city];
                    }else
                    {
                        $res['city']  = $city;
                    }
                    $res['user_id'] = $user_id;
                    $res['status'] = 1 ;
                    $res['province'] = $data[$res['province']];    
                    $res['area'] = $data[$res['area']];    
                    
                    $info =Useraddress::insert($res);
                    
                    if($info)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }
                }
        }else{

                $city = $request->input('city');                
                
                $res = $request->except('_token','city');
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['user_id'] = $user_id;
                $res['status'] = 1 ;
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];    
                
                $info0 =Useraddress::insert($res);
                
                if($info0)
                {
                    return 1;
                }else
                {
                    return 0;
                }
        }



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     
         //获取要修改收货地址的值
         $res3 = Useraddress::where('id',$id)->first();
         $id = $res3['id'];
         return view('homes.center.addressedit',['res3'=>$res3]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

    }

    public function delete(Request $request)
    {   
        // 删除用户的收货地址
        $delete = Useraddress::where('id',$request->input('id'))->delete();
        // 对delete的值进行判断
        if ($delete) 
        {
            return 1;    
        }else
        {
            return 0;
        }
    }

     public function editself(Request $request)
    {      
         // 获取修改地址的id
         $id = $request->input('id');
         // 从session中获取用户的id
         $user_id = session('uid');
         // 获取修改地址的状态
         $statuschange = $request->input('status');
         // 判断修改地址状态的值
        if( $statuschange == 1)
        {       
              // 将用户的地址状态修改为0
             $info2 = Useraddress::where('user_id',$user_id)->update(['status'=>0]);
             // 判断$info2的值
             if ($info2) 
             {
                $city = $request->input('city');
                $res = $request->except('_token','city');
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['user_id'] = $user_id;
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];

                $info3 =Useraddress::where('id',$id)->update($res);
                    
                    if($info3)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }

             }else
             {
                
                $city = $request->input('city');
                $res = $request->except('_token','_method','city');
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['user_id'] = $user_id;
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];

                $info3 =Useraddress::where('id',$id)->update($res);
                    
                    if($info3)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }

             
             }
            
        }else
        {       
                $city = $request->input('city');
                $res = $request->except('_token','_method','city');
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['user_id'] = $user_id;
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];

                $info4 =Useraddress::where('id',$id)->update($res);
                    
                    if($info4)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }
        }
    }
}
