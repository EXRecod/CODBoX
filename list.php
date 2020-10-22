<?php session_start();
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}

include($cpath ."/admin/inc/data.php"); 
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");

if(isLoginUser())
{
include($cpath ."/engine/template_combinations/index_list.php");
}
else
   echo '<script type="text/javascript"> window.open("admin/login.php","_self");</script>';
?>