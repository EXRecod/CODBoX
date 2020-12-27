<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");
/*
select s_kills,s_deaths,s_pg, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000
ORDER BY kdratio DESC
*/
 

 
 
  $reponse = 'SELECT 
       t1.s_guid,
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
FROM db_weapons_2 ORDER BY ak47_mp DESC LIMIT 1)  t8 

LIMIT 1';


$xz = dbSelectALL('', $reponse);


foreach ($xz as $keym => $value) {
 $chk['skill'][$value['skill']] = $value['skillguidx'] ;
 $chk['headpercent'][$value['headpercent']] = $value['headpercentguidx'];
 $chk['medal_pro_killer'][$value['medal_pro_killer']]  = $value['s_killsguidx'];
 $chk['medal_pro_headshot'][$value['medal_pro_headshot']] = $value['headsguidx']; 
 $chk['medal_or_ak'][$value['medal_or_ak']] = $value['medalakgui'];
 $chk['kdratio'][$value['kdratio']] = $value['kdratio'];  
}

include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

include $cpath ."/engine/template/stats_medals.php";

include $cpath . "/engine/template/footer.php";
 
?>