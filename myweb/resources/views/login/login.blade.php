<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>『OPPO帐号』-登录</title>
    <meta name="keywords" content=" OPPO帐号,登录,注册,找回密码,OPPO账号,OPPO会员" />
    <meta name="description" content="登录OPPO帐号，可以在OPPO官网、社区、软件商店、游戏中心、主题商店等享受更多功能服务。 " />
    <link rel="stylesheet" href="/login/css/common.css?r=20161011" />
        <style>
            input:-webkit-autofill+label{display:none;}
            input:-moz-autofill+label{display:none;}
        </style>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?dc85f549df5b5343343aad449e4ea382";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script type="text/javascript">
    //     var list = document.getElementById('error');
    //     list.onclick=function(){
    //         list.style.display='none';
    //     }
    // </script>
</head>
<body>
<div class="wrapper">
        <div class="header">
            <div class="w960">
                 <ul class="menu_sec">
                    <li><a href="http://www.oppo.com">OPPO官网</a></li>
                    <li><a href="http://www.coloros.com/">ColorOS</a></li>
                    <div class="clear"></div>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <div class="login_box">
            <div class="mainbox">
                <!--头部logo-->
                <div class="lgnheader">
                    <div class="logo"></div>
                    <h3 class="title">登录OPPO帐号之前请先确认账号已激活</h3>
                </div>
                <!--主体登录框-->
                <div class="login_area">
                    <!--插入失败提示信息-->
                    @if(!empty(session('error')))
                        <div id='error' style="display:block;color:red">
                            <ul>
                                <li>{{ session('error') }}</li>  
                            </ul>
                        </div>
                    @endif

                    

                    <form action='/home/login/dologin' method='post'>
                        {{csrf_field()}}
                        <div class="input_area">
                            <input type="text" autocomplete="off" placeholder="请输入6-16位账号" info='请输入正确用户名' name="username" value="{{old('username')}}"><span id="uu"></span>
                        </div>
                        
                        <div class="input_area">
                            <!-- <input type="text" name='pass' id="pwd" autocomplete="off"  class="pwd"/>
                            <label class="placeholder" for="pwd">请输入帐号密码</label> -->
                            <input type="text" autocomplete="off" placeholder="请输入账号密码" info='请输入正确密码' name="pass">
                        </div>
                        <div class="error_tip" id="info_pwd"></div>
                        <div id="captcha_area" style="display:block">
                            <div class="input_area">
                                <input type="text" id="vercode" class="vercode" name="code" autocomplete="off"/>
                                <label class="placeholder" for="vercode">请输入验证码</label>
                                <div class="pic">
                                    <img src="/home/login/code" onclick='this.src=this.src+"?a="+Math.random()' alt="点击刷新验证码" title="点击刷新验证码"/>
                                </div>
                            </div>
                            <div class="error_tip" id="info_vercode"></div>
                        </div>
                        <div class="field">
                            <a onclick="problems();" class="text_green fr" href='/home/login/forget'>忘记密码?</a>
                            <div class="clear"></div>
                        </div>
                        <input type="submit" class="button login_button mt30" id="loginBtn" value="登录" onclick="check_login();"  style="margin-bottom:15px;" />
                        <input type="button" class="button register_button oppo-tj" id="registerBtn" value="注册OPPO帐号" link="/home/login/register" data-tj="account|link|register|register"/>
                        <div class="error_tip1" style="margin-top:10px;" id="info_login_form"></div>
                        <!--其他登录方式-->
                        <div class="n_links_area">
                            <div class="oth_type_list"></div>
                            <div class="oth_type_links">
                                <a class="other_link ico_qq oppo-tj" link="http://my.oppo.com/auth/qqlogin"  data-tj="account|link|loginqq|qq"></a>
                                <a  class="other_link ico_wb oppo-tj" link="http://my.oppo.com/auth/sinalogin" data-tj="account|link|loginweibo|weibo" ></a>
                                <a  class="other_link ico_alipay oppo-tj"  link="http://my.oppo.com/auth/alipaylogin" data-tj="account|link|loginzfb|zfb"></a>
                                <a class="other_link ico_wx oppo-tj" link="http://my.oppo.com/auth/wxlogin" data-tj="account|link|loginwx|wx"></a>
                            </div>
                        </div>
                        <input type="hidden"  id="password" name="password" />
                    </form>
                </div>
            </div>
            <div class="footer_info">
                <p>© 2005 - 2016 东莞市永盛通信科技有限公司 版权所有 粤ICP备08130115号-1</p>
            </div>
        </div>
    </div>

<input type="hidden" value="" id="needCaptcha"/>
<input type="hidden" value="/login?type=1" id="loginUrl"/>
<input type="hidden" value="/code" id="captchaUrl"/>
<input type="hidden" value="/account/profile?type=1" id="profileUrl"/>
<input type="hidden" value=""  id="requestKey_0"/>
<input type="hidden" value=""  id="requestKey_1"/>
<input type="hidden" value=""  id="requestKey_2"/>
<input type="hidden" id="dlg_id"/>
<div class="mask" id="mask"></div>
<script src="/login/js/jquery-1.9.1.min.js" ></script>
<script src="/login/js/jquery-md5-min.js" ></script>
<script src="/login/js/login.js?r=20161229" ></script>

<script src="/ad/js/libs/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
       
        var uname=false;

         //账号名验证
        $('input[name="username"]').blur(function(){
            var reg = /^\w{6,16}$/;
            var info = $(this).val();
            if(reg.test(info)){
                //发送ajax请求验证账号是否存在
                $.ajax({
                    url:'/home/homelogin',
                    data:{'info':info,"_token":$('input[type="hidden"]').val()},
                    type:'post',
                    success:function(mes){
                        
                        if(mes=='yes'){
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'账号可用').css({"color":"green"});
                            uname=true;
                        }else{
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'账号未注册不可用').css('color','red').css('font-weight','bold');
                            uname=false;
                        }
                    }
                });
     
            }else{

                $("#uu").html('&nbsp;&nbsp;&nbsp;'+'填入正确的账号').css('color','red');
                uname=false;
            }
        });

       //表单提交事件
        document.forms[0].onsubmit=function(){
            if(uname){
                //表单跳走
                return true;
            }else{
                //终止表单跳走
                return false;
            }
        } 
        

</script>
</body>
</html>
