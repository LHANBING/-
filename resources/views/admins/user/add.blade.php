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
    
     <div class="mws-panel-body no-padding">
	
		@if (count($errors) > 0)
		    <div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style="font-size: 17px;list-style: none;">{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		

    	<form action="/admin/user" class="mws-form" method="post" enctype="multipart/form-data">
    		<div class="mws-form-inline">

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号：</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="tel" value="{{ old('phone') }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码：</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="password">
    				</div>
    			</div>

    		</div>
    		<div class="mws-button-row">
				
				{{ csrf_field() }}

    			<input type="submit" class="btn btn-danger" value="添加">
    			
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