<?php
if(!empty($_GET['guid'])){
	$uid = $_GET['guid'];
	$guidn = $uid;
	
	if(!empty($_GET['statsmedal']))
$serverportx = $_GET['statsmedal'];
else if(!empty($_GET['statsmedal']))
$serverportx = $_GET['server'];	
 
if (strpos($_SERVER["HTTP_REFERER"], 'stats.php') !== false)
{

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("//", "/", $cpath);


include($cpath. '/engine/ajax_data/cache-top.php');
sleep(4);  //5



include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

$now = time();	

$c = 0; 
$dyhist_kd = $cpath . '/data/cache/stats_graph/maps_kd_'.$uid.'_'.$serverportx.'.js';
$dyhist_kl = $cpath . '/data/cache/stats_graph/maps_kl_'.$uid.'_'.$serverportx.'.js';
 
if(!file_exists($dyhist_kd))
$c = 1;
else if ($now - filemtime($dyhist_kd) >= 60*60*5)
$c = 1;
	  
if($c == 1)
{
	
//$query = "DELETE FROM db_stats_history WHERE date < NOW() - INTERVAL 50 DAY";
//$query = "DELETE FROM db_stats_history WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) > date";
 	
	
$query = "SELECT `mapname`, `gametype`, `port`, `guid`, `kills`, `deaths` FROM `playermaps` WHERE `guid` = '".$uid."' and `port` = '".$serverportx."' ORDER BY (kills+0) desc limit 10";
 

$stat = dbSelectALL('', $query);

foreach ($stat as $key => $v) {

   $vsk[]  = $v["kills"];
   $vsd[]  = $v["deaths"];
   
   if(($v["kills"] > 0)&&($v["deaths"] > 0))
   {
     $vsktt   = $v["kills"]/$v["deaths"];
	 $vskd[]  = round($vsktt, 3);
   }
   else
   {
	 $vsktt   = 1;   
     $vskd[]  = $vsktt;
   }
 
 
   
  $vskl[]  = '["'.$mapsall[''.$v["mapname"].''].' / '.$typesall[''.$v["gametype"].''].'",'.$v["kills"].']';
  $vsx[]  = '["'.$mapsall[''.$v["mapname"].''].' / '.$typesall[''.$v["gametype"].''].'",'.$vsktt.']';

}


if(!empty($vsk))
{

$avg_kills  = array_sum($vsk)/count($vsk); 
$avg_deaths = array_sum($vsd)/count($vsd); 
$avg_kd     = array_sum($vskd)/count($vskd); 

$comma_date   = implode(",", $vsx); 
$comma_kills   = implode(",", $vskl); 



$data = '
      Chartkick.CustomChart = function (element, dataSource, options) {
        // Chartkick.createChart("CustomChart", this, element, dataSource, options);
      };
   new Chartkick.PieChart("donut", 
   ['.$comma_date.'], 
   {donut: true, download: {background: "#fff"}}); 
';

$data_kl = '
   new Chartkick.PieChart("pie", 
   ['.$comma_kills.'], {download: "pie"});
';


}
}


if(!empty($data))
{
//write $data once in 5h
if(!file_exists($dyhist_kd))
{
touch($dyhist_kd);
 	$fpl = fopen($dyhist_kl, 'w+');
	fwrite($fpl, $data_kl);	
    fclose($fpl);
	
touch($dyhist_kd);
 	$fpl = fopen($dyhist_kd, 'w+');
	fwrite($fpl, $data);	
    fclose($fpl);
	
}
else if ($now - filemtime($dyhist_kd) >= 60*60*5)
	  { 
 	$fpl = fopen($dyhist_kl, 'w+');
	fwrite($fpl, $data_kl);	
    fclose($fpl);
	
 	$fpl = fopen($dyhist_kd, 'w+');
	fwrite($fpl, $data);	
    fclose($fpl);	
	
	  }
}	  


if(file_exists($dyhist_kd))
{
 if(file_exists($cpath . '/data/cache/iframe_data/stats_playermaps_'.$serverportx.'_'.$uid.'_'.$languagefor.'.html'))
{

echo '

<div class="content_block">
<div style="font-size:16px;padding:10px;background:#00000022;border:1px solid #090909;text-align:center;">
<h1>  '.$x_top_maps10.' / '.$lang_skill_history.' / '.$yuuyyuyuyuu.'</h1></br></br>
<div style="padding:10px;margin:5px;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;">


<div style="height: 450px;overflow:auto;width:100%">
';

include $cpath . "/engine/ajax_data/local_parser_db_set.php";

$url = $domain.'/data/cache/iframe_data/stats_playermaps_'.$serverportx.'_'.$uid.'_'.$languagefor.'.html';
 
if(file_exists($cpath . '/data/cache/iframe_data/stats_playermaps_'.$serverportx.'_'.$uid.'_'.$languagefor.'.html'))
echo '<br><iframe src="'.$url.'" width="100%" height="350" frameBorder="0" scrolling="no" style="height: 430px;overflow:auto;width:100%;"></iframe>';

echo '</div></div></div>
</div>';

include($cpath. '/engine/ajax_data/cache-bottom.php');
}
}
}
}
?>