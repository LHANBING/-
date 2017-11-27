@extends('homes.layout.center')
@section('title','地址管理')

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
				<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">收货地址列表</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						@if(empty($res) == false)
		                  @foreach($res as $k => $v)
							<li class="user-addresslist defaultAddr">
								@if($v->status == 1)
								<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
								@endif
								<p class="new-tit new-p-re">
									<span class="new-txt">{{ $v->addressname }}</span>
									<span class="new-txt-rd2">{{ $v->address_tel }}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">{{ $v->province }}</span>
									   @if($v->city != false)
										<span class="city">{{ $v->city }}</span>
									   @endif
										<span class="dist">{{ $v->area }}</span>
										<span class="street">{{ $v->address }}</span></p>
								</div>
								<div class="new-addr-btn">
									<a href="/home/center/address/{{$v->id}}/edit"><i class="am-icon-edit"></i>修改</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick({{$v->id}});"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
						   @endforeach
						@endif
							
						</ul>
						<div class="clear"></div>		
						<a data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}" class="new-abtn-type">添加新地址</a>
						<!--例子-->
						<div id="doc-modal-1" class="">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增收货地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr>

								<div style="margin-top: 20px;" class="am-u-md-12 am-u-lg-8">
									<form class="am-form am-form-horizontal" method="post" action="/home/center/address">

										<div class="am-form-group">
											<label class="am-form-label" for="user-name">收货人</label>
											<div class="am-form-content">
												<input type="text" placeholder="收货人必填" id="user-name" name="username">
											</div>
										</div>
										<div id="usernamemsg" class="yanzheng">
											
										</div>

										<div class="am-form-group">
											<label class="am-form-label" for="user-phone">手机号码</label>
											<div class="am-form-content">
												<input type="tel" placeholder="手机号必填" id="user-phone" name="address_tel">
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
                    province:'北京市',
                    city:'东城区',
                    area:'',                   
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
												
												{{ csrf_field() }}

												
											<a class="am-btn am-btn-danger" onclick="address()"  >添加</a>
											
												
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
			
	 	 function address()
	 	 {	
	 	 	  var province = $('#province').val();
	 	 	  var city = $('#city').val();
	 	 	  var area = $('#area').val();

	 	 	  var address = $('#user-intro').val();
	 	 	  var address_tel = $('#user-phone').val();
	 	 	  var addressname = $('#user-name').val();
	 	 	  

			  if( username == true && userphone == 100 && userintro==true)
			  {
				  $.post("{{url('/home/center/address')}}",{province:province,city:city,area:area,address:address,address_tel:address_tel,addressname:addressname},function(data){
				  	  console.log(data);
				  		if(data == 1)
				  		{
				  			layer.open({
							  content:'添加成功！'
							});
							location.reload();
				  		}else
				  		{
				  			layer.open({
							  content:'添加失败！'
							});

				  		}
				  })
              }else
              {
              	 
              	 layer.open({
						  content:'请填写完整的收货信息！'
						});
              }
	 	 }

	 	 function delClick($id)
	 	 {		var id = $id;
	 	 		$.post("/home/center/address/delete",{id:id,"_token":"{{ csrf_token() }}"},function(data){

	 	 			if(data == 1)
	 	 			{
	 	 				layer.open({
							  content:'删除成功！'
							});
							location.reload();
	 	 			}else
	 	 			{
	 	 				layer.open({
							  content:'删除失败！'
							});
						location.reload();
	 	 			}
	 	 		})
	 	 }
	 </script>
@endsection