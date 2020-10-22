
console.log('wz=');
var module='';
var overlay_page='';
var profile_card_page='';
var last_overlay_update=0;
var cheater_list_step=0;
var filter_cheater=[0,0];
var cheaters_main_page='';
function getXMLHttp(){
  var XMLHttp=null; 
  if (window.XMLHttpRequest) { 
    try { 
      XMLHttp=new XMLHttpRequest(); 
    } catch (e) {} 
  } 
  else { 
    if (window.ActiveXObject){ 
       try { 
         XMLHttp=new ActiveXObject('Msxml2.XMLHTTP'); 
       }  
       catch (e) { 
         try { 
           XMLHttp=new ActiveXObject('Microsoft.XMLHTTP');        
         } 
         catch (e) {} 
       } 
    } 
  } 
 return XMLHttp; 
} 

function setGetParam(key,value) {
  if (history.pushState) {
    var params = new URLSearchParams(window.location.search);
    params.set(key, value);
    var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname + '?' + params.toString();
    window.history.pushState({path:newUrl},'',newUrl);
  }
}


var lastScrollTop = 0;

 



 
function copy22(str){
  let tmp   = document.createElement('INPUT'),
      focus = document.activeElement; 

  tmp.value = str; 

  document.body.appendChild(tmp); 
  tmp.select(); 
  document.execCommand('copy'); 
  document.body.removeChild(tmp);
  focus.focus(); 
}


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function hide_reminder(){
	setCookie('hide_reminder',1,1);
	document.getElementById('reminder').style.display='none';
	
}

function show_loader(){
	document.getElementById('main_hover').style.display='block';
	document.getElementById('loader_bar').style.transition='';
	document.getElementById('loader_bar').style.width='0px';
	setTimeout(function(){document.getElementById('loader_bar').style.width='0px';document.getElementById('loader_bar').style.transition='width 40s';document.getElementById('loader_bar').style.width='100%';},1200);
	
}

 

 

function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

  function stripScripts(s) {
    var div = document.createElement('div');
    div.innerHTML = s;
    var scripts = div.getElementsByTagName('script');
    var i = scripts.length;
    while (i--) {
      scripts[i].parentNode.removeChild(scripts[i]);
    }
    var scripts = div.getElementsByTagName('noscript');
    var i = scripts.length;
    while (i--) {
      scripts[i].parentNode.removeChild(scripts[i]);
    }
    return div.innerHTML;
  }
