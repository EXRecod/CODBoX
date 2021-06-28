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

include_once($cpath ."/engine/functions/main.php");

if (!isLoginUser())
FloodDetection();

$domainNull = '';

 
 $requestUrl = $_SERVER["REQUEST_URI"];
 
include_once('cache-top.php');

if(strpos($requestUrl, $domainNull.'/index.php') !== false){
  include_once($cpath ."/engine/template_combinations/index_page.php");
}
elseif(strpos($requestUrl, $domainNull.'/help.php') !== false){	
  include_once($cpath ."/engine/template_combinations/help_page.php");
}
elseif(strpos($requestUrl, $domainNull.'/img.php') !== false){		
  include_once($cpath ."/engine/template_combinations/images.php");
}
elseif(strpos($requestUrl, $domainNull.'/geo.php') !== false){	

  include_once($cpath ."/engine/template_combinations/geo.php");
}
elseif(strpos($requestUrl, $domainNull.'/chat.php') !== false){	

  include_once($cpath ."/engine/template_combinations/chat_page.php");	
}
elseif(strpos($requestUrl, $domainNull.'/stats_week.php') !== false){	

  include_once($cpath ."/engine/template_combinations/st_week.php");
}
elseif(strpos($requestUrl, $domainNull.'/stats_medals.php') !== false){	

  include_once($cpath ."/engine/template_combinations/main_medals.php");
}
elseif(strpos($requestUrl, $domainNull.'/map.php') !== false){	

  include_once($cpath ."/engine/template_combinations/geo.php");
}
elseif(strpos($requestUrl, $domainNull.'/stats_maps.php') !== false){	

include_once($cpath ."/engine/template_combinations/stats_maps.php");
}
elseif(strpos($requestUrl, $domainNull.'/stats_day.php') !== false){	

 include_once($cpath ."/engine/template_combinations/st_day.php");
}
elseif(strpos($requestUrl, $domainNull.'/stats.php') !== false){	

   if(!empty($profile))
include_once($cpath ."/engine/template_combinations/profile.php");
 else if(!empty($brofile))
include_once($cpath ."/engine/template_combinations/main_top_brofile.php");
 else if(!empty($_GET['n']))
 {
include_once($cpath ."/engine/template_combinations/main_top_brofile.php");
 }  
else
include_once($cpath ."/engine/template_combinations/main_top.php");
}


elseif(strpos($requestUrl, $domainNull.'/list.php') !== false){
	
$templ = 1;
if((empty($_COOKIE["codbx_uexec"]))&&(!empty($_SESSION['codbxuserexec'])))
    setcookie("codbx_uexec", $_SESSION['codbxuserexec'], time()+259200);

include_once($cpath ."/admin/inc/data.php"); 
	
 if(isLoginUser())
{
include_once($cpath ."/engine/template_combinations/index_list.php");
}
else
   echo '<script type="text/javascript"> window.open("admin/login.php","_self");</script>';
}

elseif(strpos($requestUrl, $domainNull.'/list_ip_ban.php') !== false){	
	$templ = 1;
if((empty($_COOKIE["codbx_uexec"]))&&(!empty($_SESSION['codbxuserexec'])))
    setcookie("codbx_uexec", $_SESSION['codbxuserexec'], time()+259200);

include_once($cpath ."/admin/inc/data.php"); 
if(isLoginUser())
{
include_once('cache-top.php');	
include_once($cpath ."/engine/template_combinations/index_ip_list.php");
include_once('cache-bottom.php');
}
}

else
{
 //   saveVisits('MAIN VISIT');
 include_once($cpath ."/engine/template_combinations/index_page.php");
}



include_once('cache-bottom.php');



	
?>