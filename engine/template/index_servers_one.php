<?php
if(!empty($_GET['timer'])){
if (strpos($_SERVER["HTTP_REFERER"], 'index.php') !== false)
{	
$guidn  = $_GET['timer'];
$chattimer =  base64_decode($guidn);
$cpath = dirname(__FILE__);
$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("users", "", $cpath);
$cpath = str_replace('\\\\', "/", $cpath);
$cpath = str_replace("//", "/", $cpath);
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");
include($cpath. '/engine/ajax_data/cache-top.php');


sleep(1);
$ysum = array();
$reponse = 'SELECT COUNT(distinct s_guid) as allplayers FROM db_stats_0 where s_guid > 0';
  $xz = dbSelectALL('', $reponse);
  if(!empty($xz))
foreach ($xz as $keym => $value) {
$allplayers = $value['allplayers'];
}

////////////////////////////////////////////
$date = date("Y-m-d", time() - 60 * 60 * 24);
//$sql='SELECT servername, COUNT(distinct s_guid) AS playedyesterday, COUNT(s_guid) AS fullplayedyesterday  FROM db_stats_0 where s_lasttime LIKE :keyword group by servername limit 20';
  $sql='SELECT servername, COUNT(distinct s_guid) AS playedyesterday FROM db_stats_0 where s_lasttime LIKE :keyword group by servername limit 20';
$xz_yesterday = dbSelectALLbyKey('', $sql, ''.$date.'');
if(is_array($xz_yesterday)) 
{ 
foreach ($xz_yesterday as $keym => $value) 
{
$ysum[] = $value['playedyesterday'];
//$yysum[] = $value['fullplayedyesterday'];	
}  
}
  else
$xz_yesterday = array();  
  
 
$msum = array();
////////////////////////////////////////////
//$sql='SELECT servername, COUNT(distinct s_guid) AS monthplayed, COUNT(s_guid) AS fullmonthplayed  FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 MONTH)) group by servername limit 20';
$sql='SELECT servername, COUNT(distinct s_guid) AS monthplayed FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 MONTH)) group by servername limit 20';
  $x_monthh = dbSelectALL('', $sql, '');
if(!empty($x_monthh))
foreach ($x_monthh as $keym => $value) {
$msum[] = $value['monthplayed'];
//$mmsum[] = $value['fullmonthplayed'];
}


$wsum = array();
//$sql='SELECT servername, COUNT(distinct s_guid) AS weekplayed, COUNT(s_guid) AS fullweekplayed FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 WEEK)) group by servername limit 20';
$sql='SELECT servername, COUNT(distinct s_guid) AS weekplayed FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 WEEK)) group by servername limit 20';
$xz_week = dbSelectALL('', $sql, '');
 if(!empty($xz_week)) 
foreach ($xz_week as $keym => $value) 
{
$wsum[] = $value['weekplayed'];
//$wwsum[] = $value['fullweekplayed'];	
}


/////////////////////////TODAY
$xz_day = array();
$date = date("Y-m-d");
//$sql='SELECT servername, COUNT(distinct s_guid) AS todayplayed, COUNT(s_guid) AS fulltodayplayed FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 day)) group by servername limit 20';
$sql='SELECT servername, COUNT(distinct s_guid) AS todayplayed FROM db_stats_0 where s_lasttime LIKE :keyword group by servername limit 20';
$xz_day = dbSelectALLbyKey('', $sql, ''.$date.'');
  if($xz_day)
 {	 
foreach ($xz_day as $keym => $value) 
{
$tsum[] = $value['todayplayed'];
//$ttsum[] = $value['fulltodayplayed'];	
 }} else $xz_day = '';
 
 


/*
$sql='SELECT servername, s_guid, s_player, s_lasttime FROM db_stats_0 where s_lasttime >= (DATE_SUB(CURDATE(),INTERVAL 1 day)) order by s_lasttime desc limit 4000');
$xz_day = dbSelectALL('', $sql, '');

$date = date("Y-m-d", time() - 60 * 60 * 24);
$sql='SELECT servername, s_guid, s_player, s_lasttime FROM db_stats_0 where s_lasttime LIKE :keyword order by s_lasttime desc limit 4000';
$xz_yesterday = dbSelectALLbyKey('', $sql, ''.$date.'');
*/




echo ' <script src="' . $domain . '/data/graph/dynamics2.js"></script>';
echo '<div style="height:auto;overflow:auto;padding:5 10px;" class="content_block">';
echo '<h1>' . $i_stats . '</h1>';
echo '<div style="overflow:auto;width:95%;padding:5 1px;">
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:default;">
'.$t_total_players.' : '.$allplayers.'
</div></div>';
echo '<div style="overflow:auto;width:85%;padding:5 1px;">
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:default;">
'.$t_total_players_v.' : '.array_sum($msum).'
</div></div>';

  if(!empty($xz_yesterday))
  {
//////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 

	
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:default;padding:5 1px;"><a href="'.$domain.'/index.php?sort=yesterday" class = "shad1" target="_blank">'.$t_total_players_y.' : '.array_sum($ysum).'</a></div>';
//echo '<div style="font-size:12px;cursor:default;padding:5 5px;"><a href="'.$domain.'/index.php?sort=yesterday" class = "shad1" target="_blank">'.$t_total_players_yy.' : '.array_sum($ysum).'</a></div>';
arsort($xz_yesterday);
foreach ($xz_yesterday as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;">
'.colorize($value['servername']).' : '.$value['playedyesterday'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }


  if(!empty($xz_day))
  {
//////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:default;padding:5 1px;"><a href="'.$domain.'/index.php?sort=day" class = "shad1" target="_blank">'.$t_total_players_t.' : '.array_sum($tsum).'</a></div>';
//echo '<div style="font-size:12px;cursor:default;padding:5 5px;"><a href="'.$domain.'/index.php?sort=day" class = "shad1" target="_blank">'.$t_total_players_tt.' : '.array_sum($ttsum).'</a></div>';

arsort ($xz_day);
foreach ($xz_day as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;">
'.colorize($value['servername']).' : '.$value['todayplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }



  if(!empty($xz_week))
  {
//////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:default;padding:5 1px;">'.$t_total_players_w.' : '.array_sum($wsum).'</div>';
//echo '<div style="font-size:12px;cursor:default;padding:5 5px;">'.$t_total_players_ww.' : '.array_sum($wwsum).'</div>';
arsort ($xz_week);
foreach ($xz_week as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;">
'.colorize($value['servername']).' : '.$value['weekplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }


  if(!empty($x_monthh))
  {
//////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:default;padding:5 1px;">'.$t_total_players_m.' '.array_sum($msum).'</div>';
//echo '<div style="font-size:12px;cursor:default;padding:5 5px;">'.$t_total_players_mm.' '.array_sum($mmsum).'</div>';
arsort ($x_monthh);
foreach ($x_monthh as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;">
'.colorize($value['servername']).' : '.$value['monthplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }


echo '</div>';



include($cpath. '/engine/ajax_data/cache-bottom.php');

}
}
?>