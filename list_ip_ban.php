<?php 
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
$templ = 1;
if((empty($_COOKIE["codbx_uexec"]))&&(!empty($_SESSION['codbxuserexec'])))
    setcookie("codbx_uexec", $_SESSION['codbxuserexec'], time()+259200);

include($cpath ."/admin/inc/data.php"); 
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");

if (!isLoginUser())
FloodDetection();

if(isLoginUser())
{
include('cache-top.php');	
include($cpath ."/engine/template_combinations/index_ip_list.php");
include('cache-bottom.php');
}
else
   echo '<script type="text/javascript"> window.open("admin/login.php","_self");</script>';
?>