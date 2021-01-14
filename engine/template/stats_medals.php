<?php
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
 if(empty($templ))
	die("PERMISSIONS DENIED!");
 
	
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("//", "/", $cpath);

//include($cpath. '/engine/ajax_data/cache-top.php');
sleep(1);
include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 
 
 
///////////////////////////////////////////
  $reponse = 'SELECT 
       t0.s_lasttime,
       t1.s_guid,
       t0.s_pg,
	   t1.s_pg,
       t2.kdguidx,
       t2.kdratio,
       t3.headpercentguidx,
       t3.headpercent, 
       t4.s_killsguidx,
       t4.medal_pro_killer,
       t5.s_deathsguidx,
       t5.deathstotal,
	   t6.headsguidx,
	   t6.medal_pro_headshot,
	   t7.skillguidx,
	   t7.skill,
	   t8.medal_or_ak, 
	   t8.medal_or_ak, 
	   t8.medalakgui
  
      
FROM   db_stats_0 t0 
JOIN 
       ( 
              SELECT s_pg,s_guid 
              FROM   db_stats_0) t1 
 
JOIN 
       ( select s_kills as kdkills,s_deaths,s_pg as kdguidx, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills >= 1000 
ORDER BY kdratio DESC LIMIT 1) t2

 
JOIN  ( select s_kills,s_deaths,s_pg as headpercentguidx, round((s_heads) * 100.0 / s_kills, 2) AS headpercent
FROM db_stats_1 where s_kills >= 1000
ORDER BY headpercent DESC LIMIT 1)  t3 


JOIN  ( select s_kills,s_deaths,s_pg as s_killsguidx, s_kills AS medal_pro_killer
FROM db_stats_1 where s_kills >= 1000
ORDER BY medal_pro_killer DESC LIMIT 1)  t4  

JOIN  ( select s_kills,s_deaths,s_pg as s_deathsguidx, s_deaths AS deathstotal
FROM db_stats_1 where s_kills >= 1000
ORDER BY deathstotal DESC LIMIT 1)  t5 

JOIN  ( select s_heads,s_pg as headsguidx, s_heads AS medal_pro_headshot
FROM db_stats_1 where s_kills >= 1000
ORDER BY medal_pro_headshot DESC LIMIT 1)  t6

JOIN  ( select s_pg as skillguidx, w_skill AS skill
FROM db_stats_2 where w_skill >= 1000
ORDER BY skill DESC LIMIT 1)  t7


JOIN  ( select ak47_mp as medal_or_ak,s_pg as medalakgui
FROM db_weapons_2 ORDER BY ak47_mp DESC LIMIT 1)  t8 ON 
 t0.s_pg = t8.medalakgui where DATE_SUB(CURDATE(),INTERVAL '.($StatsDaysLimit*2).' DAY) <= t0.s_lasttime LIMIT 1';
	
	

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
$xz = dbSelectALL('', $reponse);

foreach ($xz as $keym => $value) {
 $chk['skill'][$value['skill']] = $value['skillguidx'] ;
 $chk['headpercent'][$value['headpercent']] = $value['headpercentguidx'];
 $chk['medal_pro_killer'][$value['medal_pro_killer']]  = $value['s_killsguidx'];
 $chk['medal_pro_headshot'][$value['medal_pro_headshot']] = $value['headsguidx']; 
 $chk['medal_or_ak'][$value['medal_or_ak']] = $value['medalakgui'];
 $chk['kdratio'][$value['kdratio']] = $value['kdratio'];  
}


echo '<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #08e5c8, 0 0 18px #08e5c8, 0 0 40px #08e5c8, 0 0 65px #08e5c8;">
&#9776;&#9776;&#9776;&#9776;&#9776;&#9776;&#9776;&nbsp;&nbsp;&nbsp;'.$menu_medals.'&nbsp;&nbsp;&nbsp;&#9776;&#9776;&#9776;&#9776;&#9776;&#9776;&#9776;</b></div> 

<div style="    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    flex-flow: row wrap;">';
//echo $cnts =  count($xz);
 

foreach ($chk as $keym => $v) {
foreach ($v as $ke => $uid) {	
	
  
  
$r = "SELECT s_pg,s_guid,s_player,servername FROM db_stats_0 where s_pg='$uid' LIMIT 1";
$vi = dbSelectALL('', $r);
 foreach ($vi as $k => $via) {
$guid =  $via['s_guid'];
$player =  $via['s_player'];
$server =  $via['servername'];
 } 
  
  if(empty($player))
	  $player = '?';

echo '<div style="padding:10px;margin:5px;width:170px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
	 
<div style="font-size:16px;padding:10px;background:#00000022;border:1px solid #090909;text-align:center;">
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 10px #fff, 0 0 4px #FFF, 0 0 3px #08e5c8, 0 0 6px #08e5c8, 0 0 4px #08e5c8, 0 0 3px #08e5c8;">
'.$x_medals[$keym].'</b></div>


<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

 

if(file_exists($cpath .'/inc/images/medals/'.$keym.'.png'))
echo '<img src="' . $domain . '/inc/images/medals/' . $keym . '.png" style="width:100%;max-width:150px;display: block;margin-left: auto;margin-right: auto;" >';
    
	
	
 echo '
	</div></div></div>

  
<div style="overflow:auto;">
 
<div style="font-size:14px;width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;">
<center><a href="' . $domain . '/stats.php?brofile=' . $guid . '&s=' . urlencode($server) . '" style="color:#fff; text-shadow:-1px -1px 0 #000,-1px 1px 0 #000,1px -1px 0 #000,1px 1px 0 #000;" target="_blank">'.$player.'</a></center>
</div>
	
</div>
 
 
	
<div style="font-size: 11px;    border-top: 1px solid #222;margin-top:5px;padding-top:5px;
    color: #fff;margin:10px;
    line-height: 16px;">
	
<div class="weap_stats" style="text-align:left;">'.$stats_info_value.' </br> '.$ke.'
 </div>
	
 <div class="weap_stats" style="text-align:right;">Guid </br> '.$guid.'
 </div>
	

	
	</div>
	
</div>

';


}}
 echo '</div></div></div>';
?>