<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
$nb_pages = 30;
$ip = 'unknown';
$reloadpages = 0;
echo ' 
<script src="'.$domain.'/data/graph/dynamics2.js"></script>
<div class="content_block">
<div style="overflow:auto;width:100%;padding:5 10px;">

<h1>IP '.$menu_banlist.'</h1> &nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;
<a href="'.$domain.'/list_ip_ban.php?sort_unbanned=s" style ="width:50px; padding:2px 50px;"><b class="tags" glose="'.$ilisttipunbanned.'" style ="padding:2px;border: solid; border-radius: 15px;font-size:16px;background-color:black;color:#013602" >&nbsp;'.$listtipunbanned.'&nbsp;</b></a>

&nbsp;&nbsp;
<a href="'.$domain.'/list_ip_ban.php?sort_banned=s" style ="width:50px;padding:2px 70px;"><b class="tags" glose="'.$ilisttipbanned.'" style ="padding:2px;border: solid; border-radius: 15px;font-size:16px;color:#5c0707;background-color:black;">&nbsp;'.$listtipbanned.'&nbsp;</b> </a>   

&nbsp;&nbsp;
<a href="'.$domain.'/list_ip_ban.php?sort_fakeip=s" style ="width:50px;padding:2px 90px;"><b class="tags" glose="'.$ilisttipproxy.'" style ="padding:2px;border: solid; border-radius: 15px;font-size:16px;color:#07405c;background-color:black;">&nbsp;'.$listtipproxy.'&nbsp;</b> </a> 

</div>';

 
///////////////////////////////////////////////////////////////////////////////////////////////////
$geoinff = '';
require $cpath.'/engine/geoip_bases/class.iptolocation.php';
$db = new \IP2Location\Database($cpath.'/engine/geoip_bases/IP2LOCATION-LITE-DB3.BIN', \IP2Location\Database::FILE_IO); 
$i = 0;
foreach ($xz as $keym => $dannye) { 
 $timeFormat = '00:00:00';
++$i;
 

 if(empty($dannye['name']))
$xpnickname = $dannye['playername'];
 else
$xpnickname = $dannye['playername'];	 

if(!empty($dannye['patch']))
$zaxodil = $dannye['patch']; 
else
	$zaxodil ='';


if(!empty($dannye['s_port']))
$cntz = $dannye['s_port']; 
else
	$cntz = '';
 

if(!empty($dannye['guid']))
$guidxx = $dannye['guid']; 
else
	$guidxx = '';


if(!empty($dannye['id']))
$idnumm = $dannye['id']; 
else
$idnumm = '';

 
$serverx = $guidxx;
 
if(!empty($dannye['ip']))
    $ip = $dannye['ip']; 
else
	$ip = '';


if(!empty($dannye['iprange']))
    $iprange = $dannye['iprange']; 
else
	$iprange = '';
 
   
$xplayerip = $iprange;
 

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

if(!empty($dannye['whooo']))
    $whooo = 'by '.$dannye['whooo']; 
else
	$whooo = '';


if(!empty($dannye['reason']))
    $reasonx = $dannye['reason']; 
else
	$reasonx = '';


if(!empty($dannye['time']))
    $time = $dannye['time']; 
else
	$time = '';  


if(!empty($dannye['bantime']))
    $bantime = $dannye['bantime']; 
else
	$bantime = '';

$tmb = str_replace(".", "-", $bantime);


if(!empty($reasonx))
{
$diff = strtotime(trim($tmb)) - strtotime(date('Y-m-d H:i:s'));
if($diff >= 0)
{ 
$hours = floor($diff / 3600);
$mins = floor($diff / 60 % 60);
$secs = floor($diff % 60);
$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
}
}

 if((!empty($reasonx))&&(strpos($reasonx, 'VPN') === false)){
	 if((!empty($reasonx))&&(strpos($reasonx, 'PROXY') === false)){
		 if((!empty($reasonx))&&(strpos($reasonx, 'FRAUD') === false)){
		 if((!empty($reasonx))&&(strpos($reasonx, 'TOR') === false))
 {
	 
	 
if(!empty($bantime))
{
$today = date('Y-m-d H:i:s'); // today date
$days =  strtotime(trim($tmb)) - strtotime($today);
if($days < 0)
{
$re = "UPDATE banip SET reason='0' WHERE ip = '".$ip."'";
$y = dbSelectALL('', $re);

if($y)
{
$re = "DELETE FROM banip WHERE NOT EXISTS (
 SELECT * FROM (
    SELECT MIN(id) minID FROM banip    
    GROUP BY ip HAVING COUNT(*) > 0
  ) AS q
  WHERE minID=id order by time
)";
dbSelectALL('', $re);

$reloadpages = 1;
}

}
}
 }
}
 } }
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
	

if(empty($reasonx))
  $rv = '#013602';
else if(((!empty($reasonx))&&(strpos($reasonx, 'VPN') !== false))
	||((!empty($reasonx))&&(strpos($reasonx, 'FRAUD') !== false))
||((!empty($reasonx))&&(strpos($reasonx, 'PROXY') !== false))
||((!empty($reasonx))&&(strpos($reasonx, 'TOR') !== false)))
  $rv = '#07405c';	
else
  $rv = '#5c0707';



echo '
<div style="width:auto;overflow:auto;padding:5px;background: '.$rv.';
margin:10px;font-size:13px;cursor:pointer;cursor:hand;" id="match'.md5($time.$i).'" onclick="show_match(\''.md5($time.$i).'\')">	
<div class="wrapper" style="width:calc(100% - 20px);flex-grow: 1; display: flex; float:left;">	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:30%; /* &#1101;&#1083;&#1077;&#1084;&#1077;&#1085;&#1090; &#1086;&#1090;&#1086;&#1073;&#1088;&#1072;&#1078;&#1072;&#1077;&#1090;&#1089;&#1103; &#1082;&#1072;&#1082; &#1073;&#1083;&#1086;&#1095;&#1085;&#1099;&#1081; flex-&#1082;&#1086;&#1085;&#1090;&#1077;&#1081;&#1085;&#1077;&#1088; */
  flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:5 3px;font-size:10px;line-height:14px;width:34px;text-align:center;">'.$tm.'</div>
<div style="float:left;color:#fff;padding:2px;line-height:15px;text-align:left;width:130px;font-size:13px;">

<a href="'.$domain.'/list_ip_ban.php?listguid='.trim($guidxx).'" class="tags" glose="'.$hj.'">
 <div style="color:#fff;">'.$serverx.'</div>
</a>
</div>';
 



echo '
<div style="float:left;color:#fff;padding:9 9px;font-size:18px;line-height:18px;width:3px;text-align:center;padding:10px;">	
</div>

<div style="float:left;color:#fff;text-align:left;width:90px;min-width:60px;padding:7px;">

<a href="'.$domain.'/list_ip_ban.php?geo='.$flag.'" class="tags" glose="'.$geoinff.'">
 
<img src="'.$domain.'/inc/images/flags-mini/'.$flag.'.png" width="24" height="12">

</a>

</div>
</div>		
		
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:60%;" class="wrapper">
	
<div style="color:#fff;padding:2px;line-height:19px;text-align:center;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
	
<a href="'.$domain.'/list_ip_ban.php?poisknickname='.trim($xpnickname).'" style="color:#888;" class="tags" glose="'.$hj.'">
<div style="color:#ddd;font-size:13px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">
<b style="color:#fff;">'.colorize($xpnickname).'</b> &nbsp;&nbsp; ['.$whooo.']</a>
</div>';

	if (!empty($geosearch))
	echo '<div style="color:#eee;float:left;TEXT-ALIGN:LEFT;font-size:10px;">&nbsp</br> '.$guidxx.'</div>';
 
echo '
	</div>
	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:19px;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<a href="'.$domain.'/list.php?listip='.trim($ip).'" style="color:#fff;" target="_blank" class="tags" glose="'.$hj.'">'.$ip.'  </a></div> 
	 
	</div>
	

<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:19px;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<a href="'.$domain.'/list.php?listguid='.trim($guidxx).'" style="color:#fff;" class="tags" glose="'.$lang['ipinformation'].'"> ['.$reasonx.'] </a></div> 
</div>
	
	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:19px;min-width:95px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<a href="'.$domain.'/list.php?listguid='.trim($guidxx).'" style="color:#fff;" class="tags" glose="'.$i_lefttime.'"> ['.$timeFormat.'] </a></div> 
</div>';


echo '
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:19px;min-width:60px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 
<a href="'.$domain.'/list_ip_ban.php?listvisits=X" style="color:#00b6b2;" class="tags" glose="'.$lang['visits'].':['.$zaxodil.']"> ['.$zaxodil.'] </a></div> 
</div>';
	 



if((!empty($reasonx))&&($rv != '#07405c'))	
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:1px;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
<div style="color:#fff;font-size:12px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;">&nbsp 

<form action="'.$domain.'/list_ip_ban.php" onsubmit="return window.confirm(\'Add days? Добавить дней? OK?\');">
  <input style= "font-size:11px;height: 16px;width: 30px;padding: 1px 2px;box-sizing:border-box;" type="hidden" id="timeban" name="timeban" value="'.$bantime.'">
  <input style= "font-size:11px;height: 16px;width: 30px;padding: 1px 2px;box-sizing:border-box;" type="hidden" id="iptimeban" name="iptimeban" value="'.$ip.'">
  <input style= "font-size:11px;height: 16px;width: 30px;padding: 1px 2px;box-sizing:border-box;" type="hidden" id="visited" name="visited" value="'.$zaxodil.'">   
  <input style= "font-size:11px;height: 16px;width: 30px;padding: 1px 2px;box-sizing:border-box;" type="text" id="updatetimeban" name="updatetimeban" placeholder="- / + Day">
  <input style= "font-size:11px;height: 18px;width: 70px;padding: 1px 2px;box-sizing:border-box;" type="submit" value="Submit">
</form>	
</div></div>';		



	
echo '	
<div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:19px;width:3px;overflow:auto;display:inline-block;flex-grow: 1;"> 
<div style="color:#fff;font-size:13px;display:inline-block;float:RIGHT;TEXT-ALIGN:RIGHT;width:3px;">&nbsp  </div> 
</div>	

</div>
	
</div>
	
<div style="line-height:13px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div>
	
	
<div id="match_sub'.md5($time.$i).'" style="display:none;width:calc(100% - 10px);font-size:10px;border-top: 1px solid #222;overflow:auto;margin-top:5px;padding:5px;background:#222;">';
	


echo '	
<div class="match_stats_adv" style="min-width:300px;">
<div style="color:#fff;width:210px;">';



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


if(((!empty($reasonx))&&(strpos($reasonx, 'VPN') !== false))||((!empty($reasonx))&&(strpos($reasonx, 'PROXY') !== false))||((!empty($reasonx))&&(strpos($reasonx, 'TOR') !== false)))
{
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/list_ip_ban.php?baniprange='.$guidxx.'&ip='.$iprange.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:#998546;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="[R]&nbsp;'.$i_ban.'&nbsp;IP&nbsp;'.$i_iprange.':&nbsp;'.$xpnickname.'"> <b>[R]</b> </a>	
</div>';	
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">	
<a href="'.$domain.'/list_ip_ban.php?banip='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:#998546;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="[IB]&nbsp;'.$i_ban.'&nbsp;IP:&nbsp;&nbsp;'.$xpnickname.'"> <b>[IB]</b> </a>		
</div>';	
}
else if(!empty($reasonx))
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">	
<a href="'.$domain.'/list_ip_ban.php?unbanip='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:lime;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="'.$i_unban.':&nbsp;'.$xpnickname.'"> ['.$i_unban.']&nbsp;&nbsp;&nbsp; </a>	
</div>';
else if(substr_count($ip, '.') == 1)
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">	
<a href="'.$domain.'/list_ip_ban.php?baniprange='.$guidxx.'&ip='.$iprange.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:#998546;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="[R]&nbsp;'.$i_ban.'&nbsp;IP&nbsp;'.$i_iprange.':&nbsp;'.$xpnickname.'"> <b>[R]</b> </a>	
</div>';	
else if(substr_count($ip, '.') > 1)
{
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/list_ip_ban.php?banip='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:#998546;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="[IB]&nbsp;'.$i_ban.'&nbsp;IP:&nbsp;&nbsp;'.$xpnickname.'"> <b>[IB]</b> </a>		
</div>';
echo '<div style="float:left;color:#fff;padding:9 9px;text-align:center;width:20px;">		
<a href="'.$domain.'/list_ip_ban.php?baniprange='.$guidxx.'&ip='.$ip.'&nickname='.$xpnickname.'&geo='.$cn_nm.'&visited='.$zaxodil.'" 
target="_blank" style="float:left;color:#998546;line-height:19px;text-align:left;width:2px;FONT-SIZE:18PX;" 
class="tags" glose="[R]&nbsp;'.$i_ban.'&nbsp;IP&nbsp;'.$i_iprange.':&nbsp;'.$xpnickname.'"> <b>[R]</b> </a>	
</div>';		
}

echo '</div></div>';



	
	
	
echo '<div class="match_stats_adv" style="min-width:190px;">Time 
<div style="color:#fff;min-width:190px;">'.$time.'</div></div>
	 

<div class="match_stats_adv" style="min-width:100px;">Left
<div style="color:#fff;width:180px;">'.$tmb.'</div></div>	





<div class="match_stats_adv" style="min-width:100px;">DELETE PLAYER
<div style="color:#fff;width:180px;"><a href="'.$domain.'/list_ip_ban.php?deleteid='.trim($idnumm).'" onClick="return window.confirm(\'DELETE PLAYER? OK?\');"> ❌ </a>
  </div></div>

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

if($reloadpages == 1)
{
sleep(2);
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}	

echo '<br/>

<div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap: wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div class="server_foot_paginator">';

 
$pageskey = '<a href="'.$domain.'/list_ip_ban.php?server=' . $server .'&search=' . $search .
'&geo=' . $geosearch .
'&timeq=' . $timeq .
'&page=';


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
?>