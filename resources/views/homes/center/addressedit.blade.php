@extends('homes.layout.center')
@section('title','修改地址')

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
						<div class="clear"></div>		
						<a data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}" class="new-abtn-type">修改地址</a>
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
												<input type="text" placeholder="收货人必填" id="user-name" name="username" value="{{ $res3->addressname }}" >
											</div>
										</div>
										<div id="usernamemsg" class="yanzheng">
											
										</div>

										<div class="am-form-group">
											<label class="am-form-label" for="user-phone">手机号码</label>
											<div class="am-form-content">
												<input type="tel" placeholder="手机号必填" id="user-phone" name="address_tel" value="{{ $res3->address_tel }}">
											</div>
										</div>
                                          
                                        <div id="userphonemsg" class="yanzheng">
											
										</div>

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
                    province:'{{ $res3->province }}',
                    city:'{{ $res3->city }}',
                    area:'{{ $res3->area }}',                   
                    })

            </script>
    
    </div>


											</div>
										</div>
										
										<div class="am-form-group">
											<label class="am-form-label" for="user-intro">详细地址</label>
											<div class="am-form-content">
												<textarea placeholder="输入详细地址" id="user-intro" rows="3" class="" name="address" style="resize:none;" >{{ $res3->address }}</textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
					                    
					                    <div class="yanzheng" id="userintromsg">
										</div>
										
										
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">默认地址</label>
											<div class="am-form-content address">
												<select data-am-selected  id="status" name="status">
													<option value="1" @if($res3->status== 1) selected @endif>是</option>
													<option value="0" @if($res3->status== 0) selected @endif>否</option>
												</select>
												
											</div>
										</div>

										    <div class="am-form-group">
											  <div class="am-u-sm-9 am-u-sm-push-3">
												
												{{ csrf_field() }}
												{{  method_field('PUT') }}
												
										<button  class="am-btn am-btn-danger" id="{{ $res3->id }}"  class="edit">修改</button>
											
												
											</div>
										</div>
									</form>
									
									
								</div>

							</div>

						</div>
						
					</div>

					

				

@endsection()

@section('js')
	 <script type="text/javascript">
	 	    // 用户名，手机号，详细地址进行判断的初始值
	 		var username = false;
	 		var userphone = false;
	 		var userintro = false;

			// 失去焦点时，对用户名进行判断
	 		$('#user-name').blur(function(){
	 			// 判断用户名是否为空
	 			 username = isNull($(this).val());

	 			 //对username进行判断 
	 			 if(username !=false)
	 			 {
	 			 	username = true;

	 			 	$('#usernamemsg').text('');
	 			 }else
	 			 {
	 			 	$('#usernamemsg').text('收货人不能为空！');
	 			 }
	 		})
	 		
			// 失去焦点时，对手机号进行判断
	 		$('#user-phone').blur(function() {
	 			//调用checkTel函数检测手机号
	 			 userphone = checkTel($(this),$('#userphonemsg'));

	 		})

	 		

	 		// 失去焦点时，对详细地址进行判断
	 		$('#user-intro').blur(function()
	 		{
	 			// 判断用户名是否为空
	 			 userintro = isNull($(this).val());
	 			 //对userintro进行判断
	 			 if(userintro !=false)
	 			 {
	 			 	userintro = true;
	 			 	$('#userintromsg').text('');
	 			 }else
	 			 {
	 			 	$('#userintromsg').text('收货人不能为空！');

	 			 }
	 		})
 			
 			//点击修改按钮触发点击事件 
 	 		$('button').click(function(){

 	 			// 获取修改地址的id
	  		  var id = $(this).attr('id');
	  		  //获取省的值
	 	 	  var province = $('#province').val();
	 	 	  // 获取市的值
	 	 	  var city = $('#city').val();
	 	 	  // 获取县的值
	 	 	  var area = $('#area').val();
			// 获取详细的值
	 	 	  var address = $('#user-intro').val();
	 	 	  // 获取收货电话的值
	 	 	  var address_tel = $('#user-phone').val();
	 	 	  // 获取收货人的值
	 	 	  var addressname = $('#user-name').val();
	 	 	  // 是否设置为默认
	 	 	  var status = $('#status').val();
	 	 	  // 发送ajax
			  $.post("/home/center/address/edit",{id:id,province:province,city:city,area:area,address:address,address_tel:address_tel,addressname:addressname,status:status,"_token":"{{ csrf_token() }}"},function(data){
			  	   // 通过判断data的值,得到信息
			  		if(data == 1)
			  		{
			  			layer.open({
						  content:'修改成功！'
						})
						location.href ='/home/center/address';					
			  		}else
			  		{
			  			layer.open({
						  content:'修改失败！'
						});

			  		}
			  })
			   return false;
	 	 	 })
	 </script>
@endsection