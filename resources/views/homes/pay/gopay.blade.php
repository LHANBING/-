<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- <meta name="_token" content="{{csrf_token()}}"/>
        -->
        <title>
            结算页面
        </title>
        <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet"
        type="text/css" />
        <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css"
        />
        <link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css"
        />
        <link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js">
        </script>
        <script type="text/javascript" src="/homes/js/address.js">
        </script>
        <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
    </head>
    
    <body>
        <div class="am-container header">
            <ul class="message-r">
                <div class="topMessage home">
                    <div class="menu-hd">
                        <a href="/" target="_top" class="h">
                            商城首页
                        </a>
                    </div>
                </div>
                <div class="topMessage my-shangcheng">
                    <div class="menu-hd MyShangcheng">
                        <a href="/home/center/index" target="_top">
                            <i class="am-icon-user am-icon-fw">
                            </i>
                            个人中心
                        </a>
                    </div>
                </div>
                <div class="topMessage my-shangcheng">
                    <div class="menu-hd MyShangcheng">
                        <a href="/home/logout" target="_top">
                            <i class="am-icon-user am-icon-fw">
                            </i>
                            退出
                        </a>
                    </div>
                </div>
                <div class="topMessage favorite">
                    <div class="menu-hd">
                        <a href="#" target="_top">
                            <i class="am-icon-heart am-icon-fw">
                            </i>
                            <span>
                                收藏夹
                            </span>
                        </a>
                    </div>
            </ul>
            </div>
            <!--悬浮搜索框-->
            <div class="nav white">
                <div class="logo">
                    <img src="/homes/images/logo.png" />
                </div>
                <div class="logoBig">
                    <li>
                        <img src="/homes/images/logobig.png" />
                    </li>
                </div>
                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#">
                    </a>
                    <form>
                        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索"
                        autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                    </form>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="concent">
                <!--地址 -->
                <div class="paycont">
                    <div class="address">
                        <h3>
                            确认收货地址
                        </h3>
                        <div class="control">
                            <span onclick="addClick(this)"  class=" createAddr  am-btn am-btn-danger">
                                使用新地址
                            </span>
                        </div>
                        <div class="clear">
                        </div>
                        <ul>

                            <div class="per-border">
                            </div>

								@foreach($address as $k=>$v)
								
								@if($v->status == 1)
                            <li class="user-addresslist defaultAddr">
							
							<!-- 默认地址 -->
								
                                <div class="address-left">
                                    <div class="user DefaultAddr">
                                        <span class="buy-address-detail">
                                            <span class="buy-user">
                                                {{$v->addressname}}
                                            </span>
                                            <span class="buy-phone">
                                                {{$v->address_tel}}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="default-address DefaultAddr">
                                        <span class="buy-line-title buy-line-title-type">
                                            收货地址：
                                        </span>
                                        <span class="buy--address-detail">
                                            <span class="province">
                                                 {{$v->province}}
                                            </span>
                                            
                                            <span class="city">
                                                {{$v->city}}
                                            </span>
                                           
                                            <span class="dist">
                                                {{$v->area}}
                                            </span>
                                            
                                            <span class="street">
                                                 {{$v->address}}
                                            </span>
                                        </span>
                                        </span>
                                    </div>
                                    <ins class="deftip">
                                        默认地址
                                    </ins>
                                </div>


                                <div class="address-right">
                                    <a href="/homes/person/address.html">
                                        <span class="am-icon-angle-right am-icon-lg">
                                        </span>
                                    </a>
                                </div>


                                <div class="clear">
                                </div>
                                <div class="new-addr-btn">
                                    
                                    <span class="new-addr-bar hidden">
                                        |
                                    </span>
                                    <span href="" id = "{{$v->id}}" onclick="editClick(this);">
                                        编辑
                                    </span>
                                    <span class="new-addr-bar">
                                        |
                                    </span>
                                    <a href="javascript:void(0);" id="{{$v->id}}" onclick="delClick(this);">
                                        删除
                                    </a>
                                </div>
                            </li>                         
                            @endif
							@endforeach

								<!-- 设为默认 -->

                            <div class="per-border">
                            </div>
							@foreach($address as $k=>$v)
								
								@if($v->status == 0)

                             <li class="user-addresslist">
                                <div class="address-left">
                                    <div class="user DefaultAddr">
                                        <span class="buy-address-detail">
                                            <span class="buy-user">
                                                {{$v->addressname}}
                                            </span>
                                            <span class="buy-phone">
                                                 {{$v->address_tel}}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="default-address DefaultAddr">
                                        <span class="buy-line-title buy-line-title-type">
                                            收货地址：
                                        </span>
                                        <span class="buy--address-detail">
                                            <span class="province">
                                                {{$v->province}}
                                            </span>
                                            
                                            <span class="city">
                                                {{$v->city}}
                                            </span>
                                            
                                            <span class="dist">
                                                {{$v->area}}
                                            </span>
                                            
                                            <span class="street">
                                                {{$v->address}}
                                            </span>
                                        </span>
                                        </span>
                                    </div>
                                    <ins class="deftip hidden">
                                        默认地址
                                    </ins>
                                </div>
                                <div class="address-right">
                                    <span class="am-icon-angle-right am-icon-lg">
                                    </span>
                                </div>
                                <div class="clear">
                                </div>
                                <div class="new-addr-btn">
                                    <a href="#" onclick="func(this)" id="{{$v->id}}">
                                        设为默认
                                    </a>
                                    <span class="new-addr-bar">
                                        |
                                    </span>
                                    <span href="" id = "{{$v->id}}" onclick="editClick(this);">
                                        编辑
                                    </span>
                                    <span class="new-addr-bar">
                                        |
                                    </span>
                                    <a href="javascript:void(0);" id="{{$v->id}}" onclick="delClick(this);">
                                        删除
                                    </a>
                                </div>
                            </li>
							 @endif
							@endforeach




                        </ul>


                        <div class="clear">
                        </div>
                    </div>
                    <!--物流 -->
                    <div class="logistics">
                        <h3>
                            选择物流方式
                        </h3>
                        <ul class="op_express_delivery_hot">
                            <li data-value="yuantong" class="OP_LOG_BTN  ">
                                <i class="c-gap-right" style="background-position:0px -468px">
                                </i>
                                圆通
                                <span>
                                </span>
                            </li>
                            <li data-value="shentong" class="OP_LOG_BTN  ">
                                <i class="c-gap-right" style="background-position:0px -1008px">
                                </i>
                                申通
                                <span>
                                </span>
                            </li>
                            <li data-value="yunda" class="OP_LOG_BTN  ">
                                <i class="c-gap-right" style="background-position:0px -576px">
                                </i>
                                韵达
                                <span>
                                </span>
                            </li>
                            <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last ">
                                <i class="c-gap-right" style="background-position:0px -324px">
                                </i>
                                中通
                                <span>
                                </span>
                            </li>
                            <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom">
                                <i class="c-gap-right" style="background-position:0px -180px">
                                </i>
                                顺丰
                                <span>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="clear">
                    </div>
                    <!--支付方式-->
                    <div class="logistics">
                        <h3>
                            选择支付方式
                        </h3>
                        <ul class="pay-list">
                            <li class="pay card">
                                <img src="/homes/images/wangyin.jpg" />
                                银联
                                <span>
                                </span>
                            </li>
                            <li class="pay qq">
                                <img src="/homes/images/weizhifu.jpg" />
                                微信
                                <span>
                                </span>
                            </li>
                            <li class="pay taobao">
                                <img src="/homes/images/zhifubao.jpg" />
                                支付宝
                                <span>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="clear">
                    </div>
                    <!--订单 -->
                    <form action="/home/pay" method="post">
                        <div class="concent">
                            <div id="payTable">
                                <h3>
                                    确认订单信息
                                </h3>
                                <div class="cart-table-th">
                                    <div class="wp">
                                        <div class="th th-item">
                                            <div class="td-inner">
                                                商品信息
                                            </div>
                                        </div>
                                        <div class="th th-price">
                                            <div class="td-inner">
                                                现价
                                            </div>
                                        </div>
                                        <!-- <div class="th th-amount">
                                        <div class="td-inner">数量</div>
                                        </div> -->
                                        <div class="th th-sum">
                                            <div class="td-inner">
                                                金额
                                            </div>
                                        </div>
                                        <div class="th th-oplist">
                                            <div class="td-inner">
                                                配送方式
                                            </div>
                                        </div>
                                        <div class="th th-oplist">
                                            <div class="td-inner">
                                                快递费
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear">
                                </div>
                                <tr class="item-list">
                                    <div class="bundle  bundle-last">
                                        <div class="bundle-main">
                                            <ul class="item-content clearfix">
                                                <div class="pay-phone">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="http://ozstangaz.bkt.clouddn.com/{{$goods_photo->img1}}">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">
                                                                    {{$goods->title}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-info">
                                                        <div class="item-props">
                                                            <span class="sku-line">
                                                                原价：{{$goods->oldprice}}
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price price-promo-promo">
                                                            <div class="price-content">
                                                                <em class="J_Price price-now">
                                                                    {{$goods->newprice}}
                                                                </em>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <!-- <li class="td td-amount">
                                                <div class="amount-wrapper ">
                                                <div class="item-amount ">
                                                <span class="phone-title">购买数量</span>
                                                <div class="sl">
                                                <input class="min am-btn" name="" type="button" value="-" />
                                                <input class="text_box" name="" type="text" value="3" style="width:30px;" />
                                                <input class="add am-btn" name="" type="button" value="+" />
                                                </div>
                                                </div>
                                                </div>
                                                </li> -->
                                                <li class="td td-sum">
                                                    <div class="td-inner">
                                                        <em tabindex="0" class="J_ItemSum number">
                                                            {{$goods->newprice}}
                                                        </em>
                                                    </div>
                                                </li>
                                                <li class="td td-oplist">
                                                    <div class="td-inner">
                                                        <span class="phone-title">
                                                            配送方式
                                                        </span>
                                                        <div class="pay-logis">
                                                            快递
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="td td-oplist">
                                                    <div class="td-inner">
                                                        <span class="phone-title">
                                                            运费
                                                        </span>
                                                        <div class="pay-logis">
                                                            <b class="sys_item_freprice">
                                                                {{$goods->transprice}}
                                                            </b>
                                                            元
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clear">
                                            </div>
                                        </div>
                                </tr>
                                <div class="clear">
                                </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>
                            <div class="pay-total">
                                <!--留言-->
                                <div class="order-extra">
                                    <div class="order-user-info">
                                        <div id="holyshit257" class="memo">
                                            <label>
                                                买家留言：
                                            </label>
                                            <input type="text" name="buy_message" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）"
                                            placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
                                            <div class="msg hidden J-msg">
                                                <p class="error">
                                                    最多输入500个字符
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear">
                                </div>
                            </div>
                            <!--含运费小计 -->
                            <div class="buy-point-discharge ">
                                <p class="price g_price ">
                                    合计（含运费）
                                    <span>
                                        ¥
                                    </span>
                                    <em class="pay-sum">
                                        <input type="text" name="pay_money" value="{{$goods->newprice+$goods->transprice}}"
                                        disabled />
                                    </em>
                                </p>
                            </div>
                            <!--信息 -->
                            <div class="order-go clearfix">
                                <div class="pay-confirm clearfix">
                                    <div class="box">
                                        <div tabindex="0" id="holyshit267" class="realPay">
                                            <em class="t">
                                                实付款：
                                            </em>
                                            <span class="price g_price ">
                                                <span>
                                                    ¥
                                                </span>
                                                <em class="style-large-bold-red " id="J_ActualFee">
                                                    {{$goods->newprice+$goods->transprice}}
                                                </em>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <input type="hidden" name="pay_money" value="{{$goods->newprice+$goods->transprice}}" />
                                    <input type="hidden" name="pay_yunfei" value="{{$goods->transprice}}" />
                                    <input type="hidden" name="goods_id" value="{{$goods->id}}" />
                                    <input type="hidden" name="address" value="{{$default->id}}" />
									
                                    <div id="holyshit269" class="submitOrder">
                                        <div class="go-btn-wrap">
                                        	{{ csrf_field() }}
                                        	<input type="submit" id="J_Go"  class="btn-go" title="点击此按钮，提交订单" value="提交按钮" style="float: right;" />
                                        </div>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear">
                        
                    </form>
                  
                </div>
                
            </div>
            <div class="footer">
                <div class="footer-hd">
                    <p>
                        <a href="#">
                            恒望科技
                        </a>
                        <b>
                            |
                        </b>
                        <a href="#">
                            商城首页
                        </a>
                        <b>
                            |
                        </b>
                        <a href="#">
                            支付宝
                        </a>
                        <b>
                            |
                        </b>
                        <a href="#">
                            物流
                        </a>
                    </p>
                </div>
                <div class="footer-bd">
                    <p>
                        <a href="#">
                            关于恒望
                        </a>
                        <a href="#">
                            合作伙伴
                        </a>
                        <a href="#">
                            联系我们
                        </a>
                        <a href="#">
                            网站地图
                        </a>
                        <em>
                            © 2015-2025 Hengwang.com 版权所有
                        </em>
                    </p>
                </div>
            </div>
        </div>
        <div class="theme-popover-mask">
        </div>
       
        <div class="clear">
        </div>
    </body>

<script type="text/javascript">



	var func = function(obj){
		var id = $(obj).attr('id');

		$.post('/home/default',{id:id,_token:'{{csrf_token()}}'},function(data){
			layer.open({
				content:'修改默认地址成功!'
				,btn: ['确认']
  				,btn1: function(){
    				location.reload();
  				}
			})
			
		})

	}

    //删除地址

    var delClick = function(obj)
    {
        var id = $(obj).attr('id');

        $.post('/home/pay/del',{id:id,_token:'{{csrf_token()}}'},function(data){
            layer.msg(data);
            location.reload();
            
        })
       
    }

    var editClick = function(obj)
    {
        var id = $(obj).attr('id');

        layer.open({
          type: 2,
          title: '修改用户地址信息页',
          shadeClose: true,
          shade: 0.8,
          area: ['700px', '60%'],
          content: '/home/pay/edit?id='+id //iframe的url
        })


    }

    var addClick = function(obj)
    {

        layer.open({
          type: 2,
          title: '添加用户地址信息页',
          shadeClose: true,
          shade: 0.8,
          area: ['800px', '60%'],
          content: '/home/pay/add' //iframe的url
        })

      
    }


    

</script>
</html>