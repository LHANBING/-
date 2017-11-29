@extends('admins.layout.admins')

@section('title','友情链接修改页面')

@section('content')
  

<div class="mws-panel grid_8">
						
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i> 修改友情链接</span>
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

                    	<form action="/admin/friendlink/{{$res->id}}" class="mws-form" method="post" enctype="multipart/form-data">
                        	<div style="display:none;" class="mws-form-message error" id="mws-validate-error"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接名称:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required large" name="friend_title" value="{{$res->friend_title}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接地址:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required email large" name="adr" value="{{$res->adr}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友情链接描述:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="required url large" name="des" value="{{$res->des}}">
                                    </div>
                                </div>
                            	
                                
                      
									
</div>
<div class="mws-button-row">

	{{ csrf_field() }}
	{{method_field('PUT')}}

    <input type="submit" value='修改' class="btn btn-danger">
    
	
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