<?php
$urlmd = $_SERVER["REQUEST_URI"];

if(isLoginUser())
  $urlmd5 = sha1($urlmd).md5($urlmd);
else
  $urlmd5 = md5($urlmd);	
	
//Время хранения кеширования
if(strlen($urlmd5) < 40)
	{
if(strpos($url, "chat.php") !== false)
$cachetime = 60;     // 60 секунд
else if(strpos($url, "index.php") !== false)
$cachetime = 60;     // 60 секунд
else if((strpos($urlmd, "img.php?server=0") !== false)||(strpos($urlmd, "img.php") !== false))
$cachetime = 90;     // 90 секунд
else if(strpos($url, "img.php") !== false)
$cachetime = 60;     // 60 секунд
else if(strpos($url, "stats.php") !== false)		
$cachetime = 3600;   // 3600 секунд / 1 час
else if(strpos($url, "stats_day.php") !== false)		
$cachetime = 3600;   // 3600 секунд / 1 час
else if(strpos($url, "stats_week.php") !== false)		
$cachetime = 3600;   // 3600 секунд / 1 час
else if(strpos($url, "geo.php") !== false)		
$cachetime = 48600;  // 
else		 
$cachetime = 10600;  // 10600 секунд / 3 часa
	}
     else
	{	 
if(strpos($url, "chat.php") !== false)
$cachetime = 8;      // 8 секунд	
else if(strpos($url, "index.php") !== false)
$cachetime = 10;     // 10 секунд	      
else if(strpos($url, "list.php") !== false)
$cachetime = 30;     // 10 секунд
else if((strpos($urlmd, "img.php?server=0") !== false)||(strpos($urlmd, "img.php") !== false))
$cachetime = 10;     // 10 секунд
else if(strpos($url, "img.php") !== false)
$cachetime = 5;      // 5 секунд
else if(strpos($url, "geo.php") !== false)		
$cachetime = 48600;   // 
else if(strpos($url, "stats.php") !== false)		
$cachetime = 900;     // 900 секунд / 15 минут
else		 
$cachetime = 30;     // 30 секунд	 
}

$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = substr_replace($file ,"",-4).'_'.$urlmd5.'_'.$languagefor.'.codboxcache';
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

?>