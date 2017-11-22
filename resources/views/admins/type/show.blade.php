@extends('admins.layout.admins')

@section('title','商品详情页面')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
           商品详情页面
        </span>
    </div>




	<div class="mws-panel-body no-padding">
			<div class="mws-form-inline">


				<div class="mws-form-row">
					<label class="mws-form-label">商品详情</label>
					<div class="mws-form-item">
						<textarea>{{$res->content}}</textarea>
					</div>
				</div>

				<!-- <div class="mws-form-row">
					<label class="mws-form-label">头像</label>
					<div class="mws-form-item">
						<input type="file"  style="width: 100%; padding-right: 84px;"  placeholder="文件上传" name="m_photo">
					</div>
				</div> -->

			</div>
			
	</div>    	
</div>
@endsection()

@section('js')

@endsection