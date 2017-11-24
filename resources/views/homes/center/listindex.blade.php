@extends('homes.layout.center')
@section('title','收货地址管理')

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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">收货地址列表</strong> / <small>Address&nbsp;list</small></div>
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
						
		</div>

@endsection()

