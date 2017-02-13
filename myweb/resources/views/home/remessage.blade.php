<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>『OPPO帐号』-更改个人信息</title>
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
                    <h3 class="title">修改填写个人相关信息</h3>
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

                    

                    <form action='/home/doremessage' method='post'>

                        {{csrf_field()}}
                        <input type='hidden' name='id' value='{{$res['id']}}'>

                        <div class="input_area">
                            <input type="text" autocomplete="off" name="username" value='{{$res['username']}}' placeholder="请填写账号昵称"><span id="uu"></span>
                        </div>
                        
                        <div class="input_area">
                            <input type="text" autocomplete="off"  name="phone" value='{{$res['phone']}}' placeholder="请填写手机号"><span id="aa"></span>
                        </div>
                        <div class="error_tip" id="info_pwd"></div>

                        <div class="input_area">
                            <input type="text" autocomplete="off" name="email" value='{{$res['email']}}' placeholder="请填写邮箱"><span id="bb"></span>
                        </div>

                        <div class="input_area">
                            <input type="text" autocomplete="off" placeholder="请填写真实姓名(必填)" name="name" value='{{$res['name']}}'><span id="cc"></span>
                        </div>

                        <div class="error_tip" id="info_pwd"></div>

                        <input type="submit" class="button login_button mt30" id="loginBtn" value="修改个人信息" onclick="check_login();"  style="margin-bottom:15px;" />
                        <input type="button" class="button register_button oppo-tj" id="registerBtn" value="返回" link="/home/myhome" data-tj="account|link|register|register"/>
                        <div class="error_tip1" style="margin-top:10px;" id="info_login_form"></div>
                        <!--其他登录方式-->
                        
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
       
        var username=true,phone=true,email=true,name=true;

         //账号名验证
        $('input[name="username"]').blur(function(){
            var reg = /^\w{6,16}$/;
            var info = $(this).val();
            // console.log(info);
            if(reg.test(info)){
                $("#uu").html('&nbsp;&nbsp;&nbsp;'+'合格的账号昵称').css('display','none');
                username=true;
            }else{
                $("#uu").html('&nbsp;&nbsp;&nbsp;'+'填入6-16位的账号昵称').css({'color':'red','display':'block'});
                username=false;
            }
        });


        //手机号验证
        $('input[name="phone"]').blur(function(){
            var reg = /^1[3-8][0-9]{9}$/;
            // var reg = /^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
            var info = $(this).val();
            if(reg.test(info)){
                $("#aa").html('&nbsp;&nbsp;&nbsp;'+'手机号码格式正确').css('display','none');
                phone=true;
            }else{
                $("#aa").html('&nbsp;&nbsp;&nbsp;'+'手机号码格式错误').css({'color':'red','display':'block'});
                phone=false;
            }
        });

        //邮箱验证
        $('input[name="email"]').blur(function(){

            var reg = /\w+@\w+(\.com|\.cn){1,2}/;
            var info = $(this).val();
            if(reg.test(info)){
                $("#bb").html('&nbsp;&nbsp;&nbsp;'+'邮箱格式正确').css('display','none');
                email=true;
            }else{
                $("#bb").html('&nbsp;&nbsp;&nbsp;'+'邮箱格式错误').css({'color':'red','display':'block'});
                email=false;
            }
        });

        //真实姓名验证
        $('input[name="name"]').blur(function(){

            var reg = /^\w{1,16}$/;
            // var reg = /.*/;
            var info = $(this).val();
            if(reg.test(info)){
                $("#cc").html('&nbsp;&nbsp;&nbsp;'+'该信息可用').css('display','none');
                name=true;
            }else{
                $("#cc").html('&nbsp;&nbsp;&nbsp;'+'该信息不能为空').css({'color':'red','display':'block'});
                name=false;
            }

            // if($(this).val()==null){
                // $("#cc").html('&nbsp;&nbsp;&nbsp;'+'该信息不能为空').css({'color':'red','display':'block'});
                // name=false;
            // }
        });

       //表单提交事件
        document.forms[0].onsubmit=function(){
            // alert(username);
            if(username && phone && email && name){
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
