<?php 
$templ = 1; 
error_reporting(E_ALL);  
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
include($cpath ."/inc/data.php"); 
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");
if((empty($_COOKIE["codbx_uexec"]))&&(!empty($_SESSION['codbxuserexec'])))
    setcookie("codbx_uexec", $_SESSION['codbxuserexec'], time()+259200);
if(isLoginUser())
{	
  
if (!empty($_GET['rc'])) 
   $rc = $_GET['rc']; 
else
  	$rc = 0;

  if (empty($_GET['server']))
   $server = 0;
   else
	$server = $_GET['server']; 


  if (empty($_GET['adminw']))
   $adminw = 'unknown';
   else
	$adminw = $_GET['adminw']; 

  if (empty($_GET['ip']))
   $ip = '';
   else
	$ip = $_GET['ip']; 


  if (empty($_GET['visited']))
   $visited = '0';
   else
	$visited = $_GET['visited']; 


  if (empty($_GET['svrnm']))
 $svrnm = '';
else
 $svrnm = $_GET['svrnm'];

  if (empty($_GET['gd']))
 $guid = '';
else
 $guid = $_GET['gd'];

if (empty($_GET['plyr']))
 $plyr = '';
else
 $plyr = $_GET['plyr'];


if (empty($_GET['plyrid']))
 $plyrid = '';
else
 $plyrid = $_GET['plyrid'];


if(!empty($_SESSION['codbxpasssteam']))
$byWhois = isLoginUserWHO($_SESSION['codbxpasssteam']);
else if(!empty($_COOKIE['user_online_login']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_login']);
else if(!empty($_COOKIE['user_online_key']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_key']);
else
$byWhois = '';

if(!empty($_SESSION['codbxuser']))
 $codbxuser = $_SESSION['codbxuser'];

if(!empty($byWhois))
$xz = $byWhois;
else if(!empty($codbxuser))
$xz = $codbxuser;
?>
<!DOCTYPE html>
<html>
<html lang="en" class="no-js">
	<head>
		<meta charset="windows-1251" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo 'DEMO ',$plyr,' 💭 ' ?></title>
 <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
<script>
var newTxt="<?php echo 'DEMO 💭 '.$plyr.' '; ?>";
var oldTxt=document.title;
 
function migalka(){
    if(document.title==oldTxt){
        document.title=newTxt;
    }else{
        document.title=oldTxt;
    }
}
var timer = setInterval(migalka,1000);
</script>
<style>
body{
  transition:0;
  background-color:#421445; /* #002600 */
  color:#2eb4e9;
  margin: 0;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input[type="reset"]:active {
	font-size:14px;
     background-color: red;	
    color: yellow;
}

input[type="submit"]:focus {
	font-size:14px;
        color: yellow;
		animation: rainbow 1.1s linear;
		animation-iteration-count: infinite;
		text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}


input[type="reset"]:focus {
	font-size:14px;
        color: yellow;
		animation: rainbow 1.1s linear;
		animation-iteration-count: infinite;
		text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}
@keyframes rainbow{
		100%,0%{
			background-color: rgb(255,0,0);
		}
		8%{
			background-color: rgb(255,127,0);
		}
		16%{
			background-color: rgb(255,255,0);
		}
		25%{
			background-color: rgb(127,255,0);
		}
		33%{
			background-color: rgb(0,255,0);
		}
		41%{
			background-color: rgb(0,255,127);
		}
		50%{
			background-color: rgb(0,255,255);
		}
		58%{
			background-color: rgb(0,127,255);
		}
		66%{
			background-color: rgb(0,0,255);
		}
		75%{
			background-color: rgb(127,0,255);
		}
		83%{
			background-color: rgb(255,0,255);
		}
		91%{
			background-color: rgb(255,0,127);
		}
}

span {
  background-color: #a62b2b;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
p {
  background-color: #2b8ba6;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<?php
$datetime = date('Y-m-d H:i:s');
$dthx = date('Y-m-d');

if (!empty($_GET['md5'])) {
   $md5x = $_GET['md5']; 
   $server = $md5x;
}
else
	$md5x = 0;
                       foreach ($multi_servers_array as $arxx => $xxservername) { 
						   $zxх = explode("server_md5:", $arxx);
						   $fldd = $zxх[1];
						   $zf = explode("rcon:", $arxx);
						   $rcn = $zf[1];	
						   $zb = explode("port:", $arxx);
						   $prt = $zb[1];
						   $io = explode("ip:", $arxx);
						   $ipv = $io[1];
								   $server_md5 = strtok($fldd, " ");
							       $server_rconpass = strtok($rcn, " ");
							       $server_port = strtok($prt, " ");
							       $server_ip = strtok($ipv, " ");							   
 if($server == $server_md5){                   				   
$server_addr = "udp://" . $server_ip;
@$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connect) { die('Can\'t connect to COD gameserver.'); }


////  Проверка игрока на отсуствие  /////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
if (!empty($_GET['all'])){
stream_set_timeout($connect, 0, 96000); //1e5
$send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" status';
fwrite($connect, $send);
$output = fread($connect, 1);

if (!empty($output))
	{
	do
		{
		$status_pre = socket_get_status($connect);
		$output = $output . fread($connect, 1024); //1024
		$status_post = socket_get_status($connect);
		}

	while ($status_pre['unread_bytes'] != $status_post['unread_bytes']);
	};
$output = explode("\xff\xff\xff\xffprint\n", $output);
$output = implode('!', $output);
$output = explode("\n", $output);

if (preg_grep('/CoD4 X 1.8/', $output)) 
	$output = preg_grep('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $output);

foreach($output as $value)
	{

	if (strpos($value, $guid) !== false)
	  $keey = 1;
	}

if(empty($keey)){
	
	
$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +5 day'));
$tmk = str_replace("-", ".", $tmk);	
	
$re = "INSERT INTO demos (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$plyr."','".$_GET['ip']."','".$_GET['ip']."','".$_GET['gd']."','demos','".date("Y.m.d H:i:s")."', '".$tmk."', '0','" . $adminw . "','" .$visited . "') 
ON DUPLICATE KEY UPDATE ip='" . $_GET['ip'] . "', playername='".$plyr."', patch='" .$visited . "', 
reason='demos', time='".date("Y.m.d H:i:s")."', bantime = '".$tmk."', whooo='" .$adminw . "'";

$r = dbSelectALL('', $re);	
//echo $re;
//var_dump($r);

	
die ('</br></br></br></br></br><center><span>'.$lang['demo_auto_record_t'].' OK</span></center>
</br></br><center><span>'.$makescreenserrr.'</span></center>');
}
else
{	
sleep(2);


$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +5 day'));
$tmk = str_replace("-", ".", $tmk);	
	
$re = "INSERT INTO demos (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$plyr."','".$_GET['ip']."','".$_GET['ip']."','".$_GET['gd']."','demos','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" . $adminw . "','" .$visited . "') 
ON DUPLICATE KEY UPDATE ip='" . $_GET['ip'] . "', playername='".$plyr."', patch='" .$visited . "', 
reason='demos, time='".date("Y.m.d H:i:s")."', bantime = '".$tmk."', whooo='" .$adminw . "'";


//echo $re;

$r = dbSelectALL('', $re);
	

//var_dump($r);


if(!empty($plyrid))
echo '</br></br></br></br></br><center><span>'.$lang['demo_auto_record_t'].' OK</span></center>
<center><p>'.$lang['demo_auto_record_y'].'</p></center>';
//else
//die ('</br></br></br></br></br></br></br><center><span>ERROR!!!</span></center>');	
}
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

	//$rc = iconv("utf-8", "windows-1251",$rc);	
	//$xz = iconv("utf-8", "windows-1251",$xz);	

 if((!empty($md5x)) && (!empty($rc))){
if(!empty($plyrid))
{
$rc = '^3'.$rc;
$xz = '^1'.$xz;
	
    $rco = $rc;	
	$xzo = $xz;	
	
	$rco = @iconv("utf-8", "windows-1251",$rc);	
	$xzo = @iconv("utf-8", "windows-1251",$xz);

echo rcon('getss ' .trim($plyr), '', $connect, $server_rconpass); 

$reponse = "INSERT INTO `chat` (`servername`, `s_port`, `guid`, `nickname`, `time`, `timeh`, `text`, `st1`, `st1days`, `st2`, `st2days`, `ip`, `geo`, `z`, `t`, `x`, `c`) 
VALUES ('DemoRecord', '" . $server . "', '" .$guid. "', '" . $xzo . "', '" . $datetime . "', '" . $dthx . "', 
'" . $rc . "', '0', '0', '0', '0', '" .getUserIP(). "', 'ZAG', '0', 'xl', '0', '0')";
$xz = dbSelectALL('', $reponse);
 }}}}					   				   
?>
</br>
<center>
<strong style="font-family: Impact;font-size:18px;">
<?php echo colorize($svrnm); ?></br>
</strong>
</center>
</br></br></br>
<center>
 </br> </br>
   <form>
 <input name="all" type="hidden" value="all"> 
 
<?php if (empty($_GET['playernumber'])){ ?>
 <input name="plyr" type="hidden" value="<?php echo $plyr; ?>">
 <input name="plyrid" type="hidden" value="<?php echo $plyr; ?>"> 
<?php } else {?> 
 <input name="plyr" type="hidden" value="<?php echo $_GET['playernumber']; ?>">
 <input name="plyrid" type="hidden" value="<?php echo $_GET['playernumber']; ?>"> 
<?php } ?> 
 
 <input name="svrnm" type="hidden" value="<?php echo $svrnm; ?>">
 <input name="md5" type="hidden" value="<?php echo $server; ?>">
 <input name="gd" type="hidden" value="<?php echo $guid; ?>">

 <input name="adminw" type="hidden" value="<?php echo $adminw; ?>">
 <input name="ip" type="hidden" value="<?php echo $ip; ?>">
 <input name="visited" type="hidden" value="0">
 
 <input name="rc" type="hidden" value="ScreenShot">
 <input type="submit" value="<?php echo $lang['demo_auto_record_y'].' '.$plyr; ?>">
  </form>
</center>

<center>


</center>
</body>
</html>	
<?php
 } 
?>	