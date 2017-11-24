@extends('homes.layout.list')
@section('title','商品类别列表')

@section('cssjs')
        <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">

@endsection()

@section('content')


					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品列表</strong> / <small>List</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											现价
										</div>
										<div class="th th-number">
											原价
										</div>
										<div class="th th-operation">
											运费
										</div>
										<div class="th th-amount">
											卖家地址
										</div>
										<div class="th th-status">
											描述
										</div>
										<div class="th th-change">
											查看详情
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										
											<!--不同状态订单-->
											<div class="order-status3">
												
												<div class="order-content">
													<div class="order-left">
													
														@foreach($res as $k=>$v)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a class="J_MakePoint" href="#">
																		<img class="itempic J_ItemImg" src="/homes/images/62988.jpg_80x80.jpg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->newprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->oldprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->transprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->address}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	商品描述
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<a href="/home/listdetail/{{$v->id}}">查看详情</a>
																</div>
															</li>
														</ul>
														@endforeach

													</div>
													
												</div>

											</div>

										</div>

									</div>

								</div>
								
							</div>

						</div>
					</div>

				
			<script>

				$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
				});

				$('#uls li:eq(0) ').click(function(){

				$.post('/home/center/order/list',{id:10},function(data){


					//alert(data);
				})


			});
			</script>		
			

@endsection()