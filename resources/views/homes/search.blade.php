@extends('homes.layout.list')
@section('title','商品详情页')
@section('content')


	
<div class="am-g am-g-fixed floodFour" style="padding: 30px 30px">
	@if(!empty($goods))
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
						原件:{{$goodsv->oldprice}}
					</div>
				</div>
				<a href="/home/listdetail/{{$goodsv->id}}"><img style="height: 140px" src="http://ozstangaz.bkt.clouddn.com/{{$goods_photo[$goodsv->id]}}" style="width: 60%" /></a>
			</div>
		
			@endforeach
	</div>	
	<div style="float: right;">
		{!! $goods->render() !!}
	</div>
		
		@else
	<div style="float: left; margin-top: 250px;margin-left: 200px">
		<div class="container">
              <div class="row">
                  <div class="col-md-12">
                        <div class="jumbotron" style="background: transparent;">
                          <h1>没有找到您需要的商品</h1>
                        </div>
                  </div>
                  
                </div>
            </div>
	</div>	

	</div>


@endif
@endsection()