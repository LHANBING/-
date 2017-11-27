@extends('homes.layout.center')
@section('title','添加评论')

@section('cssjs')

		
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/jquery-1.7.2.min.js"></script>
@endsection()

@section('content')


<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr>

						<div class="comment-main">
							<div class="comment-list">
								<div class="item-pic" style="float:left">
									<a class="J_MakePoint" href="#">
										<img class="itempic" src="{{ $arr->pic}}">
										
										
									</a>
								</div>

								 <div class="item-title" style="width:800px">
								
									<div class="item-name" style="margin-top:20px">
										<p class="item-basic-info">商品 :{{ $arr->title}}</p>
									</div>
									<div class="item-info">
									  <div class="item-name" style="margin-top:20px">
										<p class="item-basic-info">商家 :{{$arr->username}}</p>
									  </div>
										
										<div class="item-price" style="margin-top:10px">
											价格：<strong>{{$arr->newprice}}</strong>
										</div>

										<div style="margin-top:10px">
											详情：{{$con->content}}
										</div>	
										

																				
									</div>
								</div> 
								
								<div>
									<form action="/home/center/comment/stro" method="post">
									<textarea name="content" style="margin-top:20px" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" ></textarea>
					
					
					<!--订单id-->
				<input type="hidden" name="id" value="{{$oid}}">

								</div>
								<div class="clear"></div>
								
							</div>
							
												{{csrf_field()}}
								<div class="info-btn">
									<button style="border:0px"><div class="am-btn am-btn-danger">发表评论</div></button>
								</div>	
									</form>					
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     })

						$.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        }
						});
					</script>					
					
												
							
						</div>

					</div>
				

@endsection()