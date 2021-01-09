<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
if (isLoginUser()) {
$nb_pages = 30;
$ip = 'unknown';
 
echo ' 
<script src="'.$domain.'/data/graph/dynamics2.js"></script>
<div class="content_block">';

echo '<div style="height:auto;overflow:auto;" class="content_block">
<a href="' . $domain . '/list.php?collect=w" 
style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 30px #fff, 0 0 4px #FFF, 
0 0 7px #08e5c8, 0 0 18px #08e5c8, 0 0 40px #08e5c8, 0 0 65px #08e5c8;"><b> > '.$menu_detected.'... </b></a></div>';

echo '<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>PLAYERLIST</h1> </div>';
 
///////////////////////////////////////////////////////////////////////////////////////////////////
$geoinff = '';
require $cpath.'/engine/geoip_bases/class.iptolocation.php';
$db = new \IP2Location\Database($cpath.'/engine/geoip_bases/IP2LOCATION-LITE-DB3.BIN', \IP2Location\Database::FILE_IO); 
 
$i = 0;
foreach ($xz as $keym => $dannye) { 

++$i;
 

 if(empty($dannye['name']))
$xpnickname = $dannye['x_db_name'];
 else
$xpnickname = $dannye['name'];	 

if(!empty($dannye['servername']))
$serverx = $dannye['servername']; 
else
	$serverx ='';


if(!empty($dannye['s_port']))
$cntz = $dannye['s_port']; 
else
	$cntz = '';
 

if(!empty($dannye['x_db_guid']))
$guidxx = $dannye['x_db_guid']; 
else
	$guidxx = '';
 
$serverx = $guidxx;
 
if(!empty($dannye['ip']))
    $ip = $dannye['ip']; 
else
	$ip = $dannye['x_db_ip'];

 if(!empty($dannye['x_db_ip']))
   $xplayerip = $dannye['x_db_ip'];
else
   $xplayerip = $ip;
$hj = $i_search;
if(empty($ip))
{
 $ip=$i_searchdd;
 $hj = $i_searchddf;
}

if(trim($ip)==1)
{
 $ip=$i_searchdd;
 $hj = $i_searchddf;
}

if(!empty($dannye['x_db_conn']))
    $geo = $dannye['x_db_conn']; 
else
	$geo = '';


if(!empty($dannye['x_db_date']))
    $time = $dannye['x_db_date']; 
else
	$time = '';  
 

$txttitle = $ip;
 
 
 
      if (!empty($xplayerip))
	  {
      $record = $db->lookup($xplayerip, \IP2Location\Database::ALL);
      if (!empty($record))
	  { 
				if (isLoginUser()) {	
					
						$flg = $record['countryCode'];
						$flag = $flg;
						$cn_nm = $record['countryName'];
						$geoinff = "🅲🅾🆄🅽🆃🆁🆈:".$record['countryName']." \n\n  🆁🅴🅶🅸🅾🅽:".$record['regionName']." \n\n  🅲🅸🆃🆈:".$record['cityName'];
						
				}
				else
				{
					
						$flg = $record['countryCode'];
						$flag = $flg;
						$cn_nm = $record['countryName'];
						$geoinff = geosorting($flag);
					
				}
	  }
	  else
	  {
		  $flag = '0';
		  $cn_nm  = '';
	  }
	  }
	  else if (!empty($geo))
	  {
		  $flag = $geo;
		  $cn_nm  = '';
	  }
	  else
	  {
		  $flag = '0';
		  $cn_nm  = '';
	  }
	  
	  

    $tm = str_replace(".", "-", $time);
	$tm = trim($tm);
	 
	
	if($flag == 'zag')
      $tm = $tm.'';
    else
		$tm = date( "Y-m-d H:i:s", strtotime( $tm." ".$raznica_vremya." hour" ) );
	
	$xxtime = trim($tm);
    $tm = str_replace("-", ".", $tm);
	
	$tm = time_elapsed_string($xxtime);
	//$db_date = new DateTime($xxtime);
    //$unix_db_date = $db_date->getTimestamp();
    //$tm = getDateString($unix_db_date);
	

   


echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:10px;font-size:13px;cursor:pointer;cursor:hand;" id="match'.md5($time.$i).'" onclick="show_match(\''.md5($time.$i).'\')">	
<div class="wrapper" style="width:calc(100% - 20px);flex-grow: 1; display: flex; float:left;">	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:30%; 
/* &#1101;&#1083;&#1077;&#1084;&#1077;&#1085;&#1090; &#1086;&#1090;&#1086;&#1073;&#1088;&#1072;&#1078;&#1072;&#1077;&#1090;&#1089;&#1103; &#1082;&#1072;&#1082; &#1073;&#1083;&#1086;&#1095;&#1085;&#1099;&#1081; flex-&#1082;&#1086;&#1085;&#1090;&#1077;&#1081;&#1085;&#1077;&#1088; */
  flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:5 3px;font-size:10px;line-height:14px;width:34px;text-align:center;">'.$tm.'</div>
<div style="float:left;color:#fff;padding:2px;line-height:15px;text-align:left;width:130px;font-size:13px;">

<a href="'.$domain.'/list.php?nicknameSearch='.trim($guidxx).'" class="tags" glose="'.$cntz.'">
 <div style="color:#fff;">'.$serverx.'</div>
</a>

</div>';


 

echo '<div style="float:left;color:#fff;padding:9 5px;font-size:10px;line-height:8px;width:3px;text-align:center;">	
</div>

<div style="float:left;color:#fff;padding:12px;line-height:30px;text-align:left;width:90px;FONT-SIZE:18PX;min-width:60px;">

<a href="'.$domain.'/list.php?geo='.$flag.'" class="tags" glose="'.$geoinff.'">
 
<img src="'.$domain.'/inc/images/flags-mini/'.$flag.'.png" width="24" height="12">

</a>

</div>
</div>		
		
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:60%;" class="wrapper">
	
<div style="color:#fff;padding:2px;line-height:24px;text-align:center;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
	
<a href="'.$domain.'/list.php?poisknickname='.trim($guidxx).'" style="color:#888;" class="tags" glose="'.$guidxx.'">
<div style="color:#ddd;font-size:13px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">
'.colorize($xpnickname).'</a>
</div>';

	if (!empty($geosearch))
	echo '<div style="color:#eee;float:left;TEXT-ALIGN:LEFT;font-size:10px;">&nbsp</br> '.$guidxx.'</div>';
 
echo '
	</div>


	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<a href="'.$domain.'/list.php?listguid='.trim($guidxx).'" style="color:#fff;" class="tags" glose="'.$hj.'">	'.$ip.'</a></div> 
	 
	</div>';



 
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<div class="rainbowQ" style="font-size:15px" id="contentcod_'.md5($guidxx).'"></div></div> 
</div>';	
	
if(empty($countsc))
	$countsc = 0; ++$countsc;


	
///////////////// ajax
include $cpath . "/engine/ajax_data/url_parser_db_set.php";	
	
	
	
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:24px;width:3px;overflow:auto;display:inline-block;flex-grow: 1;"> 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;width:3px;">&nbsp  </div> 
</div>	

</div>
	
</div>
	
<div style="line-height:30px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div>	
<div id="match_sub'.md5($time.$i).'" style="display:none;width:calc(100% - 10px);font-size:14px;border-top: 1px solid #222;overflow:auto;margin-top:5px;padding:5px;background:#222;">
';




echo '<div class="match_stats_adv" style="min-width:280px;">';


echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/img.php?nicknameSearch='.$guidxx.'" 
target="_blank" style="float:left;color:#609946;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;width:30px;" 
class="tags" glose="[Sc]&nbsp;'.$menu_screens.':&nbsp;'.$xpnickname.'"> <b>[Sc]</b> </a>	
</div>';


echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">	
<a href="'.$domain.'/stats.php?brofile='.$guidxx.'" 
target="_blank" style="float:left;color:#854699;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="[St]&nbsp;'.$menu_stats.'&nbsp;&nbsp;'.$xpnickname.'"> <b>[St]</b> </a>	
</div>';

echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">	
<a href="'.$domain.'/chat.php?search='.$guidxx.'" 
target="_blank" style="float:left;color:#3f7689;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="[C]&nbsp;'.$menu_chats.'&nbsp;&nbsp;'.$xpnickname.'"> <b>[C]</b> </a>
</div>';


if (isLoginUser()){
if(!empty($_SESSION['codbxpasssteam']))
$byWhois = isLoginUserWHO($_SESSION['codbxpasssteam']);
else if(!empty($_COOKIE['user_online_login']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_login']);
else if(!empty($_COOKIE['user_online_key']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_key']);
else
$byWhois = 'Who';
$byWho = "&byadmin=".$byWhois;
}
else
	$byWho = "&byadmin=null";

$byWho = str_replace(" ", "_", $byWho);


echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/list_ip_ban.php?baniprange='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.$byWho.'" 
target="_blank" style="float:left;color:#998546;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="[R]&nbsp;'.$i_ban.'&nbsp;IP&nbsp;'.$i_iprange.':&nbsp;'.$xpnickname.'"> <b>[R]</b> </a>	
</div>';


echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/list_ip_ban.php?banip='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.$byWho.'" 
target="_blank" style="float:left;color:#998546;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="[IB]&nbsp;'.$i_ban.'&nbsp;IP:&nbsp;'.$xpnickname.'"> <b>[IB]</b> </a>	
</div>';


echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:22px;">		
<a href="'.$domain.'/redirect.php?guid='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.'" 
target="_blank" style="float:left;color:#995b46;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="[B]&nbsp;'.$i_ban.'&nbsp;GUID:&nbsp;'.$xpnickname.'"> <b>[B]</b> </a>	
</div>';


echo '<div style="float:left;color:#fff;padding:9 3px;text-align:center;width:15px;">		
<a href="'.$domain.'/admin/screen.php?server='.$cntz.'&svrnm='.$serverx.'&gd='.$guidxx.'&plyr='.$xpnickname.'" 
onclick="window.open(this.href, \'\', \'scrollbars=1,height=\'+Math.min(300, screen.availHeight)+\',width=\'+Math.min(480, screen.availWidth)); 
return false;" style="float:left;color:#c5000a;padding:1px;line-height:19px;text-align:left;FONT-SIZE:18PX;" 
class="tags" glose="|SS|&nbsp;'.$makescreens.':&nbsp;'.$xpnickname.'"> <b>|SS|</b> </a>	
</div>';


echo '</div>';





echo '		
<div class="match_stats_adv" style="min-width:190px;">Time 
<div style="color:#fff;min-width:190px;">'.$time.'</div></div>
	 
	
<div class="match_stats_adv" style="min-width:100px;">Guid
<div style="color:#fff;width:100px;">'.$guidxx.'</div></div>';

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



if(!empty($_GET['nicknameSearch']))
	$nicknameSearch = '&nicknameSearch='.$_GET['nicknameSearch']; else $nicknameSearch = '';

if(!empty($_GET['nicknameSearchguid']))
	$nicknameSearchguid = '&nicknameSearchguid='.$_GET['nicknameSearchguid']; else $nicknameSearchguid = '';

if(!empty($search))
	$search = '&search=' . $search; else $search = '';

if(!empty($geosearch))
	$geosearch = '&geo=' . $geosearch; else $geosearch = '';

if(!empty($timeq))
	$timeq = '&timeq=' . $timeq; else $timeq = '';
 
 
$pageskey = '<a href="' . $domain . '/list.php?server=' . $server.$search.$nicknameSearchguid.$nicknameSearch.$geosearch.$timeq.'&page=';
 

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
?>