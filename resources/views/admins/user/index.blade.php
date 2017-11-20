@extends('admins.layout.admins')

@section('title','用户列表页面')

@section('content')
  @if(session('msg'))

    <div class="mws-form-message success">
        
    
            {{ session('msg') }}

        
    </div>

    @endif

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            用户列表页面
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
       		 <form action="/admin/user" method="get">
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                     <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <option value="5" @if($request->num == '5') selected="selected" @endif>5</option>
                        <option value="10" @if($request->num == '10') selected="selected" @endif>10</option>
                        <option value="15" @if($request->num == '15') selected="selected" @endif>15</option>
                        
                    </select>条数据</label></div>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>关键字: <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ $request->search }}"></label>

                        <button class="btn btn-danger">搜索</button>
                    </div>

	            </div>
			</form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 191px;">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 180px;">
                            邮箱
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 166.193px;">
                            手机号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 100px;">
                            头像
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 100px;">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 200px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
					@foreach($res as $k => $v) 

                    <tr class="@if($k % 2 == 0) odd @else even @endif" style="height: 90px">
                        <td class="" style="text-align:center;">
                           {{$v->id}}
                        </td>
                         <td class="" style="text-align:center;">
                           {{$v->username}}
                        </td>
                         <td class="" style="text-align:center;">
                           {{$v->email}}
                        </td>
                         <td class="" style="text-align:center;">
                           {{$v->tel}}
                        </td>
                         <td class="" style="text-align:center;">
                         	<img src="{{$v->user_photo}}" width="50%" alt="">
                        </td> 
                        @if( $v->status > 3)
                         <td class="" style="text-align:center;">
                         	<a href="/admin/user/status/{{$v->status}}/{{$v->id}}"><button class="btn btn-info"> 开启</button></a>
                         </td>
                        
                         @else
                         <td class="" style="text-align:center;">      
                             <a href="/admin/user/status/{{$v->status}}/{{$v->id}}"><button class="btn btn-info">关闭</button></a>      
                         </td>      
                        @endif
                        <td class="" style="text-align:center;">
                           <form action="/admin/user/{{$v->id}}" method="post" style="display: inline;">
                             
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}
                             <button class="btn btn-warning">删除</button>  
                           </form>
                        </td>

                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
            
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to {{$last}} of {{$count}} entries
            </div>
            
            <style type="text/css">
            .pagination li{
            
            background-color: #444444;
            border-left: 1px solid rgba(255, 255, 255, 0.15);
            border-right: 1px solid rgba(0, 0, 0, 0.5);
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
            
            cursor: pointer;
            display: block;
            float: left;
            font-size: 12px;
            height: 20px;
            line-height: 20px;
            outline: medium none;
            padding: 0 10px;
            text-align: center;
            text-decoration: none;}

            .pagination a{
                color: #fff;
            }
              .pagination  .active{
            background-color: #c5d52b;
            background-image: none;
            border: medium none;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
            color: #323232;
            }
            .pagination .disabled{
            color: #666666;
            cursor: default;}
            
            .dataTables_paginate ul{
                margin: 0px;
            } 

        </style>
         <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
          
                
            {!! $res->appends($request->all())->render() !!}
        
        
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')

    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
    </script>

@endsection