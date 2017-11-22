@extends('homes.layout.center')
@section('title','个人信息')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
@endsection()

@section('content')

<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
	                                  
								<img class="am-circle am-img-thumbnail" src="http://ozstangaz.bkt.clouddn.com/userphoto/{{$res->user_photo}}" readonly alt="" />
							

							</div>

							
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="/home/center/info/edit" method="" enctype="multipart/form-data" > 

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称:</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="username"  value="{{$res->username}}" readonly>

									</div>
								</div>


								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话:</label>
									<div class="am-form-content">
										<input id="user-phone" type="tel" name="tel" value="{{$res->tel}}" readonly >

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">qq:</label>
									<div class="am-form-content">
										<input id="user-email" name="qq" type="text"  value="{{$res->qq}}" readonly>

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮箱:</label>
									<div class="am-form-content">
										<input id="user-email" name="email" type="email"  value="{{$res->email}}" readonly>

									</div>
								</div>

							</form>
								<div class="info-btn">
								
								@if($res->perfect_edit == 0)	
									<a href="/home/center/info/perfect">
										<div class="am-btn am-btn-danger" style="border:0px">完善个人信息</div>
									
								  	</a>
									
		                        @else
									<a href="/home/center/info/edit">
										<div class="am-btn am-btn-danger" style="border:0px">修改个人信息</div>
									
								  	</a>
								@endif
								</div>
                                

									
							
						</div>

</div>

@endsection()