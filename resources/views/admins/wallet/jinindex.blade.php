@extends('admins.layout.admins')

@section('title','钱袋管理_总进账详情')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
       <span> <i class="icol-coins"></i>&nbsp;进账总金额</span>
        
    </div>
<div class="mws-panel-body"><h1>咸鱼二手订单总进账:{{$pay}} 元!</h1></div>

</div>
  <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
           进行中的订单
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    每页显示
                    <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                        <option value="10" selected="selected">
                            10
                        </option>
                        <option value="25">
                            25
                        </option>
                        <option value="50">
                            50
                        </option>
                        <option value="100">
                            100
                        </option>
                    </select>
                   条数据
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    搜索:
                    <input type="text" aria-controls="DataTables_Table_1">
                </label>
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 188px;">
                            订单id
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 248px;">
                            订单交易流水号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 227px;">
                            订单商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 163px;">
                            买家账号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                           卖家账号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                           付款时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                            付款总金额(商品+运费)
                        </th>
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                           买家订单状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                 @foreach($jin as $k => $v)
                    <tr class="odd">
                        <td class="  sorting_1">
                            {{$v->id}}
                        </td>
                        <td class=" ">
                            {{$v->order_num}}
                        </td>
                        <td class=" ">
                            订单商品名称
                        </td>
                        <td class=" ">
                        {{$info[$k]->username}}
                        </td>
                        <td class=" ">
                        {{$inf[$k]->username}}
                        </td>
                        <td class=" ">
                            {{$v->pay_time}}
                        </td>
                        <td class=" ">                    
    {{$v->pay_money}} + {{$v->pay_yunfei}} ={{$v->pay_money+$v->pay_yunfei}}
                        </td>
                        <td class=" ">
                            
                    @if($v->buy_order_status == 2)
                            待发货
                    @elseif($v->buy_order_status == 3)
                            待收货  
                    @elseif($v->buy_order_status == 4)
                            等待确认收货 
                    @endif
                        </td>
                        <td class=" ">
                           <a href="" class='btn btn-success btn-lg btn-block'>给卖家打款</a>
                           <a href="" class='btn btn-primary btn-lg btn-block'>退款给买家</a>
                        </td>
                    </tr>
                @endforeach;
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <a tabindex="0" class="first paginate_button paginate_button_disabled"
                id="DataTables_Table_1_first">
                    First
                </a>
                <a tabindex="0" class="previous paginate_button paginate_button_disabled"
                id="DataTables_Table_1_previous">
                    Previous
                </a>
                <span>
                    <a tabindex="0" class="paginate_active">
                        1
                    </a>
                </span>
                <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">
                    上一页
                </a>
                <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">
                    下一页
                </a>
            </div>
        </div>
    </div>
</div>


@endsection()

@section('js')


@endsection