<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Typechild;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Type::all();
        $reschild = Typechild::all();
        return view('admins.type.father',['res'=>$res,'reschild'=>$reschild]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.type.addfather');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        'typename' => 'required'
    ],[
        'typename.required'=>'父类名不能为空'

    ]);


        $res = $request->except('_token');

        $data = Type::create($res);

        if ($data) {
            return redirect('/admin/type')->with('msg','父类信息信息成功');
        }else{
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
        $res = Type::find($id);
        return view('admins.type.editfather',['res'=>$res]);
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
        $res = $request->except('_token','_method');
        $data = Type::where('id',$id)->update($res);

        if ($data) {
            return redirect('/admin/type')->with('msg','修改成功');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Type::where('id',$id)->first();

        if ($res) {
              $info =  Type::where('id',$id)->delete();
              $infos = Typechild::where('type_id',$id)->delete();
          if ($info && $infos) {
              return redirect('/admin/type')->with('msg','删除父成功');
          } else {
            return back();
          }
        }
    }
    
}
