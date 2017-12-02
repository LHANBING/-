@extends('homes.layout.center')
@section('title','支出账单明细')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/bilstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

@endsection()

@section('content')


					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">支出账单明细</strong> / <small>Electronic&nbsp;billout</small></div>
					</div>
					<hr>

					<!--交易时间	-->
 					
					<div class="order-time">
						<label class="form-label" style="width: 100px">总支出金额：</label>
					
						<label class="form-label">{{ $sum }}元</label>
					
                          <div class="clear"></div>
					</div>
					
					<table width="100%">

						<thead>
							<tr>
								<th class="memo" style="text-align: center;"></th>
								<th class="time" style="text-align: center;">订单号</th>
								<th class="name" style="text-align: center;">名称</th>
								<th class="amount" style="text-align: center;">支出金额</th>
								<th class="action" style="text-align: center;">状态</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($goods as $k => $v)
							<tr>
								<td class="img" style="text-align: center;">
									<i><img src="http://ozstangaz.bkt.clouddn.com/{{$pics[$k]}}"></i>
								</td>
								<td class="time" style="text-align: center;">
									
									<p class="text-muted"> {{ $v->order_num }}
									</p>
								</td>
								<td class="title name" style="text-align: center;">
									<p class="content">
										{{$name[$k]}}
									</p>
								</td>

								<td class="amount" style="text-align: center;">
									<span class="amount-pay">{{ $v->pay_money + $v->pay_yunfei }}</span>
								</td>
								
								 @if($v->sale_order_status == 2)
								<td class="operation" style="text-align: center;">
									待发货	
								</td>
								 @elseif($v->sale_order_status == 3)
								 <td class="operation" style="text-align: center;"> 
									待收货
								</td>
								 @elseif($v->sale_order_status == 4)
								 <td class="operation" style="text-align: center;">
									待评价
								</td>
								@elseif($v->sale_order_status == 5)
								 <td class="operation" style="text-align: center;">
									已评价
								</td>
								@else
								<td class="operation" style="text-align: center;">
									
								</td>
								@endif
							</tr>
							 @endforeach
						 </tbody>
						 </table>
						

				
									
					
				
			

@endsection()