jQuery(function(b){scrolltotop.init("#gotoTop");b("img[name='lazyload']").lazyload({placeholder:cdn_url+"images/v6/common/ajax-loader.gif",threshold:200,failurelimit:10,callback:function(c){if(b(c).parents(".frame").length>=1&&!b(c).hasClass("pdImgB")){b(c).removeClass("lazyload").addClass("pdImg").css("display","")}}});var a=new topslide({target:"#mainSlide",slideDelay:4000,slideTrans:1000,controller:true,controllerFix:false,effect:"fade"});a.init()});