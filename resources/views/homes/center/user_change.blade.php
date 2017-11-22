@extends('homes.layout.center')
@section('title','修改个人密码')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/stepstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
@endsection()

@section('content')

		<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/><br/><br/><br/><br/>

					<form class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">旧密码</label>
							<div class="am-form-content">
								<input type="password" id="oldpassword" placeholder="请输入旧登录密码">
							</div>
						</div>
						<div  id="oldpasswordmsg" class="yanzheng">
								
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" placeholder="请输入新密码" id="newpassword" >
							</div>
							
						</div>
						<div id="newpasswordmsg" class="yanzheng" ">
								
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" id="passwordRepeat" placeholder="请再次输入上面的密码">
							</div>
						</div>
						<div id="confirmpasswordmsg" class="yanzheng">
								
						</div>	

					</form>

					<div class="info-btn">
							<div class="am-btn am-btn-danger" id="passwordchange">保存修改</div>
						</div>

@endsection()


@section('js')
	 <script type="text/javascript">
	 		var checkoldpassword = $('#oldpassword').val();
			var checknewpassword = $('#newpassword').val();
			var checkrelpassword = $('#passwordRepeat').val();

	 	$('#oldpassword').blur(function()
	 	{
	 		checkoldpassword = checkOldPassword($(this), $('#oldpasswordmsg'), 6)
	 	})
	 	
         
	 	$('#newpassword').blur(function() 
        {                         
            checknewpassword = checkNewPassword($(this),$('#newpasswordmsg'), 6)
             
        })

        $('#passwordRepeat').blur(function() 
        {       
             checkrelpassword = checkRelPassword($('#newpassword'), $(this), $('#confirmpasswordmsg'), 6)
        })

        $('#passwordchange').click(function() 
        {	
        	var Opassword = $('#oldpassword').val();
        	var Npassword = $('#newpassword').val();

        	if(checkoldpassword ==100 && checknewpassword == 100 && checkrelpassword == 100)
        	{	
        		 $.post("{{url('/home/center/info/douser_change')}}",{oldpassword:Opassword,newpassword:Npassword,'_token':'{{csrf_token()}}'},function(data) {
                	
	                if(data == '1')
	                {   
	                    layer.open({
	                         
	                          content: '修改成功！'
	                        }); 
	                    
	                }else
	                {
		            	layer.open({
		                     
		                      content: '修改失败！'
		                    }); 
	                }

                })
        	}else
        	{
        		layer.open({  
                      content:'请填写完整的修改信息！'
                    });
        	}
        	
        }) 
	 </script>
@endsection