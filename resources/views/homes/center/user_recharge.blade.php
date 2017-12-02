@extends('homes.layout.center')
@section('title','充值')

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
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">充值</strong> / <small>Recharge</small></div>
					</div>
					<hr/><br/><br/><br/><br/><br/><br/><br/><br/>

					<form class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">金额：</label>
							<div class="am-form-content">
								<input type="text" id="money" placeholder=" 请输入充值金额" name="moneyrecharge">
							</div>
						</div>
						<div>
							充值金额：
							
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" name="" value="50" class="am-btn am-btn-success" class="rechargemoney">
							
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                         <input type="button" name="" value="100" class="am-btn am-btn-success" class="rechargemoney">
							
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <input type="button" name="" value="200" class="am-btn am-btn-success" class="rechargemoney">

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="button" name="" value="500" class="am-btn am-btn-success" class="rechargemoney">

	                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" name="" value="1000" class="am-btn am-btn-success" class="rechargemoney">
							
							   
						</div>
						</form>
						<div class="info-btn">
							<div class="am-btn am-btn-danger" id="recharge">充值</div>
						</div>

					

@endsection()

@section('js')

		<script type="text/javascript">

					 // 选择充值按钮能进行选择面值充值
				   $('input[type=button]').click(function() {
				   	    
				   	    var rechargemoney = $(this).val();

				   	    $('#money').val(rechargemoney);
				   })  
					

				// 点击充值按钮进行充值
				$('#recharge').click(function(){
					// 获取充值金额的值
					var money = $('#money').val();
 					  // 判断充值的值是否为数字，是否为空
					if( !isNaN(money) && money != false){
					  	//弹框询问用户是否确定充值 
					  layer.confirm('确定充值？', {
						  btn: ['是', '否'] 
						  ,btn1: function(index, layero){
						  	// 发送ajax
						  	$.post("{{ url('/home/center/dorecharge') }}",{'_token':'{{csrf_token()}}',money:money},function(data){
						  		// 通过判断data的值,得到信息
						  		if(data)
						  		{
									layer.open({  
			                        content: '充值成功！',  
			                        btn: ['确认'],  
			                        yes: function(index, layero) {  
			                            window.location.href='/home/center/bill/index';  
			                        },cancel: function() {  
			                            //右上角关闭回调  			 
			                        }  
			                    });
						  		}else
						  		{
						  			layer.open({
									 content: '充值失败，请重新尝试！'
									});
								    $('#money').val('');
						  		}

						  	})
						  
						}
						});
					  }else
						{
							layer.open({
							 content: '请填写充值金额！'
							});
						}
				})
			
			
		</script>
@endsection








