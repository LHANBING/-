@extends('homes.layout.center')
@section('title','退换货管理')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	
@endsection()

@section('content')


			

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的退货</strong> / <small>Change</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							

							<div class="am-tabs-bd">

						
								<div id="tab1" class="am-tab-panel am-fade am-active am-in">
									<div class="order-top">
										<div class="th th-item" >
											商品
										</div>
										<div class="th th-orderprice th-price">
											交易金额
										</div>
										<div class="th th-changeprice th-price">
											退款金额
										</div>
										<div class="th th-changeprice th-price">
											卖家
										</div>

										<div class="th th-change th-changebuttom" style="width:270px">
										交易状态
										</div>
									</div>

									<div class="order-main">
										@foreach ($res as $k => $v)
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">订单号码：<a href="javascript:;">{{$v->order_num}}</a></div>
												<span>申请时间: {{$v->created_at}}</span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list" >
														<li class="td td-item">
															<div class="item-pic">
																
																	<img class="itempic J_ItemImg" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
															
															</div>
															<div class="item-info" >
																<div class="item-basic-info" >
															
																		<p>{{$v->title}}</p>
																		<br/>	 
																		<p class="info-little">原因:{{$v->ops}}<br/>
																			详细 :{{$v->content}}
																			 </p>

																
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice" >
																	<span>交易金额:</span>{{$v->pay_money }}
																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice" >
																	<span>退款金额:</span>{{$v->pay_money}}

																</div>
															</li>

														</ul>

														<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
																<p class="Mystatus" style="color:black">{{$v->username}}</p>

															</div>
														</li>
													</div>
														<div class="clear"></div>
													</ul>


													<li class="td td-change td-changebutton">
														
														<div class="item-status">
																<p class="Mystatus" style="color:#d2364c;">
																	@if($v->status ==1)
																	 <div class="am-btn am-btn-danger anniu" style="cursor:not-allowed;">等待卖家收货</div>

																	@elseif($v->status ==2) 
																	<div class="am-btn am-btn-danger anniu" style="cursor:not-allowed;">退货成功</div>
																	@endif
														</p>
														 </div>
													
													</li>

												</div>
											</div>
										</div>
										@endforeach	
									</div>

								</div>
							

							</div>

						</div>
					</div>

		

			@if(session('thcg'))

			 <script>	
						layer.confirm('<div style="font-size:15px">退货成功,已经自动为您跳转到退货页面</div>', {
								btn: ['返回','确定'] //按钮
								 ,icon: 1
								,skin: 'layer-ext-moon'
							   ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
								}, function(){
										location.href="/home/center/order/index";
								}); 
				
			 </script>	
									
		@endif		
							

	

@endsection()