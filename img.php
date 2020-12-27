<?php session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$url = $_SERVER["SCRIPT_NAME"];
error_reporting(E_ALL);
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
include($cpath ."/engine/template_combinations/images.php");
include('cache-bottom.php');	
?>

