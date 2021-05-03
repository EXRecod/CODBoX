<?php
if(!empty($_GET['sort'])){
	
sleep(2);	
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

if (strpos($_SERVER["HTTP_REFERER"], 'index.php?sort=') !== false)
{	
	
$sort = $_GET['sort'];	
if($sort == 'day')
{
$date = date("Y-m-d");
$infff = $t_total_players_tti;
}
else if($sort == 'yesterday')
{
$date = date("Y-m-d", time() - 60 * 60 * 24);
$infff = $t_total_players_yyi;
}	

$sq = 'SELECT s_pg, s_guid, s_port, servername, s_player, s_time, s_lasttime FROM db_stats_0 WHERE s_lasttime LIKE :keyword ORDER BY s_lasttime DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;

$xz = dbSelectALLbyKey('', $sq, ''.$date.'');	
	

$nb_pages = 30;
$ip = 'unknown';
 
echo ' 
<div class="content_block">';

echo '<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>'.$infff.'</h1> </div>';
 
///////////////////////////////////////////////////////////////////////////////////////////////////
$geoinff = '';
 
$i = 0;
if(is_array($xz)){
foreach ($xz as $keym => $dannye) { 

++$i;
 
$playername    = $dannye['s_player'];
$servername    = $dannye['servername']; 
$serverport    = $dannye['s_port']; 
$playerguid    = $dannye['s_guid']; 
$lasttime      = $dannye['s_lasttime']; 

  
    $tm = str_replace(".", "-", $lasttime);
	$tm = trim($tm);
	 
 
	$tm = date( "Y-m-d H:i:s", strtotime( $tm." ".$raznica_vremya." hour" ) );
	
	$xxtime = trim($tm);
    $tm = str_replace("-", ".", $tm);
	
	$tm = time_elapsed_string($xxtime);
 
 
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:10px;font-size:13px;cursor:pointer;cursor:hand;" id="match'.md5($lasttime.$i).'" onclick="show_match(\''.md5($lasttime.$i).'\')">	
<div class="wrapper" style="width:calc(100% - 20px);flex-grow: 1; display: flex; float:left;">	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:30%; 
/* &#1101;&#1083;&#1077;&#1084;&#1077;&#1085;&#1090; &#1086;&#1090;&#1086;&#1073;&#1088;&#1072;&#1078;&#1072;&#1077;&#1090;&#1089;&#1103; &#1082;&#1072;&#1082; &#1073;&#1083;&#1086;&#1095;&#1085;&#1099;&#1081; flex-&#1082;&#1086;&#1085;&#1090;&#1077;&#1081;&#1085;&#1077;&#1088; */
  flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:5 3px;font-size:10px;line-height:14px;width:34px;text-align:center;">'.$tm.'</div>
<div style="float:left;color:#fff;padding:2px;line-height:15px;text-align:left;width:130px;font-size:13px;">

<a href="'.$domain.'/stats.php?player='.trim($playerguid).'" target="_blank" class="tags" glose="'.$serverport.'">
 <div style="color:#fff;">'.colorize($servername).'</div>
</a>

</div>';


 

echo '<div style="float:left;color:#fff;padding:9 5px;font-size:10px;line-height:8px;width:3px;text-align:center;">	
</div>

<div style="float:left;color:#fff;padding:12px;line-height:30px;text-align:left;width:90px;FONT-SIZE:18PX;min-width:60px;">


</div>
</div>		
		
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:60%;" class="wrapper">
	
<div style="color:#fff;padding:2px;line-height:24px;text-align:center;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
	
<a href="'.$domain.'/stats.php?player='.trim($playerguid).'" style="color:#999;" target="_blank" class="tags" glose="'.$playerguid.'">
<div style="color:#ddd;font-size:13px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">
'.colorize($playername).'</a>
</div>';

 
echo '
	</div>


<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
 
 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp '.$playerguid.'</div>  


	 
	</div>
	





	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">


 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp '.$lasttime.'</div> 
	 
	</div>';



 
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<div class="rainbowQ" style="font-size:15px" id="contentcod_'.md5($playerguid).'"></div></div> 
</div>';	
	
 	
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;width:3px;overflow:auto;display:inline-block;flex-grow: 1;"> 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;width:3px;">&nbsp </div> 
</div>	

</div>
	
</div>
	
<div id="match_sub'.md5($lasttime.$i).'" style="display:none;width:calc(100% - 10px);font-size:14px;border-top: 1px solid #222;overflow:auto;margin-top:5px;padding:5px;background:#222;">
';




echo '<div class="match_stats_adv" style="min-width:280px;">';









echo '</div>';


echo '
</div>
</div>';
	
}

echo '</div>';

echo '</br></br>';





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

 
$pageskey = '<a href="'.$domain.'/index.php?sort=' . $sort .'&timer=unknown&page=';


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

}
$templ = 1;
include $cpath . "/engine/template/footer.php";
    
} }
?>