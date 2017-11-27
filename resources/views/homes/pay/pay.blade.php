<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- <meta name="_token" content="{{csrf_token()}}"/>
        -->
        <title>
            支付页面
        </title>

        <link rel="stylesheet" href="/homes/bs/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bs/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/bs/js/jquery.js"></script>
        <script type="text/javascript" src="/homes/bs/js/bootstrap.min.js"></script>

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
            <div class="clear"></div>
            <div  style="height: 50px"></div>
            <div class="concent">
                
            

            <div class="container">
              <div class="row">
                  <div class="col-md-12">
                        <div class="jumbotron" style="background: skyblue">
                          <h1>您要确认付款吗?</h1>
                          <p>闲置订单已经生成</p>
                          <p><a class="btn btn-info btn-lg" href="/home/overpay?order_id={{$order_id}}" role="button">确认付款</a></p>
                        </div>
                  </div>
                  
                </div>
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
        <!--新增地址标题 -->
        <div class="theme-popover">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-danger am-text-lg">
                        新增地址
                    </strong>
                    /
                    <small>
                        Add address
                    </small>
                </div>
            </div>
            <hr/>
            <div class="am-u-md-12">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">
                            收货人
                        </label>
                        <div class="am-form-content">
                            <input type="text" id="user-name" placeholder="收货人">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-form-label">
                            手机号码
                        </label>
                        <div class="am-form-content">
                            <input id="user-phone" placeholder="手机号必填" type="email">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-form-label">
                            所在地
                        </label>
                        <div class="am-form-content address">
                            <select data-am-selected>
                                <option value="a">
                                    浙江省
                                </option>
                                <option value="b">
                                    湖北省
                                </option>
                            </select>
                            <select data-am-selected>
                                <option value="a">
                                    温州市
                                </option>
                                <option value="b">
                                    武汉市
                                </option>
                            </select>
                            <select data-am-selected>
                                <option value="a">
                                    瑞安区
                                </option>
                                <option value="b">
                                    洪山区
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-form-label">
                            详细地址
                        </label>
                        <div class="am-form-content">
                            <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址">
                            </textarea>
                            <small>
                                100字以内写出你的详细地址...
                            </small>
                        </div>
                    </div>
                    <div class="am-form-group theme-poptit">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <div class="am-btn am-btn-danger">
                                保存
                            </div>
                            <div class="am-btn am-btn-danger close">
                                取消
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear">
        </div>
    </body>


</html>