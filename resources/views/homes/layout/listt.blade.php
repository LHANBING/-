<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title')
        </title>
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

                        <form>
                            <input type="text" autocomplete="off" placeholder="搜索" name="index_none_header_sysc" id="searchInput">
                            <input type="submit" index="1" value="搜索" class="submit am-btn" id="ai-topsearch" style="margin-left: -200px">
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
                    @section('content') 
                    @show
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
    </body>


</html>