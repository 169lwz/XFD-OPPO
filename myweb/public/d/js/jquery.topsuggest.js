(function(a){a.topsuggest=function(p,s){var n=a(p).attr("autocomplete","off");var q;var o=false;var l=0;var d=[];var k=0;if(!s.attachObject){s.attachObject=a(document.createElement("ul")).appendTo("body")}q=a(s.attachObject);q.addClass(s.resultsClass);n.blur(function(){setTimeout(function(){q.hide()},200);a("#select_list").show();a("#select_area").show()});n.focus(function(){a("#select_list").hide();a("#select_area").hide();var e=""});n.click(function(){a("#select_list").hide();a("#select_area").hide();var e=a.trim(a(this).val());if(e!=""){i(e)}});a("#school").change(function(){a("#school_id").val("")});try{q.bgiframe()}catch(m){}n.keyup(f);function f(u){var t=a.trim(n.val());if(t.length<=0){q.hide();return}if((/27$|38$|40$/.test(u.keyCode)&&q.is(":visible"))||(/^13$|^9$/.test(u.keyCode)&&c())){if(u.preventDefault){u.preventDefault()}if(u.stopPropagation){u.stopPropagation()}u.cancelBubble=true;u.returnValue=false;switch(u.keyCode){case 38:g();break;case 40:h();break;case 13:b();break;case 27:q.hide();break}}else{if(n.val().length!=l){if(o){clearTimeout(o)}o=setTimeout(j,s.delay);l=n.val().length}}}function j(){var e=a.trim(n.val());i(e)}function i(t){var x="";var z="";var A="";var u=0;var e=0;for(var w=0;w<s.source.length;w++){var y=new RegExp("^"+t+".*$","im");$num=0;if((y.test(s.source[w][1])||y.test(s.source[w][2])||y.test(s.source[w][3]))&&u<10){x+='<li id="key_'+s.source[w][0]+'" rel="'+s.source[w][1]+'"><a href="#'+s.source[w][0]+'">'+s.source[w][1]+"</a></li>";u++}}for(var w=0;w<s.recommsource.length;w++){y=new RegExp("^"+t+".*$","im");if((y.test(s.recommsource[w][1])||y.test(s.recommsource[w][2])||y.test(s.recommsource[w][3]))&&e<2){z+='<li id="key_'+s.recommsource[w][0]+'" rel="'+s.recommsource[w][2]+'"><a href="'+s.recommsource[w][3]+'">'+s.recommsource[w][2]+"</a></li>";e++}}if(z.length>0){A='<ul style="border-bottom:1px dotted #bfbfbf">'+z+"</ul>"}else{A=""}x=A+"<ul>"+x+"</ul>";if(u>0||e>0){q.html(x).show()}else{q.html(x).hide()}q.children("ul").children("li").mouseover(function(){q.children("ul").children("li").removeClass(s.selectClass);a(this).addClass(s.selectClass)}).click(function(C){C.preventDefault();var B=a(this).children().attr("href");if(B.substring(0,4)=="http"){location.href=B}else{C.stopPropagation();b(this)}})}function c(){if(!q.is(":visible")){return false}var e=q.children("ul").children("li."+s.selectClass);if(!e.length){e=false}return e}function b(e){$currentResult=c();if($currentResult){n.val($currentResult.children("a").html().replace(/<span>.+?<\/span>/i,""));q.hide();if(a(s.dataContainer)){a(s.dataContainer).val($currentResult.attr("rel"))}if(s.onSelect){s.onSelect.apply(n[0])}r()}}function r(){var e=a("#id_top_key").val();if(e==""){return false}else{a("#topsearchform").submit()}}function h(){var t=null;var e=null;$currentResult=c();if($currentResult){t=$currentResult.removeClass(s.selectClass).next();if(!t.attr("rel")){t=q.children("ul").children("li:first-child")}t.addClass(s.selectClass)}else{t=q.children("ul").children("li:first-child");t.addClass(s.selectClass)}e=t.attr("rel");a("#id_top_key").val(e)}function g(){var e=null;$currentResult=c();if($currentResult){e=$currentResult.removeClass(s.selectClass).prev();if(!e.attr("rel")){e=q.children("ul").children("li:last-child")}e.addClass(s.selectClass)}else{e=q.children("ul").children("li:last-child");e.addClass(s.selectClass)}v=e.attr("rel");a("#id_top_key").val(v)}};a.fn.topsuggest=function(d,c,b){if(!d){return}b=b||{};b.source=d;b.recommsource=c;b.hot_list=b.hot_list||[];b.delay=b.delay||0;b.resultsClass=b.resultsClass||"ac_results";b.selectClass=b.selectClass||"ac_over";b.matchClass=b.matchClass||"ac_match";b.minchars=b.minchars||1;b.delimiter=b.delimiter||"\n";b.onSelect=b.onSelect||false;b.dataDelimiter=b.dataDelimiter||"\t";b.dataContainer=b.dataContainer||"#SuggestResult";b.attachObject=b.attachObject||null;this.each(function(){new a.topsuggest(this,b)});return this}})(jQuery);