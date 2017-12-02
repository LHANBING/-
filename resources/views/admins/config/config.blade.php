@extends('admins.layout.admins')

@section('title','网站配置页面')

@section('content')
<!-- <p style='font-size:100px;margin-top: 30px' >请叫我大型按钮!!!</p> -->
<button style='width:800px;height:400px;margin-top: 100px;background-color:green;margin-left: 200px;font-size: 150px' id='kaiguan'>网站开启中!</button>

<script>

		$('#kaiguan').click(function(){
			var a = $('#kaiguan').text();
			layer.confirm('关键按钮,确定执行操作?', {
			  btn: ['确定','取消'] //按钮
			}, function(){
			  
			  	if(a == '网站开启中!'){
			  		$.get('/admin/dupeizhi',{num:1},function(data){
						if(data == 1){
							layer.msg('操作成功!');
							$('#kaiguan').text('网站关闭中!');
						}else{
							layer.msg('操作失败!稍后再试!');
						}
					})
			  	}else if(a == '网站关闭中!'){
			  		$.get('/admin/dupeizhi',{num:0},function(data){
						if(data){
							layer.msg('操作成功!');
							$('#kaiguan').text('网站开启中!');
						}else{
							layer.msg('操作失败!稍后再试!');
						}
					})
			  	}
				



			}, function(){

			  layer.msg('辣鸡,你真怂!');

			})
		})
		
</script>

@endsection