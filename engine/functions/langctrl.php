<?php
  
if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
 
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "ru":
        //echo "PAGE RU";
        include($cpath."/engine/languages/ru_lang.php");
        break;
    //case "it":
        //echo "PAGE IT";
    //    include($cpath."languages/it_lang.php");
    //    break;
    case "en":
        //echo "PAGE EN";
        include($cpath."/engine/languages/en_lang.php");
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        include($cpath."/engine/languages/en_lang.php");
        break;
}
}
else
{
	include($cpath."/engine/languages/en_lang.php");
}