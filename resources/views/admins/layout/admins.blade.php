<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/styles.css" media="screen">

<title>@yield('title')</title>

</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
                <h1 style="color:white">secondHands</h1>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
       
          
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	
               <?php  


                    $result = DB::table('manager')->where('id',session('uid'))->first();
                    // dd($result);

                ?>

                
                    <div id="mws-user-photo">
                        <img src="{{$result->m_photo}}" alt="User Photo">
                    </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                   <div id="mws-username">
                       Hello, {{$result->m_name}}
                    </div > 
                    <ul style="text-align: center;">
                        <li><a href="">修改头像</a></li>
                        <li><a href="">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 用户管理</a>
                        <ul class="closed">
                            <li><a href="/admin/user">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
             <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 管理员用户管理</a>
                        <ul class="closed">
                            <li><a href="/admin/manager">管理员用户列表</a></li>
                            <li><a href="/admin/manager/create">管理员用户添加</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>  
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 分类管理</a>
                        <ul class="closed">
                            <li><a href="/admin/type">分类列表</a></li>
                            <li><a href="/admin/type/create">添加父分类</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>  
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 订单管理</a>
                        <ul class="closed">
                            <li><a href="/admin/order">查看订单</a></li>
                            <!-- <li><a href="/admin/order/delete">删除订单</a></li> -->
                            
                        </ul>
                    </li>
                </ul>
            </div> 
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 钱袋管理管理</a>
                        <ul class="closed">
                            <li><a href="/admin/wallet">已出售订单</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>  
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 广告管理</a>
                        <ul class="closed">
                            <li><a href="/admin/advs">查看广告</a></li>
                            <li><a href="/admin/advs/create">添加广告</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div> 
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i> 友情链接管理</a>
                        <ul class="closed">
                            <li><a href="/admin/friendlink">查看友情链接</a></li>
                            <li><a href="/admin/friendlink/create">添加友情链接</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
            
       {{-- @if(session('msg'))
            <div class="mws-form-message info">
                
                    {{session('msg')}}

            </div>
         @endif 
         --}}

        @section('content')



        @show()
        
      
        <style>
            #dvs{
                width: 500px;
                height: 50px;
                border: 2px skyblue solid;
                font-size: 30px;
                line-height: 50px;
                text-align: center;
                color: blue;
                font-family: 'Microsoft Yahei';
                margin-left: 400px;
            }
        </style>


            <!-- Footer -->
            <div id="mws-footer" style="margin-bottom: -19px">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/admins/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

    @section('js')

    @show()

</body>
</html>