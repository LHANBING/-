@extends('homes.layout.center')
@section('title','查看信息')

@section('cssjs')

		
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/bostyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/js/jquery-1.8.3.js"></script>
		
@endsection()

@section('content')

<div class="user-bonus">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">查看信息</strong> / <small>showNews</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs-d2 am-tabs  am-margin">

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-active am-in">
										
									<div class="cart-table-th">
										<div class="order-top">
											<div class="th th-from">
												来源
											</div>
											<div class="th th-remainderprice">
												类型
											</div>
											<div class="th th-term">
												时间
											</div>
											<div class="th th-usestatus">
												商品
											</div>
										</div>
										<div class="clear"></div>
										<div class="order-main">

											<ul class="item-list">
												<li class="td td-from">
													<div class="item-img">
														<img src="{{$res->user_photo}}">
													</div>

													<div class="item-info">

														<a href="#">
															{{$res->username}}
														</a>

													</div>
												</li>
												<li class="td td-remainderprice">
													<div class="item-remainderprice">
														{{$res->msg_content}}
													</div>
												</li>

												<li class="td td-term ">
												
														 {{$res->create_at}} 
													
												</li>

												<li class="td td-usestatus ">
													<div class="item-usestatus ">
														<p>{{$res->title}}</p><span><img span="" <="" src="../images/gift_stamp_1.png">
													</span></div>
												</li>
											</ul>



										</div>
										<div style="width:100px;float:right;margin-top:5px;color:#d2364c;cursor:pointer;" onclick="fun()">返回上一级
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
		<script>
			function fun ()
			{
				location.href="/home/center/news/index";
			}
		</script>
				

@endsection()