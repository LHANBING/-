<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>上传物流单号页面</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/homes/js/address.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/js/jquery-1.8.3.min.js"></script>
		<!-- <script></script> -->
		<script type="text/javascript" src="{{url('/homes/layer1/jquery.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/layer.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/extend/layer.ext.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<!--物流 -->
<div class="logistics">
    <h3>
        选择快递公司
    </h3>
    <ul class="op_express_delivery_hot">
        <li data-value="yuantong" class="OP_LOG_BTN  "onclick="kuaidi('yuantong')">
        <i class="c-gap-right" style="background-position:0px -468px" >
           </i>
            圆通
            <span>
            </span>
        </li>
        <li data-value="shentong" class="OP_LOG_BTN  " onclick="kuaidi('shentong')">
            <i class="c-gap-right" style="background-position:0px -1008px" >
            </i>
            申通
            <span>
            </span>
        </li>
        <li data-value="yunda" class="OP_LOG_BTN " onclick="kuaidi('yunda')">
            <i class="c-gap-right" style="background-position:0px -576px" >
            </i>
            韵达
            <span>
            </span>
        </li>
        <li data-value="zhongtong" class="OP_LOG_BTN" onclick="kuaidi('zhongtong')">
            <i class="c-gap-right" style="background-position:0px -324px" >
            </i>
            中通
            <span>
            </span>
        </li>
        <li data-value="shunfeng" class="OP_LOG_BTN" onclick="kuaidi('shunfeng')">
            <i class="c-gap-right" style="background-position:0px -180px" >
            </i>
            顺丰
            <span>
            </span>
        </li>
    </ul>
</div>
<form id="postForm" >
	<!-- action="asset('/home/center/maiOrder/wuliu')" -->
	<input type="text" style='width:680px;height:40px;margin-top:25px' placeholder="请输入快递单号" name="danhao" id='danhao' /><br>
	

	<input type="hidden" id='kuaidi' name='kuaidi' value=''/>
	<input type="hidden" id='num' name='num' value='{{$res}}'/>

	{{ csrf_field() }}
	<input type="button" style='width:680px;height:30px;margin-top:25px' value="确定" id='tijiao' >

	<!-- <div class="layui-form-item">
    <label class="layui-form-label">输入框</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div> -->
</form>
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	//给快递赋值
	function kuaidi(name){
		$('#kuaidi').val(name);
	}


//提交
$('#tijiao').click(function(){

	if(!$('#danhao').val() && !$('#kuaidi').val()){
		layer.confirm('请选择快递公司并输入相应的单号!', {
			  btn: ['确定'] //按钮
			});
	}else{

		$.ajax({    
			     url : "/home/center/maiOrder/wuliu",    
			     type : "POST",    
			     data : $( '#postForm').serialize(),    
			     success : function(data) {  
			     	// console.log(data);  
			         if(data){
			         	// layer.msg('单号上传成功');
			         	// var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
						// parent.layer.close(index);
			         	// layer.closeAll('iframe');
			         	// window.location.href='/home/center/maiOrder';
			         	
			         	layer.confirm('单号上传成功!', {
						  btn: ['确定'] //按钮
						}, function(){
						window.parent.location.reload(); //刷新父页面
						var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
						parent.layer.close(index);
						
						});
			         }else{
			         	layer.confirm('单号上传失败,请重试!', {
						  btn: ['确定'] //按钮
						}, function(){
						window.parent.location.reload(); //刷新父页面
						var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
						parent.layer.close(index);
						
						});
			         }
			     },    
			     error : function(data) {    
			          
			     }    
			});   
	}
	
	
})

</script>

			
	

</body>
</html>

