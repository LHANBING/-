@extends('admins.layout.admins')

@section('title','订单列表页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            在线订单列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
       		 <form action="/admin/order/online" method="get">
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                    <select size="1" name="num" aria-controls="DataTables_Table_1">
	                        <option value="5" {{--@if(isset($request->num) ? $request->num : '5' ) @endif--}}>
	                            5
	                        </option>
	                        <option value="10" {{--@if($request->num == '10') selected="selected" @endif --}}>
	                            10
	                        </option>
	                        <option value="15" {{--@if($request->num == '15')
                             selected = "selected" @endif--}}   >
	                            15
	                        </option>
	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    关键字:
	                    <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ isset($request->search) ? $request->search : '' }}">
	                </label>
		
					<button class="btn btn-info">搜索</button>

	            </div>
			</form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 20px;">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 40px;">
                            买家
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 40px;">
                            卖家
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 40px;">
                            商品
                        </th>
                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 40px;">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 60px;">
                            下单时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 60px;">
                                买家状态
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 60px;">
                                卖家状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 60px;">
                            价格/运费
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 60px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
                    @foreach($re as $k => $v)
					
                    
                    <tr class="{{--@if($k % 2 == 0) odd @else even @endif--}}" style="height: 90px">
                        <td class="">
                           {{$v->id}}
                        </td>

                         <td class="">
                            {{$res[$k]->username}}
                        </td>
                       
                         <td class="">
                         	{{$r[$k]->username}}
                        </td>
                         <td class="">
                         	  {{$v->title}}
                               X 
                           {{$r[$k]->goods_num}}
                        </td>
                        <td class="">
                         {{$r[$k]->order_num}}
                        </td>
                         <td class="">
                         {{$r[$k]->order_atime}}
                            
                        </td>
                         <td class="">
                               
                @if($r[$k]->buy_order_status == '0') 待付款 
                @elseif($r[$k]->buy_order_status == '1') 待发货 
                @elseif($r[$k]->buy_order_status == '2') 待收货 
                @elseif($r[$k]->buy_order_status == '3') 确认收货 
                 
                @endif
         
                        </td>
                       
                        <td class="">
                @if($r[$k]->sale_order_status == '0') nimabi  
                @elseif($r[$k]->sale_order_status == '1') 待发货 
                @elseif($r[$k]->sale_order_status == '2') 待收货 
                @elseif($r[$k]->sale_order_status == '3')卖家确认收货 
                 
                @endif
               
                        </td>
                        <td class="">
                               {{$r[$k]->pay_money  }}
                            +
                            {{$r[$k]->pay_yunfei}}    元
                         
                        </td>
                        <td class="">
                         <a href="" style="color:blue;font-size:15px">查看评价</a>
                          
                        </td>
                    </tr>

                
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

                 
                    {!! $re->appends($request->all())->render() !!}  
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')


@endsection