<?php
include("url_parser_db_function.php");
 if(!empty($_GET['ip'])){
if(!empty($_GET['guid'])){ 
$ip = $_GET['ip']; $guid = $_GET['guid'];

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

include($cpath. '/cache-top.php');

// URL BANNED DB PARSER
$url_sourcebans_db[] = "http://www.cyberpub.ru/sourcebans/index.php?p=banlist&advSearch=".$guid."&advType=name";
$url_sourcebans_db[] = "https://cod4narod.ru/sourcebans/index.php?p=banlist&advSearch=".$ip."&advType=ip";

sleep (rand(1,2));
echo get_url_sourcebans_db($url_sourcebans_db,$guid,$ip);

include($cpath. '/cache-bottom.php');
 } } 
?>