<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");

include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

$urlREQUEST = $_SERVER["REQUEST_URI"];
$urlty = str_replace('/codbx/index?', '', $urlREQUEST);
  
///////////////// ajax   1000 / 1 секунда
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
$xcontent = get_local_source_db($domain.'/engine/template/index_servers_one.php?timer='.base64_encode($urlREQUEST).'&'.$urlty,'3600000'); 
echo $xcontent;

include $cpath . "/engine/template/index_servers_two.php";
include $cpath . "/engine/template/footer.php";
?>
