<?php
$xcpath = dirname(__FILE__);
$xcpath = str_replace("/top", "", $xcpath);
$xcpath = str_replace("\top", "", $xcpath);
$xcpath = str_replace("//top", "", $xcpath);
$xcpath = str_replace("\\top", "", $xcpath);
$xcpath = str_replace("//", "/", $xcpath);



ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$templ = 1;

/////////////////////////////////////////////////////
if (empty($cpath)) $cpath = dirname(__FILE__);
$cpath = str_replace("modules/top", "", $cpath);
$cpath = str_replace("modules\top", "", $cpath);
$cpath = str_replace("modules//top", "", $cpath);
$cpath = str_replace("modules\\top", "", $cpath);
$cpath = str_replace("//", "/", $cpath);
/////////////////////////////////////////////////////
include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

if (!isLoginUser())
FloodDetection();

include($xcpath .'/cache-top.php');	
 
 require $cpath.'/engine/geoip_bases/class.iptolocation.php';
 
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "https://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>'.$nickname.' '.$domainname.' | COD Stats </title>
<link rel="stylesheet" href="'.$domain.'/inc/style.css">
<script type="text/javascript" src="'.$domain.'/inc/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/jquery.js"></script> 

<link rel="stylesheet" href="'.$domain.'/inc/cubestyle.css">

</head>
<body>';

 
 
 
$n7 = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));	
$n7 = $n7 * 99; 
 
 
 if($n7 < 50)
	 $n7 = 99;
 

echo '
 

<table class="xcenter" style="display: flex;justify-content: center;margin:0 auto;">
  <tr>';
  
  
echo '<th style="display: flex;justify-content: center;margin:0 auto;">

<div id="box-scene" class="box-scene draggable">
    <div id="box" class="box">';
        
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo '<div id="front_face" class="frontF face"> <b class="boxtexts_frontF">'.$x_medals['kdratio'].' '.$t_top_week.'</b>';

$serverssqLdata = 't0.s_kills > '.$n7.' and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (kdratio+0) DESC limit 10';

$reponse = 'SELECT Round(B.kills/B.deaths, 2) AS kdratio, A.s_pg, A.s_guid, A.s_time, A.s_lasttime, A.servername,A.s_player,A.s_port,
B.pg,B.skill,B.kills,B.deaths,B.heads,B.date,C.w_ip,C.w_geo   
from db_stats_0  A
LEFT JOIN db_stats_history B 
ON A.s_pg = B.pg
LEFT JOIN db_stats_2 C 
ON B.pg = C.s_pg
WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= B.date and B.kills >= 100 GROUP BY s_guid
ORDER BY kdratio DESC LIMIT 10';

$xz = dbSelectALL('', $reponse);

$geoinff = '';
 
$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_pg'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."… ";}
		$server = $dannye['servername'];
		$lasttime = $dannye['s_lasttime'];
		$skill = $dannye['kdratio'];
		$geo = $dannye['w_geo'];
		$time = $dannye['s_time'];
        $xplayerip = $dannye['w_ip'];
	
$xplayerip = updateIpAdressData($xplayerip, $guid, $sguid);				
$flag = returnGeoData($xplayerip);
		
echo '<div style="width:auto;overflow:auto;padding:1px;background: #000000;
margin:1px;font-size:10px;cursor:pointer;cursor:hand;" id="match' . md5($time . $i) . '" onclick="show_match(\'' . md5($time . $i) . '\')">

<div class="wrapper" style="width:100%;flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; flex-wrap: wrap;height:1px;" class="wrapper">
	
';	

if($i < 10)
$z = '&nbsp;&nbsp;'.$i;
else $z = $i;	 
	
echo '<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

<div style="display: inline; width:190px;padding:1 2px;">
<div style="display: inline;padding:1 2px;">
<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="18" height="10"></div>
 <a href="'.$domain.'/stats.php?id='.$sguid.'" style="color:#fff;" target="_blank">'.$skill.' | '.$nickname.'</a> 
</div></div>';

echo '</div>';

echo '</div><div style="line-height:18px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div></div>
 ';
}
echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	

        
	
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo '<div id="front_face" class="sideF face"> <b class="boxtexts_sideF">'.$x_medals['medal_pro_killer'].' '.$t_top_week.'</b>';


$reponse = 'SELECT A.s_pg, A.s_guid, A.s_time, A.s_lasttime, A.servername,A.s_player,A.s_port,
B.pg,B.skill,B.kills,B.deaths,B.heads,B.date,C.w_ip,C.w_geo   
from db_stats_0  A
LEFT JOIN db_stats_history B 
ON A.s_pg = B.pg
LEFT JOIN db_stats_2 C 
ON B.pg = C.s_pg
WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= B.date and B.kills >= 100 GROUP BY s_guid
ORDER BY kills DESC LIMIT 10';

$xz = dbSelectALL('', $reponse);

$geoinff = '';

 

$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_pg'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."… ";}
		$server = $dannye['servername'];
		$lasttime = $dannye['s_lasttime'];
		$skill = $dannye['kills'];
		$geo = $dannye['w_geo'];
		$time = $dannye['s_time'];
        $xplayerip = $dannye['w_ip'];
$xplayerip = updateIpAdressData($xplayerip, $guid, $sguid);				
$flag = returnGeoData($xplayerip);
echo '<div style="width:auto;overflow:auto;padding:1px;background: #000000;
margin:1px;font-size:10px;cursor:pointer;cursor:hand;" id="match' . md5($time . $i) . '" onclick="show_match(\'' . md5($time . $i) . '\')">

<div class="wrapper" style="width:100%;flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; flex-wrap: wrap;height:1px;" class="wrapper">
	
';	

if($i < 10)
$z = '&nbsp;&nbsp;'.$i;
else $z = $i;	 
	
echo '<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

<div style="display: inline; width:190px;padding:1 2px;">
<div style="display: inline;padding:1 2px;">
<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="18" height="10"></div>
 <a href="'.$domain.'/stats.php?id='.$sguid.'" style="color:#fff;" target="_blank">'.$skill.' | '.$nickname.'</a> 
</div></div>';

echo '</div>';

echo '</div><div style="line-height:18px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div></div>
 ';
}
echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////	
	
	
 
	
	
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo '<div id="back_face" class="backF face"> <b class="boxtexts_backF">'.$x_medals['kdratio'].' '.$t_top_today.'</b>';

$reponse = 'SELECT Round(B.kills/B.deaths, 2) AS kdratio, A.s_pg, A.s_guid, A.s_time, A.s_lasttime, A.servername,A.s_player,A.s_port,
B.pg,B.skill,B.kills,B.deaths,B.heads,B.date,C.w_ip,C.w_geo  
from db_stats_0  A
LEFT JOIN db_stats_history B 
ON A.s_pg = B.pg
LEFT JOIN db_stats_2 C 
ON B.pg = C.s_pg
WHERE DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= B.date and B.kills >= 100 GROUP BY s_guid
ORDER BY kdratio DESC LIMIT 10';


$xz = dbSelectALL('', $reponse);

$geoinff = '';
 

$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_pg'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."… ";}
		$server = $dannye['servername'];
		$lasttime = $dannye['s_lasttime'];
		$skill = $dannye['kdratio'];
		$geo = $dannye['w_geo'];
		$time = $dannye['s_time'];
        $xplayerip = $dannye['w_ip'];
		
$xplayerip = updateIpAdressData($xplayerip, $guid, $sguid);				
$flag = returnGeoData($xplayerip);
		
echo '<div style="width:auto;overflow:auto;padding:1px;background: #000000;
margin:1px;font-size:10px;cursor:pointer;cursor:hand;" id="match' . md5($time . $i) . '" onclick="show_match(\'' . md5($time . $i) . '\')">

<div class="wrapper" style="width:100%;flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; flex-wrap: wrap;height:1px;" class="wrapper">
	
';	

if($i < 10)
$z = '&nbsp;&nbsp;'.$i;
else $z = $i;	 
	
echo '<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

<div style="display: inline; width:190px;padding:1 2px;">
<div style="display: inline;padding:1 2px;">
<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="18" height="10"></div>
 <a href="'.$domain.'/stats.php?id='.$sguid.'" style="color:#fff;" target="_blank">'.$skill.' | '.$nickname.'</a> 
</div></div>';

echo '</div>';

echo '</div><div style="line-height:18px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div></div>
 ';
}
if($i == 0)
	echo '<div style="height:auto;
margin-left:auto;
margin-right:auto;
float:center;display: table; margin: 0 auto; text-align: center;"></br></br></br></br>'.$t_info.': '.$menu_activity.' '.$t_kills.'(99+)</div>';


echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////	
	
	
	
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo ' <div id="back_face" class="lefftF face"> <b class="boxtexts_lefftF">'.$t_player_place_skill.' '.$t_top_week.'</b>';

$serverssqLdata = "t0.s_lasttime LIKE '%".date('Y-m-d')."%'  ORDER BY (t2.w_skill+0) DESC limit 10";

  $reponse = 'SELECT t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;

//$xz = dbSelectALLbyKey('', $reponse, date('Y-m-d'));
$xz = dbSelectALL('', $reponse);

$geoinff = '';
 

$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_pg'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."… ";}
		$server = $dannye['servername'];
		$lasttime = $dannye['s_lasttime'];
		$skill = $dannye['w_skill'];
		$geo = $dannye['w_geo'];
		$time = $dannye['s_time'];
        $xplayerip = $dannye['w_ip'];
		
		
$xplayerip = updateIpAdressData($xplayerip, $guid, $sguid);				
$flag = returnGeoData($xplayerip);

echo '<div style="width:auto;overflow:auto;padding:1px;background: #000000;
margin:1px;font-size:10px;cursor:pointer;cursor:hand;" id="match' . md5($time . $i) . '" onclick="show_match(\'' . md5($time . $i) . '\')">

<div class="wrapper" style="width:100%;flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; flex-wrap: wrap;height:1px;" class="wrapper">
	
';	

if($i < 10)
$z = '&nbsp;&nbsp;'.$i;
else $z = $i;	 
	
echo '<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

<div style="display: inline; width:190px;padding:1 2px;">
<div style="display: inline;padding:1 2px;">
<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="18" height="10"></div>
 <a href="'.$domain.'/stats.php?id='.$sguid.'" style="color:#fff;" target="_blank">'.$skill.' | '.$nickname.'</a> 
</div></div>';

echo '</div>';

echo '</div><div style="line-height:18px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div></div>
 ';
}
echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////		
 
		
		
		
		
		
echo'</div>



<script type="text/javascript" src="'.$domain.'/inc/cubemenu2.js"></script>


</th>


  </tr>
</table> 


 


';





echo '
</br></br>';

	// echo $reponse;

include($xcpath .'/cache-bottom.php');
?>