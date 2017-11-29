@extends('admins.layout.admins')

@section('title','友情链接添加页面')

@section('content')
  

<div class="mws-panel grid_8">
						
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i> 添加广告</span>
                    </div> 

						

                    <div class="mws-panel-body no-padding">
                    	@if (count($errors) > 0)
						    <div class="mws-form-message error">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li style="font-size:20px;list-style:none">{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif

						<!-- <div class="mws-form-message error">
						                        	This is an error message
						                            <ul>
						                            	<li>You are too fast</li>
						                                <li>You are too slow</li>
						                            </ul>
						                        </div> -->

                    	<form action="/admin/advs" class="mws-form" method="post" enctype="multipart/form-data">
                        	<div style="display:none;" class="mws-form-message error" id="mws-validate-error"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">商家:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required large" name="advs_a" value="{{old('advs_a')}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">产品:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required email large" name="advs_d" value="{{old('advs_d')}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">广告详情:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required url large" name="advs_v" value="{{old('advs_v')}}">
                                    </div>
                                </div>
                            	
				                <div class="mws-form-row">
                                	<label class="mws-form-label">广告链接:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required url large" name="advs_src" value="{{old('advs_src')}}">
                                </div>
							</div>

                                <div class="mws-form-row">
									<label class="mws-form-label">
									    广告图片
									</label>
									<div class="mws-form-item">
									    <div style="position: relative;" class="fileinput-holder" name="advs_s">
									        
									            
									            <input type="file" name="advs_s" placeholder="文件上传" style="width: 100%; padding-
									            right: 84px; position: absolute; top: 0px; right: 0px; margin: 0px; cursor:
									            pointer; font-size: 999px; opacity: 0; z-index: 999;">
									        </span>
									    </div>
									</div>
									</div>
																
</div>



<div class="mws-button-row">

	{{ csrf_field() }}
    <input type="submit" value='添加' class="btn btn-danger">
    
	
</div>
</form>
</div>
</div>

@endsection()

@section('js')
<script>

	$('.mws-form-message').delay(3000).slideUp(1000);
</script>
@endsection