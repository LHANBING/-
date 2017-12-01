@extends('homes.layout.center')
@section('title','订单管理')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">
		
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/js/jquery-1.8.3.min.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@endsection()

@section('content')

<div class="user-order">
	<!--标题 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">
            出售订单管理
        </strong>
        /
        <small>
            Order
        </small>
    </div>
</div>
<hr>
<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">
    <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active">
            <a href="#tab1">
                所有订单
                <em style='color:red'>{{$zong1}}</em>
            </a>
        </li>
        <li class="">
            <a href="#tab2">
                待付款
                <em style='color:red'>{{$count1}}</em>
            </a>
        </li>
        <li class="">
            <a href="#tab3">
                待发货
                <em style='color:red'>{{$count2}}</em>
            </a>
        </li>
        <li class="">
            <a href="#tab4">
                待收货
                <em style='color:red'>{{$count3}}</em>
            </a>
        </li>
        <li class="">
            <a href="#tab5">
                待评价
                <em style='color:red'>{{$count4}}</em>
            </a>
        </li>
    </ul>


    <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

    	<!-- 全部订单 -->
        <div class="am-tab-panel am-fade am-active am-in" id="tab1">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($zong as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status5">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->goods_id]}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p><br>
                                                    <p class="info-little">
                                                        商品类别:{{$v->typename}}/{{$v->typechildname}}
                                                        <br>
                                                        发布城市:{{$v->address}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            <br>{{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                	<li class="td td-status">
                                	  @if($v->sale_order_status == 1)
                                        <div class="item-status">
                                           <p>等待买家付款</p>
                                        </div>
                                      @elseif($v->sale_order_status == 2)
                                        <div class="item-status">
                                            <p class="Mystatus">买家已付款</p>
                                            <p class="Mystatus">等待卖家发货</p>
                                        </div>
                                      @elseif($v->sale_order_status == 3)
                                         <div class="item-status">
                                            <p class="Mystatus">
                                                卖家已发货
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                      @elseif($v->sale_order_status == 4)
                                         <div class="item-status">
                                            <p class="Mystatus">
                                                交易成功
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                	  @elseif($v->sale_order_status == 5)
	                                        <div class="item-status">
	                                            <p class="Mystatus">交易结束</p>
	                                            <p class="order-info">卖家评价完成</p> 
	                                        </div>
	                                   @endif
	                                </li>
	                               
                                    <li class="td td-change">
                                      @if($v->sale_order_status == 1)
                                        <div class="am-btn am-btn-danger anniu" onclick="quxiao({{$v->order_num}})">
                                            取消订单
                                        </div>
                                      @elseif($v->sale_order_status == 2)
                                        <div class="am-btn am-btn-danger anniu" onclick="danhao({{$v->order_num}})">
                                            上传单号
                                        </div>
                                      @elseif($v->sale_order_status == 3)
                                        <div class="am-btn am-btn-danger anniu" onclick="shouhuo({{$v->order_num}})">
                                            提醒买家收货
                                        </div>
                                      @elseif($v->sale_order_status == 4)
                                        <div class="am-btn am-btn-danger anniu" onclick="pingjia({{$v->order_num}})">
                                            评价买家
                                        </div>
                                      @elseif($v->sale_order_status == 5)
                                      	<div class="am-btn am-btn-danger anniu" onclick="chapingjia({{$v->order_num}})">
                                            查看评价
                                        </div>
                                      @endif
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        

        <!-- 待付款 -->
        <div class="am-tab-panel am-fade" id="tab2">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($daifukuan as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status1">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->goods_id]}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p><br>
                                                    <p class="info-little">
                                                        商品类别:{{$v->typename}}/{{$v->typechildname}}
                                                        <br>
                                                        发布城市:{{$v->address}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            <br>{{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                           <p>等待买家付款</p>
                                            
                                        </div>
                                    </li>
                                    <li class="td td-change">
                   <div class="am-btn am-btn-danger anniu" onclick="quxiao({{$v->order_num}})">
                                                取消订单
                                        </div>
                                       
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 待发货 -->
        <div class="am-tab-panel am-fade" id="tab3">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($daifahuo as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status1">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->goods_id]}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p><br>
                                                    <p class="info-little">
                                                        商品类别:{{$v->typename}}/{{$v->typechildname}}
                                                        <br>
                                                        发布城市:{{$v->address}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            <br>{{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">买家已付款</p>
                                            <p class="Mystatus">等待卖家发货</p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <div class="am-btn am-btn-danger anniu" onclick='danhao({{$v->order_num}})'>
                                            上传单号
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 待收货 -->
        
        <div class="am-tab-panel am-fade" id="tab4">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($daishouhuo as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status1">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->goods_id]}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p><br>
                                                    <p class="info-little">
                                                        商品类别:{{$v->typename}}/{{$v->typechildname}}
                                                        <br>
                                                        发布城市:{{$v->address}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            <br>{{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                卖家已发货
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <div class="am-btn am-btn-danger anniu" onclick="shouhuo({{$v->order_num}})">
                                            提醒买家收货
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 待评价 -->
        
        <div class="am-tab-panel am-fade" id="tab5">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($daipingjia as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status1">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$pic[$v->goods_id]}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p><br>
                                                    <p class="info-little">
                                                        商品类别:{{$v->typename}}/{{$v->typechildname}}
                                                        <br>
                                                        发布城市:{{$v->address}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            <br>{{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                交易成功
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                       
                                            <div class="am-btn am-btn-danger anniu" onclick="pingjia({{$v->order_num}})">
                                                评价买家
                                            </div>
                                       
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
						
</div>

@endsection()

<script>

	//取消订单
	function quxiao(num){
		layer.confirm('真的要取消订单么?', {
		  btn: ['是','否'] //按钮
		}, function(){
			$.post('/home/center/maiOrder/quxiao',{num:num,_token:'{{csrf_token()}}'},function(data){
				if(data){
					layer.msg('订单取消成功', {icon: 1});
					// location.reload();
					window.location.href='/home/center/maiOrder';
					// window.location.href='./index.php?c=type&a=looktype' 
				}else{
					layer.msg('取消失败,请重试', {icon: 1});
				}
			})
		  
		}, function(){
		  layer.msg('好的,那就不取消了~', {});
		});

		
	}

	//上传物流单号
	function danhao(num){
		// layer.confirm('真的要取消订单么?', {});
		// var num1 = num;
		// console.log(num);
		 layer.open({
	      type: 2,
	      title: '上传物流单号',
	      shadeClose: true,
	      shade: 0.8,
	      // maxmin: false, //开启最大化最小化按钮
	      area: ['700px', '60%'],
	      content: '/home/center/maiOrder/wuliu?num='+num
	      // content: '/home/center/maiOrder/wuliu?num='+num1
	    });
	}

	//提醒买家收货
	function shouhuo(num){
		// alert(1232);
		$.post('/home/center/news/addm',{num:num,_token:'{{csrf_token()}}'},function(data){
			// console.log(data);

			if(data == 1){
				layer.confirm('消息已发送!', {
				  btn: ['好的~'] //按钮
				})
			}else if(data == 2){
				layer.confirm('系统繁忙,请稍后再试', {
				  btn: ['确定'] //按钮
				})
			}else{
				layer.confirm('消息已发送,请勿重复发送', {
				  btn: ['确定'] //按钮
				})
			}
		})
		
	}

	//评价买家
	function pingjia(num){
		var num = num;

	  layer.alert('<form id="form"> <p>请对此次交易中的买家进行评价</p> <textarea id="text" name="desc" placeholder="请输入内容" style="width:450px;height:120px"></textarea> </form>',{
	        skin: 'layui-layer-molv',
	        btn: ['确认', '取消'],
	        area: ['500px', '300px'],
	        title: '评价买家',
	    	yes:function(index){

	            var text = $("#text").val();
	            if (text == "") {
	                alert("请输入评价！");
	                return;
	            }
	            var text = $('#text').val();
	            $.post('/home/center/maiOrder/pingjia',{num:num,text:text,_token:'{{csrf_token()}}'},function(data){
					// console.log(data);
					if(data == 1){
						layer.msg('评价成功!');
						window.location.href='/home/center/maiOrder';
					}else if(data == 2){
						layer.msg('系统繁忙,请稍后再试!');
					}else{
						layer.msg('评价失败,请重试!');
					}
				})
	            
	        
	    }
	});

	}

	//查看评价
	function chapingjia(num)
	{

		$.post('/home/center/maiOrder/chapingjia',{num:num,_token:'{{csrf_token()}}'},function(data){
			layer.load(1);
                 if(data['0'] == '10'){
                    var asd = '买家暂未评价!';
                 }else{
                    var asd = data[0].comment;
                 }
			if(data){
				layer.closeAll('loading');
				layer.open({
				  type: 1,
				  title: '评价信息',
				  skin: 'layui-layer-rim', //加上边框
				  area: ['420px', '240px'], //宽高
				  content: '<div> <div style="background:deeppink;width:400px;height:80px"> <p>买家评价您:</p> <p>'+asd+'</p> </div> <div style="background:pink;width:400px;height:80px"> <p>您评价买家:</p> <p>'+data[1].comment+'</p> </div> </div>'
				});
			}
			
		});
	}
</script>