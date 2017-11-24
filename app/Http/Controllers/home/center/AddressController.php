<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Useraddress;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homes.center.address'); 
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
        $shi = $request->input('city');
        var_dump($shi);die;
        if($shi)
        {
            echo 1;
        }
        echo 0 ;die;
        $res = $request->except('_token');
        //从文件中读取数据到PHP变量
        $json_string = file_get_contents('./homes/city/script/list.json');
             
        // 把JSON字符串转成PHP数组
        $data = json_decode($json_string, true);
         // province
         // city
         // area

        // $sheng = $data[$req['sheng']];
        // $shi = $data[$req['shi']];
        // $xian = $data[$req['xian']];
        // $xiangxi = $req['addr'];      

        
    



        $res['user_id'] = session('uid');

        // $data = Useraddress::insert($res);

        // if($data){

        //     return redirect('home/center/listindex');
        // } else {

        //     return back()->withInput();
        // }
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
        echo "修改信息";
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
        echo "1111";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump($id);
    }
}
