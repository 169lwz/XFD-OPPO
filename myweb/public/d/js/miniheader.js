jQuery(document).ready(function(d){function b(g){var f=document.cookie.match(new RegExp("(^| )"+g+"=([^;]*)(;|$)"));if(f!=null){return unescape(f[2])}return""}var c=function(f,h,g){document.cookie=f+"="+h+"; path=/; domain=.okbuy.com; expires="+g+";"};function e(){var f=d("#navindex").val();if(f){d("#"+f).siblings().removeClass("current");d("#"+f).addClass("current")}}function a(){d.ajax({url:"/cart/ajax",context:document.body,success:function(f){if(f==="empty"){alert("购物车中暂无商品！")}else{window.location.href="/cart"}}})}});