@extends('homes.layout.center')
@section('title','个人中心')

@section('content')

  	<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="http://ozstangaz.bkt.clouddn.com/userphoto/{{$users->user_photo}}">
										</a>
										
										<div class="s-prestige am-btn am-round">
											</span>您好 : {{$users->username}},欢迎来到个人中心</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											@if($num > 0)	
											<a href="/home/center/news/index"><i class="am-icon-bell-o"></i>消息{{$num}}</a>
											@else	
											<a href="/home/center/news/index"><i class="am-icon-bell-o"></i>消息</a>
											@endif
										</div>
										<div class="m-address">
											<a href="/home/center/address" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									<div class="s-bar">
										<i class="s-icon"></i>个人资产
									</div>
									<p class="m-bonus">
										<a href="/home/center/recharge/index">
											<i><img src="/homes/images/bonus.png"/></i>
											<span class="m-title">充值</span>
											<em class="m-num"></em>
										</a>
									</p>
									<p class="m-bill">
										<a href="bill.html">
											<i><img src="/homes/images/wallet.png"/></i>
											<span class="m-title">余额</span>
											<em class="m-num"></em>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/homes/images/day-to.png"/></i>
											<span class="m-title">账单明细</span>
										</a>
									</p>
								
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--购买订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>购买订单
									<a class="i-load-more-item-shadow" href="/home/center/order/index">全部订单</a>
								</div>
								<ul>
									<li>
										@if($bfukuan == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待付款</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待付款<em class="m-num">{{$bfukuan}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($bfahuo == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待发货</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待发货<em class="m-num">{{$bfahuo}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($bshouhuo == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待收货</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待收货<em class="m-num">{{$bshouhuo}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($bpingjia == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待评价</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待评价<em class="m-num">{{$bpingjia}}</em></span></a>	
										@endif
									</li>
								</ul>
							</div>
							<!--出售订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>出售订单
									<a class="i-load-more-item-shadow" href="/home/center/maiOrder">全部订单</a>
								</div>
								<ul>
									<li>
										@if($sfukuan == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待付款</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待付款<em class="m-num">{{$sfukuan}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($sfahuo == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待发货</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待发货<em class="m-num">{{$sfahuo}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($sshouhuo == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待收货</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待收货<em class="m-num">{{$sshouhuo}}</em></span></a>	
										@endif
									</li>
									<li>
										@if($spingjia == 0)
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待评价</span></a>
										@else
										<a href="/home/center/order/index"><i><img src="/homes/images/pay.png"/></i><span>待评价<em class="m-num">{{$spingjia}}</em></span></a>	
										@endif
									</li>
								</ul>
							</div>
							<!--九宫格-->
							<div class="user-patternIcon">
								<div class="s-bar">
									<i class="s-icon"></i>我的常用
								</div>
								<ul>

									<a href="../home/shopcart.html"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="/homes/images/iconbig.png"/><p>购物车</p></li></a>
									<a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="/homes/images/iconsmall1.png"/><p>我的收藏</p></li></a>
									<a href="../home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="/homes/images/iconsmall0.png"/><p>为你推荐</p></li></a>
									<a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="/homes/images/iconsmall3.png"/><p>好评宝贝</p></li></a>
									<a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="/homes/images/iconsmall2.png"/><p>我的足迹</p></li></a>                                                                        
								</ul>
							</div>
					

							<!--收藏夹 -->
<!-- 							<div class="you-like">
								<div class="s-bar">我的收藏
									<a class="am-badge am-badge-danger am-round">降价</a>
									<a class="am-badge am-badge-danger am-round">下架</a>
									<a class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a>
								</div>
								<div class="s-content">
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="#" class="s-pic-link">
													<img src="/homes/images/0-item_pic.jpg_220x220.jpg" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">42.50</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>

											</div>
											<div class="s-title"><a href="#" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰">包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰</a></div>
											<div class="s-extra-box">
												<span class="s-comment">好评: 98.03%</span>
												<span class="s-sales">月销: 219</span>

											</div>
										</div>
									</div>


								</div>

								<div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

							</div> -->

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em id="time1"></em>
									<span id="date1"></span>
									<span></span>
								</div>
							</div>
						</div>



						<!--新品 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>今日新品
								
							</div>
							
							<div class="new-goods-info">

								
									<div class="face-img-panel">
										<a class="shop-info" href="http://{{ $status[0]->advs_src }}" target="_blank">
										<img src="http://ozstangaz.bkt.clouddn.com/{{ $status[0]->advs_s }}" alt="">
										</a>
									</div>
								
							</div>
						</div>
							
						<!--热卖推荐 -->
					<div class="new-goods">
						<div class="s-bar">
							<i class="s-icon"></i>热卖推荐
							</div>
							<div class="new-goods-info">
								
									<div >
										<a class="shop-info" href="http://{{$status[1]->advs_src}}" target="_blank">
										<img src="http://ozstangaz.bkt.clouddn.com/{{ $status[1]->advs_s }}" alt="">
									</a>
									</div>
								
							</div>
						</div>
					</div>



 <script type="text/javascript">
            var time1 = document.getElementById('time1');
            var date1 = document.getElementById('date1');

            //定时器
            setInterval(function(){

            //获取当前时间
            var d = new Date();
            //自定义时间
            // var d = new Date('2017-09-22 12:12:12');
            // console.log(d);
            //获取年份
            var y = d.getFullYear();
            //获取月份
            var m = d.getMonth()+1;    //0-11 月份是
            if(m<10){
                m = "0" + m;
            }
            //获取天
            var t = d.getDate();
            if(t<10){
                t = "0" + t;
            }
            //获取小时
            var h = d.getHours();       //24时制
            if(h<10){
                h = "0" + h;
            }
            //获取分钟
            var i = d.getMinutes();
            if(i<10){
                i = "0" + i;
            }
            //获取秒
            var s = d.getSeconds();
            if(s<10){
                s = "0" + s;
            }
           
       				time1.innerHTML = h+':'+i ;
       				date1.innerHTML = y+'年'+m+'月'+t+'日';
       			
            },1000)
     </script>

			
@endsection()

