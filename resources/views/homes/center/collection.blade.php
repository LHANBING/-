@extends('homes.layout.center')
@section('title','我的收藏')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/colstyle.css" rel="stylesheet" type="text/css">

@endsection()

@section('content')


	

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
							</div>
							<div class="s-content">

								<!-- 未下架 -->
								@if(empty($good) && empty($goods))
								<div style="float: left; margin-top: 100px;margin-left: 50px">
									<div class="container">
							              <div class="row">
							                  <div class="col-md-12">
							                        <div class="jumbotron" style="background: transparent;">
							                          <h1>您暂时没有收藏的商品</h1>
							                        </div>
							                  </div>
							                  
							                </div>
							            </div>
								</div>	
								@else

								@foreach($good as $k=>$v)

								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a class="s-pic-link" href="#">
												<img class="s-pic-img s-guess-item-img" title="{{$v->title}}" alt="{{$v->title}}" height="150px" src="http://ozstangaz.bkt.clouddn.com/{{$goodpic[$v->id]}}">
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a title="{{$v->title}}" href="#">{{$v->title}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->newprice}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->oldprice}}</em></span>
											</div>
											
										</div>
										<div class="s-tp">
											
											<i class="am-icon-trash"></i>
											<a class="ui-btn-loading-before" style="color: red;font-size: 1.5em;width: 50px" href="/home/gopay?goods_id={{$v->id}}">购买</a>
											
												<span class="" style="color: red;font-size: 1.2em;margin-left: 60px;cursor: pointer;width: 60px" id="{{$v->id}}" onclick="del(this)" href="">取消收藏</span>
											
										</div>
									</div>
								</div>

									@endforeach

								<!-- 已下架 -->
								@foreach($goods as $ks=>$vs)
								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a class="s-pic-link" href="#">
												<img class="s-pic-img s-guess-item-img" title="{{$vs->title}}" alt="{{$vs->title}}" height="150px" src="http://ozstangaz.bkt.clouddn.com/{{$goodspic[$vs->id]}}">
											<span class="tip-title" style="font-size: 16px">已下架</span>
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a title="{{$vs->title}}" href="#">{{$vs->title}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$vs->newprice}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$vs->oldprice}}</em></span>
											</div>
										</div>
										<div class="s-tp">
											<span class="" style="color: red;font-size: 1.2em;margin-left: 60px;cursor: pointer;" id="{{$vs->id}}" onclick="del(this)" href="">取消收藏</span>
										</div>
									</div>
								</div>
								@endforeach
								@endif

								

								
								

							</div>


						</div>

					</div>
	
<script type="text/javascript">
	var del = function(obj)
	{
		var goods_id = $(obj).attr('id');
		console.log(goods_id);
		$.post('/home/center/collection/del',{id:goods_id,_token:'{{csrf_token()}}'},function(data){
			if (data == 1) {
				layer.msg('收藏已取消');
				location.reload();
			}
		})
	}
</script>
				

@endsection()