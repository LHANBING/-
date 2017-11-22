@extends('homes.layout.center')

@section('title','完善个人信息')

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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">完善个人信息</strong> / <small>PerectPersonal&nbsp;information</small></div>
						</div>
						<hr/>

							
							<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="/home/center/info/doperfect" method="post" enctype="multipart/form-data" > 

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称:</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="username"  value="{{$res->username}}" >

									</div>
								</div>


								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话:</label>
									<div class="am-form-content">
										<input id="user-phone" type="tel" name="tel" value="{{$res->tel}}"  >

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">qq:</label>
									<div class="am-form-content">
										<input id="user-qq" name="qq" type="text"  value="{{$res->qq}}" >

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮箱:</label>
									<div class="am-form-content">
										<input id="user-email" name="email" type="email"  value="{{$res->email}}" >

									</div>
								</div>
								

								<div class="filePic">
                                 <label for="user-email" class="am-form-label">头像：</label>
								<img class="am-circle am-img-thumbnail" src="http://ozstangaz.bkt.clouddn.com/userphoto/{{$res->user_photo}}"" readonly alt="" />
								
                        		 <div class="am-form-content">
										<input id="user-email" name="user_photo" type="file"  >

									</div>
								</div>

                                <div class="info-btn">
										{{ csrf_field() }}
										<button class="am-btn am-btn-danger" >保存</button>
									
		                        
								</div>

							</form>
					</div>

							

							
					

						

</div>

@endsection()