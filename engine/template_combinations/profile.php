<?php

if(empty($templ))
	die("PERMISSIONS DENIED!");


//if(!isLoginUser())
//die('</br></br></br><h1><center>ТУТ РЕМОНТ!</center><h1>');
 

$maxforanimate = 35;
 
$guidn = $profile;
if (empty($skilllevels)) {




	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
$reponse[] = 'SELECT s_pg, 
                    s_kills, 
                    s_deaths, 
                    s_heads, 
                    Round(( s_heads ) * 100.0 / s_kills, 2) AS headPercent, 
                    s_suicids, 
                    s_fall, 
                    s_melle, 
                    s_dmg 
             FROM   db_stats_1 WHERE  db_stats_1.s_kills >= 1 and db_stats_1.s_deaths >= 1 and db_stats_1.s_pg = "' . $guidn . '" LIMIT 1';
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
$reponse[] = 'SELECT t0.s_pg, 
       t0.s_guid, 	    
       t5.kdratiosort, 
       t0.s_port,  
       t0.servername, 
       t0.s_player, 
       t0.s_time, 
       t0.s_lasttime, 
       t2.s_pg, 
       t2.w_place, 
       t2.w_skill, 
       t2.kdratio,
       t2.w_geo, 
       t2.w_prestige, 
       t2.w_fps, 
       t2.w_ip, 
       t2.w_ping, 
       t2.n_kills, 
       t2.n_deaths, 
       t2.n_heads, 
       t2.n_kills_min, 
       t2.n_deaths_min
FROM   db_stats_0 t0 
      
 join   
 (   
 SELECT count(*) AS kdratiosort 
FROM db_stats_2 k CROSS JOIN
     (SELECT w_ratio FROM db_stats_2 WHERE s_pg = "' . $guidn . '" LIMIT 1) g
WHERE k.w_ratio > g.w_ratio or
      (k.w_ratio = g.w_ratio and k. s_pg <= "' . $guidn . '"))    
   t5 ON 
 t0.s_pg = "' . $guidn . '"

		 
join     
 (select s_pg,w_place,w_skill,w_ratio as kdratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min from db_stats_2 WHERE s_pg = "' . $guidn . '" limit 1) 
 t2 ON 
 t0.s_pg = t2.s_pg
 where t0.s_pg = "' . $guidn . '" LIMIT 1';
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $reponse[] = 'SELECT t0.s_pg, 
       t0.s_guid,
       tj.skillrank,  
       tf.headshotsseriesrank
FROM   db_stats_0 t0 
  
 join   
 (   
 SELECT count(*) AS HeadshotsSeriesRank 
FROM db_stats_2 k CROSS JOIN
     (SELECT n_heads FROM db_stats_2 WHERE s_pg = "' . $guidn . '" LIMIT 1) g
WHERE k.n_heads > g.n_heads or
      (k.n_heads = g.n_heads and k. s_pg <= "' . $guidn . '"))    
   tf ON 
 t0.s_pg = "' . $guidn . '"

  join   
 (   
 SELECT count(*) AS SkillRank 
FROM db_stats_2 q CROSS JOIN
     (SELECT w_skill FROM db_stats_2 WHERE s_pg = "' . $guidn . '" LIMIT 1) b
WHERE q.w_skill > b.w_skill or
      (q.w_skill = b.w_skill and q.s_pg <= "' . $guidn . '")) 
   tj ON 
 t0.s_pg = "' . $guidn . '"  
 where t0.s_pg = "' . $guidn . '" LIMIT 1';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$reponse[] = 'SELECT t0.s_pg, 
       t0.s_guid,
	   tfkk.KillsSeriesRank,
       tjx.daterank
FROM   db_stats_0 t0 
 
  join   
 (   
 SELECT count(*) AS KillsSeriesRank 
FROM db_stats_2 u CROSS JOIN
     (SELECT n_kills FROM db_stats_2 WHERE s_pg = "' . $guidn . '" LIMIT 1) y
WHERE u.n_kills > y.n_kills or
      (u.n_kills = y.n_kills and u. s_pg <= "' . $guidn . '"))    
   tfkk ON 
 t0.s_pg = "' . $guidn . '" 
 
  join   
 (   
 SELECT count(*) AS DateRank 
FROM db_stats_0 m CROSS JOIN
     (SELECT s_time FROM db_stats_0 WHERE s_pg = "' . $guidn . '"  LIMIT 1) v
WHERE m.s_time > v.s_time or
      (m.s_time = v.s_time and m.s_pg <= "' . $guidn . '")) 
   tjx ON 
 t0.s_pg = "' . $guidn . '" 
 where t0.s_pg = "' . $guidn . '" LIMIT 1';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $reponse[] = 'SELECT t0.s_pg, 
       t0.s_guid,
       tk.killsrank, 
       th.headshotsrank
FROM   db_stats_0 t0 
   join   
 (   
 SELECT count(*) AS KillsRank 
FROM db_stats_1 p CROSS JOIN
     (SELECT s_kills FROM db_stats_1 WHERE s_pg = "' . $guidn . '" LIMIT 1) s
WHERE p.s_kills > s.s_kills or
      (p.s_kills = s.s_kills and p.s_pg <= "' . $guidn . '"))    
   tk ON 
 t0.s_pg = "' . $guidn . '" 
 
 
   join   
 (   
 SELECT count(*) AS HeadshotsRank 
FROM db_stats_1 c CROSS JOIN
     (SELECT s_heads FROM db_stats_1 WHERE s_pg = "' . $guidn . '" LIMIT 1) x
WHERE c.s_heads > x.s_heads or
      (c.s_heads = x.s_heads and c. s_pg <= "' . $guidn . '"))    
   th ON 
 t0.s_pg = "' . $guidn . '"

 where t0.s_pg = "' . $guidn . '" LIMIT 1';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 
 $reponse[] = 'SELECT t0.s_pg, 
	   tplh.totalHeaders,
	   tve.totalactiveplayers
FROM   db_stats_0 t0 
       JOIN (SELECT s_pg, 
                    s_dmg 
             FROM   db_stats_1) t1 
         ON t0.s_pg = t1.s_pg 
  join
 (
 SELECT count(*) as totalHeaders FROM db_stats_hits where head > 0
 )
    tplh ON 
 t0.s_pg = t1.s_pg
 
 
   join
 (
 SELECT count(*) as totalactiveplayers FROM db_stats_1 where s_kills > 1000
 )
    tve ON 
 t0.s_pg = t1.s_pg LIMIT 1';  
 
 
 
 
$reponse[] = 'SELECT t0.s_pg, 
       tpl.totalpl
FROM   db_stats_0 t0 
       JOIN (SELECT s_pg, 
                    s_dmg 
             FROM db_stats_1 WHERE s_pg = "' . $guidn . '" LIMIT 1) t1 
         ON t0.s_pg = t1.s_pg 
       
	    join
 (
 SELECT count(*) as totalPl FROM db_stats_0
 )
    tpl ON 
 t0.s_pg = t1.s_pg LIMIT 1'; 
 
 
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
foreach ($reponse as $nr => $rp)
{
  
  usleep(300000);

//echo '</br>'.$rp.'</br>';
  $xz = dbSelect('', $rp);
 
  
  if(is_object($xz))
  foreach ($xz as $keym => $value) {
    if ($keym == 'n_kills') $nkills = $value;
    else if ($keym == 'n_deaths') $ndeaths = $value;
    else if ($keym == 'n_heads') $nheadshots = $value;
    else if ($keym == 's_player') $nickname = $value;
    else if ($keym == 'servername') $servername = $value;
    else if ($keym == 's_time') $timeregistered = $value;
    else if ($keym == 's_lasttime') $lasttime = $value;
    else if ($keym == 'w_skill') $skill = $value;
    else if ($keym == 's_kills') $kills = $value;
    else if ($keym == 's_deaths') $deaths = $value;
    else if ($keym == 's_heads') $headshots = $value;
    else if ($keym == 's_dmg') $damages = $value;
    else if ($keym == 's_guid') $guid = $value;
    else if ($keym == 'skillrank') $skillPlace = $value;
    else if ($keym == 'headshotsrank') $HeadshotsRank = $value;
    else if ($keym == 'killsrank') $sKillsRank = $value;
    else if ($keym == 'headshotsseriesrank') $HeadshotsSeriesRank = $value;
    else if ($keym == 'w_prestige') $prestige = $value;  //w_prestige
    else if ($keym == 'w_geo') $geo = $value;
	else if ($keym == 'w_ip') $xplayerip = $value;
    else if ($keym == 'kdratio') $kdratio = $value;
    else if ($keym == 'kdratiosort') $kdratiosort = $value;
    else if ($keym == 'daterank') $DateRank = $value;
    else if ($keym == 'totalpl') $total_players_ondatabase = $value;
	else if ($keym == 'totalHeaders') $totalHeaders = $value;
	else if ($keym == 'KillsSeriesRank') $KillsSeriesRank = $value;
	else if ($keym == 'totalactiveplayers') $totalactiveplayers = $value;
	
	if(!empty($skillPlace))
	$prestige = $skillPlace;
	
	 
  } 
  
} 

////
//var_dump($xz);
//die('TEST');

}

 if(empty($KillsSeriesRank))
	 $KillsSeriesRank = 100000;
 
 if(empty($nkills)) 
 $nkills = 1;
 
//rank
if(!empty($kills))
{

foreach ($ranked as $rkilled => $rnk) {
  if ($kills >= $rkilled) {
    $rankx = $rnk;
    $zx = explode("rank:", $rankx);
    $fld = $zx[1];
    $rankxx = strtok($fld, " ");
    $zx = explode("image:", $rankx);
    $fld = $zx[1];
    $rankimg = strtok($fld, " ");
    $zx = explode("name:", $rankx);
    $fld = $zx[1];
    $rano = explode("image:", $fld);
    $rankname = $rano[0];
  }
}
if (empty($rankimg)) $rankimg = 'null.png';
if (empty($rankname)) $rankname = '0';
if (empty($rankxx)) $rankxx = '0';
///////////skill rank
$sefes = rand(42, 69);
$sefesf = rand(74, 99);
$nextprolvl = get_percentage($sefes, $sefesf);

if (empty($totalactiveplayers)) $totalactiveplayers = 500;
 

//$percent_of_skillPositions_circle = abs(get_percentage_circle($total_players_ondatabase - $skillPlace, $total_players_ondatabase));
//$percent_of_skillPositions = abs(($total_players_ondatabase-$skillPlace-$skillPlace)/$total_players_ondatabase)*100;
$percent_of_skillPositions = (($totalactiveplayers-$skillPlace+1)/$totalactiveplayers) * 100;
//abs(get_percentage($total_players_ondatabase - $skillPlace, $total_players_ondatabase));
$percent_of_HeadshotsRankPositions = abs(($total_players_ondatabase-$HeadshotsRank)/$total_players_ondatabase)*100;
$percent_of_HeadshotsSeriesRankPositions = abs(($totalHeaders-$HeadshotsSeriesRank)/$totalHeaders)*100;
$percent_of_kdratiosortRankPositions = abs(($total_players_ondatabase-$kdratiosort)/$total_players_ondatabase)*100;
$percent_of_KillsSeriesRank = abs(($totalHeaders/$KillsSeriesRank)/$totalHeaders)*100;
$percent_of_DateRankPositions = abs(get_percentage($total_players_ondatabase - $DateRank, $total_players_ondatabase));
$percent_of_kdratiosortRankseriesPositions = abs(get_percentage($totalactiveplayers - $KillsSeriesRank, $totalactiveplayers));
 
$positionOnAll_OF = ($percent_of_skillPositions+$percent_of_kdratiosortRankPositions)/2;

$percent_of_skillPositions_circle = ($positionOnAll_OF*3)+60; 
  
list($timegistered, $lasttimeseen) = explode(';', timelife($timeregistered, $lasttime));
}
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

// NEW
//function DataSqlLiteDB($SqlDataBase,$query,$wherefile)
//function DataSqlLitecreateDB($wherefile,$dataCREATE)

if(!empty($kills)){
////////////////////////////////////////////////////////////////	
include $cpath . "/engine/template/stats_level.php";
include $cpath . "/engine/template/stats_profile.php";
//////////////////////////////////////////////////////////////// ajax 
include $cpath . "/engine/ajax_data/local_parser_db_set.php";
echo get_local_source_db($domain.'/engine/template/stats_weapon.php?guid='.$guidn,'160000');
echo get_local_source_db($domain.'/engine/template/stats_hit_zones.php?guid='.$guidn,'160000');
echo get_local_source_db($domain.'/engine/template/stats_specials.php?guid='.$guidn.'&statsmedal=sevrtststst','160000'); 
//////////////////////////////////////////////////////////////// new info
//include $cpath ."/engine/template/stats_leaderboards.php";
//include $cpath ."/engine/template/stats_records.php";
//include $cpath ."/engine/template/stats_dynamics.php";
//include $cpath ."/engine/template/stats_matches.php";
}
include $cpath . "/engine/template/footer.php";



?>
