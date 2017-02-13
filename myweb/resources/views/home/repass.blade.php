<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>『OPPO帐号』-更改密码</title>
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
                    <h3 class="title">修改OPPO帐号的密码</h3>
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

                    

                    <form action='/home/dorepass' method='post'>

                        {{csrf_field()}}
                        <input type='hidden' name='id' value='{{$id}}'>

                        <div class="input_area">
                            <input type="text" autocomplete="off" placeholder="请输入原密码" info='请输入正确用户名' name="oldpass"><span id="uu"></span>
                        </div>
                        
                        <div class="input_area">
                            <input type="text" autocomplete="off" placeholder="请输入6-16位正确密码" info='请输入正确密码' name="pass"><span id="aa"></span>
                        </div>
                        <div class="error_tip" id="info_pwd"></div>

                        <div class="input_area">
                            <input type="text" autocomplete="off" placeholder="请确认新密码" info='请输入正确密码' name="repass"><span id="bb"></span>
                        </div>
                        <div class="error_tip" id="info_pwd"></div>

                        <input type="submit" class="button login_button mt30" id="loginBtn" value="修改密码" onclick="check_login();"  style="margin-bottom:15px;" />
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
       
        var oldpass=false,pass=false,repass=false;

         //原密码验证
        $('input[name="oldpass"]').blur(function(){
            var reg = /^\w{6,16}$/;
            var info = $(this).val();
            // console.log(info);
            if(reg.test(info)){
                //发送ajax请求验证账号是否存在
                $.ajax({
                    url:'/home/chongzhi',
                    data:{'info':info,"_token":$('input[type="hidden"]').val()},
                    type:'post',
                    success:function(mes){
                        // console.log(mes);
                        
                        if(mes=='yes'){
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'原密码正确').css({"color":"green"});
                            oldpass=true;
                            // console.log('aa');
                        }else{
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'原密码错误').css('color','red').css('font-weight','bold');
                            oldpass=false;
                            // console.log('bb');
                        }
                    }
                });
                // console.log('aa');
            }else{

                $("#uu").html('&nbsp;&nbsp;&nbsp;'+'填入正确格式的密码').css('color','red');
                oldpass=false;
                // console.log('bb');

            }
        });

        //输入新密码绑定失去焦点事件
        $('input[name="pass"]').blur(function(){
            var info = $(this).val();
            var reg = /\w{6,16}/;
            if(reg.test(info)){
                $("#aa").html('&nbsp;&nbsp;&nbsp;'+'新密码格式正确').css({"color":"green"});
                pass=true;
            }else{
                $("#aa").html('&nbsp;&nbsp;&nbsp;'+'填入正确格式的密码').css('color','red');
                pass=false;
            }
        });

        //两次密码一致
        $('input[name="repass"]').blur(function(){
            //第二次输入的密码
            var info= $(this).val();    
            if(info==$('input[name="pass"]').val()){
                $("#bb").html('&nbsp;&nbsp;&nbsp;'+'密码一致').css('color','green');
                repass=true;
            }else{
                $("#bb").html('&nbsp;&nbsp;&nbsp;'+'密码不一致').css('color','red');
                repass=false;
            }   
        });


       //表单提交事件
        document.forms[0].onsubmit=function(){
            if(oldpass && pass && repass){
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
