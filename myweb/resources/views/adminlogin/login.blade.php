<!DOCTYPE html>

<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/ad/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/ad/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/ad/css/mws-theme.css" media="screen">

<title>{{config('app.webname')}} 后台登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>后台登录</h1>

            <!--插入失败提示信息-->
            @if(!empty(session('error')))
                <div class="mws-form-message error" style="display: block;" id='error'>
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


            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/login/dologin" method="post">
                {{csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                           <input type="text" name="username" class="mws-login-username required" placeholder="输入账号">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="pass" class="mws-login-password required" placeholder="输入密码">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">记住账号</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/ad/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/ad/js/libs/jquery.placeholder.min.js"></script>
    <script src="/ad/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/ad/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
	<script src="/ad/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/ad/js/core/login.js"></script>

    <script type="text/javascript">
    //提示信息点击事件
        $('.mws-form-message error').click(function(){
            $(this).attr('display','none');
        });

    </script>

</body>
</html>
