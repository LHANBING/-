@extends('admins.layout.admins')

@section('title','用户添加页面')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
           用户添加页面
        </span>
    </div>

	@if (count($errors) > 0)
	    <div class="alert alert-danger mws-form-message error">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li style="font-size: 17px;list-style: none">{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif



	<div class="mws-panel-body no-padding">
		<form class="mws-form" action="/admin/manager" method="post" enctype="multipart/form-data">
			<div class="mws-form-inline">

				<div class="mws-form-row">
					<label class="mws-form-label">管理员名字</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="m_name" value={{old('m_name')}}>
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">密码</label>
					<div class="mws-form-item">
						<input type="password" class="small" name="m_password">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">确认密码</label>
					<div class="mws-form-item">
						<input type="password" class="small" name="repass">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">头像</label>
					<div class="mws-form-item">
						<input type="file"  style="width: 100%; padding-right: 84px;"  placeholder="文件上传" name="m_photo">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item clearfix">
						<ul class="mws-form-list inline">
							<li><input type="radio" name="auth" value="1" checked> <label>超级管理员</label></li>
							<li><input type="radio" name="auth" value="0"> <label>管理员</label></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="mws-button-row">
					{{csrf_field()}}
				<input type="submit" value="添加" class="btn btn-danger">
			</div>
		</form>
	</div>    	
</div>
@endsection()

@section('js')

<script type="text/javascript">
	$('.mws-form-message').delay(3000).slideUp(1000);
</script>

@endsection