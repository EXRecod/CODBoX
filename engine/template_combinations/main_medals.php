<?php
/*
select s_kills,s_deaths,s_pg, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000
ORDER BY kdratio DESC
*/
 
 
 
  $reponse = 'SELECT  
       t2.kdguidx,
       t2.kdratio,
       t3.headpercentguidx,
       t3.headpercent, 
       t4.s_killsguidx,
       t4.killstotal,
       t5.s_deathsguidx,
       t5.deathstotal,
	   t6.headsguidx,
	   t6.headstotal,
	   t7.skillguidx,
	   t7.skilltotal
  
      
FROM   db_stats_0 t0 
JOIN 
       ( 
              SELECT s_pg
              FROM   db_stats_0) t1 
 
JOIN 
       ( select s_kills as kdkills,s_deaths,s_pg as kdguidx, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000 
ORDER BY kdratio DESC LIMIT 1) t2  
 
JOIN  ( select s_kills,s_deaths,s_pg as headpercentguidx, round((s_heads) * 100.0 / s_kills, 2) AS headpercent
FROM db_stats_1 where s_kills > 1000
ORDER BY headpercent DESC LIMIT 1)  t3 

JOIN  ( select s_kills,s_deaths,s_pg as s_killsguidx, s_kills AS killstotal
FROM db_stats_1 where s_kills > 1000
ORDER BY killstotal DESC LIMIT 1)  t4  

JOIN  ( select s_kills,s_deaths,s_pg as s_deathsguidx, s_deaths AS deathstotal
FROM db_stats_1 where s_kills > 1000
ORDER BY deathstotal DESC LIMIT 1)  t5 

JOIN  ( select s_heads,s_pg as headsguidx, s_heads AS headstotal
FROM db_stats_1 where s_kills > 1000
ORDER BY headstotal DESC LIMIT 1)  t6

JOIN  ( select s_pg as skillguidx, w_skill AS skilltotal
FROM db_stats_2 where w_skill > 1000
ORDER BY skilltotal DESC LIMIT 1)  t7

LIMIT 1';

  //ZAPROS NR - 2
  if (!empty($nicknameSearch)) $xz = dbSelectALLbyKey('', $reponse, $nicknameSearch);
  else $xz = dbSelectALL('', $reponse);
 
 
 

$nickname = '';

foreach ($xz as $keym => $value) {
 ECHO '///////////////////////// ',$checker = $value['kdratio'];
}
$nb_pages = ceil($ids / $top_main_total);

 
?>