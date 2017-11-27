<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title')
        </title>

        <script src="/homes/validate.js"></script>

        <script type="text/javascript" src="{{url('/homes/layer1/jquery.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/layer.js')}}"></script>
        <script type="text/javascript" src="{{url('/homes/layer1/extend/layer.ext.js')}}"></script>
        <style type="text/css">
            .yanzheng{
                color: red;
                font-size:12px;
            }
        </style>

        @section('cssjs')
        <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet"
        type="text/css">
        <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet"
        type="text/css">
        <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css"
        />
        <link href="/homes/css/hmstyle.css" rel="stylesheet" type="text/css" />
        <link href="/homes/css/skin.css" rel="stylesheet" type="text/css" />
        <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/homes/css/systyle.css" rel="stylesheet" type="text/css">
        <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript">
        </script>
        <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript">
        </script>
        @show()
    </head>
    
    <body>
        <!-- 判断用户是否登录,显示不同导航条 -->
        @if(session('uid'))
        <div class="hmtop">
            <!--顶部导航条 -->
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
                       <div class="menu-hd" id="as"> <img src="/homes/images/12news.png" alt="" style="width:13px;margin-top:-5px" /> 

                        <span>消息</span>
                        
                        </div>
                </ul>
                </div>
             
                <!--悬浮搜索框-->
                <div class="nav white">
                    <div class="logo">
                        <img src="/homes/images/logo.png" style="width:150px"/>
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
            </div>
            @else
            <div class="hmtop">
                <!--顶部导航条 -->
                <div class="am-container header">
                    <ul class="message-l">
                        <div class="topMessage">
                            <div class="menu-hd">
                                <a href="/home/login" target="_top" class="h">
                                    亲，请登录
                                </a>
                                <a href="/home/register" target="_top">
                                    免费注册
                                </a>
                            </div>
                        </div>
                    </ul>
                </div>
                <!--悬浮搜索框-->
                <div class="nav white">
                    <div class="logo">
                        <img src="/homes/images/logo.png" />
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
            </div>
            @endif
        </div>
        </article>
        </header>
        <div class="nav-table">
            <div class="long-title">
                <span class="all-goods">
                    全部分类
                </span>
            </div>
            <div class="nav-cont">
                <ul style="width: 800px">
                    <li class="index" style="width: 100px">
                        <a href="#">
                            首页
                        </a>
                    </li>
                    <li class="qc" style="width: 100px">
                        <a href="#">
                            闪购
                        </a>
                    </li>
                    <li class="qc" style="width: 100px">
                        <a href="#">
                            限时抢
                        </a>
                    </li>
                    <li class="qc" style="width: 100px">
                        <a href="#">
                            团购
                        </a>
                    </li>
                    <li class="qc last" style="width: 100px">
                        <a href="#">
                            大包装
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <b class="line">
        </b>
        <div class="center">
            <div class="col-main">
                <div class="main-wrap">
                    @section('content') @show
                </div>
            </div>
            <aside class="menu">
                <ul>
                    <li class="person active">
                        <a href="/home/center/index">
                            个人中心
                        </a>
                    </li>
                    <li class="person">
                        <a href="#">
                            个人资料
                        </a>
                        <ul>
                            <li>
                                <a href="/home/center/info/index">
                                    个人信息
                                </a>
                            </li>
                            <li> <a href="/home/center/info/user_change">修改密码</a></li>
                            <li><a href="/home/center/address">收货地址管理</a></li>                  
                                              
                        </ul>
                    </li>
                    <li class="person">
                        <a href="#">
                            购买二手
                        </a>
                        <ul>
                            <li>
                                <a href="/home/center/order/index">
                                    订单管理
                                </a>
                            </li>
                            <li>
                                <a href="/home/center/change/index">
                                    退款售后
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="person">
                        <a href="#">
                            出售二手
                        </a>
                        <ul>
                            <li>
                                <a href="/home/center/fabu">
                                    发布二手
                                </a>
                            </li>
                            <li>
                                <a href="/home/center/myershou">
                                    我的二手
                                </a>
                            </li>
                            <li>
                                <a href="/home/center/maiOrder">
                                    订单管理
                                </a>
                            </li>
                            <li>
                                <a href="/home/center/change/index">
                                    退款售后
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="person">
                        <a href="#">
                            我的资产
                        </a>
                        <ul>
                            <li> <a href="/home/center/recharge/index">充值</a></li>
                            <li>
                                <a href="/home/center/bill/index">
                                    账单明细
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="person">
                        <a href="#">
                            我的小窝
                        </a>
                        <ul>
                            <li>
                                <a href="/home/center/collection/index">
                                    收藏
                                </a>
                            </li>
                            <li>
                                <a href="/home/center/comment/index">
                                    评价
                                </a>
                            </li>
                            <li>
                          <a href="/home/center/news/index">消息 </a> 
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <!--底部-->
        <div class="footer">
            <div class="footer-hd">
                <p>
                    <a href="homes/#">
                        恒望科技
                    </a>
                    <b>
                        |
                    </b>
                    <a href="homes/#">
                        商城首页
                    </a>
                    <b>
                        |
                    </b>
                    <a href="homes/#">
                        支付宝
                    </a>
                    <b>
                        |
                    </b>
                    <a href="homes/#">
                        物流
                    </a>
                </p>
            </div>
            <div class="footer-bd">
                <p>
                    <a href="homes/#">
                        关于恒望
                    </a>
                    <a href="homes/#">
                        合作伙伴
                    </a>
                    <a href="homes/#">
                        联系我们
                    </a>
                    <a href="homes/#">
                        网站地图
                    </a>
                    <em>
                        © 2015-2025 Hengwang.com 版权所有
                    </em>
                </p>
            </div>
        </div>

        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



         </script>
          @section('js')
            
          @show
    </body>


</html>