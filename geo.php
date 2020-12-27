<?php session_start(); 
error_reporting(E_ALL);  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');
$templ = 1;
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

if (!isLoginUser())
FloodDetection();

include('cache-top.php');
 
include($cpath ."/engine/template_combinations/geo.php");
 
include('cache-bottom.php'); 	
?>