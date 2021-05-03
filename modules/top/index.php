<?php
$xcpath = dirname(__FILE__);
$xcpath = str_replace("/top", "", $xcpath);
$xcpath = str_replace("\top", "", $xcpath);
$xcpath = str_replace("//top", "", $xcpath);
$xcpath = str_replace("\\top", "", $xcpath);
$xcpath = str_replace("//", "/", $xcpath);



ini_set('display_errors', 1);
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
<body>
';

$n7 = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));	
$n7 = $n7 * 99; 
 
 
 if($n7 < 50)
	 $n7 = 99;
 
 
 
 /*
   echo '
 <div class="scene">
  <div class="cube">
    <div class="cube__face cube__face--front">Skill</div>
    <div class="cube__face cube__face--back">HeadShots</div>
    <div class="cube__face cube__face--right">Kills</div>
    <div class="cube__face cube__face--left">left</div>
    <div class="cube__face cube__face--top">top</div>
    <div class="cube__face cube__face--bottom">bottom</div>
  </div>
</div>
<p class="radio-group">
  <label>
    <input type="radio" name="rotate-cube-side" value="front" checked /> Skill
  </label>
  <label>
    <input type="radio" name="rotate-cube-side" value="right" /> Kills
  </label>
  <label>
    <input type="radio" name="rotate-cube-side" value="back" /> HeadShots
  </label>
  <label>
    <input type="radio" name="rotate-cube-side" value="left" /> left
  </label>
  <label>
    <input type="radio" name="rotate-cube-side" value="top" /> top
  </label>
  <label>
    <input type="radio" name="rotate-cube-side" value="bottom" /> bottom
  </label>
</p>
<script type="text/javascript" src="cubemenu.js"></script>

';
 */
 
 


//echo '<script src="' . $domain . '/inc/spoiler.js"></script>';

echo '<div class="content_block">






<table class="xcenter">
  <tr>

<th>
<div class="xouter">
  <div class="xinner"><b class="zzz">'.$t_top.'</b></div>
</div>
</th>

<th>
<p class="radio-group">
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="back" checked /> <b class="zzx">'.$Elo_rating.'</b>
  </label>
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="bottom" />  <b class="zzx">'.$t_kills.' '.$t_series.'</b>
  </label>  
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="front" onclick="play()"/> <b class="zzx">'.$t_kills.' '.$t_heads.'</b>
  </label>
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="right" /> <b class="zzx">'.$t_kills.'</b>
  </label>
  
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="top" /> <b class="zzx">'.$t_knife.'</b>
  </label> 
  
  <label class="radiox">
    <input type="radio" name="rotate-cube-side" value="left" /> <b class="zzx">'.$x_medals['kdratio'].'</b>
  </label>

</p> 

</th>
<th>

 <div class="scene">
  <div class="cube">';
echo '<div class="cube__face cube__face--back">';  
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
  
//$serverssqLdata = 't0.s_guid="' . $brofile . '" and t2.w_skill != 1000 ORDER BY (t2.w_skill+0) DESC limit 1';
$serverssqLdata = 't2.w_skill != 1000 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (t2.w_skill+0) DESC limit 10';

  $reponse = 'SELECT t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;

$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
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
	
echo '
<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////










////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
echo '<div class="cube__face cube__face--right">';  
//$serverssqLdata = 't0.s_guid="' . $brofile . '" and t2.w_skill != 1000 ORDER BY (t2.w_skill+0) DESC limit 1';
$serverssqLdata = 't1.s_kills != 1000 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (t1.s_kills+0) DESC limit 10';

  $reponse = 'SELECT t1.s_kills,t1.s_pg, t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

JOIN ( SELECT s_pg, s_kills FROM db_stats_1) t1 ON t1.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;




$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
		$skill = $dannye['s_kills'];
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
	
echo '
<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
echo '<div class="cube__face cube__face--front">';  
$serverssqLdata = 't1.s_kills > 999 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (t1.s_heads+0) DESC limit 10';

  $reponse = 'SELECT t1.s_heads,t1.s_kills,t1.s_pg, t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

JOIN ( SELECT s_pg, s_kills, s_heads FROM db_stats_1) t1 ON t1.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;




$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
		$skill = $dannye['s_heads'];
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
	
echo '	
<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////










////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
echo '<div class="cube__face cube__face--left">';  
$serverssqLdata = 't1.s_kills > 999 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (kdratio+0) DESC limit 10';

  $reponse = 'SELECT Round(s_kills/s_deaths, 2) AS kdratio,t1.s_deaths, t1.s_heads,t1.s_kills,t1.s_pg, t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

JOIN ( SELECT s_pg, s_kills, s_heads, s_deaths FROM db_stats_1) t1 ON t1.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;




$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
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
	
echo '	
<div style="color:#fff;padding:1 1px;font-size:11px;line-height:18px;width:190px;text-align:left;display: inline;position: absolute;"> ' . $z . '

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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////








////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
echo '<div class="cube__face cube__face--top">';  
$serverssqLdata = 't1.s_kills > 100 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (t3.s_melle+0) DESC limit 10';

  $reponse = 'SELECT t3.s_melle, t3.s_pg, t1.s_kills,t1.s_pg, t0.s_pg, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg 

JOIN ( SELECT s_pg, s_kills, s_deaths FROM db_stats_1) t1 ON t1.s_pg = t2.s_pg 

JOIN ( SELECT mod_melee as s_melle, s_pg FROM db_weapons_8) t3 ON t3.s_pg = t2.s_pg 

WHERE ' . $serverssqLdata;



$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
		$skill = $dannye['s_melle'];
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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////  
echo '<div class="cube__face cube__face--bottom">';  
$serverssqLdata = 't2.n_kills > 0 and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime ORDER BY (t2.n_kills+0) DESC limit 10';

  $reponse = 'SELECT t0.s_pg, t2.n_kills, t0.s_guid, t0.s_port, t0.servername, t0.s_player, t0.s_time, 
  t0.s_lasttime, t2.s_pg, t2.w_place, t2.w_skill, t2.w_ratio, t2.w_geo, t2.w_prestige, t2.w_fps, 
  t2.w_ip, t2.w_ping, t2.n_kills, t2.n_deaths, t2.n_heads, t2.n_kills_min, t2.n_deaths_min FROM db_stats_0 t0 
JOIN ( SELECT s_pg, w_place, w_skill, w_ratio, w_geo, w_prestige, w_fps, w_ip, w_ping, n_kills, n_deaths, 
n_heads, n_kills_min, n_deaths_min FROM db_stats_2) t2 ON t0.s_pg = t2.s_pg

WHERE ' . $serverssqLdata;




$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_guid'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
		$skill = $dannye['n_kills'];
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
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


echo '
  </div>
</div></div>
</th>
 
<script type="text/javascript" src="'.$domain.'/inc/cubemenu.js"></script>
 ';
 



////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



echo '<th class="visibilityinfocube">

<div id="box-scene" class="box-scene draggable">
    <div id="box" class="box">';
        
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo '<div id="front_face" class="frontF face"> <b class="boxtexts_frontF">'.$x_medals['kdratio'].' '.$t_top_week.'</b>';

$reponse = 'SELECT Round(B.kills/B.deaths, 2) AS kdratio, A.s_pg, A.s_guid, A.s_time, A.servername,A.s_player,A.s_port,
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
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
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

$reponse = 'SELECT 
SUM(B.kills) AS score,
   COUNT(B.pg) AS COUNT,
A.s_pg, A.s_guid, A.s_time, A.servername,A.s_player,A.s_port,
B.pg,B.skill,B.kills,B.deaths,B.heads,B.date,C.w_ip,C.w_geo  
from db_stats_0  A
LEFT JOIN db_stats_history B 
ON A.s_pg = B.pg
LEFT JOIN db_stats_2 C 
ON B.pg = C.s_pg
WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= B.date and B.kills >= 100
group by s_guid ORDER BY score DESC LIMIT 10';


$xz = dbSelectALL('', $reponse);

$geoinff = '';




$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$guid = $dannye['s_pg'];  $sguid = $dannye['s_pg'];
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
		$skill = $dannye['score'];
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

$reponse = 'SELECT Round(B.kills/B.deaths, 2) AS kdratio, A.s_pg, A.s_guid, A.s_time, A.servername,A.s_player,A.s_port,
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
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
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
		$nickname = $dannye['s_player'];  if(strlen($nickname) > 14){ $nickname = substr($nickname, 0, 14);$nickname = $nickname."..";}
		$server = $dannye['servername'];
		 
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
</div>


<script type="text/javascript" src="'.$domain.'/inc/cubemenu2.js"></script>


</th>


  </tr>
</table> 


 


';


echo '
    <script>
      function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }
    </script>
	
  <audio id="audio" src="/codbx/modules/top/sounds/head.mp3"></audio>	


</br></br>';

	// echo $reponse;

include($xcpath .'/cache-bottom.php');
?>
 