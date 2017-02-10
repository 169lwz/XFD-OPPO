if (!UI) 
    var UI = {};
function getNewversion(){
	strBrowser = UT.getBrowserVersion();
	return LIM.localRes["screenUpdate"].replace(/\\r/g, String.fromCharCode(10)).replace(/SS/g, LIM.localRes["stay_page_"+strBrowser]).replace(/LL/g, LIM.localRes["leave_page_"+strBrowser]);;;
}
UI.getCookies = function(name){
	var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
	var value = "";
	if (arr = document.cookie.match(reg)){
		if(arr.length>2){
			value = arr[2];
		}
	}
	return value;
};
UI.download = function(){
    if (globalChatHandle.chatStatus == "WAIT") {
        alert(LIM.localRes["towaitre"]);
        return;
    }
    if (globalChatHandle.chatStatus == "END") {
        alert(LIM.localRes["dialogovered"]);
        return;
    }
    if (objId("shyslysky") != null) {
        var eml = objId("shyslysky");
        document.body.removeChild(eml);
    }
    var head = document.getElementsByTagName('body')[0];
    var oo = document.createElement('object');
    oo.setAttribute("id", "shyslysky");
    if(!document.all){
        oo.setAttribute("type", "application/catchscreen-goldarmor");
    }else{
        oo.setAttribute("classid", "clsid:87a57dc4-08cd-5c30-951f-68ca4c73a480");
    }
    //下面注释两行为老版截图插件所要用的。
    //oo.setAttribute("codebase", LIM.config["protocol"] + "://" + LIM.config.chatDirDomains + "/CatchScreen.cab#version=6,5,0,0");
    oo.style.cssText="width:0px;height:0px;position:absolute;";
    head.appendChild(oo);
    var shyslysky = objId("shyslysky");
    try {
        var attr = "";
        if (shyslysky.getversion() < 6600) {
        	if (objId("shyslysky") != null) {
                var eml = objId("shyslysky");
                eml.parentNode.removeChild(eml);
            }
        	if (confirm(getNewversion())) {
                var winchild = window.open("activex.jsp?lang="+LIM.config["language"], "activex", attr);
                winchild.moveTo(0, 0);
                winchild.focus();
                return;
        	}
            return;
        }
        var _param = function(){
            var paramString = "";
            paramString = "&companyID="+LIM.config["companyID"]+"&vid="+globalChatHandle.vid+"&act=1&randomIDForSendMsg=" + globalChatServer.randomIDForSendText + "&visitorIDInSession=" + LIM.config["visitorIDInSession"];
            return paramString;
        };
       	if (LIM.config.baseHtmlUrl.indexOf(":") > -1) {
        	var address = LIM.config.protocol + "://" + LIM.config.baseHtmlUrl.substring(0, LIM.config.baseHtmlUrl.indexOf(":"));
            shyslysky.SendAddress(address);
        } else {
        	var address = LIM.config.protocol + "://" + LIM.config.baseHtmlUrl;
            shyslysky.SendAddress(address);
        }
        shyslysky.Setport(conPort);
        shyslysky.SetAction(LIM.config.baseWebApp + '/ChaterServer');
        shyslysky.ReturnUrl();
        shyslysky.SendParater(_param());
        var newCookie = "cc="+UI.getCookies("cc")+"; JSESSIONID="+UI.getCookies("JSESSIONID")+";";
        shyslysky.CookiesParatar(newCookie);
        shyslysky.GetCatchScreenAndRM();
    } 
    catch (e) {
        window.open("activex.jsp?lang="+LIM.config["language"], "activex", attr);
    }
};