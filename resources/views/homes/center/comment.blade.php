










@extends('homes.layout.center')
@section('title','评价管理')

@section('cssjs')


		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/cmstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		
        <script src="/homes/validate.js"></script>

        <script type="text/javascript" src="{{url('/homes/layer1/jquery.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/layer.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/extend/layer.ext.js')}}"></script>


	
@endsection()




@section('content')

<div class="user-comment">
	<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">我的评价</a></li>
								<li><a href="#tab2">评价我的</a></li>

							</ul>

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active">

									<div class="comment-main">
										<div class="comment-list">
											@foreach ($a as $k => $v)
											<ul class="item-list" id="{{$v->id}}all">

												
												<div class="comment-top">
													<div class="th th-price">
														评价
													</div>
													<div class="th th-item" style="width:200px">
														商品
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a class="J_MakePoint" href="#">
															<img class="itempic" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">{{$v->title}}</p>
															</a>
														</div>
													</div>
													<div class="item-comment" style="height:80px">
														{{$v->comment}}
													</div>

													<div class="item-info">
														<div>
													<p class="info-little dels" id="{{$v->id}}del" style="cursor:pointer;">删除</p>
															<p class="info-time">买家我在{{$v->created_at}}评论了卖家{{$v->username}}的商品</p>

														</div>
													</div>
												</li>

											</ul>
											@endforeach

											@foreach ($b as $k => $v)
											<ul class="item-list" id="{{$v->id}}all">

												
												<div class="comment-top">
													<div class="th th-price">
														评价
													</div>
													<div class="th th-item" style="width:200px">
														商品
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a class="J_MakePoint" href="#">
															<img class="itempic" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
														</a>
													</div>
												</li>

												<li class="td td-comment" style="height:80px">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">{{$v->title}}</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														{{$v->comment}}
													</div>

													<div class="item-info">
														<div>
														<p class="info-little dels" id="{{$v->id}}del" style="cursor:pointer;">删除{{$v->id}}</p>
															<p class="info-time">卖家我在{{$v->created_at}}评论了买家{{$v->username}}</p>
														
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
											@foreach ($c as $k => $v)
											<ul class="item-list" >
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
															<img class="itempic" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
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
											
											<p class="info-time">卖家{{$v->username}}在{{$v->created_at}}评论了我</p>

														</div>
													</div>
												</li>

											</ul>
										 	@endforeach 

										 	@foreach ($d as $k => $v)
											<ul class="item-list" >
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
															<img class="itempic" src="http://ozstangaz.bkt.clouddn.com/{{$v->pic}}">
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
											
											<p class="info-time">买家{{$v->username}}在{{$v->created_at}}评论了我的商品</p>

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
			@if(session('zcsg'))

			 <script>	
						layer.confirm('<div style="font-size:15px">评论成功,已经自动为您跳转评论页面</div>', {
								btn: ['返回','确定'] //按钮
								 ,icon: 1
								,skin: 'layer-ext-moon'
							   ,title: '<div style="font-size:18px;color:#dd514c;">系统提示</div>'
								}, function(){
										location.href="/home/center/order/index";
								}); 
				
			 </script>	
									
		@endif		
							

					<script>
						$('.dels').click(function(){

							 b = $(this);

							 id = parseInt(b.attr('id')); 
							
							$.post('/home/center/comment/del',{id:id},function(data){

								if(data ==1 ){

										
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


									    b.parents().find($('#'+id+'all')).empty();
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

						$.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        }
						});

					</script>
				

@endsection()