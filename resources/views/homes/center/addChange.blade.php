@extends('homes.layout.center')
@section('title','申请退货')

@section('cssjs')

		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/refstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

@endsection()

@section('content')


					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退货申请</strong> / <small>Apply&nbsp;for&nbsp;returns</small></div>
					</div>
					<hr>
					<div class="comment-list">
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">买家退货</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">商家收货</p>
                            </span>
							<span class="step-3 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">款项成功</p>
                            </span>                            
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					
					
						<div class="refund-aside">
							<div class="item-pic">
								<a class="J_MakePoint" href="#">
									<img class="itempic" src="http://ozstangaz.bkt.clouddn.com/{{$arr->pic}}">
								</a>
							</div>

							<div class="item-title">

								<div class="item-name">
									<a href="#">
										<p class="item-basic-info">{{$arr->title}}</p>
									</a>
								</div>
								<div class="info-little">
									<span>卖家 :{{$arr->username}} </span>
									
								</div>
							</div>
							<div class="item-info">
								<div class="item-ordernumber">
									<span class="info-title">订单编号：</span><a>{{$arr->order_num}}</a>
								</div>
								<div class="item-price">
									<span class="info-title">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><span class="price">{{$arr->pay_money}}元</span>
								
								</div>
								<div class="item-pay-logis">
									<span class="info-title">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</span><span class="price">{{$arr->pay_yunfei}}元</span>
								</div>
								<div class="item-amountall">
									<span class="info-title">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amountall">{{$arr->pay_yunfei + $arr->pay_money}}元</span>
								</div>
								<div class="item-time">
									<span class="info-title">成交时间：</span><span class="time">{{$arr->order_otime}}</span>
								</div>

							</div>
							<div class="clear"></div>
						</div>

						<div class="refund-main">
							<div class="item-comment">
							
								<form action="/home/center/change/stro" method="post">
								<div class="am-form-group">
									<label class="am-form-label" for="refund-reason">退款原因</label>
									<div class="am-form-content">
										<select data-am-selected="" style="display: none;" name="ops">
									
											<option value="不想要了">不想要了</option>
											<option value="买错了">买错了</option>
											<option value="货物损坏">货物损坏</option>											
											<option value="与说明不符">与说明不符</option>
										</select>

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label" for="refund-info">退款说明<span>（可不填）</span></label>
									<div class="am-form-content">
										<textarea placeholder="请输入退款说明" name="area" ></textarea>
										<input type="hidden" name="id" value="{{$arr->id}}">
									</div>
								</div>

							</div>
							
							<div class="info-btn">

								<button class="am-btn am-btn-danger">提交申请</button>
								{{csrf_field() }}
							</div>
						</div></form>
					</div>
					<div class="clear"></div>
			

@endsection()