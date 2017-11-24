<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/homes/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		
		<script src="/homes/js/jquery-1.8.3.min.js"></script>


	</head>

	<body>
		<!-- 判断用户是否登录,显示不同导航条 -->

		@if(session('uid'))
			<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="/home/center/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="/home/logout" target="_top"><i class="am-icon-user am-icon-fw"></i>退出</a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="home/center/news/index" target="_top" id="as"><img src="/homes/images/12news.png" alt="" style="width:13px;margin-top:-5px" /> 

						@if($a == 0 )
						<span>消息</span>
						@else
						<span id="news">消息{{$a}}</span>
						@endif

						</a>
						</div>
					</ul>
				</div>

			

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="/homes/images/logo.png" /></div>
					<div class="logoBig">
						<li><img src="/homes/images/logobig.png" /></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form>
							<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>

				<div class="clear"></div>
			</div>
		@else
			<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="/home/login" target="_top" class="h">亲，请登录</a>
							<a href="/home/register" target="_top">免费注册</a>
						</div>
					</div>
				</ul>
				
				</div>

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="/homes/images/logo.png" /></div>
					<div class="logoBig">
						<li><img src="/homes/images/logobig.png" /></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form>
							<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>

				<div class="clear"></div>
			</div>
		@endif
		


			<div class="banner ">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides" style="overflow: hidden;">
								<li class="banner1"><a href="introduction.html"><img src="/homes/images/ad1.jpg" /></a></li>
								<li class="banner2"><a><img src="/homes/images/ad2.jpg" /></a></li>
								<li class="banner3"><a><img src="/homes/images/ad3.jpg" /></a></li>
								<li class="banner4"><a><img src="/homes/images/ad4.jpg" /></a></li>

							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul style="width: 800px">
								<li class="index" style="width: 100px"><a href="#">首页</a></li>
                                <li class="qc" style="width: 100px"><a href="#">闪购</a></li>
                                <li class="qc" style="width: 100px"><a href="#">限时抢</a></li>
                                <li class="qc" style="width: 100px"><a href="#">团购</a></li>
                                <li class="qc last" style="width: 100px"><a href="#">大包装</a></li>
							</ul>
						  
						</div>					
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">

											@foreach($type as $k=>$v)
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/cake.png"></i><a class="ml-22" title="点心">{{$v->typename}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">{{$v->typename}}</span></dt>
																		@foreach($typechild as $key=>$val)
																		@if($v->id == $val->type_id)
																		<dd><a title="蒸蛋糕" href="/home/listtype/{{$v->id}}"><span>{{$val->typechildname}}</span></a></dd>
																		@endif
																		@endforeach
																	</dl>

																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >呵官方旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="#" rel="nofollow"><span >格瑞旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="#" rel="nofollow"><span  class="red" >飞彦大厂直供</span></a></dd>
																		<dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="#" rel="nofollow"><span >红e·艾菲妮</span></a></dd>
																		<dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >本真旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="#" rel="nofollow"><span  class="red" >杭派女装批发网</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>

					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--热门活动 -->
					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							
						</div>
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src="/homes/images/activity1.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						
					  </div>
                   </div>
				<div class="clear "></div>


					@foreach($type as $typek => $typev)
                    <div id="f1">
					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle " style="border-bottom:0px solid #000;">

							<h4>{{$typev->typename}}</h4>
							<h3>商品的故事</h3>
							<div class="today-brands " style="text-align:left; right: 360px;">

								@foreach($typechild as $typechildk=>$typechildv)
								@if($typev->id == $typechildv->type_id)
								<a href="/home/listtype/{{$typev->id}}" style="font-size: 1.2em;color: skyblue">{{$typechildv->typechildname}}</a>
								@endif
								@endforeach
							</div>
							
						</div>
					</div>
					

					@endforeach

					<div class="am-container " style="height: 10px;border-bottom: 2px solid #FF5400"></div>
					<div style="height: 10px"></div>

					<div class="am-g am-g-fixed floodFour">
						
							@foreach($goods as $goodsk=>$goodsv)
							

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										{{$goodsv->title}}
									</div>
									<div class="sub-title ">
										现价:{{$goodsv->newprice}}
									</div>
									<div class="sub-title ">
										原件:{{$goodsv->newprice}}
									</div>
								</div>
								<a href="/home/listdetail/{{$goodsv->id}}"><img src="{{$goodsv->goods_photo}}" style="width: 60%" /></a>
							</div>
						
							@endforeach


					</div>

                 <div class="clear "></div>  
                 </div>
   
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>

		</div>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>






	<!-- 右边栏信息 -->

		<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">

					@if(session('uid'))
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="/homes/images/no-img_mid_.jpg " /></p>
								<ul class="user_info ">
									<li>用户名sl1903</li>
									<li>级&nbsp;别普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
				
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

				

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="/homes/images/wdsc.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="/homes/images/chongzhi.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>
					@endif



					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="/homes/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
		</div>
			
		<script>
			window.jQuery || document.write('<script src="/homes/basic/js/jquery.min.js "><\/script>');


		</script>
		<script type="text/javascript " src="/homes/basic/js/quick_links.js "></script>
	</body>

</html>