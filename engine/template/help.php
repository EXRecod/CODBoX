<?php
if(!empty($_GET['timer'])){
if (strpos($_SERVER["HTTP_REFERER"], 'help.php') !== false)
{	
$guidn  = $_GET['timer'];
$chattimer =  base64_decode($guidn);
$cpath = dirname(__FILE__);
$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("users", "", $cpath);
$cpath = str_replace('\\\\', "/", $cpath);
$cpath = str_replace("//", "/", $cpath);
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");
include($cpath. '/engine/ajax_data/cache-top.php');

sleep(1);

echo '<div style="height:auto;overflow:auto;"><div style="height:auto;overflow:auto;padding:5 10px;" class="content_block">';
echo '<h1>HELP</h1>';
echo '<div style="overflow:auto;width:85%;padding:5 1px;"></div>';
echo '</div>'; 
echo '<center>'; 
echo '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="100%" type="text/html" src="https://www.youtube.com/embed/DKQ_L65ZgTk?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtubeembedcode.com"></iframe>'; 
echo '</center>';
  echo '</div>'; 
include($cpath. '/engine/ajax_data/cache-bottom.php');
}
}
?>