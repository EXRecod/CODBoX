<?php
if(!empty($_GET['guid'])){
	$guidn = $_GET['guid'];

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("//", "/", $cpath);

include($cpath. '/engine/ajax_data/cache-top.php');
sleep(3);
include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");
 

 $reponse = 'SELECT s_pg, 
                    s_kills, 
                    s_deaths, 
                    s_heads, 
                    s_suicids, 
                    s_fall, 
                    s_melle, 
                    s_dmg 
             FROM   db_stats_1 WHERE  db_stats_1.s_kills >= 1 and db_stats_1.s_deaths >= 1 and db_stats_1.s_pg = "' . $guidn . '" LIMIT 1';
 
  $xz = dbSelect('', $reponse);
 
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
    else if ($keym == 'w_prestige') $prestige = $value;
    else if ($keym == 'w_geo') $geo = $value;
    else if ($keym == 'kdratio') $kdratio = $value;
    else if ($keym == 'kdratiosort') $kdratiosort = $value;
    else if ($keym == 'daterank') $DateRank = $value;
    else if ($keym == 'totalpl') $total_players_ondatabase = $value;
	else if ($keym == 'totalHeaders') $totalHeaders = $value;
	else if ($keym == 'KillsSeriesRank') $KillsSeriesRank = $value;
	else if ($keym == 'totalactiveplayers') $totalactiveplayers = $value;
	 
  } 







  $reponse = 'SELECT s_pg,head,torso_lower,torso_upper,right_arm_lower,
	left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,
right_hand,left_leg_lower FROM db_stats_hits where s_pg = "' . $guidn . '" limit 1';
  //ZAPROS NR - 4
  $xz = dbSelect('', $reponse);
  $maxforanimate = 35;
  if(!is_array($xz))
  foreach ($xz as $keym => $value) {
	//hit zones +css styles
     if ($keym == 'head') {$head = $value; if((($value/$kills)*100)>$maxforanimate) $zanim1 = "hint-dot"; else $zanim1 = "nothings"; }
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


echo ' 
<div class="content_block" style="height:400px;">
<div style="overflow:auto;">
<div class="title" style="">
<div class="text">
<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>'.$hit_zones.'</h1>
</div>
</div>
';


echo "</br><div class=\"containerx\"> </br></br></br></br>
<div class=\"containert\">
<img src=\"$domain/inc/images/body/allmodels-vx.png\" width=\"220px\">";
echo '<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<div class="headshot">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim1.'">'.round((get_percentage($head, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_head.' / '.$head.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="torso_lower">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim2.'">'.round((get_percentage($torso_lower, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_torso_lower.' / '.$torso_lower.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="torso_upper">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim3.'">'.round((get_percentage($torso_upper, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_torso_upper .' / '.$torso_upper.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="neck">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim6.'">'.round((get_percentage($neck, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_neck .' / '.$neck.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="right_arm_upper">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim7.'">'.round((get_percentage($right_arm_upper, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_arm_upper .' / '.$right_arm_upper.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="right_arm_lower">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim4.'">'.round((get_percentage($right_arm_lower, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_arm_lower .' / '.$right_arm_lower.' '.$shotz;
echo '</div></div></div></div>';

echo '<div class="right_hand">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim16.'">'.round((get_percentage($right_hand, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_hand .' / '.$right_hand.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="left_arm_upper">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim12.'">'.round((get_percentage($left_arm_upper, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_arm_upper .' / '.$left_arm_upper.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="left_arm_lower">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim9.'">'.round((get_percentage($left_arm_lower, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_arm_lower .' / '.$left_arm_lower.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="left_hand">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim8.'">'.round((get_percentage($left_hand, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_hand.' / '.$left_hand.' '.$shotz;
echo '</div></div></div></div>';
	
	
echo '<div class="right_leg_upper">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim11.'">'.round((get_percentage($right_leg_upper, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_leg_upper.' / '.$right_leg_upper.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="right_leg_lower">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim13.'">'.round((get_percentage($right_leg_lower, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_leg_lower.' / '.$right_leg_lower.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="right_foot">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim15.'">'.round((get_percentage($right_foot, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_right_foot.' / '.$right_foot.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="left_leg_upper">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim5.'">'.round((get_percentage($left_leg_upper, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_leg_upper.' / '.$left_leg_upper.' '.$shotz;
echo '</div></div></div></div>';


echo '<div class="left_leg_lower">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim17.'">'.round((get_percentage($left_leg_lower, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_leg_lower.' / '.$left_leg_lower.' '.$shotz;
echo '</div></div></div></div>';
				
	

echo '<div class="left_foot">
<div class="item-hints">
  <div class="hint" data-position="4"> 
    <span class="hint-radius"></span>
    <span class="'.$zanim14.'">'.round((get_percentage($left_foot, $kills))).'%</span>
    <div class="hint-content do--split-children">'.$hit_left_foot.' / '.$left_foot.' '.$shotz;
				
					
	
echo '</div></div></div></div>';
echo " </div></div> 
";	
 

echo '</div></div></div></div>';
include($cpath. '/engine/ajax_data/cache-bottom.php');
}
?>