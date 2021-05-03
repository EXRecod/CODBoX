<?php  
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

 if(!empty($profile))
include($cpath ."/engine/template_combinations/profile.php");
 else if(!empty($brofile))
include($cpath ."/engine/template_combinations/main_top_brofile.php");
 else if(!empty($_GET['n']))
 {
include($cpath ."/engine/template_combinations/main_top_brofile.php");
 } 
else
include($cpath ."/engine/template_combinations/main_top.php");

//include($cpath ."/engine/template_combinations/main_medals.php");



 include('cache-bottom.php'); 	
?>