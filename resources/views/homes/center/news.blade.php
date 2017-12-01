@extends('homes.layout.center')
@section('title','我的消息')

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



					<div class="user-news">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的消息</strong> / <small>News</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2">
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">购买消息</a></li>
								<li><a href="#tab2">出售消息</a></li>
							</ul>
							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">
										@foreach ($arr as $k =>$v)	
										<div class="order-list" id="all{{$v->id}}">
											<div class="order-title">
												<div class="dd-num">
                                                 @if($v->send_uid ==0)
                                                   系统提示
                                                  @else  
													卖家：<a href="javascript:;">{{$v->username}}</a>
                                                 @endif

												</div>
												<span>时间：{{$v->created_at}}</span>
											
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
															
																	<img  class="itempic J_ItemImg" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}" >
																
															</div>
															<div class="item-info">
																<div class="item-basic-info" style="">
																	
																
																	{{$v->msg_content}} 
																	
																</div>
																<div style="text-align: left;margin-top: 10px">
																	商品 : {{$v->title}}
																</div>
															</div>
														</li>

													
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status zhen" >
@if( $v->mes_status == 0)
<p class="Mystatus read" id="{{$v->id}}read" style="cursor: pointer;">朕已阅</p> 
@else 
<p class="Mystatus" id="read" style="cursor:not-allowed;color:black">朕已阅</p> 
@endif

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
												
														
														<div class="am-btn am-btn-danger anniu del" id="{{$v->id}}del">
														   删除</div>
														
													</li>
												
														
													

												</div>

											</div>
										</div>
									 	@endforeach	
							
								</div>
									<div id="tab2" class="am-tab-panel am-fade am-in am-active">
										@foreach ($ar as $k =>$v)	
										<div class="order-list" id="all{{$v->id}}">
											<div class="order-title">
												<div class="dd-num">
													  @if($v->send_uid ==0)
                                                   系统提示
                                                  @else  
													买家：<a href="javascript:;">{{$v->username}}</a>
                                                 @endif
												</div>
												<span>时间：{{$v->created_at}}</span>
											
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
															
																	<img class="itempic J_ItemImg" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
																
															</div>
															<div class="item-info">
																<div class="item-basic-info" style="">

																	
																 {{$v->msg_content}} 
															
	
																		
																	
																</div>
																<div style="text-align: left;margin-top: 10px">
																	商品 : {{$v->title}}
																</div>
															</div>
														</li>

													
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status zhen" >
@if( $v->mes_status == 0)
<p class="Mystatus read" id="{{$v->id}}read" style="cursor: pointer;">朕已阅</p> 
@else 
<p class="Mystatus" id="read" style="cursor:not-allowed;color:black">朕已阅</p> 
@endif

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
												
														
														<div class="am-btn am-btn-danger anniu del" id="{{$v->id}}del">
														   删除</div>
														
													</li>
												
														
													

												</div>
											</div>
										</div>
									 	@endforeach	

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

						$('.read').live('click',function(){

							read = $(this);	

							//拼装信息id
							var id=parseInt(read.attr('id'));
							
							$.get('/home/center/news/readed',{id:id},function(data){

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

										read.attr('class','Mystatus')	
										read.css('color','black');
										read.css('cursor','not-allowed')
										
									}else{
										layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,操作失败<br/>请重试</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});
									}

							})
						})

						$('.del').live('click',function(){

								del =$(this);
							    var ids=parseInt(del.attr('id'));

								$.post('/home/center/news/del',{id:ids},function(data){

									console.log(data);

									if(data == 1){

										
										layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">删除成功</div>'
										  ,btn: ['确定'] 
										  ,zIndex: layer.zIndex 
										  ,success: function(layero){
										    layer.setTop(layero); 
										  }
										});

										del.parents().find('#all'+ids).remove();
									}else{

										
										layer.open({
										  type: 1 
										  ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
										  ,area: ['500px', '200px']
										  ,shade: 0
										  ,maxmin: false
										  ,content: '<div style="font-size:15px;margin:30px">抱歉,操作失败!<br>请重试</div>'
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
						
				

@endsection()