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
							<div class="am-btn am-btn-danger" id="passwordchange">修改</div>
						</div>

@endsection()


@section('js')
	 <script type="text/javascript">
	 	    // // 表单验证旧密码，新密码，确认密码初始值
	 		var checkoldpassword = false;
			var checknewpassword = false;
			var checkrelpassword = false;
			
		  // 检测旧密码
	 	$('#oldpassword').blur(function()
	 	{	
	 		//调用checkoldpassword函数检测旧密码
	 		checkoldpassword = checkOldPassword($(this), $('#oldpasswordmsg'), 6)
	 	})
	 	
         // 检测新密码
	 	$('#newpassword').blur(function() 
        {     
        	//调用checkoldpassword函数检测新密码             
            checknewpassword = checkNewPassword($(this),$('#newpasswordmsg'), 6)
             
        })

	 	// 检测确认密码
        $('#passwordRepeat').blur(function() 
        {       
        	//调用checkrelpassword函数检测确认密码 
             checkrelpassword = checkRelPassword($('#newpassword'), $(this), $('#confirmpasswordmsg'), 6)
        })

        // 点击修改按钮发送ajax获取验证码
        $('#passwordchange').click(function() 
        {	
        	// 获取用户输入旧密码的值
        	var Opassword = $('#oldpassword').val();
        	// 获取用户输入新密码的值
        	var Npassword = $('#newpassword').val();

        	// 判断旧密码，新密码，确认密码输入值是否符合格式
        	if(checkoldpassword ==100 && checknewpassword == 100 && checkrelpassword == 100)
        	{	
        		// 发送ajax
        		 $.post("{{url('/home/center/info/douser_change')}}",{oldpassword:Opassword,newpassword:Npassword,'_token':'{{csrf_token()}}'},function(data) {
                	
                	// 通过判断data的值,得到信息
	                if(data == '1')
	                {   
	                   layer.open({  
	                        content: '修改成功！',  
	                        btn: ['确认'],  
	                        yes: function(index, layero) {  
	                            window.location.href='/home/login';  
	                        },cancel: function() {  
	                            //右上角关闭回调  			 
	                        }  
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