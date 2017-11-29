<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title')
        </title>
        @section('cssjs')
        
      <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
      <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
      <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
      <link type="text/css" href="/homes/css/optstyle.css" rel="stylesheet" />
      <link type="text/css" href="/homes/css/style.css" rel="stylesheet" />
      
      <script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>
      <script type="text/javascript" src="/homes/basic/js/quick_links.js"></script>
      
      <script type="text/javascript" src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
      <script type="text/javascript" src="/homes/js/jquery.imagezoom.min.js"></script>
      <script type="text/javascript" src="/homes/js/jquery.flexslider.js"></script>
      <script type="text/javascript" src="/homes/js/list.js"></script>


            
      <link href="/homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
      <link href="/homes/css/skin.css" rel="stylesheet" type="text/css" />
      <!-- <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> -->
      <!-- <script src="/homes/js/jquery-1.8.3.min.js"></script> -->
      <!-- <link rel="stylesheet" href="/homes/bs/css/bootstrap.min.css">
      <link rel="stylesheet" href="/homes/bs/css/bootstrap-theme.min.css">
      <script type="text/javascript" src="/homes/bs/js/jquery.js"></script>
      <script type="text/javascript" src="/homes/bs/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="/homes/layer/layer.js"></script> -->



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
                        <img src="/homes/images/logo.png" style="width:150px" />
                    </div>
                    <div class="logoBig">
                        <li>
                            <img src="/homes/images/logobig.png" />
                        </li>
                    </div>
                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#">
                        </a>

                        <form action="/home/search" method="post" >
                            <input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off" value="{{ isset($request->searchInput) ? $request->searchInput : '' }}">
                            {{ csrf_field() }}
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" type="submit">
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
                    <div class="logoBig">
                        <li>
                            <img src="/homes/images/logobig.png" />
                        </li>
                    </div>
                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#">
                        </a>
                        <form action="/home/search" method="get" >
                            <input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off" value="{{ isset($request->searchInput) ? $request->searchInput : '' }}">
                            {{ csrf_field() }}
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" type="submit">
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
        <!-- <div class=tip>
                <div id="sidebar">
                    <div id="wrap">
                        <div id="prof" class="item">
                            <a href="#">
                                <span class="setting"></span>
                            </a>
                            <div class="ibar_login_box status_login">
                                <div class="avatar_box">
                                    <p class="avatar_imgbox"><img src="/homes/images/no-img_mid_.jpg" /></p>
                                    <ul class="user_info">
                                        <li>用户名：sl1903</li>
                                        <li>级&nbsp;别：普通会员</li>
                                    </ul>
                                </div>
                                <div class="login_btnbox">
                                    <a href="#" class="login_order">我的订单</a>
                                    <a href="#" class="login_favorite">我的收藏</a>
                                </div>
                                <i class="icon_arrow_white"></i>
                            </div>
        
                        </div>
                        <div id="asset" class="item">
                            <a href="#">
                                <span class="view"></span>
                            </a>
                            <div class="mp_tooltip">
                                我的资产
                                <i class="icon_arrow_right_black"></i>
                            </div>
                        </div>
        
                        <div id="brand" class="item">
                            <a href="#">
                                <span class="wdsc"><img src="/homes/images/wdsc.png" /></span>
                            </a>
                            <div class="mp_tooltip">
                                我的收藏
                                <i class="icon_arrow_right_black"></i>
                            </div>
                        </div>
        
                        <div id="broadcast" class="item">
                            <a href="#">
                                <span class="chongzhi"><img src="/homes/images/chongzhi.png" /></span>
                            </a>
                            <div class="mp_tooltip">
                                我要充值
                                <i class="icon_arrow_right_black"></i>
                            </div>
                        </div>
        
                        <div class="quick_toggle">
                            <li class="qtitem">
                                <a href="#"><span class="kfzx"></span></a>
                                <div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
                            </li>
                            二维码
                            <li class="qtitem">
                                <a href="#none"><span class="mpbtn_qrcode"></span></a>
                                <div class="mp_qrcode" style="display:none;"><img src="/homes/images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
                            </li>
                            <li class="qtitem">
                                <a href="#top" class="return_top"><span class="top"></span></a>
                            </li>
                        </div>
        
                        回到顶部
                        <div id="quick_links_pop" class="quick_links_pop hide"></div>
        
                    </div>
        
                </div>
                <div id="prof-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        我
                    </div>
                </div>
               
                <div id="asset-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        资产
                    </div>
        
                    <div class="ia-head-list">
                        <a href="#" target="_blank" class="pl">
                            <div class="num">0</div>
                            <div class="text">优惠券</div>
                        </a>
                        <a href="#" target="_blank" class="pl">
                            <div class="num">0</div>
                            <div class="text">红包</div>
                        </a>
                        <a href="#" target="_blank" class="pl money">
                            <div class="num">￥0</div>
                            <div class="text">余额</div>
                        </a>
                    </div>
        
                </div>
               
                <div id="brand-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        收藏
                    </div>
                </div>
                <div id="broadcast-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        充值
                    </div>
                </div>
            </div> -->
    </body>


</html>