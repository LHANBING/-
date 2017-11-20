@extends('admins.layout.admins')

@section('title','父分类页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            分类列表
        </span>
    </div>
    				 @if(session('msg'))
                        <div class="mws-form-message info">                 

                            {{session('msg')}}

                        </div>
                    @endif
    <!-- {{var_dump($res)}} -->
	<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 191px;">分类树</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250.193px;">栏目名</th>

                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 230.193px;">栏目管理</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        		<!-- 父分类 -->
								@foreach($res as $k => $v)
                        		<tr class="odd" >
                                    <td class="  sorting_1" style="color: blue">父分类</td>
                                    <td class=" " style="color: blue">
                                    	{{$v->typename}}
                                    	<div style="display: inline;">({{$v->status == 1 ? '前台显示' : '前台不显示' }})</div>
                                    </td>
                                    <td class=" ">
                                    	<a href="/admin/type/{{$v->id}}/edit" class="btn btn-success">修改</a>
                                    	<a href="/admin/typechild/add?id={{$v->id}}" class="btn btn-success">添加子版块</a>
                                    	<form action="/admin/type/{{$v->id}}" method="post" style="display: inline;">
				                             {{ csrf_field() }}
				                             {{ method_field('DELETE') }}
				                             <button class="btn btn-success">删除</button>  
				                           </form>
			
                                    </td>
                                </tr>
                               
								<!-- 子分类 -->
								@foreach($reschild as $key => $val)
								@if($v->id == $val->type_id )
                                <tr class="even" style="text-align: center;">
                                    <td class="  sorting_1" style="color: red">>>子分类</td>
									
                                    <td class=" " style="color: red">
                                    	>>{{$val->typechildname}}
                                    	<div style="display: inline;">({{$val->status == 1 ? '前台显示' : '前台不显示' }})</div>
                                    </td>

                                    <td class=" ">
										<a href="/admin/typechild/{{$val->id}}/edit" class="btn btn-warning">修改</a>
                                    	<a href="/admin/typechild/{{$val->id}}" class="btn btn-warning">查看商品列表</a>
                                    	<form action="/admin/typechild/{{$val->id}}" method="post" style="display: inline;">
				                             {{ csrf_field() }}
				                             {{ method_field('DELETE') }}
				                             <button class="btn btn-warning">删除</button>  
				                          </form>
                                    </td>
                                </tr>
								@endif
                                @endforeach
								@endforeach
                            </tbody></table>

</div>

@endsection()

@section('js')

	<script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
    </script>

@endsection