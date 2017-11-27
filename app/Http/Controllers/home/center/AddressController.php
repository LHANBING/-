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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = session('uid');
        $res2 = DB::table('useraddress')->where('user_id',$user_id)->orderBy('id','desc')->get();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
         $user_id = session('uid');
         $res1 = DB::select('select * from useraddress where user_id = '.$user_id);
        
        if($res1)
        {       
                $info1 = Useraddress::where('user_id',$user_id)->update(['status'=>0]);
                if($info1){
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
    {   echo 1;die;
        $delete = Useraddress::where('id',$id)->delete();

        if ($delete) 
        {
            return 1;    
        }else
        {
            return 0;
        }
    }

    public function delete(Request $request)
    {   
        $delete = Useraddress::where('id',$request->input('id'))->delete();

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
         $id = $request->input('id');
         $user_id = session('uid');
         $statuschange = $request->input('status');
         
        if( $statuschange == 1)
        {
             $info2 = Useraddress::where('user_id',$user_id)->update(['status'=>0]);
             
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
