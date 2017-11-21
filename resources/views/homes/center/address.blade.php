@extends('homes.layout.center')
@section('title','收货地址')

@section('cssjs')

		
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

@endsection()

@section('content')



					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">

							<li class="user-addresslist defaultAddr">
								<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
								<p class="new-tit new-p-re">
									<span class="new-txt">小叮当</span>
									<span class="new-txt-rd2">159****1622</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">湖北</span>省
										<span class="city">武汉</span>市
										<span class="dist">洪山</span>区
										<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
								</div>
								<div class="new-addr-btn">
									{{$id=10}}
									<a href="/home/center/address/{{$id}}/edit"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>

									<form action="/home/center/address/{{$id}}" method="post" style="float: right">
									<i class="am-icon-trash"></i><button style="border:0px;background:white">删除</button>
									
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									</form>

								</div>
							</li>

						</ul>
						<div class="clear"></div>
						<a data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}" class="new-abtn-type">添加新地址</a>
						<!--例子-->
						<div id="doc-modal-1" class="">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr>

								<div style="margin-top: 20px;" class="am-u-md-12 am-u-lg-8">
									<form class="am-form am-form-horizontal" method="post" action="/home/center/address">

										<div class="am-form-group">
											<label class="am-form-label" for="user-name">收货人</label>
											<div class="am-form-content">
												<input type="text" placeholder="收货人" id="user-name">
											</div>
										</div>

										<div class="am-form-group">
											<label class="am-form-label" for="user-phone">手机号码</label>
											<div class="am-form-content">
												<input type="email" placeholder="手机号必填" id="user-phone">
											</div>
										</div>
										<div class="am-form-group">
											<label class="am-form-label" for="user-address">所在地</label>
											<div class="am-form-content address">
												<select data-am-selected="" style="display: none;">
													<option value="a">浙江省</option>
													<option selected="" value="b">湖北省</option>
												</select><div data-am-dropdown="" id="am-selected-whbzi" class="am-selected am-dropdown ">  <button class="am-selected-btn am-btn am-dropdown-toggle am-btn-default" type="button">    <span class="am-selected-status am-fl">湖北省</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li data-value="a" data-group="0" data-index="0" class="">         <span class="am-selected-text">浙江省</span>         <i class="am-icon-check"></i></li>                                 <li data-value="b" data-group="0" data-index="1" class="am-checked">         <span class="am-selected-text">湖北省</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
												<select data-am-selected="" style="display: none;">
													<option value="a">温州市</option>
													<option selected="" value="b">武汉市</option>
												</select><div data-am-dropdown="" id="am-selected-rfo2y" class="am-selected am-dropdown ">  <button class="am-selected-btn am-btn am-dropdown-toggle am-btn-default" type="button">    <span class="am-selected-status am-fl">武汉市</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li data-value="a" data-group="0" data-index="0" class="">         <span class="am-selected-text">温州市</span>         <i class="am-icon-check"></i></li>                                 <li data-value="b" data-group="0" data-index="1" class="am-checked">         <span class="am-selected-text">武汉市</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
												<select data-am-selected="" style="display: none;">
													<option value="a">瑞安区</option>
													<option selected="" value="b">洪山区</option>
												</select><div data-am-dropdown="" id="am-selected-leihk" class="am-selected am-dropdown ">  <button class="am-selected-btn am-btn am-dropdown-toggle am-btn-default" type="button">    <span class="am-selected-status am-fl">洪山区</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li data-value="a" data-group="0" data-index="0" class="">         <span class="am-selected-text">瑞安区</span>         <i class="am-icon-check"></i></li>                                 <li data-value="b" data-group="0" data-index="1" class="am-checked">         <span class="am-selected-text">洪山区</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
											</div>
										</div>

										<div class="am-form-group">
											<label class="am-form-label" for="user-intro">详细地址</label>
											<div class="am-form-content">
												<textarea placeholder="输入详细地址" id="user-intro" rows="3" class=""></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												
												<button style="border:0PX"><a class="am-btn am-btn-danger">提交</a></button>

												
												{{ csrf_field() }}
												
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}


							
						})


											
						</script>

					<div class="clear"></div>

				

@endsection()