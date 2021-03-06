@extends('homes.layout.list')
@section('title','商品类别列表')

@section('cssjs')
        <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="/homes/bs/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bs/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/bs/js/jquery.js"></script>
        <script type="text/javascript" src="/homes/bs/js/bootstrap.min.js"></script>

@endsection()

@section('content')


					<div class="">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品列表</strong> / <small>List</small></div>
						</div>
						<hr>

						<div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">

							

							<div class="am-tabs-bd">
								<div id="tab1" class="am-tab-panel am-fade am-in am-active" >
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											现价
										</div>
										<div class="th th-number">
											原价
										</div>
										<div class="th th-operation">
											运费
										</div>
										<div class="th th-amount">
											卖家地址
										</div>
										<div class="th th-status">
											描述
										</div>
										<!-- <div class="th th-change">
											查看详情
										</div> -->
									</div>

									<div class="order-main">
										<div class="order-list">
											
										
											<div class="order-status3">
												
												<div class="order-content">
													<div class="order-left">

														
														@if(empty($res[0]))

														<div style="float: left; margin-top: 100px;margin-left: 50px">
															<div class="container">
													              <div class="row">
													                  <div class="col-md-12">
													                        <div class="jumbotron" style="background: transparent;">
													                          <h1>抱歉，暂时没有该类商品</h1>
													                        </div>
													                  </div>
													                  
													                </div>
													            </div>
														</div>
														
														@else

														@foreach($res as $k=>$v)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a class="J_MakePoint" href="/home/listdetail/{{$v->id}}">
																		<img class="itempic J_ItemImg" src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->id]}}">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="/home/listdetail/{{$v->id}}">
																			<p>{{$v->title}} </p>
																			商品详情:
																			<p>{{$description[$v->id]}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->newprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->oldprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->transprice}}
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->address}}
																</div>
															</li>
															
															<li class="td td-price">
																<div class="item-price">
																	<a class="btn btn-info" href="/home/listdetail/{{$v->id}}">查看详情</a>
																</div>
															</li>
														</ul>
														@endforeach

														@endif


													</div>
													
												</div>

											</div>

										</div>

									</div>

									<div style="float: right;">
										{!! $res->render() !!}
									</div>

								</div>
								
							</div>

						</div>
					</div>

				
			

@endsection()