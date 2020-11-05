<?php session_start();
 
error_reporting(E_ALL);  
ini_set('display_errors', 1);
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
include($cpath ."/engine/template_combinations/index_admin.php");	
}
else
	die("Permissions denied!");
?>