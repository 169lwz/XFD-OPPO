function timecount(a){this.target=$(a.timediv)||null;this.usepic=a.usepic||false;this.useday=a.useday||false;this.nousehms=a.nousehms||false;this.usetext=a.usetext||false;this.timeargs=this.target.data("time")||null;this.leftsecond=(Date.parse(this.timeargs.endtime)-Date.parse(this.timeargs.nowtime))/1000;this.callback=a.callback||function(){}}function timefscount(a){this.target=$(a.timediv)||null;this.usepic=a.usepic||false;this.useday=a.useday||false;this.nousehms=a.nousehms||false;this.usetext=a.usetext||false;this.timeargs=this.target.data("time")||null;this.leftsecond=(Date.parse(this.timeargs.endtime)-Date.parse(this.timeargs.nowtime))/1000;this.callback=a.callback||function(){}}timecount.prototype.init=function(){var b=this;b.target.append('<span class="day"></span><span class="hour"></span><span class="minute"></span><span class="second"></span>');var a=setInterval(function(){var k=parseInt(b.leftsecond/86400);if(b.useday){var f=parseInt((b.leftsecond/3600)%24)}else{var f=parseInt((b.leftsecond/3600))}var c=parseInt((b.leftsecond/60)%60);var l=parseInt(b.leftsecond%60);if(b.usepic){var e=parseInt(f/10);var d=parseInt(f%10);var j=parseInt(c/10);var i=parseInt(c%10);var h=parseInt(l/10);var g=parseInt(l%10);if(b.usetext){if(b.leftsecond>0){if(b.useday){b.target.find(".day").html('<i class="day1 day_'+k+'"></i><b>天</b>')}b.target.find(".hour").html('<i class="hms1 hms1_'+e+'"></i><i class="hms2 hms2_'+d+'"></i><b>时</b>');b.target.find(".minute").html('<i class="hms1 hms1_'+j+'"></i><i class="hms2 hms2_'+i+'"></i><b>分</b>');b.target.find(".second").html('<i class="hms1 hms1_'+h+'"></i><i class="hms2 hms2_'+g+'"></i><b>秒</b>');b.leftsecond-=1}else{if(b.useday){b.target.find(".day").html('<i class="day1 day_0"></i><b>天</b>')}b.target.find(".hour").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i><b>时</b>');b.target.find(".minute").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i><b>分</b>');b.target.find(".second").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i><b>秒</b>');if(b.callback){b.callback()}clearInterval(a)}}else{if(b.leftsecond>0){if(b.useday){b.target.find(".day").html('<i class="day1 day_'+k+'"></i><b>天</b>')}b.target.find(".hour").html('<i class="hms1 hms1_'+e+'"></i><i class="hms2 hms2_'+d+'"></i><b>:</b>');b.target.find(".minute").html('<i class="hms1 hms1_'+j+'"></i><i class="hms2 hms2_'+i+'"></i><b>:</b>');b.target.find(".second").html('<i class="hms1 hms1_'+h+'"></i><i class="hms2 hms2_'+g+'"></i>');b.leftsecond-=1}else{if(b.useday){b.target.find(".day").html('<i class="day1 day_0"></i><b>天</b>')}b.target.find(".hour").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i><b>:</b>');b.target.find(".minute").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i><b>:</b>');b.target.find(".second").html('<i class="hms1 hms1_0"></i><i class="hms2 hms2_0"></i>');if(b.callback){b.callback()}clearInterval(a)}}}else{if(c<10){c="0"+c}if(l<10){l="0"+l}if(b.leftsecond>0){if(b.useday){b.target.find(".day").html("<i>"+k+"</i>天")}if(b.nousehms){b.target.find(".hour").html("<i>"+f+"</i>:");b.target.find(".minute").html("<i>"+c+"</i>:");b.target.find(".second").html("<i>"+l+"</i>")}else{b.target.find(".hour").html("<i>"+f+"</i>时");b.target.find(".minute").html("<i>"+c+"</i>分");b.target.find(".second").html("<i>"+l+"</i>秒")}b.leftsecond-=1}else{if(b.useday){b.target.find(".day").html("<i>00</i>天")}if(b.nousehms){b.target.find(".hour").html("<i>00</i>:");b.target.find(".minute").html("<i>00</i>:");b.target.find(".second").html("<i>00</i>")}else{b.target.find(".hour").html("<i>00</i>时");b.target.find(".minute").html("<i>00</i>分");b.target.find(".second").html("<i>00</i>秒")}if(b.callback){b.callback()}clearInterval(a)}}},1000);return this};timefscount.prototype.init=function(){var b=this;b.target.append('<span class="fsecond"></span>');var a=setInterval(function(){var c=parseInt(b.leftsecond%10);if(b.leftsecond>0){b.target.find(".fsecond").html("<i>"+c+"</i>")}else{b.target.find(".fsecond").html("<i>0</i>")}b.leftsecond-=1},100);return this};