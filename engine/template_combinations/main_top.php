<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");
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


$KDserverFiltrVARONE = '';
$KDserverFiltrVARTWO = '';
$SKILLserverFiltrVARONE = '';
$SKILLserverFiltrVARTWO = '';
$RATIOSserverFiltrVARONE = '';					 
$RATIOSserverFiltrVARTWO = '';					                       
                  


if ((empty($server)) && (!empty($totalkills))) {
  $serverssqLdata = 't1.s_kills >= 0
 ORDER BY (t1.s_kills+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totalkills))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and t1.s_kills >= 0
 ORDER BY (t1.s_kills+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}

/*
else if ((empty($server)) && (!empty($totaltotalknife))) {
  $serverssqLdata = 't1.s_kills >= 0
 ORDER BY (t1.s_kills+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totaltotalknife))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and t1.s_kills >= 0
 ORDER BY (t1.s_kills+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}
*/



////////////////////
else if (!empty($nicknameSearch)) {
  $serverssqLdata = 't0.s_guid LIKE :keyword ORDER BY t0.s_guid';
  //$serverssqLdata='t0.s_player = "'.$nicknameSearch.'" ORDER BY t0.s_player';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 0';
  $top_main_total = 500;
}
////////////////////

////////////////////
else if (!empty($nicknameSearchguid)) {
  $serverssqLdata = 't0.s_player LIKE :keyword ORDER BY t0.s_player';
  //$serverssqLdata='t0.s_player = "'.$nicknameSearch.'" ORDER BY t0.s_player';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 0';
  $top_main_total = 500;
}
////////////////////

else if ((empty($server)) && (!empty($totallastvisit))) {
  $serverssqLdata = 'DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime
 ORDER BY (t0.s_lasttime+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totallastvisit))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime
 ORDER BY (t0.s_lasttime+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}
////////////////////
else if ((empty($server)) && (!empty($totaldeaths))) {
  $serverssqLdata = 't1.s_deaths >= 0
 ORDER BY (t1.s_deaths+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totaldeaths))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and t1.s_deaths >= 0
 ORDER BY (t1.s_deaths+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}
////////////////////
else if ((empty($server)) && (!empty($totalheadshots))) {
  $serverssqLdata = 't1.s_deaths >= 0
 ORDER BY (t1.s_deaths+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totalheadshots))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and t1.s_heads >= 0
 ORDER BY (t1.s_heads+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}
////////////////////
else if ((empty($server)) && (!empty($totalheadshotspercents))) {
  $serverssqLdata = 't1.s_kills >= 30 and  (DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime and headpercent >= 22)  
ORDER BY (headpercent+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 30';
  
$RATIOSserverFiltrVARONE = 't1.headpercent, t1.kdratio,';					 
$RATIOSserverFiltrVARTWO = 'Round(s_kills   /s_deaths, 2) AS kdratio,Round((s_heads) * 100.0 / s_kills, 2) AS headpercent,';					                       
                       
  
}
else if ((!empty($server)) && (!empty($totalheadshotspercents))) {
  $serverssqLdata = 't1.s_kills >= 30 and  (DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime and headpercent >= 22) 
ORDER BY (headpercent+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
  
$RATIOSserverFiltrVARONE = 't1.headpercent, t1.kdratio,';					 
$RATIOSserverFiltrVARTWO = 'Round(s_kills   /s_deaths, 2) AS kdratio,Round((s_heads) * 100.0 / s_kills, 2) AS headpercent,';					                       
   
  
}
////////////////////
else if ((empty($server)) && (!empty($totalkdRatio))) {
  $serverssqLdata = 't5.kdratio >= 0 and t1.s_kills >= 1000
 ORDER BY (t5.kdratio+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';

$RATIOSserverFiltrVARONE = 't1.headpercent, t1.kdratio,';					 
$RATIOSserverFiltrVARTWO = 'Round(s_kills   /s_deaths, 2) AS kdratio,Round((s_heads) * 100.0 / s_kills, 2) AS headpercent,';					                       
   
$KDserverFiltrVARONE = 't5.kdratio, t5.kdratiosort,';
$KDserverFiltrVARTWO = '
JOIN 
       ( 
              SELECT kdratiosort, 
                     kdratio, 
                     s_pg 
              FROM   ( 
                                SELECT     @kdratiosort:=@kdratiosort + 1 AS kdratiosort, 
                                           kdratio, 
                                           s_pg 
                                FROM       ( 
                                                    SELECT   db_stats_1.s_pg, 
                                                             round(s_kills/s_deaths, 2) AS kdratio
                                                    from     db_stats_1 
                                                    WHERE    db_stats_1.s_kills >= 1 
                                                    ORDER BY kdratio DESC ) sub0 
                                CROSS JOIN 
                                           ( 
                                                  SELECT @kdratiosort:=0) sub2 ) sub1 
              WHERE  sub1.s_pg) t5 
ON     t5.s_pg = t1.s_pg';
 
}
else if ((!empty($server)) && (!empty($totalkdRatio))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and (t5.kdratio >= 0 and t1.s_kills >= 1000)
 ORDER BY (t5.kdratio+0)';
 
$serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
$RATIOSserverFiltrVARONE = 't1.headpercent, t1.kdratio,';					 
$RATIOSserverFiltrVARTWO = 'Round(s_kills   /s_deaths, 2) AS kdratio,Round((s_heads) * 100.0 / s_kills, 2) AS headpercent,';					                       
   
$KDserverFiltrVARONE = 't5.kdratio, t5.kdratiosort,';
$KDserverFiltrVARTWO = '
JOIN 
       ( 
              SELECT kdratiosort, 
                     kdratio, 
                     s_pg 
              FROM   ( 
                                SELECT     @kdratiosort:=@kdratiosort + 1 AS kdratiosort, 
                                           kdratio, 
                                           s_pg 
                                FROM       ( 
                                                    SELECT   db_stats_1.s_pg, 
                                                             round(s_kills/s_deaths, 2) AS kdratio
                                                    from     db_stats_1 
                                                    WHERE    db_stats_1.s_kills >= 1 
                                                    ORDER BY kdratio DESC ) sub0 
                                CROSS JOIN 
                                           ( 
                                                  SELECT @kdratiosort:=0) sub2 ) sub1 
              WHERE  sub1.s_pg) t5 
ON     t5.s_pg = t1.s_pg';





}
////////////////////
else if ((empty($server)) && (!empty($totalsuicides))) {
  $serverssqLdata = 't1.s_suicids >= 0 and t1.s_kills >= 100
 ORDER BY (t1.s_suicids+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
}
else if ((!empty($server)) && (!empty($totalsuicides))) {
  $serverssqLdata = 't0.s_port="' . $server . '" and (t1.s_suicids >= 0 and t1.s_kills >= 100)
 ORDER BY (t1.s_suicids+0)
 ';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
}
////////////////////
else if ((empty($server)) && (!empty($brofile))) {
  $serverssqLdata = 't0.s_guid="' . $brofile . '" and t1.s_kills >= 0
 ORDER BY (t2.w_skill+0)';
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 0';
}
else if ((!empty($server)) && (empty($brofile))) {

//$serverssqLdata = 't0.s_port="' . $server . '" and (DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime and t1.s_kills >= 100) ORDER BY (t2.w_skill+0)';
$serverssqLdata = ' DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime and t1.s_kills >= 100 and s_port=' . $server . ' ORDER BY (t2.w_skill+0)';  
  
$serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_0 where s_port=' . $server;
  
 
$SKILLserverFiltrVARONE = '
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
       t2.n_deaths_min,';
$SKILLserverFiltrVARTWO = 'JOIN 
       ( 
              SELECT s_pg, 
                     w_place, 
                     w_skill, 
                     w_ratio, 
                     w_geo, 
                     w_prestige, 
                     w_fps, 
                     w_ip, 
                     w_ping, 
                     n_kills, 
                     n_deaths, 
                     n_heads, 
                     n_kills_min, 
                     n_deaths_min 
              FROM   db_stats_2) t2 
ON     t1.s_pg = t2.s_pg';  
  
  
  
  
}
else {
  $serverssqLdata = ' DATE_SUB(CURDATE(),INTERVAL '.$StatsDaysLimit.' DAY) <= t0.s_lasttime and t1.s_kills >= 100 ORDER BY (t2.w_skill+0)';
  
  
  $serverFiltr = 'SELECT count(*) as totalpl FROM db_stats_1 where s_kills >= 100';
  
$SKILLserverFiltrVARONE = '
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
       t2.n_deaths_min,';
$SKILLserverFiltrVARTWO = 'JOIN 
       ( 
              SELECT s_pg, 
                     w_place, 
                     w_skill, 
                     w_ratio, 
                     w_geo, 
                     w_prestige, 
                     w_fps, 
                     w_ip, 
                     w_ping, 
                     n_kills, 
                     n_deaths, 
                     n_heads, 
                     n_kills_min, 
                     n_deaths_min 
              FROM   db_stats_2) t2 
ON     t1.s_pg = t2.s_pg';
}




















if (empty($skilllevels)) {
  $reponse = 'SELECT t0.s_pg, 
       t0.s_guid, 
       tpl.totalpl, 
	   '.$KDserverFiltrVARONE.' 
       t0.s_port, 
       t0.servername, 
       t0.s_player, 
       t0.s_time, 
       t0.s_lasttime, 
       t1.s_pg, 
       t1.s_kills, 
       t1.s_deaths, 
       t1.s_heads, 
       t1.s_suicids,  
       t1.s_melle, 
       t1.s_dmg, 
	   '.$SKILLserverFiltrVARONE.'
	   '.$RATIOSserverFiltrVARONE.'
	   t1.s_fall
FROM   db_stats_0 t0 


JOIN 
       ( 
              SELECT s_pg, 
                     s_kills, 
                     s_deaths, 
                     s_heads,
            '.$RATIOSserverFiltrVARTWO.'  
                     s_suicids, 
                     s_fall, 
                     s_melle, 
                     s_dmg 
              FROM   db_stats_1) t1 
ON     t0.s_pg = t1.s_pg 

 
' . $KDserverFiltrVARTWO . '
 

JOIN   ( ' . $serverFiltr . ' ) tpl 
ON     t0.s_pg = t1.s_pg 

'.$SKILLserverFiltrVARTWO.'

 
WHERE ' . $serverssqLdata . ' DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;

  //ZAPROS NR - 2
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else 
	  $xz = dbSelectALL('', $reponse);

}

$nickname = '';

if(!empty($xz))
foreach ($xz as $keym => $value) {
  $ids = $value['totalpl'];
  $checker = $value['s_kills'];
}
$nb_pages = ceil($ids / $top_main_total);

include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";

if(!empty($checker))
include $cpath . "/engine/template/stats_MAIN_leaderboard.php";
//if(!empty($_GET['server']))
//include $cpath . "/engine/template/stats_medals.php";

include $cpath . "/engine/template/footer.php";
?>