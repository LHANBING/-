@extends('homes.layout.center')
@section('title','个人账单')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/blstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
	
@endsection()

@section('content')


		<div class="user-bill">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单</strong> / <small>Electronic&nbsp;bill</small></div>
						</div>
						<hr>

						<div class="ebill-section">
							<div class="ebill-title-section">
								<h2 class="trade-title section-title">
                                                                                                                                     交易
                            <span class="desc">（金额单位：元）</span>
                        </h2>

								<div class=" ng-scope">
									<div class="trade-circle-select  slidedown-">
										<a class="current-circle ng-binding" href="javascript:void(0);">2015/11/01 - 2015/11/30</a>

									</div>
									<span class="title-tag"><i class="num ng-binding">12</i>月</span>
								</div>
							</div>

							<div class="module-income ng-scope">
								<div class="income-slider ">
									<div class="block-income block  fn-left">
										<h3 class="income-title block-title">
                                                                                                          支出
                                    
                                    

                                    @if( $sale != false)
                                 	<span class="desc ng-binding">
                                           <a href="/home/center/bill/out">查看支出明细</a>
                                         </span>
                                    @else
									<span class="num ng-binding">
                                              0.00
                                       </span>
                                    @endif
                                             </h3>

									
									</div>
									<div class="block-expense block  fn-left">
										<div class="slide-button right"></div>
									</div>
									<div class="clear"></div>

									<!--收入-->
									<h3 class="expense income-title block-title">
                                                                                                                       收入                                                            	 
                                    @if( $sale != false)
                                    <span class="desc ng-binding">
                                           <a href="/home/center/bill/in">查看收入明细</a>
                                    </span>
                                    @else
									<span class="num ng-binding">
                                              0.00
                                       </span>
                                    @endif
                                </h3>
								</div>

								<!--消费走势-->
								<div class="module-consumeTrend inner-module">
									<h3 class="module-income ng-scope" style="font-size: 24px;">余额</h3>
									<div class="consumeTrend-chart" id="consumeTrend-chart">
										&nbsp;&nbsp;&nbsp;<h2 style="font-size: 20px;">￥：{{ $money }} 元</h2>
										
									</div>
								</div>

								

								

							</div>

						</div>

					</div>
			

@endsection()