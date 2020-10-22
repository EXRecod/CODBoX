<?php

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

 
 
$guidn = $profile;
if (empty($skilllevels)) {
  $reponse = 'SELECT t0.s_pg, 
       t0.s_guid, 
       tpl.totalpl, 
	   tplh.totalHeaders,
	   tfkk.KillsSeriesRank,
	   tve.totalactiveplayers,
       tjx.daterank, 
       t5.kdratio, 
       t5.kdratiosort, 
       tj.skillrank, 
       tk.killsrank, 
       th.headshotsrank, 
       tf.headshotsseriesrank, 
       t0.s_port, 
       t1.headpercent, 
       t1.kdratio, 
       t0.servername, 
       t0.s_player, 
       t0.s_time, 
       t0.s_lasttime, 
       t1.s_pg, 
       t1.s_kills, 
       t1.s_deaths, 
       t1.s_heads, 
       t1.s_suicids, 
       t1.s_fall, 
       t1.s_melle, 
       t1.s_dmg, 
       t2.s_pg, 
       t2.w_place, 
       t2.w_skill, 
       t2.w_ratio, 
       t2.w_geo, 
       t2.w_prestige, 
       t2.w_fps, 
       t2.w_ip, 
       t2.w_ping, 
       t2.n_kills, 
       t2.n_deaths, 
       t2.n_heads, 
       t2.n_kills_min, 
       t2.n_deaths_min,
	   ht.head,
	   ht.torso_lower,
	   ht.torso_upper,
	   ht.right_arm_lower,
	   ht.left_leg_upper,
	   ht.neck,
	   ht.right_arm_upper,
	   ht.left_hand,
	   ht.left_arm_lower,
	   ht.none,
	   ht.right_leg_upper,
	   ht.left_arm_upper,
	   ht.right_leg_lower,
	   ht.left_foot,
	   ht.right_foot,
	   ht.right_hand,
	   ht.left_leg_lower
FROM   db_stats_0 t0 
       JOIN (SELECT s_pg, 
                    s_kills, 
                    s_deaths, 
                    s_heads, 
                    Round(s_kills / s_deaths, 2)            AS kdratio, 
                    Round(( s_heads ) * 100.0 / s_kills, 2) AS headPercent, 
                    s_suicids, 
                    s_fall, 
                    s_melle, 
                    s_dmg 
             FROM   db_stats_1) t1 
         ON t0.s_pg = t1.s_pg 
       JOIN (SELECT kdratiosort, 
                    kdratio, 
                    s_pg 
             FROM   (SELECT @kdratiosort := @kdratiosort + 1 AS kdratiosort, 
                            kdratio, 
                            s_pg 
                     FROM   (SELECT db_stats_1.s_pg, 
                                    Round(s_kills / s_deaths, 2) AS kdratio 
                             FROM   db_stats_1 
                             WHERE  db_stats_1.s_kills >= 1 
                             ORDER  BY kdratio DESC) sub0 
                            CROSS JOIN (SELECT @kdratiosort := 0) sub2) sub1 
             WHERE  sub1.s_pg) t5 
         ON t5.s_pg = t1.s_pg 
   join   
 (   
 SELECT count(*) AS KillsRank 
FROM db_stats_1 p CROSS JOIN
     (SELECT s_kills FROM db_stats_1 WHERE s_pg = "' . $guidn . '") s
WHERE p.s_kills > s.s_kills or
      (p.s_kills = s.s_kills and p. s_pg <= "' . $guidn . '"))    
   tk ON 
 t0.s_pg = t1.s_pg 
 
 
 join
 (
 SELECT count(*) as totalPl FROM db_stats_0
 )
    tpl ON 
 t0.s_pg = t1.s_pg
 
 
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
 t0.s_pg = t1.s_pg
 
 
 join
 (
 SELECT s_pg,head,torso_lower,torso_upper,right_arm_lower,
	left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,
right_hand,left_leg_lower FROM db_stats_hits where s_pg = "' . $guidn . '" limit 1
 )
    ht ON 
 t0.s_pg = t1.s_pg
 
 
   join   
 (   
 SELECT count(*) AS HeadshotsRank 
FROM db_stats_1 p CROSS JOIN
     (SELECT s_heads FROM db_stats_1 WHERE s_pg = "' . $guidn . '") s
WHERE p.s_heads > s.s_heads or
      (p.s_heads = s.s_heads and p. s_pg <= "' . $guidn . '"))    
   th ON 
 t0.s_pg = t1.s_pg
 
  
 join   
 (   
 SELECT count(*) AS HeadshotsSeriesRank 
FROM db_stats_2 p CROSS JOIN
     (SELECT n_heads FROM db_stats_2 WHERE s_pg = "' . $guidn . '") s
WHERE p.n_heads > s.n_heads or
      (p.n_heads = s.n_heads and p. s_pg <= "' . $guidn . '"))    
   tf ON 
 t0.s_pg = t1.s_pg
 
 
 join   
 (   
 SELECT count(*) AS KillsSeriesRank 
FROM db_stats_2 p CROSS JOIN
     (SELECT n_kills FROM db_stats_2 WHERE s_pg = "' . $guidn . '") s
WHERE p.n_kills > s.n_kills or
      (p.n_kills = s.n_kills and p. s_pg <= "' . $guidn . '"))    
   tfkk ON 
 t0.s_pg = t1.s_pg 
 
 
  
  join   
 (   
 SELECT count(*) AS SkillRank 
FROM db_stats_2 p CROSS JOIN
     (SELECT w_skill FROM db_stats_2 WHERE s_pg = "' . $guidn . '" LIMIT 1) s
WHERE p.w_skill > s.w_skill or
      (p.w_skill = s.w_skill and p.s_pg <= "' . $guidn . '")) 
   tj ON 
 t0.s_pg = t1.s_pg  
 
  join   
 (   
 SELECT count(*) AS DateRank 
FROM db_stats_0 p CROSS JOIN
     (SELECT s_time FROM db_stats_0 WHERE s_pg = "' . $guidn . '"  LIMIT 1) s
WHERE p.s_time > s.s_time or
      (p.s_time = s.s_time and p.s_pg <= "' . $guidn . '")) 
   tjx ON 
 t0.s_pg = t1.s_pg 
join     
 (select s_pg,w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg
 where t0.s_pg = "' . $guidn . '" LIMIT 1';
 
 
  //ZAPROS NR - 2
  $xz = dbSelect('', $reponse);
  $maxforanimate = 35;
  if(!is_array($xz))
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
    else if ($keym == 'w_prestige') $prestige = $value;
    else if ($keym == 'w_geo') $geo = $value;
    else if ($keym == 'kdratio') $kdratio = $value;
    else if ($keym == 'kdratiosort') $kdratiosort = $value;
    else if ($keym == 'daterank') $DateRank = $value;
    else if ($keym == 'totalpl') $total_players_ondatabase = $value;
	else if ($keym == 'totalHeaders') $totalHeaders = $value;
	else if ($keym == 'KillsSeriesRank') $KillsSeriesRank = $value;
	else if ($keym == 'totalactiveplayers') $totalactiveplayers = $value;
	//hit zones +css styles
    else if ($keym == 'head') {$head = $value; if((($value/$kills)*100)>$maxforanimate) $zanim1 = "hint-dot"; else $zanim1 = "nothings"; }
	else if ($keym == 'torso_lower') {$torso_lower = $value; if((($value/$kills)*100)>$maxforanimate) $zanim2 = "hint-dot"; else $zanim2 = "nothings"; }
	else if ($keym == 'torso_upper') {$torso_upper = $value; if((($value/$kills)*100)>$maxforanimate) $zanim3 = "hint-dot"; else $zanim3 = "nothings"; }
	else if ($keym == 'right_arm_lower') {$right_arm_lower = $value; if((($value/$kills)*100)>$maxforanimate) $zanim4 = "hint-dot"; else $zanim4 = "nothings"; }
	else if ($keym == 'left_leg_upper') {$left_leg_upper = $value; if((($value/$kills)*100)>$maxforanimate) $zanim5 = "hint-dot"; else $zanim5 = "nothings"; }
	else if ($keym == 'neck') {$neck = $value; if((($value/$kills)*100)>$maxforanimate) $zanim6 = "hint-dot"; else $zanim6 = "nothings"; }
	else if ($keym == 'right_arm_upper') {$right_arm_upper = $value; if((($value/$kills)*100)>$maxforanimate) $zanim7 = "hint-dot"; else $zanim7 = "nothings"; }
	else if ($keym == 'left_hand') {$left_hand = $value; if((($value/$kills)*100)>$maxforanimate) $zanim8 = "hint-dot"; else $zanim8 = "nothings"; }
	else if ($keym == 'left_arm_lower') {$left_arm_lower = $value; if((($value/$kills)*100)>$maxforanimate) $zanim9 = "hint-dot"; else $zanim9 = "nothings"; }
	else if ($keym == 'none') {$none = $value; if((($value/$kills)*100)>$maxforanimate) $zanim10 = "hint-dot"; else $zanim10 = "nothings"; }
	else if ($keym == 'right_leg_upper') {$right_leg_upper = $value; if((($value/$kills)*100)>$maxforanimate) $zanim11 = "hint-dot"; else $zanim11 = "nothings"; }
	else if ($keym == 'left_arm_upper') {$left_arm_upper = $value; if((($value/$kills)*100)>$maxforanimate) $zanim12 = "hint-dot"; else $zanim12 = "nothings"; }
	else if ($keym == 'right_leg_lower') {$right_leg_lower = $value; if((($value/$kills)*100)>$maxforanimate) $zanim13 = "hint-dot"; else $zanim13 = "nothings"; }
	else if ($keym == 'left_foot') {$left_foot = $value; if((($value/$kills)*100)>$maxforanimate) $zanim14 = "hint-dot"; else $zanim14 = "nothings"; }
	else if ($keym == 'right_foot') {$right_foot = $value; if((($value/$kills)*100)>$maxforanimate) $zanim15 = "hint-dot"; else $zanim15 = "nothings"; }
	else if ($keym == 'right_hand') {$right_hand = $value; if((($value/$kills)*100)>$maxforanimate) $zanim16 = "hint-dot"; else $zanim16 = "nothings"; }
	else if ($keym == 'left_leg_lower') {$left_leg_lower = $value; if((($value/$kills)*100)>$maxforanimate) $zanim17 = "hint-dot"; else $zanim17 = "nothings"; }
	 
  }
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
 
 
 
//$percent_of_skillPositions_circle = abs(get_percentage_circle($total_players_ondatabase - $skillPlace, $total_players_ondatabase));
$percent_of_skillPositions = abs(($total_players_ondatabase-$skillPlace)/$total_players_ondatabase)*100;
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
if(!empty($kills)){
include $cpath . "/engine/template/stats_level.php";

include $cpath . "/engine/template/stats_profile.php";
include $cpath . "/engine/template/stats_weapon.php";
//include $cpath ."/engine/template/stats_records.php";
//include $cpath ."/engine/template/stats_leaderboards.php";
include $cpath ."/engine/template/stats_hit_zones.php";
//include $cpath ."/engine/template/stats_dynamics.php";
//include $cpath ."/engine/template/stats_matches.php";
 

}

include $cpath . "/engine/template/footer.php";
?>
