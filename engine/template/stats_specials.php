<?php
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
if(!empty($_GET['statsmedal']))
{
	
if(!empty($_GET['guid']))
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
 
///////////////////////////////////////////
 $reponse = 'SELECT `id`, `s_pg`, `claymore`, `c4`, `grenade`, `maps`, `heli`, `bombs`, `avia`, `artillery`, `camp`, `flags`, `saveflags`, `bonus`, `series`, 
 `bomb_plant`, `bomb_defused`, `juggernaut_kill`, `destroyed_helicopter`, `rcxd_destroyed`, `turret_destroyed`, `sam_kill` FROM db_stats_3 WHERE s_pg = '.$_GET['guid'].' LIMIT 1';


$xz = dbSelectALL('', $reponse);

if(!empty($xz))
foreach ($xz as $keym => $value) {
 //$chk['claymore'][$value['claymore']] = $value['claymore'] ;
 //$chk['c4'][$value['c4']] = $value['c4'];
 //$chk['grenade'][$value['grenade']]  = $value['grenade'];
 //$chk['maps'][$value['maps']] = $value['maps']; 
 //$chk['heli'][$value['heli']] = $value['heli'];
 $chk['bombs'][$value['bombs']] = $value['bombs'];
 $chk['avia'][$value['avia']] = $value['avia'];  
 $chk['artillery'][$value['artillery']] = $value['artillery']; 
 $chk['camp'][$value['camp']] = $value['camp']; 
 $chk['flags'][$value['flags']] = $value['flags']; 
 $chk['saveflags'][$value['saveflags']] = $value['saveflags']; 
 $chk['bonus'][$value['bonus']] = $value['bonus'];
 $chk['series'][$value['series']] = $value['series'];  
 $chk['bomb_plant'][$value['bomb_plant']] = $value['bomb_plant'];  
 $chk['bomb_defused'][$value['bomb_defused']] = $value['bomb_defused'];  
 $chk['juggernaut_kill'][$value['juggernaut_kill']] = $value['juggernaut_kill']; 
 $chk['destroyed_helicopter'][$value['destroyed_helicopter']] = $value['destroyed_helicopter']; 
 $chk['rcxd_destroyed'][$value['rcxd_destroyed']] = $value['rcxd_destroyed']; 
 $chk['turret_destroyed'][$value['turret_destroyed']] = $value['turret_destroyed'];
 $chk['sam_kill'][$value['sam_kill']] = $value['sam_kill'];   
}
	
	
}
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

if(!empty($chk)){

echo '<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>&nbsp;SPECIALS&nbsp;&nbsp;</h1></div> 

<div style="    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    flex-flow: row wrap;">';
//echo $cnts =  count($xz);
 
foreach ($chk as $keym => $v) {
foreach ($v as $ke => $uid) {	
if(!empty($ke)){
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
'.$x_specialz[$keym].'</b></div>


<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

 

if(file_exists($cpath .'/inc/images/specials/'.$keym.'.png'))
echo '<img src="' . $domain . '/inc/images/specials/' . $keym . '.png" style="width:100%;max-width:150px;display: block;margin-left: auto;margin-right: auto;" >';
    
	
	
 echo '
	</div></div></div>
	
<div style="font-size: 11px;    border-top: 1px solid #222;margin-top:5px;padding-top:5px;
    color: #fff;margin:10px;
    line-height: 16px;">
	
<div class="weap_stats" style="text-align:left;">'.$stats_info_value.' </br> '.$ke.'
 </div>

	
	</div>
	
</div>

';

}
}}
 echo '</div></div></div>';
 include($cpath. '/engine/ajax_data/cache-bottom.php');
 }
?>