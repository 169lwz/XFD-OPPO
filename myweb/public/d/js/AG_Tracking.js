function ag_send(_agq) {
	var Cookie_name = "agsid";
	var agsid = "";

	var cookieString = new String(document.cookie);
	var cookieHeader = Cookie_name + "=";
	var beginPosition = cookieString.indexOf(cookieHeader);
	if (beginPosition != -1) {
		agsid = cookieString.substring(beginPosition + cookieHeader.length);
	}

	var query = "";

	query = query + "agsid" + agsid;

	for ( var i = 0; i < _agq.length; i++) {
		var name = "";
		if (_agq[i][0] == "_name") {
			name = "p2";
		}
		if (_agq[i][0] == "_contact") {
			name = "p3";
		}
		if (_agq[i][0] == "_tel") {
			name = "p4";
		}
		if (_agq[i][0] == "_id") {
			name = "p3";
		}
		if (_agq[i][0] == "_orderUrl") {
			name = "p3";
		}
		if (_agq[i][0] == "_orderNo") {
			name = "p2";
		}
		if (_agq[i][0] == "_orderSum") {
			name = "p1";
		}
		if (_agq[i][0] == "_userid") {
			name = "p1";
		}
		if (_agq[i][0] == "_email") {
			name = "p2";
		}
		if (_agq[i][0] == "_age") {
			name = "p3";
		}
		if (_agq[i][0] == "_area") {
			name = "p4";
		}

		if (_agq[i][0] == "_url") {
			name = "p1";
		}
		if (_agq[i][0] == "_cid") {
			name = "cus";
		}
		if (_agq[i][0] == "_eid") {
			name = "eid";
		}
		if (_agq[i][0] == "_roleid") {
			name = "p1";
		}
		query = query + "&" + name + "=" + _agq[i][1];
	}
	var a = document.createElement("img");
	a.setAttribute("width", "0");
	a.setAttribute("height", "0");
	a.style.display = 'none';
	if (document.location.protocol == "https:") {
		a.setAttribute("src", "https://t.agrantsem.com/tt.aspx?" + query);
	} else {
		a.setAttribute("src", "http://t.agrantsem.com/tt.aspx?" + query);
	}
	if (typeof (document.readyState) != 'undefined'
			&& typeof (document.onreadystatechange) != 'undefined') {
		if (document.readyState == "complete") {
			document.body.appendChild(a);
		} else {
			document.onreadystatechange = function() {
				if (document.readyState == "complete") {
					document.body.appendChild(a);
				}
			};
		}
	} else {
		document.body.appendChild(a);
	}
}
function ag_isIE() {
	if (window.ActiveXObject) {
		return true;
	} else {
		return false;
	}
}

function ag_isIE7() {
	var result = false;
	if (navigator.userAgent.indexOf("MSIE 7.0") != -1) {
		result = true;
	}
	return result;
}
function ag_isIE6() {
	var result = false;
	if (navigator.userAgent.indexOf("MSIE 6.0") != -1) {
		result = true;
	}
	return result;
}
