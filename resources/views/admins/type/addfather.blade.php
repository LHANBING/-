@extends('admins.layout.admins')

@section('title','添加父分类页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            添加父分类页面
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
		<form class="mws-form" action="/admin/type" method="post" enctype="multipart/form-data">
			<div class="mws-form-inline">

				<div class="mws-form-row">
					<label class="mws-form-label">父分区名</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="typename" value={{old('m_name')}}>
					</div>
				</div>
			</div>

			<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
						<ul class="mws-form-list inline" style="margin-left: 150px">
							<li><input type="radio" name="status" value="1" checked> <label>显示</label></li>
							<li><input type="radio" name="status" value="0"> <label>不显示</label></li>
						</ul>
					</div>
				</div>
			<div class="mws-button-row">
					{{csrf_field()}}
				<input type="submit" value="添加" class="btn btn-danger" style="margin-left: 300px">
			</div>
		</form>
	</div>    	
    
</div> 

@endsection()

@section('js')


@endsection