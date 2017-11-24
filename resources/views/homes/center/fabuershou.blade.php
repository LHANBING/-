@extends('homes.layout.center')
@section('title','发布我的二手商品')

@section('cssjs')
    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">

    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
  


    <link rel="stylesheet" type="text/css" href="{{ asset('imageInput/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('imageInput/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('imageInput/css/ssi-uploader.css') }}"/>


    <script src="{{ asset('imageInput/js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('imageInput/js/ssi-uploader.js') }}"></script>
    <script src="/homes/layer/layer.js"></script>


  
@endsection()


@section('content')

    @if(session('fbcg'))
       <span id='fbcg'></span>           
    @endif
    @if(session('fbsb'))
       <span id='fbsb'></span>           
    @endif
    @if(session('sctp'))
       <span id='sctp'></span>           
    @endif
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发布二手闲置物品</strong> / <small>New</small></div>
	</div>
	<hr>
  <input type="file" multiple id="ssi-upload7"/>
	<form action="/home/center/fabu" class="am-form" id="doc-vld-msg" method="post" enctype="multipart/form-data">
   
  <fieldset>
    <div class="am-form-group">


    <div><label for="user-birth" >选择闲置分类</label></div>

      <select id="father" name="type_id" style='width:200px;float:left;margin-right: 15px '>
        @foreach($res as $k=>$v)
          <option value="{{$v->id}}" > {{$v->typename}}</option>
        @endforeach
      </select>
      <select id="son" name='typechild_id' style='width:200px;margin-bottom:20px'>
      </select>

   

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">起个标题吧</label>
      <input type="text" class="am-form-field am-radius" name="title" placeholder="售卖标题"/>
    </div>
    <div class="am-form-group">
      <label for="doc-vld-ta-2-1">详细介绍一下你闲置吧</label>
      <textarea id="doc-vld-ta-2-1" minlength="8" maxlength="250" name="content" placeholder="对闲置物品的简单介绍,250字以内."></textarea>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">你想多少钱出手呢?</label>
      <input class="am-form-field am-radius" type="text" id="doc-vld-name-2-1" minlength="1" maxlength="10" name="newprice" placeholder="根据成色而定哦!" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">你购买的时候多少钱?</label>
      <input class="am-form-field am-radius" type="text" id="doc-vld-name-2-1" minlength="1" maxlength="10" name="oldprice" placeholder="买的时候很贵吧" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">运费:</label>
      <input class="am-form-field am-radius" type="text" id="doc-vld-name-2-1" minlength="1" name="transprice" placeholder="你觉得你给买家发快递过去需要多少钱" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-name-2-1">你所在的城市：</label>
      <input class="am-form-field am-radius" type="text" id="doc-vld-name-2-1" minlength="2" name="address" placeholder="请输入商品的发货地址" required/>
    </div>
    <input class="pic" type="hidden"  name="pic" value=''/>


    



   
    {{ csrf_field() }}

    <!-- 提交按钮 -->
    <button class="am-btn am-btn-primary am-btn-block" id='button' style="margin-top: 15px"><b>提交</b></button>


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

          // console.log(data);

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


<script>
   var imgNum=0;
    $('#ssi-upload7').ssi_uploader({
                    url: '/home/center/fabu/uploadimg',
                    onUpload: function () {
                        ssi_modal.notify('info', $.extend({}, notifyOptions, {
                            title: 'onUpload',
                            icon: false,
                            position: 'top center'
                        }));
                    },
                    onEachUpload: function (fileInfo ,xhr) {
                     imgNum++;
                        console.log(xhr);
                        var jsonData = $('.pic').val();
                       $('.pic').val('');
                        $('.pic').val(jsonData+'"img'+imgNum+'":"'+'goods/'+xhr+'",');

                        ssi_modal.notify('error', $.extend({}, notifyOptions, {
                            classSize: 'auto',
                            title: 'onEachUpload',
                            position: 'bottom center',
                            content: 'Status: ' + fileInfo.uploadStatus +
                            '<br>Response: ' + fileInfo.responseMsg +
                            '<br>name: ' + fileInfo.name +
                            '<br>size: ' + fileInfo.size +
                            '<br>type: ' + fileInfo.type
                        }));
                    }
                    
                });
            
</script>
<script>
  $('#fbch').click(function(){
     layer.msg('恭喜您的闲置发布成功!');
  }).trigger('click');
   $('#fbsb').click(function(){
     layer.msg('抱歉,您的闲置发布失败,请重试!');
  }).trigger('click');
    $('#sctp').click(function(){
     layer.msg('请您先上传闲置图片!');
  }).trigger('click');
</script>

@endsection()