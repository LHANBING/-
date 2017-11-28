@extends('homes.layout.center')

@section('title','修改个人信息')


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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改个人信息</strong> / <small>editPersonal&nbsp;information</small></div>
						</div>
                       
						<hr/>

							<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="" method="post" enctype="multipart/form-data" > 

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">用户名:</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="username"  value="{{$res->username}}" >

									</div>
								</div>

								<div id="usernamemsg" class="yanzheng">
									
								</div>
						

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话:</label>
									<div class="am-form-content">
										<input id="user-phone" type="tel" name="tel" value="{{$res->tel}}"  >

									</div>
								</div>
                                
                                <div id="telmsg" class="yanzheng">
									
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">qq:</label>
									<div class="am-form-content">
										<input id="user-qq" name="qq" type="text"  value="{{$res->qq}}" >

									</div>
								</div>

								<div id="qqmsg" class="yanzheng">
									
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮箱:</label>
									<div class="am-form-content">
										<input id="user-email" name="email" type="email"  value="{{$res->email}}" >

									</div>
								</div>
								
                                <div id="emailmsg" class="yanzheng">
									
								</div>
	                             <div class="info-btn">
										{{ csrf_field() }}
										
									</div>
								</form>
		                          
                                 

								
								<div class="filePic">
										<form name="form1" id="form1">
	                                 <label for="user-email" class="am-form-label">头像：</label>
									<img  id="photo" class="am-circle am-img-thumbnail" src="http://ozstangaz.bkt.clouddn.com/userphoto/{{$res->user_photo}}" alt="" style="margin-left: 70px;margin-top:-40px " />
									
										<div class="info-btn">
											{{ csrf_field() }}
											
										</div>
	                        		 <div class="am-form-content">
											<input name="user_photo" type="file" id="user_photo" style="height: 125px;width:125px;margin-top:-110px;margin-left: -30px;opacity: 0; ">

										</div>
									  </form>
								</div>
								
                                

							
							<div style="float:right;">
 							<button class="am-btn am-btn-danger" id="edit" >保存</button>   
							</div>
									
		                     	
							
								
							
					</div>
					

</div>

@endsection()

@section('js')
 <script type="text/javascript">
 		// 发送ajax用户名，电话，qq，电子邮箱的初始值    
 	  	var isnull = true;
 	  	var checktel = 100;
 	  	var isQQ = true;
 	  	var isemail = true;

 	  	 // 检测用户名
    	$('#user-name2').blur(function()
    	{
    			//调用isNull函数检测用户名是否为空
 		      isnull= isNull($(this).val());

 		      if(isnull == false)
 		      {
 		      	$('#usernamemsg').text('用户名不能为空');
 		      } 
 	    })

    	// 检测手机号
 	    $('#user-phone').blur(function()
 	    {
 	    	//调用checkTel函数检测手机号
 		     checktel = checkTel($(this), $('#telmsg'));
 	    })

 	    // 检测qq
 	    $('#user-qq').blur(function(){

 	    	// 获取输入框中qq的值
 	    	var qq = $(this).val();
 	    	// 判断qq的值是否为空
 	    	if(qq != false)
 	    	{	
			//输入框中输入的是否为数字 false 为数字 
 	    		 if(isNaN(qq) == false) 
 	    		 {		
 	    		 	  // 初始化
	 	    		 var reg = new  RegExp();
	 	    		  // 定义正则
	 	    		  reg = /^[0-9]{6,12}$/;
	 	    		  // 检测
	 	    	     var info = reg.test(qq);
	 	    	     // 对输入的qq的值进行判断
	   				 if( info == false)
	   				 {	
	   				 	isQQ = false;
	   				 	$('#qqmsg').text('QQ输入格式不正确');
	   				 }else
	   				 {	
	   				 	isQQ = true;
	   				 	$('#qqmsg').text('');
	   				 } 
   				 }else
   				 {	
   				 	isQQ = !isNaN(qq);
   				 	$('#qqmsg').text('QQ输入格式不正确');
   				 }	
 	    	}else
 	    	{
 	    		$('#qqmsg').text('');
 	    	}
 	    })

 	    
		// 检测手机号
 	    $('#user-email').blur(function(){
 	    	// 获取输入框中电子邮箱的值
 	    	var email = $(this).val();
 	    	// 判断电子邮箱的值是否为空
 	    	if(email != false)
 	    	{   
 	    	    //调用checkTel函数检测手机号
	 	    	isemail = isEmail(email);

	 	    	if(isemail == false)
	 	    	{
	 	    		$('#emailmsg').text('邮箱格式不正确！');
	 	    	}else
	 	    	{
	 	    		$('#emailmsg').text('');	
	 	    	}
 	       }else
 	       {
 	       	   $('#emailmsg').text('');
 	       }
 	    })

												
 	    // 点击修改按钮发送ajax
 	    $('#edit').click(function() {
 	    	// 判断用户名，手机号，qq和电子邮箱输入框值是否符合格式 
	 	    if(isnull == true && checktel == 100 && isemail == true  && isQQ == true)
	 	    {		
	 	    	 //获取用户名的值 
	 	    	 var username = $("#user-name2").val();
	 	    	 // 获取手机号的值
				 var tel = $("#user-phone").val();
				 // 获取qq的值
			     var qq = $("#user-qq").val(); 
			      //获取电子邮箱的值 
				 var email = $("#user-email").val();

				 // 发送ajax
				 $.post("/home/center/info/doedit",{'_token':'{{csrf_token()}}',username:username,tel:tel,qq:qq,email:email},function(data) 
				 {
				 	// 通过判断data的值,得到信息
				 	 if(data)
				 	 {
				 	 	 layer.open({
	                         
	                          content: '修改成功！'
	                        });
				 	 	 location.reload();
				 	 }else
				 	 {
				 	 	 layer.open({
	                         
	                          content: '修改失败！'
	                        });
				 	 	 location.reload();
				 	 }
				 })

	 	    }else
	 	    {	
	 	    	// 不符合格式，弹出提示信息
	 	    	layer.msg('填写修改信息有误');
	 	    }
	 	    //消除默认设置
	 	    return false;
 	    })



 	    		$(function () 
 	    		{	
 	    			// 选择图片发生改变是
                    $("#user_photo").change(function (){ 
                        uploadImage();
                        
                    });
                 });
                            function uploadImage() {
                          //  判断是否有选择上传文件
                
                                var imgPath = $("#user_photo").val();
                                if (imgPath == "") {
                                    layer.alert("请选择修改图片！",{icon: 6});
                                    return;
                                }
                                //判断上传文件的后缀名
                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                if (strExtension != 'jpg' && strExtension != 'gif'
                                    && strExtension != 'png' && strExtension != 'bmp') {
                                	layer.alert("请选择图片文件！",{icon: 6});
                                    return;
                                }
                                // 
                                var formData = new FormData($( "#form1" )[0]);
                                // 发送ajax
                                $.ajax({
                                    type: "post",
                                    url: "/home/center/info/douserphoto",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend:function()
                                    {
                                           a = layer.load();
                                    },
                                    success: function(data) 
                                    {
                                        layer.close(a);
                                      	//消除默认设置
                                        if(data.status == 1)
                                        {	
                                        	// 成功改变头像的值
                                        	layer.alert("修改成功",{icon: 6});
                                        	$('#photo').attr('src','http://ozstangaz.bkt.clouddn.com/userphoto/'+data.user_photo);
                                        	
                                        }else
                                        {	
                                        	// 失败不改变头像的值
                                        	layer.alert("修改失败",{icon: 5});
                                        	$('#photo').attr('src','http://ozstangaz.bkt.clouddn.com/userphoto/'+data.user_photo);
                                        }
                                      
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                                        layer.alert("上传失败，请检查网络后重试",{icon: 5});
                                    }
                                });
                            }
 </script>
@endsection()

 





