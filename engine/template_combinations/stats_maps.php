<?php
 
  $reponse = 'SELECT s_port,name,gametype,kills,deaths from maps ORDER BY kills DESC LIMIT 20';

  $xz = dbSelectALL('', $reponse);
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
  
include($cpath ."/engine/template/stats_maps.php");

include $cpath . "/engine/template/footer.php";
 
 
?>