@extends('admins.layout.admins')

@section('title','广告列表页面')

@section('content')

        @if(session('msg'))

            <div class="mws-form-message info">
                

                {{session('msg')}}

            </div>
            
        @endif
  
  <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            广告列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

        <form action="/admin/advs" method="get">
            
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    关键字:
                    <input type="text" aria-controls="DataTables_Table_1" name="search">
                </label>
                <button class="btn btn-danger">搜索</button>
            </div>
        </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                            商家
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            产品
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            产品详情
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            产品链接
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            产品图片
                        </th>

                        

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 1) ood @else even @endif">

                        <td class=" ">
                           {{$v->id}}
                        </td>

                        <td class=" ">
                            {{$v->advs_a}}
                        </td>

                        <td class=" ">
                            {{$v->advs_d}}
                        </td>

                        <td class=" ">
                            {{$v->advs_v}}
                        </td>
                        
                        <td class=" ">
                            <a href="">{{$v->advs_src}}</a>
                        </td>

                        <td class=" ">
                            <img src="http://ozstangaz.bkt.clouddn.com/{{$v->advs_s}}" alt="" style="width:60px">
                        </td>

                        

                        @if( $v->status == 1)
                         <td class="" style="text-align:center;">
                            <span class="btn btn-info open" onclick="checkadvs({{$v->id}},{{$v->status}})"> 开启</span>
                         </td>
                        
                         @else
                         <td class="" style="text-align:center;">      
                             <span class="btn btn-info close" onclick="checkadvs({{$v->id}},{{$v->status}})">关闭</span>     
                         </td>      
                        @endif
                        
                        <td class=" ">
                            <a href="/admin/advs/{{$v->id}}/edit" class="btn btn-danger">修改</a>
                            
                            
                              
                                
                                <!-- <button class='btn btn-warning'>删除</button> -->
                            
                            <span class="btn btn-warning" onclick="checkdelete({{$v->id}})">删除</span>

                        </td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
            <style>
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
                text-decoration: none;
                }

            .pagination a{
                color: #fff;
            }

            .pagination .active{
                background-color: #88a9eb;
                background-image: none;
                border: medium none;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
                color: #323232;
            }

            .pagination .disabled{
                color: #666666;
                cursor: default;

            }

            .pagination{

                margin: 0px;
            }

            </style>

            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

                {!! $res->render()!!}
                
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')

<script>

    $('.mws-form-message').delay(3000).slideUp(1000);

    function checkadvs(id,status){
            
        $.post('/admin/advs/statu/',{'_token':'{{csrf_token()}}',id:id,status:status},function(data){
            
            if(data == 1)
            {   
                //这是一个弹框
                alert('修改成功！');
                //自动刷新页面
                location.reload();
                // layer.alert({})
            } else
            {
                alert('修改失败！');
            }  

        });
    } 

    // 点击删除按钮触发ajax
        function checkdelete(id){

            layer.confirm('确定删除？', {
                          btn: ['是', '否'] 
                          ,btn1: function(index, layero){
                            // 发送ajax
                            $.post('/admin/advs/delete',{id:id,'_token':'{{ csrf_token() }}'},function(data){
                               
                                // 通过判断data的值,得到信息
                                if(data)
                                {
                                    layer.open({
                                        content:'删除成功！'
                                    })
                                    location.reload();
                                }else
                                {
                                   layer.open({
                                        content:'删除失败！'
                                    }) 
                                }
                            });
                          }
                      })  
        }
</script>
@endsection