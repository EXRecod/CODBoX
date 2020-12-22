<?php

if(empty($templ))
	die("PERMISSIONS DENIED!");
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
  
include($cpath ."/engine/template/stats_xday.php");

include $cpath . "/engine/template/footer.php";

 
?>