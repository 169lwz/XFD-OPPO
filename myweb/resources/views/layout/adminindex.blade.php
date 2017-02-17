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
<link rel="stylesheet" type="text/css" href="/ad/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/ad/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/ad/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/ad/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/ad/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/ad/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/my.css" media="screen">

<title>OPPO Admin Controller</title>
</head>

<body>

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/ad/images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            <!-- Notifications -->
            <div id="mws-user-notif" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-messages">
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/ad/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                       欢迎登陆!
                    </div>
                    <ul>
                        <li><a>管理员</a></li>
                        <!-- <li><a href="#">修改密码</a></li> -->
                        <li><a href="/admin/login/logout">退出</a></li>
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
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="搜索...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-add-contact"></i>用户管理</a>
                        <ul class="closed">
                            <li><a href="/admin/user/index">浏览用户</a></li>
                            <li><a href="/admin/user/add">添加用户</a></li>
                            <li><a href="/admin/user/recycle">回收站</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-official"></i>管理员管理</a>
                        <ul class="closed">
                            <li><a href="/admin/guanli/index">浏览管理员</a></li>
                            <li><a href="/admin/guanli/add">添加管理员</a></li>
                            <li><a href="/admin/guanli/recycle">回收站</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-table"></i>类别管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/type/index">浏览类别</a></li>
                            <li><a href="/admin/type/add">添加类别</a></li>
                        </ul>
                    </li>  

                    <li>
                        <a href="#"><i class="icon-share"></i>订单管理</a>
                        <ul  class="closed">
                            <li><a href="/orders/index">浏览订单</a></li>
                            <li><a href="/orders/index1">回收订单</a></li>
                        </ul>
                    </li>      
               
                     <li>
                        <a href="#"><i class="icon-share"></i>商品管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/goods/index">浏览商品</a></li>
                            <li><a href="/admin/goods/add">添加商品</a></li>

                        </ul>
                    </li> 
                    <li>
                        <a href="#"><i class="icon-share"></i>商品详情</a>
                        <ul  class="closed">
                            <li><a href="/admin/detail/indexh">浏览商品详情</a></li>
                            <li><a href="/admin/detail/add">添加商品详情</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-share"></i>商品参数</a>
                        <ul  class="closed">
                            <li><a href="/admin/parameter/index">浏览商品参数</a></li>
                            <li><a href="/admin/parameter/add">添加商品参数</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-share"></i>商品属性</a>
                        <ul  class="closed">
                            <li><a href="/admin/val/index">浏览商品属性</a></li>
                            <li><a href="/admin/val/addversion">添加商品网络</a></li>
                            <li><a href="/admin/val/addmemory">添加商品内存</a></li>
                            <li><a href="/admin/val/addsize">添加商品尺寸</a></li>                         
                        </ul>
<<<<<<< HEAD
                    </li>                                           
=======
                    </li>
>>>>>>> 6ae8377b11194416e3efa5640fabdddb1dba451e

                    <li>
                        <a href="#"><i class="icon-share"></i>赠品管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/val/indexgift">浏览赠品</a></li>
                            <li><a href="/admin/val/addgift">添加赠品</a></li>
                        </ul>
                    </li>

                    </li>                                           
                    <li>
                        <a href="#"><i class="icon-stats"></i>轮播图管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/lunbo/index">轮播图浏览</a></li>
                            <li><a href="/admin/lunbo/add">轮播图添加</a></li>
                            <!-- <li><a href="/admin/goods/hsz">回收站</a></li> -->
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-newspaper"></i>广告管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/guanggao/index">广告图浏览</a></li>
                            <li><a href="/admin/guanggao/add">广告图添加</a></li>
                            <!-- <li><a href="/admin/goods/hsz">回收站</a></li> -->
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="icon-link"></i>友情链接</a>
                        <ul  class="closed">
                            <li><a href="/admin/links/index">链接浏览</a></li>
                            <li><a href="/admin/links/add">链接添加</a></li>
                            <!-- <li><a href="/admin/goods/hsz">回收站</a></li> -->
                        </ul>
                    </li>   

                    <li>
                        <a href="#"><i class="icon-gplus"></i>体验店</a>
                        <ul  class="closed">
                            <li><a href="/ty/adindex">门店浏览</a></li>
                            <li><a href="/ty/add">门店添加</a></li>
                        </ul>
                    </li>  
<<<<<<< HEAD


                  

                    <li>
                        <a href="#"><i class="icon-share"></i>赠品管理</a>
                        <ul  class="closed">
                            <li><a href="/admin/val/indexgift">浏览赠品</a></li>
                            <li><a href="/admin/val/addgift">添加赠品</a></li>
                        </ul>
                    </li>
                  

                    <li>
                        <a href="#"><i class="icon-share"></i>网站配置</a>
                        <ul  class="closed">
                            <li><a href="/wzpz/index">配置浏览</a></li>
                            <li><a href="/wzpz/add">配置添加</a></li>
                        </ul>
                    </li>
                                                                             

                </ul>
=======
             </ul>
>>>>>>> 6ae8377b11194416e3efa5640fabdddb1dba451e
            </div> 
        </div>
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
             <!--表单数据验证失败提示信息-->
            @if(count($errors)>0)
                <div class="mws-form-message error" style="display: block;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--插入失败提示信息-->
            @if(!empty(session('error')))
                <div class="mws-form-message error" style="display: block;">
                    <ul>
                        <li>{{ session('error') }}</li>  
                    </ul>
                </div>
            @endif
            <!--插入成功提示-->
             @if(!empty(session('success')))
                <div class="mws-form-message success" style="display: block;">
                    <ul>
                        <li>{{ session('success') }}</li>  
                    </ul>
                </div>
            @endif

            @section('con')
            
            @show



            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                OPPO &nbsp;  Admin &nbsp;  Controller
            </div>
            
        </div>

       
    </div>
    
    <!-- JavaScript Plugins -->
    <script src="/ad/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/ad/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/ad/js/libs/jquery.placeholder.min.js"></script>
    <script src="/ad/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/ad/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/ad/jui/jquery-ui.custom.min.js"></script>
    <script src="/ad/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/ad/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/ad/bootstrap/js/bootstrap.min.js"></script>
    <script src="/ad/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/ad/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script type="text/javascript">
        $(function() {
            $.fn.tabs && $('.mws-tabs').tabs();
        });
    </script>

</body>
</html>
