@extends('homes.layout.center')
@section('title','发布我的二手商品')

@section('cssjs')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
<link href="/homes/css/newstyle.css" rel="stylesheet" type="text/css">

<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
<script src="/homes/js/jquery-1.7.2.min.js"></script>

@endsection()
	
@section('content')
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发布二手</strong> / <small>New</small></div>
	</div>
	<hr>
	<form action="/home/center/fabu" class="am-form" id="doc-vld-msg" method="post" enctype="multipart/form-data">
   
  <fieldset>
    <div class="am-form-group">
                  <label for="user-birth" >产品分类</label>
                  <div class="am-form-content ">
                    <div class="birth-select" style="float: left;">
                      父分类 : 
                        <select  id="father" style="width: 150px" name="type_id">
                        @foreach($res as $v=>$k)
                        <option value="{{$k->id}}">{{$k->typename}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="birth-select"  >
                      子分类 : <select  id="son" style="width: 150px" name='typechild_id'>
                      </select>
                    </div>
                  </div>
    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品标题：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="2" maxlength="10" name="title" placeholder="请输入商品的标题" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品现价：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="1" maxlength="10" name="newprice" placeholder="请输入商品现在的价格" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品原价：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="1" maxlength="10" name="oldprice" placeholder="请输入商品原来的价格" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品运费：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="1" name="transprice" placeholder="请输入商品所需运费" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">卖家地址：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="2" name="address" placeholder="请输入商品的发货地址" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-ta-2-1">商品介绍：</label>
      <textarea id="doc-vld-ta-2-1" minlength="8" maxlength="250" name="content"></textarea>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品主图：</label>
      <input type="file" id="doc-vld-name-2-1" name="goods_photo"/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品详细图片：</label>
      <input type="file" id="doc-vld-name-2-1" name="multi_photo"/>
    </div>
    {{ csrf_field() }}
    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>
  
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">
    $(function(){
     var j =0;
      $('#father').change(function(){

        $('#son').empty();

        var id = $('#father').val();

        $.post('/home/center/fabu/type',{id:id},function(data){

              for(var i in data){
                if(data[i]['status'] == 1){
                  var op = $('<option value="'+data[i]['id']+'">'+data[i]['typechildname']+'</option>');
                  op.appendTo($('#son'));
                  }
              }



        },'json');


     
   });

    })
    
    
</script>

@endsection()