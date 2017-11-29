@extends('admins.layout.admins')

@section('title','友情链接添加页面')

@section('content')
  

<div class="mws-panel grid_8">
						
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i> 添加友情链接</span>
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

                    	<form action="/admin/friendlink" class="mws-form" method="post" enctype="multipart/form-data">
                        	<div style="display:none;" class="mws-form-message error" id="mws-validate-error"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接名称:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required large" name="friend_title" value="{{old('friend_title')}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接地址:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required email large" name="adr" value="{{old('adr')}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接描述:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required url large" name="des" value="{{old('des')}}">
                                    </div>
                                </div>
                            	
                                <div class="mws-form-row">
									<label class="mws-form-label">
									    友情链接logo
									</label>
									<div class="mws-form-item">
									    <div style="position: relative;" class="fileinput-holder" name="logo">
									        
									            
									            <input type="file" name="logo" placeholder="文件上传" style="width: 100%; padding-
									            right: 84px; position: absolute; top: 0px; right: 0px; margin: 0px; cursor:
									            pointer; font-size: 999px; opacity: 0; z-index: 999;">
									        </span>
									    </div>
									</div>
									</div>
									
</div>
<div class="mws-button-row">

	{{ csrf_field() }}
<<<<<<< HEAD
    <input type="submit" value='添加' class="btn btn-danger">    
=======
	
    <input type="submit" value='提交' class="btn btn-danger">
    <input type="reset" class="btn btn-danger">
>>>>>>> 135b5a4730b73a0e208ec06167bb897a5540e1fd
	
</div>
</form>
</div>
</div>

@endsection()

@section('js')
<script>
	//加的定时器，让弹框上拉
	$('.mws-form-message').delay(3000).slideUp(1000);
</script>
@endsection