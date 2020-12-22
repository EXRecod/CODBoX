<?php

if(empty($templ))
	die("PERMISSIONS DENIED!");

//echo '-------------------------------------';
/*
select s_kills,s_deaths,s_pg, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000
ORDER BY kdratio DESC
*/

/*
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_URL,trim($game_server_list_parser));
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($curl_handle, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$query = curl_exec($curl_handle);
curl_close($curl_handle);   
preg_match_all('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{3,5}/',$query,$a);
var_dump($a);
*/ 

if(!empty($_GET['n']))
	 $ns = $_GET['n'];

if((empty($server)) && (!empty($brofile))) {
  $serverssqLdata = 't0.s_guid="' . $brofile . '" and t2.w_skill != 1000 ORDER BY (t2.w_skill+0) DESC limit 15';
}
else if(!empty($ns)) {
  $serverssqLdata = 't0.s_player LIKE :keyword ORDER BY t0.s_player DESC limit 700';
}
  //echo $serverssqLdata ;
  
  
if (empty($skilllevels)) {
  $reponse = 'SELECT t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;

 
  if (!empty($ns)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($ns));
  else
	  $xz = dbSelectALL('', $reponse);

}

 
$nickname = '';
$ids = 1;
if(!empty($xz))
foreach ($xz as $keym => $value) {
  $ids =  30; //$value['totalpl'];
  $checker = 1 ; //$value['s_kills'];
}
$nb_pages = ceil($ids / $top_main_total);

include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

if(!empty($checker))
include $cpath . "/engine/template/stats_MAIN_brofile.php";
//if(!empty($_GET['server']))
//include $cpath . "/engine/template/stats_medals.php";

include $cpath . "/engine/template/footer.php";
?>