jQuery(document).ready(function(b){scrolltotop.init("#gotoTop");function e(){b(".teRidayIn").Slider({prevId:".temaiA_1",nextId:".temaiA_2",shownum:4,offbtnleft:"off_temaiA_1",offbtnright:"off_temaiA_2",offline:1})}e();var h=new topslide({target:"#mainSlide",slideDelay:4000,slideTrans:1000,controller:true,controllerFix:false,effect:"fade"});h.init();function g(){var j=b("#teRiImg").height()+100;b(".temaiRightcont").css("height",j)}var i=b("#hpop").height()+b(".header").height()+b("#freehtml").height();b(window).scroll(function(){if(b(window).scrollTop()>i){b(".temaifl").addClass("temaifixed")}else{b(".temaifl").removeClass("temaifixed")}});f();d();function f(){var j="";b.ajax({url:"/ajax/outlets/onsale/",type:"GET",dataType:"json",data:j,success:function(k){c(k);b(".time").each(function(){_this=b(this);var n={timediv:"#"+_this.attr("id"),useday:true};var m=new timecount(n);var l=new timefscount(n);m.init();l.init()})}})}b(".temaifl ul li").click(function(o){var p=b("#hpop").height();var n=b(".header").height();var m=b("#freehtml").height();var k=b(".temaifl").height();var j=p+n+m-k;b(this).addClass("hover");b(this).siblings().removeClass("hover");var l="";var q=b(this).data("cid");b.ajax({url:"/ajax/outlets/onsale?cid="+q,type:"GET",dataType:"json",data:l,success:function(r){c(r);b(".time").each(function(){_this=b(this);var u={timediv:"#"+_this.attr("id"),useday:true};var t=new timecount(u);var s=new timefscount(u);t.init();s.init()});b("body,html").animate({scrollTop:j},100)}})});function c(n){var m="";for(var l=0;l<n.length;l++){var j={nowtime:n[l].nowtime,endtime:n[l].endtime};m+='<div class="temaiLeftIn">';if(n[l].isnew!=-1){m+='<a href="'+n[l].link+'" title="'+n[l].title+'" target="_blank">';m+='<img src="'+n[l].image+'" alt="'+n[l].title+'">';m+="</a>"}else{m+='<span class="temaihuispan"><img src="'+n[l].image+'" alt="'+n[l].title+'"></span>';m+='<input type="hidden" value="'+n[l].id+'"/>';m+='<div class="temaihui"></div>';m+='<p class="temaihuidate">'+n[l].pic_wordstart+"</p>";m+='<p class="temaihuidate_2">上午10点 准时开抢</p>';m+='<div class="temainoDY"></div>';m+='<div class="temaitext temaitextleft"><input type="text" class="temaitext_1 temaitextleft_1" value="请输入手机号码或邮箱"><input type="button" class="temaitext_2 temaitextleft_2" value=""></div><div class="temaimsg" style="display: none"></div>'}if(n[l].isnew===1){m+='<div class="temainewicon"></div>'}if(n[l].islastday===1){m+='<div class="temailastday"></div>'}m+='<div class="pic_word">'+n[l].slogan+"</div>";if(b.trim(n[l].watchword)!=""){m+='<div class="watchwordback"></div>';m+='<div class="watchword">'+n[l].watchword+"</div>"}m+='<div class="temaitit">';if(n[l].isnew!=-1){m+='<a href="'+n[l].link+'" class="temaititA">'+n[l].title+"</a>"}else{m+='<span href="'+n[l].link+'" class="temaititA">'+n[l].title+"</span>"}m+="</div>";m+='<div class="temaileftzk"><span>'+n[l].discount+"</span></div>";if(n[l].isnew!=-1){m+='<div class="temaitime"><div class="timebr">仅剩</div><div class="time" id="time'+[l]+'" ></div></div>'}else{m+='<div class="temaijj">即将开始</div>'}if(b.browser.version!="6.0"){m+='<div class="temaiLeftlineY"></div><div class="temaiLeftlineX"></div>'}m+="</div>"}b("#temaiLeftIn").html(m);for(var l=0;l<n.length;l++){var k={nowtime:n[l].nowtime,endtime:n[l].endtime};b("#time"+[l]).data("time",k)}}function d(){var j="";b.ajax({url:"/ajax/outlets/getUinfo/"+Math.random(),type:"GET",dataType:"json",data:j,success:function(k){if(k.status===1){b(".temaitext_1").val(k.msg)}else{b(".temaitext_1").val("请输入手机号码或邮箱")}}})}function a(j,n,l,m){var k='<p class="msgtop_1">订阅成功！</p><p class="msgtop_2">我们将在开售当天通知您。</p>';if(/^[a-zA-Z0-9_+.-]+\@([a-zA-Z0-9-]+\.)+[a-zA-Z0-9]{2,4}$/.test(j)){b.ajax({url:"/ajax/outlets/subscribe/"+Math.random(),type:"post",dataType:"json",data:{email:j,prev_id:n},success:function(o){if(o.status===1){l.find("input").hide();b(k).appendTo(l);b(m).hide()}}})}else{if(/^13[0-9]{9}$|14[7]{1}[0-9]{8}|15[012356789]{1}[0-9]{8}$|18[02356789]{1}[0-9]{8}$/.test(j)){b.ajax({url:"/ajax/outlets/subscribe/"+Math.random(),type:"post",dataType:"json",data:{mobile:j,prev_id:n},success:function(o){if(o.status===1){l.find("input").hide();b(k).appendTo(l);b(m).hide()}}})}else{if(j=="请输入手机号码或邮箱"){b(m).html("订阅失败！请输入手机号码或邮箱")}else{b(m).html("订阅失败！手机号码或邮箱输入有误")}}}}b(".temaiImgDiv").hover(function(){b(this).addClass("teImghover");b(this).find(".temaiimgline").hide();b(this).find(".temaitext").show();b(this).find(".temaimsg").show()}).mouseleave(function(){b(this).removeClass("teImghover");b(this).find(".temaiimgline").show();b(this).find(".temaitext").hide();b(this).find(".temaimsg").hide();b(this).find(".msgtop_1,.msgtop_2").remove();b(this).find(".temaitext_1,.temaitext_2").show()});b(".temaitext_2").click(function(){var m=b(this).closest(".temaiImgDiv").find("input:hidden").val();var j=b(this).closest("div").find("input:text").val();var k=b(this).closest(".temaitext");var l=b(this).closest(".temaiImgDiv").find(".temaimsg");a(j,m,k,l)});b(".temaitext_1").focus(function(){if(b(this).val()==="请输入手机号码或邮箱"||b(this).val()===""){b(this).val("");b(this).closest(".temaiImgDiv").find(".temaimsg").html("")}});b(".temaitext_1").blur(function(){if(b(this).val()===""){b(this).val("请输入手机号码或邮箱")}});b("#temaiLeftIn").delegate(".temaitext_1","focus",function(){if(b(this).val()==="请输入手机号码或邮箱"||b(this).val()===""){b(this).val("");b(this).closest(".temaiImgDiv").find(".temaimsg").html("")}});b("#temaiLeftIn").delegate(".temaitext_1","blur",function(){if(b(this).val()===""){b(this).val("请输入手机号码或邮箱")}});b("#temaiLeftIn").delegate(".temaitext_2","click",function(){var m=b(this).closest(".temaiLeftIn").find("input:hidden").val();var j=b(this).closest("div").find("input:text").val();var k=b(this).closest(".temaitext");var l=b(this).closest(".temaiLeftIn").find(".temaimsg");a(j,m,k,l);b(l).show()})});