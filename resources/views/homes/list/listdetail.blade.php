@extends('homes.layout.list')
@section('title','商品详情页')


		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="/homes/css/optstyle.css" rel="stylesheet" />
        <link type="text/css" href="/homes/css/style.css" rel="stylesheet" />

        <script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="/homes/basic/js/quick_links.js"></script>

        <script type="text/javascript" src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
        <script type="text/javascript" src="/homes/js/jquery.imagezoom.min.js"></script>
        <script type="text/javascript" src="/homes/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/homes/js/list.js"></script>

	</head>

	<body>


	@section('content')
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								@foreach($goods_photo as $k=>$v)
								<li>
									<img src="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->$k}}" title="pic" />
								</li>
								@endforeach
								
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->img1}}"><img src="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->img1}}" alt="细节展示放大镜特效" rel="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->img1}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								@foreach($goods_photo as $k=>$v)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->$k}}" mid="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->$k}}" big="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->$k}}"></a>
									</div>
								</li>
								@endforeach
								
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>{{ $goods->title}}</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price">{{$goods->newprice}}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{$goods->oldprice}}</b></dd>
									<dd><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></dd>
									<dd><em>运费</em></dd>									
									<dd><em>¥</em>{{$goods->transprice}}</dd>									
								</li>
								<div class="clear"></div>

							</div>

							<div style="height: 50px;width: 100px;margin-left: 60px;margin-top: 20px">
								<a href=""><img style="width: 30%" src="/homes/images/qq.jpg" alt="QQ"></a>
								<a href=""><span>联系卖家</span></a>
							</div>

							
							
						</div>
						<div style="height: 20px"></div>
						<div class="pay">
							
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="/home/gopay?goods_id={{$goods->id}}">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="{{$goods->id}}" class="collect" title="加入购物车" onclick="func(this)"><i></i>收藏</a>
								</div>
							</li>
						</div>

					</div>

					<div class="clear"></div>

				</div>

			
				
							
				<!-- introduce-->

				<div class="introduce">
					
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs style="margin-left: 100px ">
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">卖家信用足迹</span></a>

								</li>

							</ul>

							<div class="am-tabs-bd">

								

								<div class="am-tab-panel am-fade">
									
                                    
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>卖家走过的套路</span>
													<span class="tb-tbcr-num"></span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
										<li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="/homes/images/hwbn40x40.jpg" />
												<!-- 评论者头像 -->
											</a>





											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">2015年11月02日 17:46</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
														</div>
														<div class="tb-r-act-bar">
															颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
														</div>
													</div>

												</div>
												<!-- 评论内容 -->
											</div>





										</li>
								
									</ul>

									<div class="clear"></div>



									

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>





									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 购物保障，明确您的售后保障权益。</div>
									</div>


@endsection()

<script>
	var func = function(obj){
		var id = $(obj).attr('id');

		$.post('/home/collect',{id:id,_token:'{{csrf_token()}}'},function(data){
			alert(data);
			/*layer.open({
				content:'修改默认地址成功!'
				,btn: ['确认']
  				,btn1: function(){
    				location.reload();
    			}
			})*/
			
		})
  		
	}
</script>


