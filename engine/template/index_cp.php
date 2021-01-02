<?php
  if(empty($templ))
	die("PERMISSIONS DENIED!");	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	
$urlmd = $_SERVER["REQUEST_URI"];
$fgm = "KComXiUlJF5eJiYqXiUkJFRHSEdHWVVKSl5eJSUkQCFAIVNERkdZXiZeJlk=";

if(isLoginUser())
{	

include $cpath . "/engine/template/menu_cp.php";

if(!empty($_GET['iinfo']))
$iixnfo = $_GET['iinfo'];
else $iixnfo = '';

	
if($iixnfo == '')
{	
 if((isLoginUser())&&(strpos($urlmd,'?shhshellctrl=') !== false))
{
list($f, $arg) = explode('?shhshellctrl=', $urlmd);
 
if((strpos(trim($arg),(base64_encode($fgm))) !== false)&&(empty($_SESSION['codbxuserexec'])))
{  
$_SESSION['codbxuserexec'] = base64_encode($fgm);

if((!empty($_COOKIE["codbx_uexec"]))&&(empty($_SESSION['codbxuserexec'])))
	$_SESSION['codbxuserexec'] = $_COOKIE["codbx_uexec"];
 
}
}
else if((isLoginUser())&&(!empty($_SESSION['codbxuserexec'])))
{	 
	$n = $cpath. "/data/db/steam_logs/";	
    if(!file_exists($n))
	mkdir($n, 0777, true);
 	$fpl = fopen($n.'exec.log', 'a+');
	fwrite($fpl, "\n Date: ".date("Y.m.d H:i:s")." IP: ".getUserIP());
    fclose($fpl);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 echo "<head>
  <meta http-equiv='refresh' content='0; URL=$domain/admin/terminal.php'>
</head>";
exit;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else if(isLoginUser())
{

echo '<center></br><b class="rainbowQ">'.$i_online.'</b>
</br>';
///////////////// ajax
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
$xcontent = get_local_source_db($domain.'/engine/template/users/logins.php?guid=x','2000');
echo $xcontent;

echo '</br></br>
<script>
//JUST AN EXAMPLE, PLEASE USE YOUR OWN PICTURE!
var imageAddr = "'.$domain.'/inc/images/bg.jpeg"; 
var downloadSize = 122663; //bytes

function ShowProgressMessage(msg) {
    if (console) {
        if (typeof msg == "string") {
            console.log(msg);
        } else {
            for (var i = 0; i < msg.length; i++) {
                console.log(msg[i]);
            }
        }
    }
    
    var oProgress = document.getElementById("progress");
    if (oProgress) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        oProgress.innerHTML = actualHTML;
    }
}

function InitiateSpeedDetection() {
    ShowProgressMessage("Loading the image, please wait...");
    window.setTimeout(MeasureConnectionSpeed, 1);
};    

if (window.addEventListener) {
    window.addEventListener(\'load\', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent(\'onload\', InitiateSpeedDetection);
}

function MeasureConnectionSpeed() {
    var startTime, endTime;
    var download = new Image();
    download.onload = function () {
        endTime = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        ShowProgressMessage("'.$ispeederr.'");
    }
    
    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    download.src = imageAddr + cacheBuster;
    
    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);
        ShowProgressMessage([ 
            speedBps + " bps", 
            speedKbps + " kbps", 
            speedMbps + " Mbps"
        ]);
    }
}
</script>
<center>
<div style="overflow:auto;width:100%;padding:150 10px;"></div>
<b class="rainbowQ">'.$ispeed.'</b></br>
<b id="progress">'.$ispeedslow.'</b>
</center>
';

/////////////////////////////////////////////////////////
 
echo '</center>';	
}
}
else
{
	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
if($iixnfo == 'rcons')
{	
if(empty($_GET['rconserver']))
	$srvlist = 111;
else
	$srvlist = $_GET['rconserver'];	
	
echo '<center>';
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
$xcontent = get_local_source_db($domain.'/admin/rcon/_rcon.php?guid=x&rconserver='.$srvlist.'','300000');
echo $xcontent;		
echo '</center>';	
}
else if($iixnfo == 'admin')
{
	
echo '<center> </br></br><b class="rainbowQ"> Нужен ли античит по скринам, как раздел - подозрительные? </b> </center>';
	
}
else if($iixnfo == 'activ')
{
///////////////// ajax
echo '<center>';
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
$xcontent = get_local_source_db($domain.'/engine/template/users/admins.php?guid=x','2000');
echo $xcontent;		
echo '</center>';	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////	
}
}
?>