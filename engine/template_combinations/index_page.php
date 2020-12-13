<?php
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";


/*
SELECT `servername`, COUNT(*) AS `calls` FROM (
    SELECT * FROM (
        SELECT `s_guid`, `servername` FROM `db_stats_0`  where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) ORDER BY `servername` ASC
    ) t1
    GROUP BY `s_guid`
) t2
GROUP BY `servername`
*/



$reponse = 'SELECT x_db_guid, COUNT(x_db_guid) as allplayers FROM x_db_players where x_db_guid > 0';
  $xz = dbSelectALL('', $reponse);
  if(!empty($xz))
foreach ($xz as $keym => $value) {
$allplayers = $value['allplayers'];
}

////////////////////////////////////////////
$date = date("Y-m-d", time() - 60 * 60 * 24);
$sql='SELECT servername, COUNT(s_guid) AS todayplayedyesterday FROM db_stats_0 where s_lasttime LIKE :keyword group by servername limit 20';
  $xz_yesterday = dbSelectALLbyKey('', $sql, ''.$date.'');
  
$sql='SELECT `servername`, COUNT(*) AS `todayplayedyesterday` FROM (
    SELECT `s_guid`, `servername` FROM (
        SELECT `s_guid`, `servername` FROM `db_stats_0` where s_lasttime LIKE :keyword ORDER BY `servername` ASC
    ) t1
    GROUP BY `s_guid`
) t2
GROUP BY `servername`';
$xz_daymm = dbSelectALL('', $sql, '');
  if($xz_daymm)
 {	 
foreach ($xz_daymm as $keym => $value) 
{
$ysum[] = $value['todayplayedyesterday'];	
 }}  
  
  
  
  
  
  


////////////////////////////////////////////
$sql='SELECT servername, COUNT(s_guid) AS monthplayed FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 MONTH)) group by servername limit 20';
  $x_monthh = dbSelectALL('', $sql, '');
if(!empty($x_monthh))
foreach ($x_monthh as $keym => $value) {
$msum[] = $value['monthplayed'];
}


$sql='SELECT servername, COUNT(w_guid) AS weekplayed FROM db_stats_week group by w_port limit 20';
$xz_week = dbSelectALL('', $sql, '');
 if(!empty($xz_week)) 
foreach ($xz_week as $keym => $value) 
{
$wsum[] = $value['weekplayed'];	
}





/////////////////////////TODAY
$sql='SELECT servername, COUNT(w_guid) AS todayplayed FROM db_stats_day group by w_port limit 20';
$xz_day = dbSelectALL('', $sql, '');
 if(!$xz_day)
 $xz_day = '';
 
$sql='SELECT `servername`, COUNT(*) AS `todayplayed` FROM (
    SELECT `w_guid`, `servername` FROM (
        SELECT `w_guid`, `servername` FROM `db_stats_day` ORDER BY `servername` ASC
    ) t1
    GROUP BY `w_guid`
) t2
GROUP BY `servername`';
$xz_daym = dbSelectALL('', $sql, '');
  if($xz_daym)
 {	 
foreach ($xz_daym as $keym => $value) 
{
$tsum[] = $value['todayplayed'];	
 }} else $xz_day = '';
 
 



//$sql='SELECT COUNT(*) AS smonthplayed FROM db_stats_0 where s_guid > 0 and s_lasttime LIKE :keyword';
$sqln='SELECT x_db_date,COUNT(*) AS toplayed FROM x_db_players where x_db_date  >= (DATE_SUB(CURDATE(),INTERVAL 1 DAY)) LIMIT 1';
  $xzf = dbSelectALL('', $sqln, '');
 if($xzf)
 {
foreach ($xzf as $ke => $val) {
	if(!empty( $val['toplayed']))
$toplayed = $val['toplayed'];
    else $toplayed = '';
 }}else $xzf = '';




/*
$sql='SELECT COUNT(*) AS todayplayed FROM db_stats_0 where s_guid > 0 and s_lasttime LIKE :keyword';
  $xz = dbSelectALLbyKey('', $sql, date("Y-m-d"));
foreach ($xz as $keym => $value) {
$todayplayed = $value['todayplayed'];
}


$date = date("Y-m-d", time() - 60 * 60 * 24);
$sql='SELECT COUNT(*) AS todayplayedyesterday FROM db_stats_0 where s_guid > 0 and s_lasttime LIKE :keyword';
  $xz = dbSelectALLbyKey('', $sql, ''.$date.'');
foreach ($xz as $keym => $value) {
$todayplayedyesterday = $value['todayplayedyesterday'];
}
*/
  
include $cpath . "/engine/template/index_servers.php";
include $cpath . "/engine/template/footer.php";
?>
