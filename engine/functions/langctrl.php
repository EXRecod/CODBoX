<?php
  
if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
 
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "ru":
        include($cpath."/engine/languages/ru_lang.php");
		$languagefor = 'ru';
        break;
   // case "es":
   //   include($cpath."/engine/languages/es_lang.php");
   //	$languagefor = 'es';
   //   break;
    case "en":
        include($cpath."/engine/languages/en_lang.php");
		$languagefor = 'en';
        break;        
    default:
        include($cpath."/engine/languages/en_lang.php");
		$languagefor = 'en';
        break;
}
}
else
{
	include($cpath."/engine/languages/en_lang.php");
	$languagefor = 'en';
}