<?php


foreach ($xz as $keym => $value) {
             if(!empty($value['servername']))	
			 $servername = $value['servername'];
}

if(empty($_GET['server']))
	$srvlist = 111;
else
	$srvlist = $_GET['server'];
 

if(!empty($totalkills))
$infr = $t_kills;	
else if(!empty($totaldeaths))
$infr = $t_deaths;	
else if(!empty($totalheadshots))
$infr = $t_heads;
else if(!empty($totalheadshotspercents))
$infr = $t_heads.' %';
else if(!empty($totalsuicides))
$infr = $medals_suicides;
else if(!empty($totalkdRatio))
$infr = $t_kd;
else if(!empty($totallastvisit))
$infr = $t_lasttime;
else if(!empty($globaleloratings))
$infr = $Global_Elo_rating;
else if(!empty($eloratings))
$infr = $Elo_rating;
/////////////////////////////////////
//else if(!empty($totaltotalknife))
//$infr = $Elo_rating;
/////////////////////////////////////
else
$infr = '';



echo ' 
<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">

<a href="'.$domain.'/stats_maps.php" target="_blank"> &nbsp;&nbsp;&nbsp;&nbsp;
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> > '.$x_top_maps.'</b></a> 

<a href="'.$domain.'/stats_day.php" target="_blank"> &nbsp;&nbsp;&nbsp;&nbsp; 
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> > '.$x_top_day.'</b></a> 

<a href="'.$domain.'/stats_week.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> > '.$x_top_week.'</b></a> 
 
 </div></div>  


<div class="content_block"> 
<div style="line-height:40px;">
 

<div style="height:;background:#;float:right;padding:0px;overflow:hidden;line-height:20px;display:none;">
 </div>
</div>';

 $filenamedom= pathinfo($domain);
 $z =  $filenamedom['filename'].'/';

 
	echo '
	 
	
	
	
	
	<div style="width:auto;overflow:auto;padding:5px;background: ;margin:0px;font-size:12px;
	cursor:pointer;cursor:hand;line-height:30px;">
	<div style="width:calc(100% - 14px);" class="wrapper">
	
	<div style="    display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap;max-width:65%;">
	
	<div style="float:left;min-width:30px;text-align:center;font-weight:bold;font-size:11px;max-width:100px;width:calc(20%);">'.$stats_info_rank.'</div>
	
	<div style="width:10%;float:left;max-width:40px;min-width:25px;height:5px;">
	 </div>
	
	<div style=" float:left;display:inline-block;text-align:left;min-width:100px;max-width:calc(65%);overflow:hidden;">
	'.$t_nickname.'</div></div>
	
	<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:50px;max-width:100px;text-align:center;">
	'.$stats_info_value.'
	</div>
	
	<div style="    display: flex;overflow:auto;display:inline-block;flex-wrap: wrap;width:30px;position:relative;text-align:center;">
	
	
	</div>
	</div> 
	</div>';
	
	
	
	
	
	
$i = 0;	
	
foreach ($xz as $keym => $value) { 

++$i;

if(!empty($value['s_pg']))
             $plservguid = $value['s_pg'];
if(!empty($value['s_guid']))		 
			 $guid = $value['s_guid'];	
if(!empty($value['s_player']))			 
			 $nickname = $value['s_player'];
if(!empty($value['servername']))			 
			 $servername = $value['servername'];
if(!empty($value['s_port']))			 
			 $serverport = $value['s_port'];
if(!empty($value['s_time']))			 
			 $timeregistered = $value['s_time'];
if(!empty($value['s_lasttime']))			 
			 $lasttime = $value['s_lasttime'];
			 
			// $kills = $value['s_kills'];
			// $deaths = $value['s_deaths']; 
			// $headshots = $value['s_heads']; 
			// $damages = $value['s_dmg'];		 
 
         if(!empty($value['n_kills']))			 
			 $nkills = $value['n_kills'];
         if(!empty($value['n_deaths']))		 
			 $ndeaths = $value['n_deaths'];
         if(!empty($value['n_heads']))		 
			 $nheadshots = $value['n_heads'];   			 
         if(!empty($value['w_skill']))			 
			 $skill = $value['w_skill']; 		
		 if(!empty($value['w_prestige']))			 
			 $prestige = $value['w_prestige']; 
		 if(!empty($value['s_suicids']))			 
			 $suicides = $value['s_suicids'];
		 if(!empty($value['w_geo']))		 
			 $geo = $value['w_geo'];	
		 if(!empty($value['kdratio']))			 
 			 $kdratio = $value['kdratio'];
		 if(!empty($value['kdratiosort']))
             $kdratiosort	= $value['kdratiosort'];
		 if(!empty($value['totalpl']))
             $total_players_ondatabase = $value['totalpl'];	
		 if(!empty($value['headpercent']))		 
			 $headpercents = $value['headpercent'];
			 
if (strpos(trim(urldecode($sss)), trim($servername)) !== false) { 

?>
<script type="text/javascript">
    window.location.href = <?php echo '"';echo ''.$domain.'/stats.php?profile='.$plservguid.'&server='.$serverport.'';echo '"';?>;
</script>
<?php
ECHO '<a href="'.$domain.'/stats.php?profile='.$plservguid.'&server='.$serverport.'" class="white">';
}			 
			 
          
//rank
 foreach ($ranked as $rkilled => $rnk){
  if($kills >= $rkilled)
  {  $rankx = $rnk;
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
  }}
  if(empty($rankimg))
	  $rankimg = 'null.png';
    if(empty($rankname))
	  $rankname = '0';
      if(empty($rankxx))
	  $rankxx = '0';


///////////skill rank  
 $sefes = rand(42, 69);
 $sefesf = rand(74, 99);
 $nextprolvl = get_percentage($sefes,$sefesf);
 
$numimgjj = 0;
$stoprgj = 0;
$stoprgjw = 0;
$numimgj = 0;
$stoprg = 0;
foreach ($prestige_images as $numimgjj => $preimagej){
   $numimgtj = $numimgjj;




  if($stoprgjw != 1)
	  {
  if($numimgtj==$numimgj-1)
  {
  $stoprgjw = 1;	  
   $previosprestgu = $preimagej;
  }
     }


  if($stoprgj != 1)
	  {
  if($numimgtj==$numimgj+1)
  {
  $stoprgj = 1;	  
  $nextprestg = $preimagej;
  }
     } 
  } 


 
 
 
 
 
 
 
 
  
 
    list($timegistered,$lasttimeseen) = explode(';', timelife($timeregistered,$lasttime));	
	
	if(empty($brofile))
	ECHO '<a href="'.$domain.'/stats.php?brofile='.$guid.'" class="white">';
    else
	ECHO '<a href="'.$domain.'/stats.php?profile='.$plservguid.'&server='.$serverport.'" class="white">';	
	
	
	ECHO '<div style="width:auto;overflow:auto;padding:5px;background: #121212cc;margin:0px;font-size:13px;
	cursor:pointer;cursor:hand;line-height:30px;border-top: 1px solid #252525;;">
	<div style="width:calc(100% - 14px);" class="wrapper">
	
	<div style="    display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap;max-width:65%;">
	
	<div style="float:left;min-width:30px;text-align:center;font-weight:bold;font-size:16px;max-width:100px;width:calc(20%);">'.($premierMessageAafficher+$i).'</div>
	
	<div style="width:10%;float:left;max-width:40px;min-width:25px;" class="tags" glose="' .  geosorting($geo) . '">
	<img src="'.$domain.'/inc/images/flags-mini/'.$geo.'.png"  style="height:15px;padding-top:7px;float:left;padding-right:5px;opacity:0.8;">
	</div>
	
	
	
	<div style=" float:left;display:inline-block;text-align:left;min-width:100px;max-width:calc(65%);overflow:hidden;">
	<div style="max-width:1500px;font-size:15px;letter-spacing:.1em">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$nickname.' 
	';
	
	if(!empty($brofile))
		echo ' &nbsp; &nbsp;',colorize($servername);
	else if(!empty($nicknameSearch))
		echo ' &nbsp; &nbsp;',$guid,' &nbsp; &nbsp;',colorize($servername);
	else if(!empty($ns))
		echo ' &nbsp; &nbsp;',$guid,' &nbsp; &nbsp;',colorize($servername);
	
echo '
	</div></div></div>
	
	<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:50px;max-width:100px;text-align:center;">
	';
	
	if(!empty($totalkills))
	echo $kills;
	else if(!empty($totaldeaths))
	echo $deaths;
	else if(!empty($totalheadshots))
	echo $headshots;
	else if(!empty($totalkdRatio))
	echo $kdratio;
	else if(!empty($totalsuicides))
	echo $suicides;
	else if(!empty($totalheadshotspercents))
	echo $headpercents,'%';
	else if(!empty($totallastvisit))
	echo $lasttime;
    else
	echo $skill;
	
	
	
	echo '
	</div> 
	<div style="    display: flex;overflow:auto;display:inline-block;flex-wrap: wrap;width:30px;position:relative;text-align:center;">
	
	</div> 
	</div> 
	</div></a>
';

   } 	
   
   
   
   echo '</div></br></br>';
   
   
   
  if(empty($brofile)) {
   
   
   
 $fff = $top_main_total - $ssssob;  
 $t = 0;
for ($i = 1 ; $i <= $nb_pages ; $i++)
{
    $t++;
	
	if (empty($search)){
		
		if (($nb_pages == $page) && ($nb_pages == $t))
		{
			  
			for ($k = 1 ; $k <= $fff; $k++)
			{
		 if($top_main_total < $ssssob + 10)
		  echo '</br>';
	        }
		 
		 }
	}	
}	

echo '<br/>

<div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap: wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div class="server_foot_paginator">';

 
$pageskey = '<a href="'.$domain.'/stats.php?server=' . $server .'&search=' . $search .
'&totalkills=' . $totalkills .
'&totalheadshots=' . $totalheadshots .
'&totalkdRatio=' . $totalkdRatio .
'&totalsuicides=' . $totalsuicides.
'&totaldeaths=' . $totaldeaths .'&st2=' . $statusx2.'&page=';


// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = $pageskey.'1" class="paginator">'.$t_page_first.'</a> | '.$pageskey.($page - 1).'" class="paginator">'.$t_page_pre.'</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $nb_pages) $nextpage = ' | '.$pageskey. ($page + 1) .'" class="paginator">'.$t_page_next.'</a> | '.$pageskey.$nb_pages. '" class="paginator">'.$t_page_last.'</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 8 > 0) $page8left = ' '.$pageskey. ($page - 8) .'" class="paginator">'. ($page - 8) .'</a> | ';
if($page - 7 > 0) $page7left = ' '.$pageskey. ($page - 7) .'" class="paginator">'. ($page - 7) .'</a> | ';
if($page - 6 > 0) $page6left = ' '.$pageskey. ($page - 6) .'" class="paginator">'. ($page - 6) .'</a> | ';
if($page - 5 > 0) $page5left = ' '.$pageskey. ($page - 5) .'" class="paginator">'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' '.$pageskey. ($page - 4) .'" class="paginator">'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' '.$pageskey. ($page - 3) .'" class="paginator">'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' '.$pageskey. ($page - 2) .'" class="paginator">'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = $pageskey. ($page - 1) .'" class="paginator">'. ($page - 1) .'</a> | ';

if($page + 8 <= $nb_pages) $page8right = ' | '.$pageskey. ($page + 8) .'" class="paginator">'. ($page + 8) .'</a>';
if($page + 7 <= $nb_pages) $page7right = ' | '.$pageskey. ($page + 7) .'" class="paginator">'. ($page + 7) .'</a>';
if($page + 6 <= $nb_pages) $page6right = ' | '.$pageskey. ($page + 6) .'" class="paginator">'. ($page + 6) .'</a>';
if($page + 5 <= $nb_pages) $page5right = ' | '.$pageskey. ($page + 5) .'" class="paginator">'. ($page + 5) .'</a>';
if($page + 4 <= $nb_pages) $page4right = ' | '.$pageskey. ($page + 4) .'" class="paginator">'. ($page + 4) .'</a>';
if($page + 3 <= $nb_pages) $page3right = ' | '.$pageskey. ($page + 3) .'" class="paginator">'. ($page + 3) .'</a>';
if($page + 2 <= $nb_pages) $page2right = ' | '.$pageskey. ($page + 2) .'" class="paginator">'. ($page + 2) .'</a>';
if($page + 1 <= $nb_pages) $page1right = ' | '.$pageskey. ($page + 1) .'" class="paginator">'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($nb_pages > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE); 
echo $pervpage.$page7left.$page6left.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$page6right.$page7right.$nextpage;
echo "</div></div>";
}  
 

  } 
   
   