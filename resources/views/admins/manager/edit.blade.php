@extends('admins.layout.admins')

@section('title','管理员修改页面')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>管理员修改页面</span>
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
		<form class="mws-form" action="/admin/manager/{{$res->id}}" method="post" enctype="multipart/form-data">
			<div class="mws-form-inline">

				<div class="mws-form-row">
					<label class="mws-form-label">管理员名字</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="m_name" placeholder="{{ $res->m_name }}" >
					</div>
				</div>
				

				<div class="mws-form-row">
					<label class="mws-form-label">管理员级别</label>
					<div class="mws-form-item clearfix">
						<ul class="mws-form-list inline">
							<li><input type="radio" name="auth" value="1" @if($res->auth == 1) checked @endif > <label>超级管理员</label></li>
							<li><input type="radio" name="auth" value="0" @if($res->auth == 0) checked @endif > <label>管理员</label></li>
						</ul>
					</div>
				</div>


			</div>
			<div class="mws-button-row">
					{{csrf_field()}}

					{{ method_field('PUT')}}
				<input type="submit" value="修改" class="btn btn-danger">
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