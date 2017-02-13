@extends("layout.login")
@section("con")
<div class="relink">
    <a target="_blank" href="/home/index">
        <img border="0" width="487" height="587" src="/d/images/1.png">
    </a>

 </div>
       <div id="register">

       <form action="/home/login/doregister" method="post">
            {{csrf_field()}}
            <table id="cc">
                <tr>
                    <td>
                          <div class="registertit">用户名：</div>
                    </td>
                    <td> 
                        <div class="login_txt register_txt">
                            <input type="text" placeholder="请输入6-16位有效字符" name="username">              
                         </div>
                    </td>
                    <td>
                        <span id="uu"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'> <div id="emailormobilemsg" class="registererror"></div></td>  
                </tr>
                <tr>
                    <td>
                        <div class="registertit">密&ensp;&ensp;&ensp;码：</div>
                    </td>
                    <td>
                        <div class="login_txt register_txt">
                            <input type="password" autocomplete="off" placeholder="请输入密码" value="" id="password" name="pass">
                            <span id="togglePassword" class="show"></span>
                        </div>
                    </td>
                    <td>
                        <div id="safe">
                            <p>安全程度：</p>
                            <div class="safeline">
                                <span id="pwdLevel_1">低</span>
                                <span id="pwdLevel_2">中</span>
                                <span id="pwdLevel_3">高</span>
                            </div>
                        </div>

                    </td>
                </tr>
                  <tr>
                    <td colspan='2'> 
                        <div id="passwordmsg" class="registererror"></div>
                    </td>  
                </tr>
                <tr>
                    <td>
                         <div class="registertit">确认密码：</div>
                    </td>
                    <td>
                           <div class="login_txt register_txt">
                            <input type="password" autocomplete="off" placeholder="请再次输入密码" name="repassword">
                            
                        </div>
                    </td>
                    <td>
                        <span id="rr"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'> 
                        <div id="passwordmsg" class="registererror"></div>
                    </td>  
                </tr>
                <tr>
                    <td>
                         <div class="registertit">邮&nbsp;&nbsp;&nbsp;箱：</div>
                    </td>
                    <td>
                          <div class="login_txt register_txt">
                            <input type="text" autocomplete="off" placeholder="请输入正确格式的邮箱" info='请输入合法邮箱格式' name="email">
                            
                          </div>
                    </td>
                    <td>
                        <span id="ee"></span>
                    </td>
                </tr>
                <tr>

                    <td colspan='2'> 
                        <div id="passwordmsg" class="registererror"></div>
                    </td>  
                </tr>
                <tr>
                    <td>
                         <div class="registertit">手机号码：</div>
                    </td>
                    <td>
                          <div class="login_txt register_txt">
                            <input type="text" autocomplete="off" placeholder="请输入正确的手机号" info='请输入正确手机号码' name="phone">
                            
                          </div>
                    </td>
                    <td>
                        <span id="hh"></span>
                    </td>
                </tr>
                <tr>

                    <td colspan='2'> 
                        <div id="passwordmsg" class="registererror"></div>
                    </td>  
                </tr>
                <tr>
                    <td>
                         <div class="register_txt_validatcode"><pre>验证码：</pre></div>
                    </td>
                    <td>
                         <div class="mobilecheck_3">
                            <div class="mcback validatecodeout">
                                <input name="code" type="text" placeholder="请输入验证码">
                            </div>
                           </div>&nbsp;&nbsp;&nbsp;
                         <img src="/home/login/code" onclick='this.src=this.src+"?a="+Math.random()' alt="点击刷新验证码" title="点击刷新验证码"/>
                    </td>
                    <td>
                        <span style="color:red;font-weight:bold">{{session("error")}}<span>
                    </td>
                </tr>
               <tr>
                    <td colspan='2'> 
                        <div id="passwordmsg" class="registererror"></div>
                    </td>  
                </tr>
                <tr>
                    <td colspan='2' style="text-align:center">
                            <input type="submit" value="注册" class="register_btn">
                        </p>
                    </td>
                </tr>
            </table>
       </form>
       </div>

    </div>

</div>


<script src="/ad/js/libs/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
       
        //全局变量
        var name1=false,pass=false,repass=false,email=false;
        // console.log($('input[type!="submit"]'));
        //绑定获取焦点事件
        
        //账号绑定失去焦点事件
        $('input[name="username"]').blur(function(){
            //获取账号
            var info =$(this).val();
            var reg = /^\w{6,16}$/;
            var obj=$(this);
            if(reg.test(info)){
                //发送ajax请求1.php验证账号是否存在
                $.ajax({
                    url:'/home/zhuce',
                    data:{'info':info,"_token":$('input[type="hidden"]').val()},
                    type:'post',
                    success:function(mes){
                        
                        if(mes=='yes'){
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'账号已存在').css({"color":"red"});
                            name1=false;
                        }else{
                            $("#uu").html('&nbsp;&nbsp;&nbsp;'+'账号可用').css('color','green').css('font-weight','bold');
                            name1=true;
                        }
                    }
                }); 
            }else{

                $("#uu").html('账号格式错误').css({"color":"red"});
                name1=false;
            }
        });

        //密码绑定失去焦点事件
        $('input[name="pass"]').blur(function(){
            var info = $(this).val();
            var reg = /\w{6,16}/;
            if(reg.test(info)){
                
                pass=true;
            }else{
               
                pass=false;
            }
        });

        //两次密码一致
        $('input[name="repassword"]').blur(function(){
            //第二次输入的密码
            var info= $(this).val();    
            if(info==$('input[name="pass"]').val()){
                $("#rr").html('&nbsp;&nbsp;&nbsp;'+'密码一致').css('color','green');
                repass=true;
            }else{
                $("#rr").html('&nbsp;&nbsp;&nbsp;'+'密码不一致').css('color','red');
                repass=false;
            }   
        });

        //邮箱验证
        $('input[name="email"]').blur(function(){
            //aa@qq.com
            //aa@qq.cn
            //aa@qq.com.cn
            var reg = /\w+@\w+(\.com|\.cn){1,2}/;
            var info = $(this).val();
            if(reg.test(info)){

                 $.ajax({
                    url:'/home/registeremail',
                    data:{'info':info,"_token":$('input[type="hidden"]').val()},
                    type:'post',
                    success:function(mes){
                        
                        if(mes=='yes'){
                            $("#ee").html('&nbsp;&nbsp;&nbsp;'+'邮箱已存在').css({"color":"red"});
                            email=false;
                        }else{
                            $("#ee").html('&nbsp;&nbsp;&nbsp;'+'邮箱可用').css('color','green').css('font-weight','bold');
                            email=true;
                        }
                    }
                }); 
            }else{
                $("#ee").html('&nbsp;&nbsp;&nbsp;'+'邮箱格式错误').css('color','red');
                email=false;
            }
        });

         //手机号码验证
        $('input[name="phone"]').blur(function(){

            var reg = /^1[3-8][0-9]{9}$/;
            var info = $(this).val();
            if(reg.test(info)){
                // $("#hh").html('&nbsp;&nbsp;&nbsp;'+'手机号码格式正确').css('color','green');
                // phone=true;

                 $.ajax({
                    url:'/home/registerphone',
                    data:{'info':info,"_token":$('input[type="hidden"]').val()},
                    type:'post',
                    success:function(mes){
                        
                        if(mes=='yes'){
                            $("#hh").html('&nbsp;&nbsp;&nbsp;'+'手机号已被注册').css({"color":"red"});
                            email=false;
                        }else{
                            $("#hh").html('&nbsp;&nbsp;&nbsp;'+'手机号可用').css('color','green').css('font-weight','bold');
                            email=true;
                        }
                    }
                }); 
            }else{
                $("#hh").html('&nbsp;&nbsp;&nbsp;'+'手机号码格式错误').css('color','red');
                phone=false;
            }
        });

        
        //表单提交事件
        document.forms[0].onsubmit=function(){
            if(name1 && pass && repass && email && phone){
                //表单跳走
                return true;
            }else{
                //终止表单跳走
                return false;
            }
        }

</script>

@endsection

