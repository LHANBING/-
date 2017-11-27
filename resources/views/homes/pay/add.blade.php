<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改地址</title>
	<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/validate.js"></script>
		 <script type="text/javascript" src="{{url('/homes/layer1/jquery.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/layer.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/extend/layer.ext.js')}}"></script>
</head>
<body>
		<div class="user-address">
						<div class="clear"></div>		
						<!--例子-->
						<div id="doc-modal-1" class="">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改收货地址</strong> / <small>Edit&nbsp;address</small></div>
								</div>
								<hr>

								<div style="margin-top: 20px;" class="am-u-md-12 am-u-lg-8">
									<form class="am-form am-form-horizontal" method="post" action="/home/center/address/">

										<div class="am-form-group">
											<label class="am-form-label" for="user-name">收货人</label>
											<div class="am-form-content">
												<input type="text" placeholder="收货人必填" id="user-name" name="username" value="" >
											</div>
										</div>
										<div id="usernamemsg" class="yanzheng">
											
										</div>

										<div class="am-form-group">
											<label class="am-form-label" for="user-phone">手机号码</label>
											<div class="am-form-content">
												<input type="tel" placeholder="手机号必填" id="user-phone" name="address_tel" value="">
											</div>
										</div>
                                          
                                        <div id="userphonemsg" class="yanzheng">
											
										</div>




											<!-- 地址 三级联动 -->
										<div class="am-form-group">
											<label class="am-form-label" for="user-address">所在地</label>
											<div class="am-form-content address">
		     								
										         <div>
										   
										        <link rel="stylesheet" type="text/css" href="/homes/city/style/cssreset-min.css">
										        <link rel="stylesheet" type="text/css" href="/homes/city/style/common.css">
										        <style type="text/css">
										            .citys{
										                margin-bottom: 10px;
										            }
										            .citys p{
										                line-height: 28px;
										            }
										            .warning{
										                color: #c00;
										            }
										            .main a{
										                margin-right: 8px;
										                color: #369;
										            }
										        </style>
										        <script type="text/javascript" src="/homes/city/script/jquery.citys.js"></script>
										    
										       
										            <div id="demo3" class="citys">
										                <p>
										                    <div class="addressformfield" >                     
										                    <select name="province" id="province"></select>
										                    <select name="city" id="city"></select>
										                    <select name="area" id="area"></select>
										                    
										                    </div>
										                </p>
										            </div>
										            
										            <script type="text/javascript">                
										              $('#demo3').citys({
										                    province:'北京',
										                    city:'',
										                    area:'朝阳区',                   
										                    })

										            </script>
										    
										    </div>


											</div>
										</div>



										
										
										<div class="am-form-group">
											<label class="am-form-label" for="user-intro">详细地址</label>
											<div class="am-form-content">
												<textarea placeholder="输入详细地址" id="user-intro" rows="3" class="" name="address" style="resize:none;" ></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
					                    
					                    <div class="yanzheng" id="userintromsg">
										</div>
										
										    <div class="am-form-group">
											  <div class="am-u-sm-9 am-u-sm-push-3">
												
												{{ csrf_field()}}
										<button  class="am-btn am-btn-danger" id=""  class="add">添加</button>
											
												
											</div>
										</div>
									</form>
									
									
								</div>

							</div>

						</div>
						
					</div>

					<script type="text/javascript">

	 		var username = false;
	 		var userphone = false;
	 		var userintro = false;

	 		$('#user-name').blur(function(){

	 			 username = isNull($(this).val());

	 			 if(username !=false)
	 			 {
	 			 	username = true;

	 			 	$('#usernamemsg').text('');
	 			 }else
	 			 {
	 			 	$('#usernamemsg').text('收货人不能为空！');
	 			 }
	 		})
	 		
	 		$('#user-phone').blur(function() {

	 			 userphone = checkTel($(this),$('#userphonemsg'));

	 		})


	 		$('#user-intro').blur(function(){

	 			 userintro = isNull($(this).val());

	 			 if(userintro !=false)
	 			 {
	 			 	userintro = true;
	 			 	$('#userintromsg').text('');
	 			 }else
	 			 {
	 			 	$('#userintromsg').text('收货人不能为空！');

	 			 }
	 		})
 	
 	 		$('button').click(function(){


	 	 	  var province = $('#province').val();
	 	 	  var city = $('#city').val();
	 	 	  var area = $('#area').val();

	 	 	  var address = $('#user-intro').val();
	 	 	  var address_tel = $('#user-phone').val();
	 	 	  var addressname = $('#user-name').val();
	 	 	  var status = $('#status').val();

			  $.post("/home/pay/add",{province:province,city:city,area:area,address:address,address_tel:address_tel,addressname:addressname,status:status,"_token":"{{ csrf_token() }}"},function(data){
			  	   
			  		if(data == 1)
			  		{
			  			layer.open({
						  content:'添加成功！'
						})
						//关闭layer后刷新父页面
			  			window.parent.location.reload();
						parent.layer.closeAll();

						
			  		}else
			  		{
			  			layer.open({
						  content:'添加失败！'
						});

			  		}
			  })
			   return false;
	 	 	 })
	 </script>
</body>
</html>


