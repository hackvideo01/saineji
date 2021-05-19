
//-------------------------
//画像を削除
//-------------------------
function del_imagevalue( formname, baseurl ){
	var delfrm=document.getElementById(formname);
	document.info.action = baseurl + "&delcol=" + formname + "&delid=" + delfrm.value;
	delfrm.value = "";
	document.info.submit();
}

//-------------------------
//メニューアコーディオン
//-------------------------
$(function(){
    
	//読み込み時
	if( $("dd").after() ){
		$("dd").after().hide();
		if( ckstr = GetCookie("accopen") ){
			openmem = ckstr.split(",");
			for(i = 0; i < openmem.length; i++){
				$("dd:eq(" + openmem[i] + ")").show();
				$("dd:eq(" + openmem[i] + ")").prev("dt").children("span").addClass("open");
			}
		}
	}
	
	//クリック時
	$("dt.accordion").click(function(){
		var openmem = new Array();
		
		clickidx = $("dd").index( $(this).next() );
		
		if( ckstr = GetCookie("accopen") ){
			openmem = ckstr.split(",");
		}
		for(i = 0; i < openmem.length; i++){
			if(openmem[i] == clickidx){
				openmem.splice(i,1);
			}
		}
		
		if ($(this).next().css('display') == 'none') {
			openmem.push( clickidx );
			$(this).children("span").addClass("open");
			$(this).next().slideDown('fast');
		} else {
			$(this).children("span").removeClass("open");
			$(this).next().slideUp('fast');
		}
		
		document.cookie = 'accopen=' + openmem.join(",");
    });
	
});

function GetCookie( name ){
	var result = null;
	var cookieName = name + '=';
	var allcookies = document.cookie;
	var position = allcookies.indexOf( cookieName );
	if( position != -1 ){
		var startIndex = position + cookieName.length;
		var endIndex = allcookies.indexOf( ';', startIndex );
		if( endIndex == -1 ){
			endIndex = allcookies.length;
		}
		result = decodeURIComponent(
		allcookies.substring( startIndex, endIndex ) );
	}else{
		//デフォルトで開く場合
		//カンマ区切りで指定 ex: result = '0,3,5';
		result = '0,1';
	}
	return result;
}



//-------------------------
//CSS切替（文字サイズ）
//-------------------------
function setActiveStyleSheet(title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
}

function getActiveStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) return a.getAttribute("title");
  }
  return null;
}

function getPreferredStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1
       && a.getAttribute("rel").indexOf("alt") == -1
       && a.getAttribute("title")
       ) return a.getAttribute("title");
  }
  return null;
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

window.onload = function(e) {
  var cookie = readCookie("style");
  var title = cookie ? cookie : getPreferredStyleSheet();
  setActiveStyleSheet(title);
}

window.onunload = function(e) {
  var title = getActiveStyleSheet();
  createCookie("style", title, 365);
}

var cookie = readCookie("style");
var title = cookie ? cookie : getPreferredStyleSheet();
setActiveStyleSheet(title);
