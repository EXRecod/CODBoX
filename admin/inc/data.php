<?php
$cpath = str_replace("admin", "", $cpath);
$cpath = str_replace("admin\\", "", $cpath);
include($cpath ."/engine/functions/langctrl.php");
include $cpath .'/data/settings.php';
?>