<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
echo '<script src="' . $domain . '/data/graph/dynamics2.js"></script>';

if(strpos($urlmd, "stats_week.php?heads=top") !== false)
{
	
	$reponse = 'SELECT servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime from db_stats_week ORDER BY s_heads DESC LIMIT 20';
    $stats_week_kills = dbSelectALL('', $reponse);
	
	$ghb = '<a href="'.$domain.'/stats_week.php?heads=top" style="color:#f7b794;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_heads).' </a>';
	
	$ghz = '<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 10px #fff, 0 0 4px #000, 0 0 7px #08e5c8, 0 0 10px #08e5c8, 0 0 8px #08e5c8, 0 0 15px #08e5c8;">
'.$ghb.' </b>        
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?deaths=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_deaths).' </a>    
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kills=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($medals_killer).'</a>
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kd=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_kd).'</a>';

}
else if(strpos($urlmd, "stats_week.php?deaths=top") !== false)
{
	
	$reponse = 'SELECT servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime from db_stats_week ORDER BY s_deaths DESC LIMIT 20';
    $stats_week_kills = dbSelectALL('', $reponse);
	
	$ghb = '<a href="'.$domain.'/stats_week.php?deaths=top" style="color:#f7e794;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_deaths).'</a>';
	
$ghz = '<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 10px #fff, 0 0 4px #000, 0 0 7px #08e5c8, 0 0 10px #08e5c8, 0 0 8px #08e5c8, 0 0 15px #08e5c8;">'.$ghb.'</b>        
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?heads=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_heads).' </a>    
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kills=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($medals_killer).' </a>
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kd=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_kd).'</a>';

}
else if(strpos($urlmd, "stats_week.php?kd=top") !== false)
{
	
	$reponse = 'SELECT Round(s_kills/s_deaths, 2) AS kdratio,servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime from db_stats_week where s_kills >= 100 ORDER BY kdratio DESC LIMIT 20
	
';
    $stats_week_kills = dbSelectALL('', $reponse);
	
	$ghb = '<a href="'.$domain.'/stats_week.php?kills=top" style="color:#d43939;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_kd).'</a>';
	
$ghz = '<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 10px #fff, 0 0 4px #000, 0 0 7px #08e5c8, 0 0 10px #08e5c8, 0 0 8px #08e5c8, 0 0 15px #08e5c8;">'.$ghb.'</b>        
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?heads=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_heads).' </a>    
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kills=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($medals_killer).' </a>
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?deaths=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_deaths).'</a>';

}
else
{
	
	$reponse = 'SELECT servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime from db_stats_week ORDER BY s_kills DESC LIMIT 20';
    $stats_week_kills = dbSelectALL('', $reponse);
	
	$ghb = '<a href="'.$domain.'/stats_week.php?kills=top" style="color:#9496f7;" target="_self">'.$x_top_week.' / '. mb_strtoupper($medals_killer).'</a>';
	
$ghz = '<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 10px #fff, 0 0 4px #000, 0 0 7px #08e5c8, 0 0 10px #08e5c8, 0 0 8px #08e5c8, 0 0 15px #08e5c8;">'.$ghb.'</b>        
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?heads=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_heads).' </a>    
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?deaths=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_deaths).' </a>
&nbsp;&nbsp;&nbsp;&nbsp;    <a href="'.$domain.'/stats_week.php?kd=top" style="color:#fff;" target="_self">'.$x_top_week.' / '. mb_strtoupper($t_kd).'</a>';
}




echo '<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">
 '.$ghz.'
 </div> 

<div style="display: -webkit-flex;display:flex; -webkit-justify-content: space-between;justify-content: space-between;flex-flow: row wrap;">';
$i = 0;
foreach ($stats_week_kills as $keym => $value) {
 $port          = $value['w_port'];
 $servername    = $value['servername'];
 $s_pg          = $value['s_pg'];
 $w_guid        = $value['w_guid'];
 $s_player      = $value['s_player'];
 $s_kills       = $value['s_kills'];
 $s_deaths      = $value['s_deaths']; 
 $s_heads       = $value['s_heads'];
 $s_time        = $value['s_time'];
 $s_lasttime    = $value['s_lasttime'];  
++$i;


$summ = $s_kills+$s_deaths;
$perskills = Persentages($s_kills,$summ);
$persdeaths = Persentages($s_deaths, $summ);




 
echo ' 
<div style="overflow:auto;width:100%;">
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;margin:10px;font-size:13px;cursor:pointer;
cursor:hand;" id="match'.md5($i).'" onclick="show_match(\''.md5($i).'\')">
	
	
<div class="wrapper" style="width:calc(100% - 20px);flex-grow: 1; display: flex; float:left;">
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:40%; 
<div style="float:left;color:#fff;padding:5 3px;font-size:14px;line-height:12px;width:34px;text-align:center;">  </div>
	

<div style="float:left;color:#fff;padding:2px;line-height:15px;text-align:left;width:100px;font-size:14px;min-width:40%;">	
<div style="color:#777;font-size:14px;">Nick &nbsp;&nbsp;&nbsp;&nbsp;<b> <a href="'.$domain.'/stats.php?profile='.$s_pg.'" style="color:#fff;" class="tags" glose="' . $w_guid . '" target="_self"> '.colorize($s_player).'</a></b></div></div>
<div style="float:left;color:#fff;padding:2px;line-height:15px;text-align:left;width:200px;font-size:14px;">
<div style="color:#777;">Server &nbsp;&nbsp;&nbsp;&nbsp;'.colorize($servername).'</div></div>
</div>
 
	
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:60%;" class="wrapper">
	

<div style="float:left;color:#fff;padding:3px;line-height:24px;text-align:left;color:yellow;min-width:30px;width:15%;font-size:18px;">
<div style="width:30px;text-align:center;"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 10px #fff, 0 0 4px #000, 0 0 7px #ffff00, 0 0 14px #ffff00, 0 0 28px #ffff00, 0 0 35px #ffff00;">'.$i.'</b></div>
</div>

	
<div style="color:#fff;padding:2px;line-height:24px;text-align:center;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">	
<div style="color:#777;font-size:14px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">KD 
<div style="display:inline-block;color:#fff;">'.(round(($s_kills/$s_deaths),2)).'</div></div>	
<div style="float:right;font-size:15px;">'.$s_kills.'/'.$s_deaths.'</div>	
<div style="width:100%;background:#888;height:4px;opacity:0.5;overflow:auto;">
';




echo '	
<div style="width:'.$perskills.'%;background:lime;height:4px;float:left;"></div>	
<div style="width:'.$persdeaths.'%;background:red;height:4px;float:left;"></div>

</div></div>
	
	
<div style="line-height:30px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div>	
	
	
</div></div>
	
	
<div id="match_sub'.md5($i).'" style="display:none;width:calc(100% - 20px);font-size:11px;border-top: 1px solid #222;
overflow:auto;margin-top:5px;padding:5px;background:#222;">
	
<div class="match_stats_adv">Guid
<div style="color:#fff;">'.$w_guid.'&nbsp;&nbsp;&nbsp;&nbsp;</div></div>

	
<div class="match_stats_adv">&nbsp;&nbsp;&nbsp;&nbsp;'.$t_kills.'
<div style="color:#fff;">&nbsp;&nbsp;&nbsp;&nbsp;'.$s_kills.'</div></div>

	
<div class="match_stats_adv">'.$t_deaths.'
<div style="color:#fff;">'.$s_deaths.'</div></div>
	
<div class="match_stats_adv">'.$t_heads.' 
<div style="color:#fff;">'.$s_heads.'</div></div>

<div class="match_stats_adv">'.$playeed.'
<div style="color:#fff;">error</div></div>

<div class="match_stats_adv">'.$t_timee.' 
<div style="color:#fff;">'.$s_time.'</div></div>
	
<div class="match_stats_adv">'.$t_lasttime.' 
<div style="color:#fff;">'.$s_lasttime.'</div></div>	
	
	
</div></div>';
}


////////////////////
echo '</div></div>';
?>