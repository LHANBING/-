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
											运费
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计
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
													<span>下单时间 : {{$v->created_at}}</span>
												@if($v->buy_order_status == 3 ) 	
													<a  href="/home/center/change/add?id={{$v->id}}" style="float: right;color:#dd514c;margin:0px 10px;cursor: pointer;" id="{{$v->id}}tui">我要退货</a>
												@endif	
												</div>
												<div class="order-content">
													<div class="order-left">
													

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																
																<img src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}" alt="">
																	
																
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			
																			<p class="info-little">商品名称：
																			</p>
																			
																			<p class="info-little">{{$v->title}}<br/>
																			卖家 : {{$v->username}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	￥{{$v->pay_money}}
																	
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span></span> ￥{{$v->pay_yunfei}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-amount" style="color:#dd514c;">
																￥{{$v->pay_money + $v->pay_yunfei}}    
																
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
															@elseif ($v->buy_order_status ==5) 已完成 
														
															@endif

																	</p>
																		
																	
																</div>
															</li>
															<li class="td td-change" style="margin-left: 20px">
																
																	
				@if ($v->buy_order_status ==1) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}" id="{{$v->id}}zhifu">一键支付
				
				</div>
				@elseif ($v->buy_order_status ==2)<div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}" id="{{$v->id}}fahuo"> 提醒发货</div>

				@elseif ($v->buy_order_status ==3) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}" id="{{$v->id}}shouhuo">确认收货 </div>
				 @elseif ($v->buy_order_status ==4) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}"><a href="/home/center/comment/add?id={{$v->id}}" style="color:white">评价商品</a></div>
			    @elseif ($v->buy_order_status ==5) <div class="am-btn am-btn-danger anniu test{{$v->buy_order_status}}"><a href="/home/center/comment/index" style="color:white">查看评价</a></div>
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
											运费
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计
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
								<div id="tab3" class="am-tab-panel am-fade">

									<div class="order-top">
				
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											价格
										</div>
										<div class="th th-number">
											运费
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计
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
											<div class="order-status2" id="list2">
												
											</div>
										</div>

									</div>
								</div>
								<div id="tab4" class="am-tab-panel am-fade">

									<div class="order-top">
				
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											价格
										</div>
										<div class="th th-number">
											运费
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计
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
											<div class="order-status2" id="list3">
												
											</div>
										</div>

									</div>
								</div>
								<div id="tab5" class="am-tab-panel am-fade">

									<div class="order-top">
				
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											价格
										</div>
										<div class="th th-number">
											运费
										</div>
									
										<div class="th th-amount" style="margin-left: 20px">
											合计
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
											<div class="order-status2" id="list4">
												
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
					//主页支付
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

						  var id = $(this);
						  
						  ids =parseInt(id.attr('id')); 

						$.post('/home/center/news/add',{id:ids},function(data){

							console.log(data);
								if(data == 1){

										layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">消息已发送,请耐心等待哦<br/>如果长时间未收到货,请尝试联系买家电话!</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
					
									
								}else{
									
										layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,遇到未知原因<br/>发送失败,请重试</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
								}

						})
					})

				 //确认收货
				 $('.test3').live('click',function(){

				 		var id = $(this)

						 
						ids = parseInt(id.attr('id'));	
						

				 	  $.post('/home/center/order/sure',{id:ids},function(data){

				 	  		console.log(data);
				 	 		if(data == 1){
				 	 			
				 	 				layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">操作成功</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});

				 	 			location.reload();

				 	 		}else{
				 	 			layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,遇到未知原因<br/>操作失败请重试</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
				 	 		}	
				 	  })	

				 })
				 //确认收货分页
				  $('.shouhuo').live('click',function(){

				 		 ids = $(this);

				 		 id = parseInt(ids.attr('id'));

				 		//alert(id);
				 	  $.post('/home/center/order/sure',{id:id},function(data){

				 	 		if(data == 1){

					 	 			layer.open({
											  type: 1 
											  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
											  ,area: ['500px', '200px']
											  ,shade: 0
											  ,maxmin: false
											  ,content: '<div style="font-size:15px;margin:30px">操作成功</div>'
											  ,btn: ['确定'] 
											  ,zIndex: layer.zIndex 
											  ,success: function(layero){
											    layer.setTop(layero); 
											  }
											});

				 	 			ids.parents().find('#alls'+id).remove();

				 	 		}else{

				 	 			layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,遇到未知原因<br/>操作失败请重试</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
				 	 		}	
				 	  })	

				 })

			</script>

			<script>	

			//付款函数	
			function pay (number,id){	

					ids=parseInt(id.attr('id'));

					//alert(ids);
					$.get('/home/center/order/pay',{id:ids},function(data){
	       				
	       				if(data =="0"){

								layer.confirm('<div style="font-size:15px">抱歉,余额不足,前去充值？</div>', {
								btn: ['确认','取消'] //按钮
								 ,icon: 5
								,skin: 'layer-ext-moon'
							   ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
								}, function(){
										location.href="/home/center/recharge/index";
								}); 

	       				}else if(data =='1' ){

	       					
	       						layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">付款成功</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});

	       				
			       			
			       				//区分主页和分页节点样式
			       				if(number== 2 ){	
			       					
			       					id.parents().find('#alls'+ids).empty();
			       					}else{

			       					id.parents().find('#a_'+ids).empty();	
			       					
			       					}


	       				}else if (data =='2'){

	       					layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,遇到未知原因<br/>操作失败请重试</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
	       				}
	   			})
			}

			//分支函数					
			function getInfo(sta,data)
			{
					//清空信息,防止累加
					$('#list'+sta).empty();
					
						for (var i in data ){


					 if(data[i].buy_order_status == 3) 	{ 

							 	var tui ="<a style='float: right;color:#dd514c;margin:0px 10px;cursor:pointer' clas='tuihuos' href='/home/center/change/add?id="+data[i].id+"'>我要退货</a>"
						     } else{
						     	 var tui = "<span></span>"
						     }
						

							 if(data[i].buy_order_status ==1){ var status ='待付款';  var btn="一键支付"; var a ="zhifu"}
						else if(data[i].buy_order_status ==2){ var status ='待发货';  var btn="提醒发货";  var a ="fahuo"}
						else if(data[i].buy_order_status ==3){ var status ='待收货';  var btn="确认收货";  var a ="shouhuo"}
						else if(data[i].buy_order_status ==4){ var status ='待评价';  var btn="<a href='/home/center/comment/add?id="+data[i].id+"' style='color:white'>评价商品</a>"; var a ="pingjia"}
						else if(data[i].buy_order_status ==5){ var status ='已完成';  var btn="查看评价";  var a ="show"}

							var s = data[i].pay_money+data[i].pay_yunfei;



						var op = $('<div class="order-status3" id="alls'+data[i].id+'" > <div class="order-title"> <div class="dd-num">订单编号：<a href="javascript:;">'+data[i].order_num+'</a></div> <span>下单时间：'+data[i].created_at+'</span>'+tui+'</div> <div class="order-content"> <div class="order-left"> <ul class="item-list"> <li class="td td-item"> <div class="item-pic">  <img src="http://ozstangaz.bkt.clouddn.com/'+data[i].pic+' " alt=""> </div> <div class="item-info"> <div class="item-basic-info"> <a href="#"> <p class="info-little">商品名</p> <p class="info-little">'+data[i].title+' <br>卖家：'+data[i].username+' </p> </a> </div> </div> </li> <li class="td td-price"> <div class="item-price">￥'+data[i].pay_money+' </div> </li> <li class="td td-number"> <div class="item-number">￥'+data[i].pay_yunfei+'</div> </li> <li class="td td-operation"> <div class="item-operation">   <div class="item-amount" style="color: #dd514c">￥'+s+'</div> </div> </li> </ul> </div> <div class="order-right">  <div class="move-right"> <li class="td td-status"> <div class="item-status"> <p class="Mystatus">'+status+'</p> <p class="order-info"><a href="orderinfo.html"></a></p> </div> </li> <li class="td td-change" style="margin-left: 20px"> <div class="am-btn am-btn-danger anniu '+a+'" id="'+data[i].id+'allss">'+btn+'</div> </li> </div> </div></div></div>'); 
 
						  op.appendTo($('#list'+sta));

						

					}

				}	

				

			</script>	

@endsection()