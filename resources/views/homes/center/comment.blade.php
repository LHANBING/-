@if(session('zcsg'))
	 <script>	
		alert("{{ session('zcsg')}}");
		
	 </script>	
							
@endif		
					

@extends('homes.layout.center')
@section('title','评价管理')

@section('cssjs')


		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/cmstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>



@endsection()

@section('content')

<div class="user-comment">
	<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">评价我的</a></li>
								<li><a href="#tab2">我的评价</a></li>

							</ul>

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">

									<div class="comment-main">
										<div class="comment-list">
											@foreach ($res as $k => $v)
											<ul class="item-list">

												
												<div class="comment-top">
													<div class="th th-price" style="width:350px">
														评价
													</div>
													<div class="th th-item">
														商品
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a class="J_MakePoint" href="#">
															<img class="itempic" src="{{$v->goods_photo}}">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">
																	{{$v->title}}
																</p>
															</a>
														</div>
													</div>
													<div class="item-comment" style="height:100px">
														{{$v->comment}} 
													</div>

													<div class="item-info">
														<div>
															<p class="info-little">回复{{$k}} </p>
															<p class="info-time">{{$v->time}}</p>

														</div>
													</div>
												</li>

											</ul>
											@endforeach
										</div>
									</div>

								</div>
								<div id="tab2" class="am-tab-panel am-fade">
									
									<div class="comment-main">
										<div class="comment-list">
											@foreach ($re as $k => $v)
											<ul class="item-list" id="{{$res[$k]->id}}all">

												
												<div class="comment-top">
													<div class="th th-price" style="width:350px">
														评价
													</div>
													<div class="th th-item">
														商品
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a class="J_MakePoint" href="#">
															<img class="itempic" src="{{$v->goods_photo}}">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">
																	{{$v->title}}
																</p>
															</a>
														</div>
													</div>
													<div class="item-comment" style="height:100px">
														{{$v->comment}} 
													</div>

													<div class="item-info">
														<div>
											<p class="info-little dels" id="{{$res[$k]->id}}del" style="cursor:pointer;">删除{{$res[$k]->id}} </p>
											<p class="info-time">{{$v->time}}</p>

														</div>
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

					<script>
						$('.dels').click(function(){

							 b = $(this);

							 id = parseInt(b.attr('id')); 
							
							$.post('/home/center/comment/del',{id:id},function(data){

								if(data ==1 ){

										alert('删除成功');
									    b.parents().find($('#'+id+'all')).remove();
								}else{
									    alert('删除失败');
								}

							})
						})	

						$.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        }
						});

					</script>
				

@endsection()