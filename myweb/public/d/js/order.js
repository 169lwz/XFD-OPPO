$(document).ready(function(){var pop;$("body").delegate(".genzong-btn","mouseenter",function(){var _this=$(this);var _orderinfo=_this.closest(".order-operate");var t=_this.data("ordercode");clearTimeout(pop);pop=setTimeout(function(){$.ajax({url:"/ajax/order/get_order_delivery",type:"get",dataType:"json",data:"ordercode="+t,cache:false,success:function(data){if(_orderinfo.find(".order-uall").length===0){if(data.code===1){_orderinfo.append(data.html)}else{alert(data.msg)}}else{_orderinfo.find(".order-uall").show()}},error:function(){alert("载入失败，请手动刷新")}})},200)}).delegate(".genzong-btn","mouseleave",function(){var _this=$(this);var _orderinfo=_this.closest(".order-operate");clearTimeout(pop);pop=setTimeout(function(){_orderinfo.find(".order-uall").hide()},200)});$("body").delegate(".order-uall","mouseenter",function(){clearTimeout(pop)}).delegate(".order-uall","mouseleave",function(){var _this=$(this);clearTimeout(pop);pop=setTimeout(function(){_this.hide()},200)});$("body").delegate(".order-uall .uclose","click",function(){var _this=$(this);var _orderinfo=_this.closest(".order-uall");_orderinfo.hide()});$("body").delegate(".commentbtn","click",function(e){e.preventDefault();var _this=$(this);var jscom=_this.closest("tr").next("tr");var _td=jscom.find("td");var _data={itemId:_this.data("itemid"),productId:_this.data("comid"),ordercode:_this.data("ordercode")};if(!_this.hasClass("comcheck")){_this.addClass("comcheck");$.ajax({url:"/ajax/comment/get_comment_html",type:"get",dataType:"json",data:_data,cache:false,success:function(data){if(data.code===1){if(parseInt(jscom.attr("comid"))===_this.data("comid")){_td.html(data.comment_html);uploadPic(_td,_this.data("itemid"))}}else{alert(data.msg)}},error:function(){_this.removeClass("comcheck");alert("载入失败，请手动刷新")}})}else{_this.removeClass("comcheck");_td.find(".comments-wrap").remove()}});$("body").delegate(".star a","mouseenter",function(event){event.preventDefault();var _this=$(this);var num=_this.data("num");var inputnum=_this.closest("p").find("input").val();if(num+1!=inputnum){_this.addClass("hover").prevAll("a").addClass("hover").end().nextAll().removeClass("show")}});$("body").delegate(".star a","mouseleave",function(event){event.preventDefault();var _this=$(this);var inputnum=$(this).closest("div").find("input").val()-1;var num=$(this).data("num");var $p=_this.closest("p");if(num!=inputnum){$p.find("a").removeClass("hover");var _s=$p.find(".s"+inputnum+"");_s.addClass("show").prevAll("a").addClass("show").end().nextAll().removeClass("show")}else{$p.find("a").removeClass("hover")}});$("body").delegate(".star a","click",function(event){event.preventDefault();var _this=$(this);var num=_this.data("num");var inputnum=_this.closest("p").find("input").val();if(num+1!=inputnum){_this.closest("p").find("input").val(num+1);_this.addClass("show").prevAll("a").addClass("show").end().nextAll().removeClass("show")}});$("body").delegate(".sizeinfo span","click",function(e){e.preventDefault();var _this=$(this);var num=_this.data("val");_this.addClass("cur").siblings().removeClass("cur");_this.parent().find("input").val(num)});$("body").delegate(".comfortinfo span","click",function(e){e.preventDefault();var num=$(this).data("val");$(this).addClass("cur").siblings().removeClass("cur");$(this).parent().find("input").val(num)});$("body").delegate(".textareabox","focus",function(e){$(this).attr("placeholder","")});$("body").delegate(".textareabox","blur",function(e){if($(this).val()===""){$(this).attr("placeholder","请填写您对本商品的评价，以帮助更多网友选择时进行参考。（必填5-300字）")}});plupload.addI18n({"Select files":"选择文件","Add files to the upload queue and click the start button.":"添加文件到上传队列，然后点击启动按钮。",Filename:"文件名",Status:"状态",Size:"大小","Add Files":"添加文件","Stop Upload":"停止上传","Start Upload":"开始上传","Add files":"添加文件","Add files.":"添加文件。","Stop current upload":"停止当前上传","Start uploading queue":"开始上传队列","Stop upload":"停止上传","Start upload":"开始上传","Uploaded %d/%d files":"已经上传 %d/%d 个文件","N/A":"N/A","Drag files here.":"拖动文件到这里","File extension error.":"文件扩展名错误","File size error.":"文件大小错误","File count error.":"文件数量错误","Init error.":"初始化错误","HTTP Error.":"HTTP 错误","Security error.":"安全错误","Generic error.":"常见错误","IO error.":"IO错误","File: %s":"文件百分比 : %s",Close:"关闭","%d files queued":"%d 个队列中","Using runtime: ":"使用运行时: ","File: %f, size: %s, max file size: %m":"文件名: %f, 大小: %s, 文件最大值: %m","Upload element accepts only %d file(s) at a time. Extra files were stripped.":"上传文件只接受%d，其他的文件被忽略","Upload URL might be wrong or doesn't exist":"上传文件有错误或者文件不存在","Error: File too large: ":"错误：文件太大: ","Error: Invalid file extension: ":"错误：禁止的文件扩展名: "});function uploadPic(_td,itemid){var btnid,filelistid,containerid,picnum,uploadurl;btnid=_td.find(".pickfiles").attr("id");filelistid=_td.find(".filelist").attr("id");containerid=_td.find(".container").attr("id");consoleid=_td.find(".console").attr("id");uploadurl="/ajax/image/upload?itemid="+itemid;picnum=_td.find(".filetit i");var uploader=new plupload.Uploader({runtimes:"html5,flash,silverlight,html4",browse_button:btnid,container:document.getElementById(containerid),url:uploadurl,flash_swf_url:"libs/plupload/Moxie.swf",silverlight_xap_url:"libs/plupload/Moxie.xap",filters:{max_file_size:"3mb",mime_types:[{title:"Image files",extensions:"jpg"}]},init:{FilesAdded:function(up,files){plupload.each(files,function(file){document.getElementById(filelistid).innerHTML+='<div style="display:none" id="'+file.id+'">'+file.name+" ("+plupload.formatSize(file.size)+") <b></b></div>"});uploader.start()},UploadProgress:function(up,file){document.getElementById(file.id).getElementsByTagName("b")[0].innerHTML='<span style="display:none">'+file.percent+"%</span>"},Error:function(up,err){document.getElementById(consoleid).innerHTML+="\nError #"+err.code+": "+err.message}}});uploader.init();uploader.bind("FileUploaded",function(upldr,file,object){var myData;try{myData=eval(object.response)}catch(err){myData=eval("("+object.response+")")}if(myData.data!=undefined){$('<img src="'+myData.data.small+'" class="imgshow"><input type="hidden" name="picsmall[]" value="'+myData.data.small+'"/><input type="hidden" name="pics[]" value="'+myData.data.original+'"/><input type="hidden" name="pid[]" value=""/>').appendTo("#"+filelistid)}imgnum()});imgnum();function imgnum(){var imgnumber=$("#"+filelistid).find('input[name="pics[]"]').length;picnum.text(imgnumber);if(imgnumber>=5){$("#"+containerid).css("margin-left",0).hide()}else{if(imgnumber<5&&imgnumber>0){$("#"+containerid).css("margin-left",0);$("#"+containerid).show()}}}$("body").delegate(".filelist img","mouseenter",function(event){$(this).attr("src",cdn_url+"images/v6/usercenter/imgdel.png")});$("body").delegate(".filelist img","mouseleave",function(event){var img=$(this).next().val();$(this).attr("src",img)});$("body").delegate(".filelist img","click",function(event){var _this=$(this);_this.next().next().next().remove();_this.next().next().remove();_this.next().remove();_this.remove();imgnum()})}$("body").delegate(".sdsubmit","click",function(){var _this=$(this);var _form=_this.closest("form");var _picurl,flag;_picurl=_this.closest("form").find('input[name="pics[]"]').eq(0).val();for(var i=1;i<_this.closest("form").find('input[name="pics[]"]').length;i++){_picurl+=","+_this.closest("form").find('input[name="pics[]"]').eq(i).val()}if(_form.find(".nmbox").attr("checked")==="checked"){flag=1}else{flag=0}var _textarea=_form.find(".textareabox").val();if(_textarea.length>500){_form.find(".content").html("亲，评论不能超过500个字符哦")}var _data={ordercode:_form.find('input[name="ordercode"]').val(),itemid:_form.find('input[name="itemid"]').val(),productid:_form.find('input[name="sku"]').val(),comment:_form.find(".textareabox").val(),score:_form.find('input[name="whole_grade"]').val(),sizerating:_form.find('input[name="size_grade"]').val(),comfortrating:_form.find('input[name="comfort_grade"]').val(),commonsize:_form.find(".selectsize").val(),height:_form.find(".cominput").eq(0).val(),weight:_form.find(".cominput").eq(1).val(),isanonymous:flag,picurl:_picurl};$.ajax({url:"/ajax/comment/comment",type:"post",dataType:"json",data:_data,traditional:true,success:function(data){$(".error").html("");if(data.code===1){var comhtml="";comhtml+='<div class="cmtdialog">';comhtml+="<p>您已成功发表对商品的评论，将有机会获得<span>5元代金券</span>，请注意查收。</p>";comhtml+='<p><a href="http://www.okbuy.com/order/lists" class="cmtorderlink"></a></p>';comhtml+='<span class="prodShare" id="prodShare">同步分享到：<a href="javascript:void(0);" rel="nofollow" data-to="t_qq" title="分享到 腾讯微博" class="sharToA_qq"></a> <a href="javascript:void(0);" rel="nofollow" data-to="t_sina" title="分享到 新浪微博" class="sharToA_sina"></a><a href="javascript:void(0);" rel="nofollow" data-to="kaixin" title="分享到 开心网" class="sharToA_kx"></a> <a href="javascript:void(0);" rel="nofollow" data-to="douban" title="分享到 豆瓣" class="sharToA_db"></a></span>';comhtml+="</div>";$("#dialog").html(comhtml).css("border","2px solid #d60056");$("#dialog").dialog({autoOpen:true,closeOnEscape:true,modal:true,width:450,height:180,position:"center",title:"评论成功"}).dialog("open");$(".ui-dialog-titlebar").hide()}else{if(data.code===0){alert("数据错误，请稍后重试")}else{if(data.code===-1006){alert(data.msg)}else{_form.find("."+data.place+"").html(data.msg)}}}}});return false});$("body").delegate("#prodShare a","click",function(event){var data_to=$(this).data("to");ShareTo(data_to)});function ShareTo(m,t){var title=$("#text").val();var t_url=$("#fxhref").attr("href");if(m=="t_qq"){var _t=encodeURI(title);var _url=encodeURI(t_url);var _appkey=encodeURI("801073491");if($("#fximg").length>0){var _pic=encodeURI($("#fximg").attr("src").replace(/_\d\.jpg/,"_1.jpg"))}else{var _pic="http://0.image.ws.okbuycdn.com/images/new/logo.gif"}var _site="www.okbuy.com";var _u="http://share.v.t.qq.com/index.php?c=share&a=index&url="+_url+"&pic="+_pic+"&appkey="+_appkey+"&title="+_t+"&line1=中国最大正品鞋购物网站-好乐买&line2="+_t;window.open(_u,"转播到腾讯微博","width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no")}else{if(m=="t_sina"){var weiboactiontitle=""+title+"围观链接："+t_url+"。@好乐买okbuy ，为您营造最完美的用户体验。";var d={location:{href:t_url},title:title,_action:weiboactiontitle};void ((function(s,d,e){try{}catch(e){}var f="http://v.t.sina.com.cn/share/share.php?",u=d.location.href,p=["&title=",e(d._action),"&pic=",$("#pDetailLe .pBigPic img:first").attr("src"),"&appkey=1974693068"].join("");function a(){if(!window.open([f,p].join(""),"mb",["toolbar=0,status=0,resizable=1,width=620,height=450,left=",(s.width-620)/2,",top=",(s.height-450)/2].join(""))){u.href=[f,p].join("")}}if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,d,encodeURIComponent))}else{if(m=="t_sohu"){var d={location:t_url,title:title};void ((function(s,d,e,r,l,p,t,z,c){var f="http://t.sohu.com/third/post.jsp?",u=z||d.location,p=["&url=",e(u),"&title=",e(t||d.title),"&content=",c||"gb2312","&pic=",e(p||"")].join("");function a(){if(!window.open([f,p].join(""),"mb",["toolbar=0,status=0,resizable=1,width=660,height=470,left=",(s.width-660)/2,",top=",(s.height-470)/2].join(""))){u.href=[f,p].join("")}}if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,d,encodeURIComponent,"","","","","","utf-8"))}else{if(m=="kaixin"){var d={location:t_url,title:title};void ((function(s,d,e,r,l,p,t,z,c){var f="http://www.kaixin001.com/repaste/share.php?",u=z||d.location,p=["&rurl=",e(u),"&rtitle=",e(t||d.title),"&rcontent=",c||"","&rurl=www.okbuy.com",e(p||"")].join("");function a(){if(!window.open([f,p].join(""),"mb",["toolbar=0,status=0,resizable=1,width=660,height=470,left=",(s.width-660)/2,",top=",(s.height-470)/2].join(""))){u.href=[f,p].join("")}}if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,d,encodeURIComponent,"","","","","",""))}else{if(m=="renren"){var d={location:t_url,title:encodeURI(title)};void ((function(s,d,e){if(/xiaonei\.com/.test(d.location)){return}var f="http://share.xiaonei.com/share/buttonshare.do?link=",u=d.location,l=d.title,p=[e(u),"&amp;title=",e(l)].join("");function a(){if(!window.open([f,p].join(""),"xnshare",["toolbar=0,status=0,resizable=1,width=626,height=436,left=",(s.width-626)/2,",top=",(s.height-436)/2].join(""))){u.href=[f,p].join("")}}if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,d,encodeURIComponent))}else{if(m=="douban"){void (function(){var d={location:t_url,title:title},e=encodeURIComponent,s1=window.getSelection,s2=document.getSelection,s3=document.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:"",r="http://www.douban.com/recommend/?url="+e(d.location)+"&title="+e(d.title)+"&sel="+e(s)+"&v=1",x=function(){if(!window.open(r,"douban","toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=355,left="+(screen.width-450)/2+",top="+(screen.height-330)/2)){location.href=r+"&r=1"}};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})()}}}}}}}slider();function slider(){$(".productlist").Slider({prevId:".leftOn",nextId:".rightOn",shownum:5,offbtnleft:"left",offbtnright:"right",offline:1})}$("#tag").click(function(e){e.preventDefault();var _this=$(this);var _oinfo=_this.parent().prev();if(!_this.hasClass("chide")){_oinfo.slideUp();_this.addClass("chide").html("显示订单跟踪信息")}else{_oinfo.slideDown();_this.removeClass("chide").html("隐藏订单跟踪信息")}})});