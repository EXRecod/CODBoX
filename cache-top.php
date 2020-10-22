<?php
if(isLoginUser()==false)
{
//Время хранения кеширования
$cachetime = 18000;

$urlmd5 = $_SERVER["REQUEST_URI"];
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = substr_replace($file ,"",-4).'_'.md5($urlmd5).'.html';
$fl = $cpath .'/data/cache/';
if (!file_exists($fl))
mkdir($fl, 0777, true);
	
$cachefile = $fl.$cachefile;
// Обслуживается из файла кеша, если время запроса меньше $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
    exit;
}
ob_start(); // Запуск буфера вывода
}
?>