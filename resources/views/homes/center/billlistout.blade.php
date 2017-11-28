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
 					@if($buy)
					<div class="order-time">
						<label class="form-label">收入金额：</label>
					
						<label class="form-label">{{ $sum }}  元</label>
					
                          <div class="clear"></div>
					</div>
					
					<table width="100%">

						<thead>
							<tr>
								<th class="memo"></th>
								<th class="time">创建时间</th>
								<th class="name">名称</th>
								<th class="amount">金额</th>
								<th class="action">操作</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($buy as $k => $v)
							<tr>
								<td class="img">
									<i><img src="http://ozstangaz.bkt.clouddn.com/good/{{$v->goods_photo}}"></i>
								</td>
								<td class="time">
									
									<p class="text-muted"> {{ $v->order_otime }}
									</p>
								</td>
								<td class="title name">
									<p class="content">
										{{ $v->title}}
									</p>
								</td>

								<td class="amount">
									<span class="amount-pay">{{ $v->pay_money }}</span>
								</td>
								
								 @if($v->sale_order_status == 2)
								<td class="operation">
									待发货	
								</td>
								 @elseif($v->sale_order_status == 3)
								 <td class="operation">
									待收货
								</td>
								 @elseif($v->sale_order_status == 4)
								 <td class="operation">
									待评价
								</td>
								@elseif($v->sale_order_status == 5)
								 <td class="operation">
									已评价
								</td>
								@else
								<td class="operation">
									
								</td>
								@endif
							</tr>
							 @endforeach
						 </tbody>
						 </table>
						
						 @else
						 <div class="order-time">
							<label class="form-label">收入金额：</label>
						
							<label class="form-label">{{ $sum }}  元</label>
						
	                          <div class="clear"></div>
						</div>
	                     <table width="100%">

						<thead>
							<tr>
								<th class="memo"></th>
								<th class="time">创建时间</th>
								<th class="name">名称</th>
								<th class="amount">金额</th>
								<th class="action">操作</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						 </table>
						@endif

				
									
					
				
			

@endsection()