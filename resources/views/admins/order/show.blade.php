@extends('admins.layout.admins')

@section('title','订单列表页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            评论内容
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
       		

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 80px;">
                            ID
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 120px;">
                            评论人
                        </th>
                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 100px;">
                            商品
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 100px;">
                           评论时间
                        </th>

                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 150px;">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 200px;">
                           评论内容
                        </th>
                    
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
                   
					@foreach ($res as $k =>$v)
                    
                    @if($v->b_id == $v->buy_uid)

                    <tr class="" style="height: 90px">
                        <td class="">
                         {{$v->id}}
                        </td>
                          
                         <td class="">
                            {{$v->username}}&nbsp;(买家)
                        </td>
                       
                         <td class="">
                         	{{$v->title}}
                           
                        </td>

                        <td class="">
                            {{$v->created_at}}
                           
                        </td>

                        <td class="">
                          {{$v->order_num}}
                        </td>

                         <td class="">
                           {{$v->comment}}
                            
                        </td>
                    </tr>

                    @endif
                 @endforeach 


                    @foreach ($res1 as $k =>$v)
                    
                    @if($v->b_id == $v->sale_uid)

                    <tr class="" style="height: 90px">
                        <td class="">
                         {{$v->id}}
                        </td>
                          
                         <td class="">
                            {{$v->username}}&nbsp;(卖家)
                        </td>
                       
                         <td class="">
                            {{$v->title}}
                           
                        </td>
                        
                        <td class="">
                            {{$v->created_at}}
                           
                        </td>
                        <td class="">
                          {{$v->order_num}}
                        </td>
                         <td class="">
                           {{$v->comment}}
                            
                        </td>
                    </tr>

                    @endif
                 @endforeach     
                
                  
                    
                </tbody>
            </table>
           <div class="dataTables_info" id="DataTables_Table_1_info">
           
       
            </div>
        
                <style>
                    .pagination li{
                        float: left;
                        height: 20px;
                        padding: 0 10px;
                        display: block;
                        font-size: 12px;
                        line-height: 20px;
                        text-align: center;
                        cursor: pointer;
                        outline: none;
                        background-color: #444444;
                        color: #fff;
                        text-decoration: none;
                        border-right: 1px solid #232323;
                        border-left: 1px solid #666666;
                        border-right: 1px solid rgba(0, 0, 0, 0.5);
                        border-left: 1px solid rgba(255, 255, 255, 0.15);
                        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    }

                  
                .pagination a {
                       color: #fff;
                   } 

                .pagination .active{
                        background-color: #88a9eb;
                        color: #323232;
                        border: none;
                        background-image: none;
                        -webkit-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);

                  }

                .pagination .disabled{
                    color: #666666;
                    cursor: default;
                  }
                
                .pagination{
                    margin: 0px;
                }
                </style>
            <div class="dataTables_paginate paging_full_numbers" id="paginate">

       
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')


@endsection