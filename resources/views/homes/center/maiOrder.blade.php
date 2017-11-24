@extends('homes.layout.center')
@section('title','订单管理')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">
		
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/js/jquery-1.8.3.min.js"></script>

@endsection()

@section('content')

		<div class="user-order">


						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">出售订单管理</strong> / <small>Order</small></div>
						</div>
						<hr>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="">所有订单</a></li>
								<li><a href="">待付款</a></li>
								<li><a href="">待发货</a></li>
								<li><a href="">待收货</a></li>
								<li><a href="">待评价</a></li>
							</ul>

							<div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								
								<!-- 所有订单 -->
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<?php $i = 0; ?>
											<!--交易成功-->
											@foreach($codearr as $k => $v)
											<?php $to=0 ?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="/homes/javascript:;">{{$k}}</a></div>
													<span>订单时间：{{date("Y-m-d",$v[0]->ord_time)}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													@foreach($v as $ks => $vs)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/homes/#" class="J_MakePoint">
																		<img src="{{$vs->orgoods->gimg}}">
																	</a>
																</div>
																<div class="item-info" style="width: 220px;">
																

																	<div class="item-basic-info" style="margin-left: -70px;"> 
																		<a href="/homes/#">
																			<p>{{$vs->orgoods->gname}}</p>
																			<p class="info-little" style="margin-top:8px;">
																				商品规格：{{$vs->label}}
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vs->orgoods->gprice}}
																	
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vs->goods_num}}

																	<?php $to +=  $vs->orgoods->gprice * $vs->goods_num ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	@if($vs->ostate==1)
																		<a href="/homes/refund.html">退款</a>
																	@elseif($vs->ostate==2)
																		<a href="/homes/refund.html">退款/退货</a>
																	<br/>
																	<a href="">确认收货</a>
																	@elseif($vs->ostate==3)
																		<a href="/homes/refund.html">退款/退货</a>
																	<br/>
																	<a href="">评价</a>
																	@endif
																</div>
															</li>
														</ul>
													@endforeach
														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计 {{ $to }} 
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																@if($v[0]->ostate==0)
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="/homes/#">取消订单</a></p>
																@elseif($v[0]->ostate==1)
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="home/user/ordersinfo">订单详情</a></p>
																@elseif($v[0]->ostate==2)
																	<p class="Mystatus">卖家已发货</p>

																	<p class="order-info"><a href="/home/user/ordersinfo/{{$v[0]->o_code}}">订单详情test</a></p>
																	<p class="order-info"><a href="/homes/logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="/homes/#">延长收货</a></p>
																@elseif($v[0]->ostate==5)
																	<p class="Mystatus">订单已取消</p>
																@else($v[0]->ostate==3)
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="/home/user/ordersinfo">订单详情</a></p>
																	<p class="order-info"><a href="/homes/logistics.html">查看物流</a></p>
																@endif
																	
																</div>
															</li>
															<li class="td td-change">
															
																<div>
																<form action="userorder/{{$k}}" method="post">
																	{{ method_field('DELETE')}}
																	{{ csrf_field()}}
																	<input type="submit" value="删除订单" class="delorder am-btn am-btn-danger anniu">
																</form>
																</div>
															</li>
														</div>
													</div>
												</div>
											</div>
											<?php $i++; ?>
											@endforeach

										</div>

									</div>

								</div>

								<!-- 待付款订单 -->
								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($codearr1 as $k1=>$v1)
										<?php $to1 = 0; ?>
											<div class="order-status1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="/homes/javascript:;">{{$k1}}</a></div>
													<span>订单时间：{{date("Y-m-d",$v1[0]->ord_time)}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														@foreach($v1 as $ks1=>$vs1)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/homes/#" class="J_MakePoint">
																		<img src="{{$vs1->orgoods->gimg}}">
																	</a>
																</div>
																<div class="item-info" style="width: 220px;">
																	<div class="item-basic-info" style="margin-left: -70px;">
																		<a href="/homes/#">
																			<p>{{$vs1->orgoods->gname}}</p>
																			<p class="info-little" style="margin-top:8px;">商品规格：{{$vs1->label}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vs1->orgoods->gprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vs1->goods_num}}
																	<?php $to1 +=  $vs1->goods_num * $vs1->orgoods->gprice ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>
														@endforeach
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $to1 }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="/homes/#">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="/homes/pay.html">
																<div class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
														</div>
														
													</div>
												
												</div>

											</div>
											@endforeach
										</div>

									</div>
								</div>

								<!-- 待发货订单 -->
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($codearr2 as $k2=>$v2)
										<?php $to2 = 0; ?>
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="/homes/javascript:;">{{$k2}}</a></div>
													<span>成交时间：{{date("Y-m-d",$v2[0]->ord_time)}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													@foreach($v2 as $ks2=>$vs2)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/homes/#" class="J_MakePoint">
																		<img src="{{$vs2->orgoods->gimg}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="width: 200px;">
																	<div class="item-basic-info" style="margin-left: -70px;">
																		<a href="/homes/#">
																			<p>{{$vs2->orgoods->gname}}</p>
																			<p class="info-little" style="margin-top:8px;">商品规格：{{$vs2->label}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vs2->orgoods->gprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vs2->goods_num}}
																	<?php $to2 +=  $vs2->goods_num * $vs2->orgoods->gprice ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="/homes/refund.html">退款</a>
																</div>
															</li>
														</ul>

														@endforeach
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$to2}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="/homes/orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>


								<!-- 待收货订单 -->
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($codearr3 as $k3=>$v3)
										<?php $to3 = 0 ?>
											<div class="order-status3">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="/homes/javascript:;">{{$k3}}</a></div>
													<span>成交时间：{{date("Y-m-d",$v3[0]->ord_time)}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													@foreach($v3 as $ks3=>$vs3)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/homes/#" class="J_MakePoint">
																		<img src="{{$vs3->orgoods->gimg}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="width: 200px;">
																	<div class="item-basic-info" style="margin-left: -70px;">
																		<a href="/homes/#">
																			<p>{{$vs3->orgoods->gname}}</p>
																			<p class="info-little" style="margin-top:8px;">商品规格：{{$vs3->label}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vs3->orgoods->gprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vs3->goods_num}}
																	<?php $to3 +=  $vs3->goods_num * $vs3->orgoods->gprice ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="/homes/refund.html">退款/退货</a>
																	<br/>
																	<a href="">确认收货</a>
																</div>
															</li>
														</ul>

														@endforeach

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$to3}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="/homes/orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="/homes/logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="/homes/#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>


								<!-- 带评价订单 -->
								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($codearr4 as $k4=>$v4)
										<?php $to4 = 0; ?>
											<!--不同状态的订单	-->
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="/homes/javascript:;">{{$k4}}</a></div>
													<span>成交时间：{{date("Y-m-d",$v4[0]->ord_time)}}</span>

												</div>
												<div class="order-content">
													<div class="order-left">
													@foreach($v4 as $ks4=>$vs4)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/homes/#" class="J_MakePoint">
																		<img src="{{$vs4->orgoods->gimg}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="width: 200px;">
																	<div class="item-basic-info" style="margin-left: -70px;">
																		<a href="/homes/#">
																			<p>{{$vs4->orgoods->gname}}</p>
																			<p class="info-little" style="margin-top:8px;">商品规格：{{$vs4->label}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vs4->orgoods->gprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vs4->goods_num}}
																	<?php $to4 +=  $vs4->goods_num * $vs4->orgoods->gprice ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="/homes/refund.html">退款/退货</a>
																	<br/>
																	<a href="">评价</a>
																</div>
															</li>
														</ul>
														@endforeach
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$to4}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="/homes/orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="/homes/logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="/homes/commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											@endforeach
											


										</div>

									</div>
								</div>
							</div>

						</div>
					</div>

@endsection()
