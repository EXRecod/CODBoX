<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
$urlREQUEST = $_SERVER["REQUEST_URI"];
$urlty = str_replace('/codbx/chat.php?', '', $urlREQUEST);
  
///////////////// ajax
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
echo get_local_source_db($domain.'/engine/template/chat.php?timer='.base64_encode($urlREQUEST).'&'.$urlty,'30000');   

include $cpath . "/engine/template/footer.php";
?>
