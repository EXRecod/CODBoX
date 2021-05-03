<?php  
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
$templ = 1;
error_reporting(E_ALL);

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

if (!isLoginUser())
FloodDetection();

include('cache-top.php');
include($cpath ."/engine/template_combinations/help_page.php");
include('cache-bottom.php');	
?>