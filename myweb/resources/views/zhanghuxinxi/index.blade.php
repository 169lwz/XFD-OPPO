<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>『OPPO帐号』-个人信息</title>
    <meta name="keywords" content=" OPPO帐号,登录,注册,找回密码,OPPO账号,OPPO会员" /> 
    <meta name="description" content="登录OPPO帐号，可以在OPPO官网、社区、软件商店、游戏中心、主题商店等享受更多功能服务。 " />
    <link rel="stylesheet" href="css/common.css?r=20170109" />
    </head>
<body>
<div class="wrapper">
    <!--头部-->
    <div class="header">
        <div class="w960">
             <ul class="menu_sec">
                <li><a href="http://www.oppo.com">OPPO官网</a></li>
                <li><a href="http://www.oppo.cn/">OPPO社区</a></li>
                <li><a href="http://www.coloros.com/">ColorOS</a></li>
                <div class="clear"></div>
            </ul>
            <ul class="account_area">
                <li class="hasLogin"><a class="quit_link">退出</a></li>
             </ul>       
            <div class="clear"></div>
        </div>  
    </div>
    <div class="main_content">
        <!--帐号信息-->
        <ul class="account_info">
            <li><label>OPPO帐号：</label><span>139******32</span></li>
            <li><label>用户名：</label><span>未设置</span>
                <span class="gray_tip">（只可修改一次）<em class="ico_edit"></em></span>
                </li>
            <li><label>积分：</label><span id='total_amount'></span>
            <a id='detail_credit'>积分明细</a>
            </li>
        </ul>
        <!--帐号安全-->
        <div class="score_area score_40">
            <span>您的帐号存在<em class="orange_tip" id="fengx_num">3.0</em>项风险</span>
                <div class="slider_area">
                    <div class="slider_bar_bg"></div>
                    <div class="slider_bar_line"></div>
                    <em class="dot"></em>
                    <div class="real_score">40分</div>
                </div>
            <div class="score">100分</div>
        </div>
        <ul class="account_detail_area">
            <li id="changepwd" class="account_row ">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>帐号密码</h3>
                    <p class="small_info">用于保护帐号安全</p>
                </div>
                <a class="row_right modify_btn">修改</a>
            </li>
            <li id="changemobile" class="account_row  ">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>安全手机&nbsp;&nbsp;&nbsp;&nbsp;<em class="phoneNum">139******32</em></h3>
                    <p class="small_info">安全手机可用于登录OPPO帐号，重置密码或其他安全验证<span>，<em class="orange_tip">建议立即绑定</em></span></p>
                </div>
                <a class="row_right modify_btn" link="reBindMobile">修改</a></li>
            <li id="changeemail" class="account_row  unset">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>安全邮箱</h3>
                   <p class="small_info">安全邮箱可用于登录OPPO帐号，重置密码或其他安全验证<span>，<em class="orange_tip">建议立即绑定</em></span></p>
                   </div>
                <a class="row_right set_btn" link="bindEmail">绑定</a></li>
            <li id="changemibao" class="account_row unset">
                <div class="row_left"></div>
                <div class="row_middle">
                    <h3>密保问题</h3>
                    <p class="small_info">密保问题可用于重置密码或其他安全验证<span>，<em class="orange_tip">建议立即设置</em></span></p>
                </div>
                <a class="row_right set_btn" link="createProblem">设置</a></li>
            <li id="changeemergency" class="account_row unset">
                <div class="row_left"></div>
                <div class="row_middle">
                <h3>紧急联系人</h3>
                <p class="small_info">能在找回密码过程中加强验证，让帐号更安全<span>，<em class="orange_tip">建议立即添加</em></span></p>
                </div>
                <a class="row_right set_btn" id='add'>添加</a></li>
            </ul>
    </div>
     <div class="footer_info">
         <p>© 2005 - 2016 东莞市永盛通信科技有限公司 版权所有 粤ICP备08130115号-1</p>
     </div>
</div>
<!--过期弹窗-->
<div class="pop_dlg" id="expired_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">帐号登录过期</h4>
    <div class="dlg_wrapper">
        <h5>系统检测到：</h5>
        <div class="dlg_content">您近期修改过帐号密码或登录时间太长，为保证帐号安全，需要重新登录OPPO帐号。</div>
        <div class="button login_button" style="margin-top:25px"  onclick="window.location.href='/login'">重新登录</div>
        <div class="error_tip1" id="info_expired_dlg"></div>
    </div>
</div>
<!--超时弹框-->
<div class="pop_dlg" id="timeout_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">操作超时</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content">您长时间未操作，请重新操作。</div>
        <div class="button login_button" style="margin-top:25px"  id="timeout_btn">知道了</div>
    </div>
</div>
<!--修改密码成功弹窗-->
<div class="pop_dlg" id="relogin_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">修改密码</h4>
    <div class="dlg_wrapper" style="text-align:center;">
        <h5><img src="images/ico_success.jpg" width="26"  height="26" style="vertical-align:middle;margin-right:6px;"/>成功修改密码</h5>
        <div class="dlg_content"><span id="time_span">10</span>S后自动登出，请重新登录</div>
        <div class="button login_button" style="margin-top:25px"  id="relogin_btn">立即重新登录</div>
    </div>
</div>
<!--修改用户名-->
<div class="pop_dlg" id="modify_username">
    <a class="ico_close"></a>
    <h4 class="dlg_title">用户名</h4>
    <div class="dlg_wrapper">
        <div class="input_area">
            <input type="text"  id="newname"  autocomplete="off" />
            <label class="placeholder" for="newname">请输入用户名</label>
        </div>
        <div class="error_tip" id="info_newname" style="color:#878b8a;padding-top:13px">用户名为2-12位字母、数字或汉字</div>
        <div class="btns mt30">
            <a class="cancel_btn">取消</a>
            <a class="confirm_btn">确定</a>
            <div class="clear"></div>
        </div>
        <div class="error_tip1" id="info_modify_username"></div>
    </div>
</div>
<div class="pop_dlg" id="modify_pwd">
    <a class="ico_close"></a>
    <h4 class="dlg_title">修改密码</h4>
    <div class="dlg_wrapper">
        <h5>原密码</h5>
        <div class="input_area">
            <input type="password"  id="oldpwd" name="password" value="" autocomplete="off" />
            <label class="placeholder" for="oldpwd">请输入原密码</label>
        </div>
        <div class="error_tip" id="info_oldpwd"></div>
        <h5 style="margin-top:15px">新密码</h5>
        <div class="input_area">
            <input type="password"  id="newpwd1" name="password" value="" autocomplete="off" />
            <label class="placeholder" for="newpwd1">请输入新密码</label>
        </div>
        <div class="error_tip" id="info_newpwd1"></div>
        <div class="input_area">
            <input type="password"  id="repwd1" name="repassword" value="" autocomplete="off" />
            <label class="placeholder" for="repwd1">请再次输入新密码</label>
        </div>
        <div class="error_tip" id="info_repwd1" style="color:#878b8a;padding-top:13px;">密码包含6-16位字母、数字</div>
        <div class="btns mt30">
            <a class="cancel_btn">取消</a>
            <a class="confirm_btn">确定</a>
            <div class="clear"></div>
        </div>
        <div class="error_tip1" id="info_modify_pwd"></div>
    </div>
</div>
<!--短信验证身份-->
<div class="pop_dlg" id="yz_sms_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content">点击发送短信按钮，将发送一条含有数字验证码的短信至您的手机<span id="phoneNum" class="phoneNum"></span>，用于验证身份。</div>
        <div class="button login_button" style="margin-top:25px">发送短信</div>
        <div class="error_tip1" id="info_yz_sms_dlg"></div>
        <a class="other_way mt30" onclick = "hideDiv($('#yz_sms_dlg'));showDiv($('#yz_email_dlg'))">使用安全邮箱验证身份</a>
        <a class="other_way" onclick = "hideDiv($('#yz_sms_dlg'));showDiv($('#yz_mibao_dlg'))">使用密保问题验证身份</a>
    </div>
</div>
<div class="pop_dlg" id="yz_sms_dlg1">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content">已发送一条含有数字验证码的短信至您的手机<span id="phoneNum1" class="phoneNum"></span>，请输入短信中的验证码。</div>
        <div class="input_area">
            <input type="text" id="vercode2" class="vercode" autocomplete="off"/>
            <label class="placeholder" for="vercode2">请输入验证码</label>
            <div class="pic">
                <a class="btn_verify_unedit" id="btn_verify_mobile1"><span id="time_mobile1">60</span>S</a>
            </div>
        </div>
        <div class="error_tip" id="info_vercode2"></div>
        <div class="button login_button" style="margin-top:25px">验证</div>
        <div class="error_tip1" id="info_yz_sms_dlg1"></div>
    </div>
</div>
<!--邮箱验证身份-->
<div class="pop_dlg" id="yz_email_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content">点击发送邮件按钮，将发送一条含有数字验证码的邮件至您的邮箱<span id="email" class="phoneNum"></span>，用于验证身份。</div>
        <div class="button login_button" style="margin-top:25px">发送邮件</div>
        <div class="error_tip1" id="info_yz_email_dlg"></div>
        <a class="other_way mt30"  onclick = "hideDiv($('#yz_email_dlg'));showDiv($('#yz_sms_dlg'))">使用安全手机验证身份</a>
        <a class="other_way" onclick = "hideDiv($('#yz_email_dlg'));showDiv($('#yz_mibao_dlg'))">使用密保问题验证身份</a>
    </div>
</div>
<div class="pop_dlg" id="yz_email_dlg1">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content">已发送一条含有数字验证码的邮件至您的邮箱<span id="email1" class="phoneNum"></span>，请输入邮件中的验证码。</div>
        <div class="input_area">
            <input type="text" id="vercode3" name="verifycode" class="vercode" autocomplete="off"/>
            <label class="placeholder" for="vercode3">请输入验证码</label>
            <div class="pic">
                <a class="btn_verify_unedit" id="btn_verify_email1"><span id="time_email1">60</span>S</a>
            </div>
        </div>
        <div class="error_tip" id="info_vercode3"></div>
        <div class="button login_button" style="margin-top:25px">验证</div>
        <div id="info_yz_email_dlg1" class="error_tip1"></div>
    </div>
</div>
<!--密保验证身份-->
<div class="pop_dlg" id="yz_mibao_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <h5>问题一</h5>
        <div class="question" id="question0"></div>
        <div class="input_area">
            <input type="text" id="answer0" name="" class="answer" autocomplete="off"/>
            <label class="placeholder" for="answer0">请输入答案</label>
        </div>
        <div class="error_tip" id="info_answer0"></div>
        <h5>问题二</h5>
        <div class="question" id="question1"></div>
        <div class="input_area">
            <input type="text" id="answer1" name="" class="answer" autocomplete="off"/>
            <label class="placeholder" for="answer1">请输入答案</label>
        </div>
        <div class="error_tip" id="info_answer1"></div>
        <h5>问题三</h5>
        <div class="question" id="question2"></div>
        <div class="input_area">
            <input type="text" id="answer2" name="" class="answer" autocomplete="off"/>
            <label class="placeholder" for="answer2">请输入答案</label>
        </div>
        <div class="error_tip" id="info_answer2"></div>
        <div class="button login_button" style="margin-top:25px">验证</div>
        <div class="error_tip1" id="info_yz_mibao_dlg"></div>
    </div>
</div>
<!--密码验证身份-->
<div class="pop_dlg" id="yz_pwd_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">验证身份</h4>
    <div class="dlg_wrapper">
        <div class="dlg_content" style="margin-bottom:10px">为您的帐号安全，请输入帐号登录密码验证身份。</div>
        <div class="input_area">
            <input type="password" id="pwd"  autocomplete="off"/>
            <label class="placeholder" for="pwd">请输入密码</label>
        </div>
        <div class="error_tip" id="info_pwd"></div>
        <div class="button login_button" style="margin-top:25px">验证</div>
        <div class="error_tip1" id="info_yz_pwd_dlg"></div>
    </div>
</div>
<!--绑定安全手机-->
<div class="pop_dlg" id="mobile_dlg1">
    <a class="ico_close"></a>
    <h4 class="dlg_title">绑定安全手机</h4>
    <div class="dlg_wrapper">
        <div class="m_progress z_step3_done z_step1">
            <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">输入手机号</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">验证手机号</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                <span class="u_progress_placeholder"></span>
            </div>
            <div class="u_progress_bar total_steps_3">
                <div class="u_progress_bar_inner"></div>
            </div>
        </div>
        <div class="input_area">
            <input type="text" id="new_mobile" name="" autocomplete="off"/>
            <label class="placeholder" for="new_mobile">请输入手机号</label>
        </div>
        <div class="error_tip" id="info_new_mobile"></div>
        <div class="input_area">
            <input type="text" id="vercode_mobile1" name="verifycode" class="vercode"  autocomplete="off" />
            <label class="placeholder" for="vercode_mobile1">请输入验证码</label>
            <div class="pic">
                <img src=""  alt="点击刷新验证码" title="点击刷新验证码" id="auth_code_mobile1"/>
            </div>
        </div>
        <div class="error_tip" id="info_vercode_mobile1"></div>
        <div class="button login_button" style="margin-top:25px">下一步</div>
        <div class="error_tip1" id="info_mobile_dlg1"></div>
    </div>
</div>
<!--绑定安全手机-->
<div class="pop_dlg" id="mobile_dlg2">
    <a class="ico_close"></a>
    <h4 class="dlg_title">绑定安全手机</h4>
    <div class="dlg_wrapper">
        <div class="m_progress z_step3_done z_step2">
            <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">输入手机号</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">验证手机号</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                <span class="u_progress_placeholder"></span>
            </div>
            <div class="u_progress_bar total_steps_3">
                <div class="u_progress_bar_inner"></div>
                <div class="current_innner"></div>
            </div>
        </div>
        <div class="register_tip" style="margin-bottom:10px">已发送含有数字验证码的短信至您的手机<span id="new_phoneNum" class="phoneNum"></span>，请输入短信中的验证码。</div>
        <div class="input_area">
            <input type="text" id="vercode_mobile2" name="verifycode" class="vercode" autocomplete="off"/>
            <label class="placeholder" for="vercode_mobile2">请输入验证码</label>
            <div class="pic">
                <a class="btn_verify_unedit" id="btn_verify_mobile2"><span id="time_mobile2">60</span>S</a>
            </div>
        </div>
        <div class="error_tip" id="info_vercode_mobile2"></div>
        <div class="button login_button" style="margin-top:25px">绑定</div>
        <div class="error_tip1" id="info_mobile_dlg2"></div>
    </div>
</div>
<!--绑定安全邮箱-->
<div class="pop_dlg" id="email_dlg1">
    <a class="ico_close"></a>
    <h4 class="dlg_title">绑定安全邮箱</h4>
    <div class="dlg_wrapper">
        <div class="m_progress z_step3_done z_step1">
            <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">输入邮箱地址</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">验证邮箱</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                <span class="u_progress_placeholder"></span>
            </div>
            <div class="u_progress_bar total_steps_3">
                <div class="u_progress_bar_inner"></div>
            </div>
        </div>
        <div class="input_area">
            <input type="text" id="new_email" autocomplete="off"/>
            <label class="placeholder" for="new_email">请输入邮箱</label>
        </div>
        <div class="error_tip" id="info_new_email"></div>
        <div class="input_area">
            <input type="text" id="vercode_email1" name="verifycode" class="vercode"  autocomplete="off"/>
            <label class="placeholder" for="vercode_email1">请输入验证码</label>
            <div class="pic">
                <img src="" alt="点击刷新验证码" title="点击刷新验证码" id="auth_code_email1"/>
            </div>
        </div>
        <div class="error_tip" id="info_vercode_email1"></div>
        <div class="button login_button" style="margin-top:25px">下一步</div>
        <div class="error_tip1" id="info_email_dlg1"></div>
    </div>
</div>
<!--绑定安全邮箱-->
<div class="pop_dlg" id="email_dlg2">
    <a class="ico_close"></a>
    <h4 class="dlg_title">绑定安全邮箱</h4>
    <div class="dlg_wrapper">
        <div class="m_progress z_step3_done z_step2">
            <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">输入邮箱地址</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">验证邮箱</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                <span class="u_progress_placeholder"></span>
            </div>
            <div class="u_progress_bar total_steps_3">
                <div class="u_progress_bar_inner"></div>
                <div class="current_innner"></div>
            </div>
        </div>
        <div class="register_tip" style="margin-bottom:10px">已发送邮件至您的邮箱，请于24小时内前往邮箱进行操作。</div>
        <div class="button login_button" style="margin-top:25px">知道了</div>
    </div>
</div>
    <!--绑定安全信息-->
    <div class="pop_dlg" id="safe_dlg1">
        <a class="ico_close"></a>
        <h4 class="dlg_title">绑定安全信息</h4>
        <div class="dlg_wrapper">
            <div class="m_progress z_step3_done z_step1">
                <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">绑定安全手机</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">设置密码</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                    <span class="u_progress_placeholder"></span>
                </div>
                <div class="u_progress_bar total_steps_3">
                    <div class="u_progress_bar_inner"></div>
                </div>
            </div>
            <div class="input_area">
                <input type="text" id="safe_mobile" name="" autocomplete="off"/>
                <label class="placeholder" for="safe_mobile">请输入手机号</label>
            </div>
            <div class="error_tip" id="info_safe_mobile"></div>
            <div class="input_area">
                <input type="text" id="vercode_mobile3" name="verifycode" class="vercode"  autocomplete="off" />
                <label class="placeholder" for="vercode_mobile3">请输入验证码</label>
                <div class="pic">
                    <img src=""  alt="点击刷新验证码" title="点击刷新验证码" id="auth_code_mobile3"/>
                </div>
            </div>
            <div class="error_tip" id="info_vercode_mobile3"></div>
            <div class="button login_button" style="margin-top:25px">下一步</div>
            <div class="error_tip1" id="info_safe_dlg1"></div>
        </div>
    </div>
    <div class="pop_dlg" id="safe_dlg2">
        <a class="ico_close"></a>
        <h4 class="dlg_title">绑定安全信息</h4>
        <div class="dlg_wrapper">
            <div class="m_progress z_step3_done z_step1">
                <div class="m_progress_list">
                    <span class="step_1 step">
                        <p class="stage_name">绑定安全手机</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_2 step">
                        <p class="stage_name">设置密码</p>
                        <i class="u_stage_icon_inner"></i>
                    </span>
                    <span class="step_3 step">
                        <p class="stage_name">完成</p>
                         <i class="u_stage_icon_inner"></i>
                   </span>
                    <span class="u_progress_placeholder"></span>
                </div>
                <div class="u_progress_bar total_steps_3">
                    <div class="u_progress_bar_inner"></div>
                    <div class="current_innner"></div>
                </div>
            </div>
            <div class="register_tip" style="margin-bottom:10px">已发送含有数字验证码的短信至您的手机<span id="safe_phoneNum" class="phoneNum"></span>，请输入短信中的验证码。</div>
            <div class="input_area">
                <input type="text" id="vercode_mobile4" name="verifycode" class="vercode" autocomplete="off"/>
                <label class="placeholder" for="vercode_mobile4">请输入验证码</label>
                <div class="pic">
                    <a class="btn_verify_unedit" id="btn_verify_mobile4"><span id="time_mobile4">60</span>S</a>
                </div>
            </div>
            <div class="error_tip" id="info_vercode_mobile4"></div>
            <div class="button login_button" style="margin-top:25px">绑定</div>
            <div class="error_tip1" id="info_safe_dlg2"></div>
        </div>
    </div>
    <div class="pop_dlg" id="safe_dlg3">
        <a class="ico_close"></a>
        <h4 class="dlg_title">绑定安全手机</h4>
        <div class="dlg_wrapper">
            <div class="m_progress z_step3_done z_step2">
                <div class="m_progress_list">
                <span class="step_1 step">
                    <p class="stage_name">绑定安全手机</p>
                    <i class="u_stage_icon_inner"></i>
                </span>
                <span class="step_2 step">
                    <p class="stage_name">设置密码</p>
                    <i class="u_stage_icon_inner"></i>
                </span>
                <span class="step_3 step">
                    <p class="stage_name">完成</p>
                    <i class="u_stage_icon_inner"></i>
                </span>
                    <span class="u_progress_placeholder"></span>
                </div>
                <div class="u_progress_bar total_steps_3">
                    <div class="u_progress_bar_inner"></div>
                    <div class="current_innner"></div>
                </div>
            </div>
            <div class="input_area">
                <input type="password"  id="safepwd"  autocomplete="off" placeholder="请输入帐号密码"/>
                <div class="error_tip" id="info_safepwd"></div>
            </div>
            <div class="input_area">
                <input type="password"  id="resafepwd"  autocomplete="off"  placeholder="请再次输入帐号密码"/>
                <div class="error_tip" id="info_resafepwd" style="color:#878b8a;padding-bottom:30px;padding-top:10px">密码包含6-16位字母、数字</div>
            </div>
            <div class="button login_button">确定</div>
            <div class="error_tip1" id="info_safe_dlg3"></div>
        </div>
    </div>
    <!--设置密保-->
<div class="pop_dlg" id="mibao_dlg">
    <a class="ico_close"></a>
    <h4 class="dlg_title">设置密保问题</h4>
    <div class="dlg_wrapper">
        <div class="question" id="new_question0" index="" >选择密保问题一</div>
        <div class="input_area">
            <input type="text" id="setanswer0" class="answer" autocomplete="off"/>
            <label class="placeholder" for="setanswer0">请输入答案</label>
        </div>
        <div class="error_tip" id="info_setanswer0"></div>
        <div class="question" id="new_question1" index="" style="margin-top:20px">选择密保问题二</div>
        <div class="input_area">
            <input type="text" id="setanswer1" class="answer" autocomplete="off"/>
            <label class="placeholder" for="setanswer1">请输入答案</label>
        </div>
        <div class="error_tip" id="info_setanswer1"></div>
        <div class="question" id="new_question2" index="" style="margin-top:20px">选择密保问题三</div>
        <div class="input_area">
            <input type="text" id="setanswer2"  class="answer" autocomplete="off"/>
            <label class="placeholder" for="setanswer2">请输入答案</label>
        </div>
        <div class="error_tip" id="info_setanswer2"></div>
        <div class="button login_button" style="margin-top:25px">保存</div>
        <div  class="error_tip1" id="info_mibao_dlg"></div>
    </div>
</div>
<!--成功重置密码的气泡-->
<div class="toast" id="success_toast"><img src="images/ico_success.jpg" /><span id="toast_content">已成功修改密码</span></div>
<div class="toast" id="quit_toast"><img src="/resources/images_wap/ico_loading_s.png"  class="loading_pic"/>正在退出...</div>
<!--弹窗-->
<div class="mask" id="mask"></div>
<input id="question_id" value="" type="hidden"/>
<input type="hidden" value=""  id="requestKey_0"/>
<input type="hidden" value=""  id="requestKey_1"/>
<input type="hidden" value=""  id="requestKey_2"/>
<input type="hidden" value=""  id="third_status"/>
<!--绑定重绑时返回-->
<input type="hidden" value=""  id="requestKey_3"/>
<!--绑定安全信息-->
<input type="hidden" value=""  id="requestKey"/>
<input type="hidden" id="securityType"/>
<input type="hidden" id="username" value="139******32"/>
<input type="hidden" value="/login?type=1" id="loginUrl"/>
<input type="hidden" value="/captcha" id="captchaUrl"/>
<input type="hidden" id="dlg_id"/>
<ul id="question_list" class="question_list"></ul>
<script src="js/jquery-1.9.1.min.js" ></script>
<script src="js/jquery-md5-min.js" ></script>
<script src="js/common.js?r=20161220" ></script>
<script>
    //javascript:window.history.forward(1);
    function pointerY(event)
    {
        return event.pageY || (event.clientY + (document.documentElement.scrollTop || document.body.scrollTop));
    }
    $("#new_question0,#new_question1,#new_question2").click(function(event){
        event.stopPropagation();
        showinfo("info_setanswer1", "选择密保问题", 1);
        var question0= $("#new_question0").attr("index");
        var question1 = $("#new_question1").attr("index");
        var question2 = $("#new_question2").attr("index");
        if (question0!= ""){
            $("#question_list  li").eq(question0).hide();
        }
        if (question1 != ""){
            $("#question_list  li").eq(question1).hide();
        }
        if (question2 != ""){
            $("#question_list  li").eq(question2).hide();
        }
        showinfo("info_setanswer0", "", 1);
        showinfo("info_setanswer1", "", 1);
        showinfo("info_setanswer2", "", 1);
        var obj=document.getElementById("question_list");
        obj.style.top=$(this).offset().top+45+"px";
        obj.style.display="block";
        $("#question_id").val(this.id);
    });
    document.getElementById("question_list").onclick = function(e){
        var e=e || window.event;
        var target=e.srcElement || e.target;
        while(target.tagName.toUpperCase() != "LI"){
            target=target.parentNode;
        }
        var index = $("#question_list  li").index(target);
        var question_id= $("#question_id").val();
        $("#"+question_id).html(target.getElementsByTagName("span")[0].innerHTML).attr("index",index);
        setTimeout(function(){
            $("#question_list li").show();
            document.getElementById("question_list").scrollTop=0;
            $("#question_list").hide();
        },100);
    }
    document.body.onclick=function(e){
        var e=window.event || e;
        var target=e.target || e.srcElement;
        var isIn=false;
        var isIn1=false;
        var obj=$("#question_list");
        if(obj.css("display")=="block"){
            while(target.parentNode){
                if(target.id =="question_list"){
                    isIn=true;
                }
                target=target.parentNode;
            }
            if(!isIn){
                obj.css("display","none");
            }
        }
    }
    //请求密保问题列表
    $(document).ready(function(){
        $.ajax({
            type : 'GET',
            url : '../getProblemList',
            cache : false,
            contentType: "application/json; charset=utf-8",   //内容类型
            dataType: "json",     //类型
            beforeSend : function() {
            },
            success : function(redata) {
                var str = "";
                for (var i=0;i<redata.length;i++) {
                    str += "<li><a><span>"+redata[i].question + "</span></a></li>";
                }
                $("#question_list").html(str);
            },
            complete : function(req) {
            },
            error : function(data) {
            }
        });
    })
    $("#fengx_num").html(parseInt($("#fengx_num").html()));
</script>
</body>
</html>