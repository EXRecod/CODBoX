<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");
createscreenDB();

include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

$bannedscrx =  '';
if(!empty($_GET['bannedscr']))
{
	
	$bannedscrx = $_GET['bannedscr'];
    $sbff = 'screenshots_banned.rcm';
}
else
	$sbff = 'screenshots.rcm';
  
include $cpath . "/engine/template/index_images.php";

include $cpath . "/engine/template/footer.php";
?>
