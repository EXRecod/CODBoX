<?php
if(!empty($_GET['guid'])){
	$uid = $_GET['guid'];
	$guidn = $uid;
	
	if(!empty($_GET['statsmedal']))
$serverportx = $_GET['statsmedal'];
else if(!empty($_GET['statsmedal']))
$serverportx = $_GET['server'];	
 
 sleep(2);

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("//", "/", $cpath);

include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");
$dyhist_kd = $cpath . '/data/cache/stats_graph/maps_kd_'.$uid.'_'.$serverportx.'.js';
$dyhist_kl = $cpath . '/data/cache/stats_graph/maps_kl_'.$uid.'_'.$serverportx.'.js';

if(file_exists($dyhist_kd))
{



$cachetime = 30;     // 30 секунд

$cachefile = 'stats_playermaps_'.$serverportx.'_'.$uid.'_'.$languagefor.'.html';
$fl = $cpath .'/data/cache/iframe_data/';
if (!file_exists($fl))
mkdir($fl, 0777, true);
	
$cachefile = $fl.$cachefile;
// Обслуживается из файла кеша, если время запроса меньше $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
	//echo "Cached, generated ".date('H:i', filemtime($cachefile))."";
    exit;
}
ob_start(); // Запуск буфера вывода	
	

	
	
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "https://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>  
<script src="'.$domain.'/inc/chartkick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.js"></script> 
<style>
h1{
	padding: 3px 2px;
    display: inline-block;
    color: #5cbeff;
    font-weight: bold;float:left;
	text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px, #000 -1px 0px, #000 -1px -1px, #000 0px -1px, #000 1px -1px, #000 0 0 3px, #000 0 0 3px, #000 0 0 3px;
    margin:0px;font-size:20px;text-transform:uppercase;}
h2{
	padding: 3px 2px;
    display: inline-block;
    color: #5cbeff;
    font-weight: bold;float:left;
	text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px, #000 -1px 0px, #000 -1px -1px, #000 0px -1px, #000 1px -1px, #000 0 0 3px, #000 0 0 3px, #000 0 0 3px;
    margin:0px;font-size:16px;text-transform:uppercase;}	
</style>
</head>
<body>

 <table border = "0">
         <tr>

<td style="height: 370px;overflow:auto;width:48%;"><h2>'.$t_kills.'</h2>
<div id="pie" style="height: 350px;overflow:auto;"></div>
<script src="'.$domain.'/data/cache/stats_graph/maps_kl_'.$uid.'_'.$serverportx.'.js"></script>
</td>

<td style="height: 370px;overflow:auto;width:50%;"><h2>'.$t_kd.'</h2>
<div id="donut" style="height: 350px;overflow:auto;"></div>
<script src="'.$domain.'/data/cache/stats_graph/maps_kd_'.$uid.'_'.$serverportx.'.js"></script>
</td> 

  </tr>
</table>

</body>
</html>
';



// Кешируем содержание в файл
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Отправялем вывод в браузер


}}


?>