<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $res = User::where('username','like','%'.$request->input('search').'%')->
                     orderBy('id','asc')->
                     paginate($request->input('num',5));

        $count = User::where('username','like','%'.$request->input('search').'%')->count();
        $last= $res->lastPage();

        return view('admins.user.index',['res'=>$res,'request'=>$request,'count'=>$count,'last'=>$last]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //表单验证
        $this->validate($request, [
            'tel' => 'required|regex:/^1[34578]\d{9}$/', 
            'password' => 'required|regex:/^\S{6,16}$/'  
        ],[
            'tel.required' => '手机号不能为空！',
            'tel.regex' => '手机号格式不正确！',
            'password.required' => '密码不能为空！',
            'password.regex' => '密码格式不正确！'
               
        ]);
        $res = $request->except('_token');

        $res['password'] = Hash::make($request->input('password'));

        $data = User::insert($res);
        
        if ($data) 
        {
            return  redirect('/admin/user')->with('msg','添加成功');
        }else
        {
            return back()->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $res = User::where('id',$id)->first();

        if ( $res['user_photo'] == "/homes/user_photo/default.jpg" ) 
        {
            $result = User::where('id',$id)->delete();

            if ($result) {
                    
                return redirect('/admin/user')->with('msg','删除成功');
                }

        }else
        {
            $data = unlink('.'.$res['user_photo']);

            if($data)
            {
                $result = User::where('id',$id)->delete();

            if ($result) {
                    
                return redirect('/admin/user')->with('msg','删除成功');
                }
            }
        }
    }

       

    public function status($status,$id)
    {   
        if($status > 3)
        {
            $res = User::where('id',$id)->update(['status'=>0]);

            if($res)
            {
                return redirect('/admin/user')->with('msg','修改成功');
            }
        }else
        {   
            $res = User::where('id',$id)->update(['status'=>4]);

            if($res)
            {
                return redirect('/admin/user')->with('msg','修改成功');
            }
            
        }
    }

}
