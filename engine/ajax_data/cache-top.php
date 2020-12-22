<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$url = $_SERVER["SCRIPT_NAME"];

if (empty($cpathr)) { 
  $cpathr = dirname(__FILE__);
}
 
if(empty($guidn)){
if(!empty($guid)){
	
if(empty($url))
$url = $guid;	
	
$guidn = $guid;
}}
 
if(!empty($chattimer)) 
  {
	$count = 1;
    $urlmd5 = $chattimer;
    $urlmd5 = preg_replace('/[0-9]{6,12}/', '', $urlmd5);
	$urlmd5 = md5($urlmd5);
    $cachetime = 10; 
 }
else if(!empty($_GET['count']))
 {
	$count = $_GET['count'];
	$urlmd5 = md5($guidn);	
    $cachetime = 604800; 
 }
else 
{ 
$cachetime = 3600; $count = 100; $urlmd5 = md5($guidn);
}

$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = substr_replace($file ,"",-4).'_'.$urlmd5.'.html';
$fl = $cpathr .'/data/cache/';
$cachefile = $fl.$cachefile;


if (!file_exists($fl))
mkdir($fl, 0777, true);



// Обслуживается из файла кеша, если время запроса меньше $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
	//echo "Cached, generated ".date('H:i', filemtime($cachefile))."";
    exit;
}
/*else if (!file_exists($cachefile) && $count < 20) {
    exit;
}
*/
ob_start(); // Запуск буфера вывода

?>