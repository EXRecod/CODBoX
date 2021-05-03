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

if (strpos($xz, '~') !== false)
{
	
  
if (!empty($_GET['rc'])) 
   $rc = $_GET['rc']; 
else
  	$rc = 0;

  if (empty($_GET['server']))
   $server = 0;
   else
	$server = $_GET['server']; 

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
		<title><?php echo 'RCON Command ',$plyr,' 💭 ' ?></title>
 <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
<script>
var newTxt="<?php echo 'RCON Command 💭 '.$plyr.' '; ?>";
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
  background-color:#141e21; /* #002600 */
  color:#2eb4e9;
  margin: 0;
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

	//$rc = iconv("utf-8", "windows-1251",$rc);	
	//$xz = iconv("utf-8", "windows-1251",$xz);	

 if((!empty($md5x)) && (!empty($rc))){
 
echo    $rco = $rc;	
	$xzo = $xz;	
	
	$rco = @iconv("utf-8", "windows-1251",$rc);	
	$xzo = @iconv("utf-8", "windows-1251",$xz);


$server_timeout = 1; $server_extra_wait = false; $server_extra_footer = false;
$connect = connectToGame();
$output = RequestToGame(''.$rc.'');



$reponse = "INSERT INTO `chat` (`servername`, `s_port`, `guid`, `nickname`, `time`, `timeh`, `text`, `st1`, `st1days`, `st2`, `st2days`, `ip`, `geo`, `z`, `t`, `x`, `c`) 
VALUES ('" . $svrnm . "', '" . $server . "', '" .$guid. "', '" . $xzo . "', '" . $datetime . "', '" . $dthx . "', 
'" . $rc . "', '0', '0', '0', '0', '" .getUserIP(). "', 'ZAG', '0', 'xl', '0', '0')";
$xz = dbSelectALL('', $reponse);
 }}}					   				   
?>
</br>
<center>
<strong style="font-family: Impact;font-size:18px;">
<?php echo colorize($svrnm); ?></br>
</strong>
</center>
</br></br></br>

<center>
<?php echo $lang['command']; ?>
   <form> 
 <input name="plyr" type="hidden" value="<?php echo $plyr; ?>"> 
 <input name="svrnm" type="hidden" value="<?php echo $svrnm; ?>">
 <input name="md5" type="hidden" value="<?php echo $server; ?>">
 <input name="gd" type="hidden" value="<?php echo $guid; ?>">
 <input style="background:#333; width:295px; height: 28px; font-family: Titillium Web; color: #ccc; font-size:15px;" type="search" name="rc">
  </form>
</center>
</body>
</html>	
<?php
} }
?>	