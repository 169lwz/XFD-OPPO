<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0073)https://id.oppo.com/account/profile?callback=http%3A%2F%2Fwww.opposhop.cn -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <title>『OPPO帐号』-个人信息</title>
    <meta name="keywords" content=" OPPO帐号,登录,注册,找回密码,OPPO账号,OPPO会员"> 
    <meta name="description" content="登录OPPO帐号，可以在OPPO官网、社区、软件商店、游戏中心、主题商店等享受更多功能服务。 ">

    <link rel="stylesheet" href="/grxx_files/common.css">
</head>
<body>
<div class="wrapper">
    <!--头部-->
    <div class="header">
        <div class="w960">
             <ul class="menu_sec">
                <li><a href="http://www.oppo.com/">OPPO官网</a></li>
                <li><a href="http://www.oppo.cn/">OPPO社区</a></li>
                <li><a href="http://www.coloros.com/">ColorOS</a></li>
                <div class="clear"></div>
            </ul>
            <ul class="account_area">
                <a href='/home/logout'>退出</a>
             </ul>       
            <div class="clear"></div>
        </div>  
    </div>

    <div class="logo logo-extend">
        <a href="/dingdan/index">
          <img src="/myhome_files/logo.png" alt="">
        </a>
    </div>


    <div class="main_content">
        <ul class="account_detail_area">
            <li id="changepwd" class="account_row ">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>帐号密码</h3>
                    <p class="small_info">用于保护帐号安全</p>
                </div>
                <a href="/home/repass" class="row_right">修改</a>
            </li>
        </ul>
        <ul class="account_detail_area">
            <li id="changepwd" class="account_row ">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>个人信息</h3>
                    <p class="small_info">用户的相关资料</p>
                </div>
                <a href="/home/remessage" class="row_right">修改</a>
            </li>
        </ul>


        <ul class="account_info">
            <li><label>账号：</label><span>{{$res['username']}}</span></li>
        </ul>

        <ul class="account_info">
            <li><label>电话：</label><span>{{$res['phone']}}</span></li>
        </ul>

        <ul class="account_info">
            <li><label>邮箱：</label><span>{{$res['email']}}</span></li>
        </ul>

     <div class="footer_info">
         <p>© 2005 - 2017 东莞市永盛通信科技有限公司 版权所有 粤ICP备08130115号-1</p>
     </div>

</div>



<!--成功重置密码的气泡-->
<div class="toast" id="success_toast"><img src="/grxx_files/ico_success.jpg"><span id="toast_content">已成功修改密码</span></div>

<div class="toast" id="quit_toast"><img src="/grxx_files/ico_loading_s.png" class="loading_pic">正在退出...</div>


<!--弹窗-->
<div class="mask" id="mask"></div>
<input type="hidden" value="" id="third_status">

<!--绑定重绑时返回-->
<input type="hidden" value="" id="requestKey_3">
<!--绑定安全信息-->
<input type="hidden" value="" id="requestKey">

<input type="hidden" id="securityType">
<input type="hidden" id="username" value="159******27">
<input type="hidden" value="/login?type=1" id="loginUrl">
<input type="hidden" value="/captcha" id="captchaUrl">
<input type="hidden" id="dlg_id">

<script src="/grxx_files/jquery-1.9.1.min.js"></script>
<script src="/grxx_files/jquery-md5-min.js"></script>
<script src="/grxx_files/common.js"></script>

</body></html>