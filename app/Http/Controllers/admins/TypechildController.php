<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Typechild;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;


class TypechildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'typechildname' => 'required'
    ],[
        'typechildname.required'=>'父类名不能为空'

    ]);


        $res = $request->except('_token');

        $data = Typechild::create($res);

        if ($data) {
            return redirect('/admin/type')->with('msg','子类信息添加成功');
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
        $res = Goodsdetail::where('goods_id',$id)->first();

        // dd($res);die;

        return view('admins.type.show',['res'=>$res]);

    }
     public function shows(Request $request)
    {
       /* $res = Good::where('typechild_id',$id)->get();
        return view('admins.type.detail',['res'=>$res]);*/

        $id = $_GET['id'];

        $res = Good::where('title','like','%'.$request->input('search').'%')->
        where('typechild_id',$id)->
        orderBy('id','asc')->
        paginate($request->input('num',10));

        $count = Good::where('title','like','%'.$request->input('search').'%')->
        where('typechild_id',$id)->count();
        $last= $res->lastPage();

        return view('admins.type.detail',['res'=>$res,'request'=>$request,'count'=>$count,'last'=>$last]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Typechild::find($id);
        return view('admins.type.editson',['res'=>$res]);
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
        $data = Typechild::where('id',$id)->update($res);

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
        $res = Typechild::where('id',$id)->first();

        if ($res) {
          $info =  Typechild::where('id',$id)->delete();
          if ($info) {
              return redirect('/admin/type')->with('msg','删除子分类成功');
          } else {
            return back();
          }
        }
    }
    

    public function add()
    {
        $type_id = $_GET['id'];
        return view('admins.type.addson',['type_id'=>$type_id]);

    }
}
