<?php
if (empty($lcpath)) $lcpath = dirname(__FILE__);
$lcpath = str_replace("modules/top", "", $lcpath);
$lcpath = str_replace("modules\top", "", $lcpath);
$lcpath = str_replace("modules//top", "", $lcpath);
$lcpath = str_replace("modules\\top", "", $lcpath);
$lcpath = str_replace("//", "/", $lcpath);

$urlmd = $_SERVER["REQUEST_URI"];
$templ = 1;

$urlmd5 = md5($urlmd);	

$cachetime = 300;    

$break = Explode('/', $urlmd);
$file = $break[count($break) - 1];
$cachefile = substr_replace($file ,"",-4).'_'.$languagefor.'_'.$urlmd5.'.codboxcache';
$fl = $lcpath .'/cache/';
if (!file_exists($fl))
mkdir($fl, 0777, true);
	
$cachefile = $fl.$cachefile;
// Обслуживается из файла кеша, если время запроса меньше $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    //echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
	//echo "Cached, generated ".date('H:i', filemtime($cachefile))."";
    exit;
}
ob_start(); // Запуск буфера вывода

?>