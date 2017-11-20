@extends('homes.layout.center')
@section('title','发布我的二手商品')

@section('cssjs')

<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
<link href="/homes/css/newstyle.css" rel="stylesheet" type="text/css">

<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

@endsection()
	
@section('content')
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发布二手</strong> / <small>New</small></div>
	</div>
	<hr>
	<form action="" class="am-form" id="doc-vld-msg">
  <fieldset>
    <div class="am-form-group">
      <label for="doc-vld-name-2-1">商品标题：</label>
      <input type="text" id="doc-vld-name-2-1" minlength="20" placeholder="请输入商品的标题" required/>
    </div>

    <div class="am-form-group">
      <label for="doc-vld-ta-2-1">商品介绍：</label>
      <textarea id="doc-vld-ta-2-1" minlength="8" maxlength="250"></textarea>
    </div>

    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>


@endsection()