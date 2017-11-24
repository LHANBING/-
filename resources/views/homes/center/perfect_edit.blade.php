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
											<input name="user_photo" type="file" id="user_photo" style="height: 100px;width:100px;margin-top:-100px;margin-left: -30px;opacity: 0; ">

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
 		    
 	  	var isnull = true;
 	  	var checktel = 100;
 	  	var isQQ = true;
 	  	var isemail = true;

    	$('#user-name2').blur(function(){

 		      isnull= isNull($(this).val());

 		      if(isnull == false)
 		      {
 		      	$('#usernamemsg').text('用户名不能为空');
 		      } 
 	    })


 	    $('#user-phone').blur(function(){

 		     checktel = checkTel($(this), $('#telmsg'));
 	    })

 	    $('#user-qq').blur(function(){

 	    	var qq = $(this).val();

 	    	if(qq != false)
 	    	{	

 	    		 if(isNaN(qq) == false) //输入框中输入的是否为数字 false 为数字
 	    		 {
	 	    		 var reg = new  RegExp();
	 	    		     reg = /^[0-9]{6,12}$/;
	 	    	     var info = reg.test(qq);
	 	    	     
	   				 if( info == false)
	   				 {	
	   				 	isQQ = false;
	   				 	$('#qqmsg').text('QQ输入格式不正确');
	   				 }else
	   				 {	isQQ = true;
	   				 	
	   				 	$('#qqmsg').text('');
	   				 } 
   				 }else
	   				 {	isQQ = !isNaN(qq);
	   				 	$('#qqmsg').text('QQ输入格式不正确');
	   				 }	
 	    	}else
 	    	{
 	    		$('#qqmsg').text('');
 	    	}
 	    })


 	    $('#user-email').blur(function(){

 	    	var email = $(this).val();

 	    	if(email != false)
 	    	{
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

												

 	    $('#edit').click(function() {

	 	    if(isnull == true && checktel == 100 && isemail == true  && isQQ == true)
	 	    {		
	 	    	console.log(isnull);
	 	    	console.log(checktel);
	 	    	console.log(isemail);
	 	    	console.log(isQQ);
	 	    	 var username = $("#user-name2").val();
				 var tel = $("#user-phone").val();
			     var qq = $("#user-qq").val();  
				 var email = $("#user-email").val();

				 $.post("/home/center/info/doedit",{'_token':'{{csrf_token()}}',username:username,tel:tel,qq:qq,email:email},function(data) {

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
	 	    	layer.msg('填写修改信息有误');
	 	    }

	 	    return false;
 	    })



 	    		$(function () 
 	    		{	
                    $("#user_photo").change(function (){ 
                        uploadImage();
                        
                    });
                 });
                            function uploadImage() {
//                            判断是否有选择上传文件
//                            input type file
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
                                var formData = new FormData($( "#form1" )[0]);
                                
                                $.ajax({
                                    type: "post",
                                    url: "/home/center/info/douserphoto",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend:function(){
                                           a = layer.load();
                                      },
                                    success: function(data) {
                                        layer.close(a);
                                      
                                        alert(data);
                                      
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }
 </script>
@endsection()

 





