<?php session_start();
$templ = 1; 
error_reporting(E_ALL);  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
$cpath = str_replace("rcon/", "", $cpath);
$cpath = str_replace("\rcon", "", $cpath);
$cpath = str_replace("rcon", "", $cpath);

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
$admin_name = $byWhois;
else if(!empty($codbxuser))
$admin_name = $codbxuser;



if(!empty($_GET['rconserver'])){
	$srvlist = $_GET['rconserver'];
foreach ($multi_servers_array as $arx => $f) {
	 
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $p = strtok($fld, " ");
						   
						   $zf = explode("rcon:", $arx);
						   $rcn = $zf[1];	
						   
						   $zb = explode("port:", $arx);
						   $prt = $zb[1];
						   
						   $io = explode("ip:", $arx);
						   $ipv = $io[1];
						   
							       $server_name = $f;
								   $server_md5 = strtok($fld, " ");
							       $server_r = strtok($rcn, " ");
							       $server_p = strtok($prt, " ");
							       $server_i = strtok($ipv, " ");	
								   
			 if((strpos(trim(clean($p)), trim(clean($srvlist))) !== false)||(strpos(trim(clean($srvlist)), trim(clean($p))) !== false))
			 {
			 $server_rconpass = $server_r;
                 $server_port = $server_p;	
                   $server_ip = $server_i;
				    $server_n = $server_name;
				   //$server_port = $server_md5;
}}}


include 'servermenu.php';
if(!empty($_GET['rconserver'])){
	if($_GET['rconserver']!=111){
include("index.php"); 
}else echo '</br><center> <b class="rainbowQ">'.$menu_rcon_get.'</b></center>'; 
}	
}
else
	die("Permissions denied!");
?>