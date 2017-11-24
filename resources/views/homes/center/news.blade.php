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
								<li class="am-active"><a href="#tab1">我的消息</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">
										@foreach ($arr as $k =>$v)	
										<div class="order-list" id="all{{$ar[$k]->id}}">
											<div class="order-title">
												<div class="dd-num">发送人 ：<a href="javascript:;">{{$v->username}}</a></div>
												<span>发送时间：{{$v->create_at}}</span>
											
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="#" class="J_MakePoint">
																	<img src="{{$v->user_photo}}" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="#">
																		<p>{{$v->msg_content}}</p>
																	</a>
																</div>
															</div>
														</li>

													
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status zhen" >
@if( $v->mes_status == 0)
<p class="Mystatus read" id="{{$ar[$k]->id}}read" style="cursor: pointer;">朕已阅{{$ar[$k]->id}}</p> 
@else 
<p class="Mystatus" id="{{$ar[$k]->id}}read" style="cursor:not-allowed;color:black">朕已阅{{$ar[$k]->id}}</p> 
@endif

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
														<a href="/home/center/news/show?id={{$ar[$k]->id}}">
													<div class="am-btn am-btn-danger anniu" id="{{$ar[$k]->id}}show" style="margin-right:10px">
															查看</div>
														</a>
														
														<div class="am-btn am-btn-danger anniu del" id="{{$ar[$k]->id}}del">
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

										read.attr('class','Mystatus')	
										read.css('color','black');
										read.css('cursor','not-allowed')
										
									}else{
										alert('操作失败');
									}

							})
						})

						$('.del').live('click',function(){

								del =$(this);
							    var ids=parseInt(del.attr('id'));

								$.post('/home/center/news/del',{id:ids},function(data){

									console.log(data);

									if(data == 1){

										alert('删除成功');
										del.parents().find('#all'+ids).remove();
									}else{

										alert('删除失败,请重试');
									}

								})
						})
					
					</script>
						
				

@endsection()