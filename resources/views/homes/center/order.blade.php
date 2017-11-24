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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs" id="uls">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											价格
										</div>
										<div class="th th-number">
											数量
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计/ 运费
										</div>
										<div class="th th-status" style="margin-left: 20px">
											交易状态
										</div>
										<div class="th th-change" style="margin-left: 20px">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										@foreach($res as $k => $v)
											<!--不同状态订单-->
											<div class="order-status3 " id="a_{{$v->id}}" >
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_num}}</a></div>
													<span>下单时间 : {{$v->order_atime}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a class="J_MakePoint" href="#">
																<img src="" alt="">
																		{{$v->goods_photo}}
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			
																			<p class="info-little">商品名称：
																			</p>
																			
																			<p class="info-little">{{$v->title}}<br/>
																			卖家 : {{$v->sale_uid}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->newprice}}
																	
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$v->goods_num}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-amount">
																{{$v->pay_money}} + 
																{{$v->pay_yunfei}}元
 															</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">
															@if ($v->buy_order_status ==1) 待付款 
															@elseif ($v->buy_order_status ==2) 待发货 
															@elseif ($v->buy_order_status ==3) 待收货 
															@elseif ($v->buy_order_status ==4) 待评价 
														
															@endif

																	</p>
																		
																	
																</div>
															</li>
															<li class="td td-change" style="margin-left: 20px">
																
																	
				@if ($v->buy_order_status ==1) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}" id="zhifu{{$v->id}}">一键支付{{$v->id}}
				
				</div>
				@elseif ($v->buy_order_status ==2)<div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}"
					id="fahuo{{$v->id}}"> 提醒发货{{$v->id}} </div>
				@elseif ($v->buy_order_status ==3) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}">确认收货 </div>
			    @elseif ($v->buy_order_status ==4) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}">评价商品</div>
				@endif	
					


												</li>
														</div>
													</div>
												</div>

											</div>
										@endforeach
										</div>

									</div>

				


								</div>
								<div id="tab2" class="am-tab-panel am-fade">

									<div class="order-top">
				
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											价格
										</div>
										<div class="th th-number">
											数量
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计/ 运费
										</div>
										<div class="th th-status" style="margin-left: 20px">
											交易状态
										</div>
										<div class="th th-change" style="margin-left: 20px">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status2" id="list1">
												
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

				//全部
				$('#uls li:eq(0) ').on('click',function(){

					location.reload();

				});


				//待付款 1	
				$('#uls li:eq(1) ').on('click',function(){

				$.post('/home/center/order/list1',{status:1},function(data){

						getInfo(1,data);
					
				},'json')


				});


				//待发货 2
				$('#uls li:eq(2) ').click(function(){

				$.post('/home/center/order/list1',{status:2},function(data){

						getInfo(2,data);
						
				},'json')

				});

				//待收货 3
				$('#uls li:eq(3) ').click(function(){

				$.post('/home/center/order/list1',{status:3},function(data){

						getInfo(3,data);
						
				},'json')

				});	

				//待评价 4
				$('#uls li:eq(4) ').click(function(){

				$.post('/home/center/order/list1',{status:4},function(data){

						getInfo(4,data);
						
				},'json')

				});	

			</script>		
			<script>
					$('.test1').live('click',function(){

						var id = $(this);
						pay(1,id);
					})
				
					//(动态绑定)一键支付 
					$('.zhifu').live('click',function(){

						 var id = $(this);
						 		pay(2,id);
							
					})

					//推送消息
					$('.test2,.fahuo').live('click',function(){

						  var id = $(this)

						$.post('/home/center/news/add',{id:$(this).attr('id')},function(data){

								if(data){

									alert('消息已发送');

									id.attr('class','disabled');
									id.css('background','blue');
								}else{
									alert('消息发送失败');
								}

						})
					})


			</script>

			<script>	

			//付款函数	
			function pay (number,id){	

					$.get('/home/center/order/pay',{id:id.attr('id')},function(data){
	       				
	       				if(data =="0"){

	       					alert('抱歉,余额不足'); 

	       				}else if(data =='1' ){

	       					alert('付款成功');

	       					var num=id.attr('id').substr(-1,1);
			       			
			       				//区分主页和分页节点样式
			       				if(number== 2 ){	
			       					
			       					id.parents().find('#alls'+num).empty();
			       					}else{

			       					id.parents().find('#a_'+num).empty();	
			       					
			       					}


	       				}else if (data =='2'){

	       					alert('抱歉,付款失败');
	       				}
	   			})
			}

			//分支函数					
			function getInfo(sta,data)
			{
					if(sta == "zhuye"){
						$('#list').empty();
					}else{
					$('#list'+sta).empty();
					}
						for (var i in data ){

							 if(data[i].buy_order_status ==1){ var status ='待付款';  var btn="一键支付"; var a ="zhifu"}
						else if(data[i].buy_order_status ==2){ var status ='待发货';  var btn="提醒发货"; var a ="fahuo"}
						else if(data[i].buy_order_status ==3){ var status ='待收货';  var btn="确认收货"; var a ="shouhuo"}
						else if(data[i].buy_order_status ==4){ var status ='待评价';  var btn="评价商品"; var a ="pingjia"}
						else if(data[i].buy_order_status ==5){ var status ='已完成';  var btn="查看评价"; var a ="show"}

						var op = $('<div class="order-status3" id="alls'+data[i].id+'" > <div class="order-title"> <div class="dd-num">订单编号：<a href="javascript:;">'+data[i].order_num+'</a></div> <span>下单时间：'+data[i].order_atime+'</span> </div> <div class="order-content"> <div class="order-left"> <ul class="item-list"> <li class="td td-item"> <div class="item-pic"> <a class="J_MakePoint" href="#"> '+data[i].goods_photo+' </a> </div> <div class="item-info"> <div class="item-basic-info"> <a href="#"> <p class="info-little">商品名</p> <p class="info-little">'+data[i].title+' <br>卖家：'+data[i].sale_uid+' </p> </a> </div> </div> </li> <li class="td td-price"> <div class="item-price">'+data[i].newprice+' </div> </li> <li class="td td-number"> <div class="item-number"> <span>×</span>'+data[i].goods_num+'</div> </li> <li class="td td-operation"> <div class="item-operation">   <div class="item-amount"> '+ data[i].pay_money+' + '+data[i].pay_yunfei+'元</p> </div> </div> </li> </ul> </div> <div class="order-right">  <div class="move-right"> <li class="td td-status"> <div class="item-status"> <p class="Mystatus">'+status+'</p> <p class="order-info"><a href="orderinfo.html"></a></p> </div> </li> <li class="td td-change" style="margin-left: 20px"> <div class="am-btn am-btn-danger anniu '+a+'" id="allss'+data[i].id+'">'+btn +'</div> </li> </div> </div></div></div>'); 
 
						  op.appendTo($('#list'+sta));

					}

				}	

			</script>	

@endsection()