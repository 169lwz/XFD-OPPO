$(document).ready(function(){var f;function i(k){var n,l,m;m="0123456789 +-()#*";for(n=0;n<k.length;n++){l=m.indexOf(k.charAt(n));if(l==-1){return false}}return true}$("#mima").click(function(j){j.preventDefault();$.ajax({url:"/ajax/member_edit/password",type:"post",dataType:"json",cache:false,async:false,success:function(k){if(k.code===1){$("#dialog").html(k.data);$("#yuan").focus()}else{alert(k.msg)}},error:function(){}})});$("#youxiang").click(function(j){var k=$(this);j.preventDefault();$.ajax({url:"/ajax/member_edit/email",type:"post",dataType:"json",data:{action:k.attr("value")},cache:false,async:false,success:function(l){if(l.code===1){$("#dialog").html(l.data);$("#yuanpassword").focus()}},error:function(){}})});$("#mobile,#change").click(function(j){var k=$(this);j.preventDefault();$.ajax({url:"/ajax/member_edit/phone",type:"post",dataType:"json",data:{action:k.attr("value")},cache:false,async:false,success:function(l){if(l.code===1){$("#dialog").html(l.data);$("#yuanpassword").focus()}},error:function(){}})});$("body").delegate("#pwd2","keydown",function(j){if(j.keyCode!=13){if($("#yuan").val()&&$("#pwd1").val()){$("#passwdbtn1").attr("style","background-color:#d70057")}}});$("body").delegate("#zhclose","click",function(j){j.preventDefault();$(".zhdailog").remove();$(".zh-shade").remove();if($(this).hasClass("zhreload")){window.location.reload()}});$("body").delegate("#passwdbtn1","click",function(j){j.preventDefault();var k=$(this);if(!$("#yuan").val()){f="请输入正确的登录密码";$("#yuan").focus();$("#msg-yuan").html(f);if($("#pwd1").val()||$("#pwd2").val()){$("#pwd1").val("");$("#pwd2").val("")}$("#passwdbtn1").attr("style","background-color:#999");return false}else{$("#msg-yuan").html("")}if(!$("#pwd1").val()){f="请输入新的登录密码";$("#pwd1").focus();$("#msg-pwd").html(f);if($("#pwd2").val()){$("#pwd2").val("")}$("#passwdbtn1").attr("style","background-color:#999");return false}else{if(($("#pwd1").val().replace(/(^\s*)|(\s*$)/g,"").length<6)||($("#pwd1").val().replace(/(^\s*)|(\s*$)/g,"").length>16)){f="请输入6-16个字符，建议为数字、字母和符号组合";$("#pwd1").val("").focus();$("#pwd2").val("");$("#msg-pwd").html(f);$("#passwdbtn1").attr("style","background-color:#999");return false}else{if(!$("#pwd2").val().replace(/(^\s*)|(\s*$)/g,"")||($("#pwd2").val().replace(/(^\s*)|(\s*$)/g,"")!=$("#pwd1").val().replace(/(^\s*)|(\s*$)/g,""))){f="密码不一致";$("#pwd2").val("").focus();$("#msg-pwd").html(f);$("#passwdbtn1").attr("style","background-color:#999");return false}else{$("#msg-pwd").html("")}}}$.ajax({url:"/ajax/member_edit/password_check",type:"post",dataType:"json",data:{password:$("#yuan").val(),newpaswd1:$("#pwd1").val()},cache:false,async:false,success:function(l){if(l.code===1){$("#passwd").submit();$(".zhdailog").remove();$(".zh-shade").remove();alert(l.msg)}else{if(l.code===0){$("#msg-yuan").html(l.msg);$("#yuan").val("").focus();$("#pwd1").val("");$("#pwd2").val("");$("#passwdbtn1").attr("style","background-color:#999");return false}else{if(l.code===2){$("#msg-yuan").html(l.msg);$("#yuan").val("").focus();$("#pwd1").val("");$("#pwd2").val("");$("#passwdbtn1").attr("style","background-color:#999");return false}}}},error:function(){}})});$("body").delegate("#yuanpassword","keydown",function(j){if(j.keyCode!=13){if($("#emailcheck").length){$("#emailcheck").attr("style","background-color:#d70057;margin-bottom:10px")}else{$("#phonebtn1").attr("style","background-color:#d70057;margin-bottom:10px")}}});$("body").delegate("#phonebtn1","click",function(k){k.preventDefault();var l=$(this);var j=$("#mdstr").val();if(!$("#yuanpassword").val()){f="请输入正确的登录密码";$("#yuanpassword").focus();$("#msg-yuan").html(f);return false}else{$("#msg-yuan").html("")}$.ajax({url:"/ajax/member_edit/old_password",type:"post",dataType:"json",data:{password:$("#yuanpassword").val()},cache:false,async:false,success:function(m){if(m.code===1){$(".zhdailog").remove();g(j)}else{if(m.code===0){$("#msg-yuan").html(m.msg);$("#yuanpassword").val("").focus();$("#phonebtn1").attr("style","background-color:#999;margin-bottom:10px");return false}else{if(m.code===2){$("#msg-yuan").html(m.msg);$("#yuanpassword").val("").focus();$("#phonebtn1").attr("style","background-color:#999;margin-bottom:10px");return false}}}},error:function(){}})});function g(j){$.ajax({url:"/ajax/member_edit/phone2",type:"post",dataType:"json",data:{str:j},cache:false,async:false,success:function(k){if(k.code===1){$("#dialog").html(k.data);$("#umobile").focus()}else{if(k.code===0){$("#msg-yuan").text(k.msg);return false}}},error:function(){}})}$("body").delegate("#umobile","keydown",function(j){if(j.keyCode!=13){$("#phonebtn2").attr("style","background-color:#d70057")}});$("body").delegate("#phonebtn2","click",function(k){k.preventDefault();if(!$("#umobile").val()){f="请输入验证的手机号码";$("#umobile").focus();$("#msg-umobile").html(f);return false}else{if(!i($("#umobile").val())){f="格式错误，请输入正确的手机号码";$("#umobile").focus();$("#msg-umobile").html(f);return false}else{if($("#umobile").val()&&$("#umobile").val().replace(/(^\s*)|(\s*$)/g,"").length!=11){f="格式错误，请输入正确的手机号码";$("#umobile").focus();$("#msg-umobile").html(f);return false}else{$("#msg-umobile").html("")}}}var j=$("#umobile").val();var l=$("#mdstr").val();$.ajax({url:"/ajax/tel_new/send_verify_code",type:"post",dataType:"json",data:{tel:j},cache:false,async:false,success:function(m){if(m.code===1){$(".zhdailog").remove();$.ajax({url:"/ajax/member_edit/phone3",type:"post",dataType:"json",data:{str:l},cache:false,async:false,success:function(n){if(n.code===1){$("#dialog").html(n.data);$("#code").focus();d($("#getmobilecode"))}},error:function(){}})}else{$("#msg-umobile").html(m.msg);$("#umobile").val("").focus();$("#phonebtn2").attr("style","background-color:#999")}},error:function(){}})});function b(j,k){$.ajax({url:"/ajax/tel_new/send_verify_code",type:"post",dataType:"json",data:{tel:j},cache:false,async:false,success:function(l){if(l.code===1){d(k)}else{$("#msg-code").html(l.msg)}},error:function(){}})}$("body").delegate("#getmobilecode","click",function(k){k.preventDefault();var j=$("#telinfo").val();var l=$(this);b(j,l)});$("body").delegate("#code","keydown",function(j){if(j.keyCode!=13){$("#phonebtn3").attr("style","background-color:#d70057")}});$("body").delegate("#phonebtn3","click",function(j){j.preventDefault();var k=$(this);if(!$("#code").val()){f="请输入正确的验证码";$("#code").focus();$("#msg-code").html(f);return false}else{$("#msg-code").html("")}$.ajax({url:"/ajax/tel_new/check_verify_code",type:"post",dataType:"json",data:{code:$("#code").val()},cache:false,async:false,success:function(l){if(l.code===1){$("#phone2").submit();$(".zhdailog").remove();$(".zh-shade").remove();alert("验证手机成功！");window.location.reload()}else{$("#msg-code").html(l.msg);$("#code").val("").focus();k.attr("style","background-color:#999")}},error:function(){}})});var e=60;var h;function d(j){if(e===0){$("#getmobilecode").css({background:"#fff",cursor:"pointer"});j.attr("disabled",false);j.value="重新发送验证码";e=60}else{j.attr("disabled",true);j.value=e+"秒后重新获取";$("#getmobilecode").css({background:"#d0d0d0",cursor:"auto"});e--;h=setTimeout(function(){d(j);$("#getmobilecode").val(j.value)},1000)}}$("body").delegate("#emailcheck","click",function(j){j.preventDefault();if(j&&j.stopPropagation){j.stopPropagation()}else{window.event.cancelBubble=true}var k=$(this);if(!$("#yuanpassword").val()){f="请输入正确的登录密码";$("#yuanpassword").focus();$("#msg-yuan").html(f);return false}else{$("#msg-yuan").html("")}$.ajax({url:"/ajax/member_edit/old_password",type:"post",dataType:"json",data:{password:$("#yuanpassword").val()},cache:false,async:false,success:function(l){if(l.code===1){$(".zhdailog").remove();a()}else{if(l.code===0){$("#msg-yuan").html(l.msg);$("#yuanpassword").val("").focus();k.attr("style","background-color:#999;margin-bottom:10px");return false}else{if(l.code===2){$("#msg-yuan").html(l.msg);$("#yuanpassword").val("").focus();k.attr("style","background-color:#999;margin-bottom:10px");return false}}}},error:function(){}})});function a(){$.ajax({url:"/ajax/member_edit/email2",type:"post",dataType:"json",cache:false,async:false,success:function(j){if(j.code===1){$("#dialog").html(j.data);$("#email").focus()}},error:function(){}})}$("body").delegate("#email","keydown",function(j){if(j.keyCode!=13){$("#emailbtn1").attr("style","background-color:#d70057")}});$("body").delegate("#emailbtn1","click",function(k){k.preventDefault();var l=/^[0-9a-zA-Z.\-_\+]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,3}$/;if(!$("#email").val()){f="请输入验证的邮箱地址";$("#email").focus();$("#msg-email").html(f);return false}if(!l.test($("#email").val())){f="格式错误，请输入正确的邮箱地址";$("#email").focus();$("#msg-email").html(f);return false}else{$("#msg-email").html("")}var j=$("#email").val();$.ajax({url:"/ajax/email_new/check_email_verify",type:"post",dataType:"json",data:{email:j},cache:false,async:false,success:function(m){if(m.code===-102){c(j)}else{$("#msg-email").html(m.msg);$("#email").val("").focus();$("#emailbtn1").attr("style","background-color:#999")}},error:function(){}})});function c(j){$.ajax({url:"/ajax/email_new/send_check_email",type:"post",dataType:"json",data:{email:j},cache:false,async:false,success:function(k){if(k.code===1){$(".zhdailog").remove();$(".zh-shade").remove();alert("发送成功！")}else{$("#msg-email").html(k.msg)}},error:function(){}})}});