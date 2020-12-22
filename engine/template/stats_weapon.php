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

echo '<div class="content_block">
<a href="https://localhost/profile/zzzztest/weapons">
<div style="overflow:auto;width:100%;padding:5 10px;"><h1>'.$weapon_innf.'</h1>
<img src="'.$domain.'/inc/images/link.png.pagespeed.ce.4Px-TY_BxN.png" style="height:14px;float:left;margin:1 3 0 3px;"></div></a>

<div style="overflow:auto;" class="wrapper">';
      	$pkli = array();
     $total = 0;	
	 $wps = array_chunk($wp, 23, true);
	 $wpnames = array();
          foreach ($wps as $numb => $wph) { 
          if(!empty($inweap))	
              unset($inweap);			  
		
            foreach ($wph as $wprg => $wpnm) {
              ////////echo $wpnm;
              $vow = array(
                "-",
                "."
              );
              $wprg = str_replace($vow, "_", $wprg);
			  $wpdatabase[] = 'db_weapons_'.$numb.'.'.$wprg; 
			  $wpdatabasetables[] = 'db_weapons_'.$numb; 
              $wpvaluename[] = $wprg;
              $inweap[] = $wprg;
              ++$total;			  
	  }
	  $join_inweap = join(",", $inweap);
	  usleep(5000);
	  $dbr = dbSelect('', "SELECT $join_inweap FROM db_weapons_$numb WHERE s_pg = $guidn LIMIT 1");
	  $dbrm[] = $dbr;
	  } 
	  
	  
$join_weapons = join(",", $wpvaluename);


if(empty($kills))
{
	  $m = dbSelect('', "SELECT s_pg,s_deaths,s_heads,s_dmg FROM db_stats_1 WHERE s_pg = $guidn LIMIT 1");
    foreach ($m as $keym => $value) { 
			 if($keym=='s_kills') 
			 $kills = $value;
		     else if($keym=='s_deaths') 
			 $deaths = $value;
		     else if($keym=='s_heads') 
			 $headshots = $value;
		     else if($keym=='s_dmg') 
			 $damages = $value;		 
            }	 
}	   
  
  
foreach ($dbrm as $d) {	
if (is_array($d) || is_object($d))
{ 
	foreach ($d as $key => $value) {
       if (!empty($value))
	   {  
         if ((strpos($join_weapons, $key) !== false)&&(strlen($key)>2))
		 {
		 $weapon = $key; 
		 $pkli[''.$weapon.''] = $value; 
}}}}}

if(is_array($pkli))
arsort($pkli);
else
	$pkli  = '';
  
$r = 0;  
if (is_array($pkli)){  
foreach ($pkli as $key => $value) {	
			
		 $weapon = $key; 
		 ++$r;
		  
///NETU KARTINOK NA NIH, ZABIL RISOVAT'		
$key = str_replace("_acog_", "_", $key);
$key = str_replace("_grip_", "_", $key);
$key = str_replace("_silencer_", "_", $key);	
$key = str_replace("_reflex_", "_", $key); 

if($r == 1)
	$no = '<div style="position: absolute;top: 20%;left: 87%;transform: translate(-50%, -50%);"><b style="font-size: 22px;color: #cfc547;text-shadow: 3px 0px 7px rgba(81,67,21,0.8), -3px 0px 7px rgba(81,67,21,0.8), 0px 4px 7px rgba(81,67,21,0.8);"> TOP </b></div>';
else
	$no = '';
			 
			  
echo ' 
<div style="min-width:18%;margin:5px; display: flex;  flex-wrap: wrap;text-align:center;flex-grow: 1;">	
<div style="width:100%;display:inline-block;margin:auto;background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%);
    background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%);
    background-color: #000000aa;border: 1px solid #222;border-top: 1px solid #333;padding:10 5px;position:relative;">
	
<div style="font-weight:bold;color:#fff;width:calc(100% - 20px);padding:10px;padding-top:5px;text-align:left;">'.$wp[''.trim($weapon).''].'</div>	
<div style="width:100%;max-width:200px;margin:auto;overflow:hidden;position:relative;">'.$no .'<img style="width:200px;height:100px;" src="'.$domain.'/inc/images/weapons/'.$key.'.png"> 
<div style="position:absolute;left:0px;top:0px;width:100%;height:100px;background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%);border:1px solid #000;"></div>
</div>
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;">';


/*	 
echo '
<div style="overflow:auto;font-size:12px;margin:5 0 4 0px;">	
<div style="float:left;text-transform:uppercase;">'.$t_heads.'</div>	
<div style="float:right;">'.round($headshots*100/($value*$total)).'%</div>
</div>';

	
echo '<div style="overflow:hidden;background:#222;position:relative;">
<div style="position:absolute;left:50%;border-right:1px solid #fff;height:10px;top:-4px;width:1px;"></div>
<div style="width:'.round($headshots*1/$value).'%;margin-left:0%;border-right:1px solid #fff;height:4px;background:#'.percent2Color(round($headshots*100/($value*$total))).'"></div>
</div><div style="font-size:10px;margin-top:3px;color: #aaa;">'.$averarg.' '.$t_heads.': '.round($headshots*100/($value*$total)).'</div>';
*/

echo '	 

</div>
	
<div style="font-size: 11px; border-top: 1px solid #222;margin-top:5px;padding-top:5px;color: #fff;margin:10px;line-height: 16px;">
	
<div class="weap_stats" style="text-align:left;">'.$t_kills.'
<div>'.$value.'</div></div>
<div class="weap_stats" style="text-align:right;">'.$t_damages.'
<div>'.round($damages/$value).'</div></div>	
	
 
</div>
</div>
</div>';	
	
	
	
	
}}
	
echo '</div></div>';
include($cpath. '/engine/ajax_data/cache-bottom.php');
}
?>