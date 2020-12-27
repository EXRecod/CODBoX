<?php session_start();
if(!empty($_GET['timer'])){
 
if (strpos($_SERVER["HTTP_REFERER"], 'chat.php') !== false)
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
/*
select s_kills,s_deaths,s_pg, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000
ORDER BY kdratio DESC
*/

/*
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_URL,trim($game_server_list_parser));
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($curl_handle, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$query = curl_exec($curl_handle);
curl_close($curl_handle);   
preg_match_all('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{3,5}/',$query,$a);
var_dump($a);
*/

  
 if (!empty($search))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where guid like "'.$search.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else if (!empty($nicknameSearchguid)) 
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where nickname LIKE :keyword and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	
else if (!empty($nicknameSearch))	
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where guid LIKE :keyword and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	
else if (!empty($server))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where s_port="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	 
else if (!empty($statusx1))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where st1="'.$statusx1.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	 
else if (!empty($timeq))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where timeh="'.$timeq.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total; 	
else if (!empty($geosearch))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where geo="'.$geosearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 
  
 
  //ZAPROS NR - 2
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else 
	  $xz = dbSelectALL('', $reponse);


$nb_pages = 100;


echo ' 
<script src="' . $domain . '/data/graph/dynamics2.js"></script>
<div class="content_block">
<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>' . $i_chat . '</h1> </div>';
///////////////////////////////////////////////////////////////////////////////////////////////////
$geoinff = '';
require $cpath.'/engine/geoip_bases/class.iptolocation.php';
$db = new \IP2Location\Database($cpath.'/engine/geoip_bases/IP2LOCATION-LITE-DB3.BIN', \IP2Location\Database::FILE_IO);



$i = 0;
foreach ($xz as $keym => $dannye) {
		++$i;
		$xplayerip = $dannye['ip'];
		$xpnickname = $dannye['nickname'];
		$serverx = $dannye['servername'];
		$cntz = $dannye['s_port'];
		$guidxx = $dannye['guid'];
		$txt = $dannye['text'];
		$geo = $dannye['geo'];
		$time = $dannye['time'];
		$txttitle = $txt;
		//CHAT BANS
		
if(!filter_var($xplayerip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
	$xplayerip = '1.101.101.101';
		
		$chatbanstatus = IsChatBanned($guidxx);
		$txtemptycnt = substr_count($txt, ' ');
		if ((strlen($txt) > 70) && ($txtemptycnt < 3)) $txt = strlen($txt) > 35 ? substr($txt, 0, 35) . "...." : $txt;
		$txt = wordwrap($txt, 50, "</br>&emsp;", 1);
		if ($chatbanstatus == "0%0%0") $txta = ' <b style="color: #fff;
text-shadow: 3px 3px 10px #17f612,
    -2px 1px 20px #17f612;">' . $i_chat_exp . '</b>';
		else if (strpos($chatbanstatus, "-") !== false) {
				$txt = '';
				$Py = explode("%", $chatbanstatus);
				$txta = ' <b style="color: #fff;

text-shadow: 3px 3px 10px #f61212,
    -2px 1px 20px #f61212;">' . $i_chat_ban . ' ' . $Py[1] . '</b> ';
		}
		else $txta = '';
		//ANTIMAT
		$txt = antimat($txt);
		if (strpos($txt, "%CENSORED%") !== false) {
				if (isLoginUser()) $txt = '<b class="rainbowQ">' . $txttitle . '</b> ' . $txt;
		}
		if (!empty($xplayerip)) {
				$record = $db->lookup($xplayerip, \IP2Location\Database::ALL);
				if (!empty($record)) {
					
					
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
				else {
						$flag = '0';
						$cn_nm = '';
				}
		}
		else if (!empty($geo)) {
				$flag = $geo;
				$cn_nm = '';
		}
		else {
				$flag = '0';
				$cn_nm = '';
		}
		$tm = str_replace(".", "-", $time);
		$tm = trim($tm);
		if ($flag == 'zag') $tm = $tm . '';
		else $tm = date("Y-m-d H:i:s", strtotime($tm . " " . $raznica_vremya . " hour"));
		$xxtime = trim($tm);
		$tm = str_replace("-", ".", $tm);
		$tm = time_elapsed_string($xxtime);
		//$db_date = new DateTime($xxtime);
		//$unix_db_date = $db_date->getTimestamp();
		//$tm = getDateString($unix_db_date);
		echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:10px;font-size:13px;cursor:pointer;cursor:hand;" id="match' . md5($time . $i) . '" onclick="show_match(\'' . md5($time . $i) . '\')">
	
	
<div class="wrapper" style="width:calc(100% - 20px);flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:30%; /* &#1101;&#1083;&#1077;&#1084;&#1077;&#1085;&#1090; &#1086;&#1090;&#1086;&#1073;&#1088;&#1072;&#1078;&#1072;&#1077;&#1090;&#1089;&#1103; &#1082;&#1072;&#1082; &#1073;&#1083;&#1086;&#1095;&#1085;&#1099;&#1081; flex-&#1082;&#1086;&#1085;&#1090;&#1077;&#1081;&#1085;&#1077;&#1088; */
  flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:5 3px;font-size:10px;line-height:14px;width:34px;text-align:center;">' . $tm . '</div>
<div style="float:left;color:#fff;padding:2px;line-height:12px;text-align:left;width:200px;font-size:13px;">

<a href="' . $domain . '/chat.php?server=' . $cntz . '" class="tags" glose="' . clean($serverx) . '">
' . colorize($serverx) . '
</a>

</div>';
		if (isLoginUser()) {
echo '<div style="float:left;color:#fff;padding:5 9px;font-size:10px;line-height:12px;width:7px;text-align:center;">	
<a href="' . $domain . '/redirect.php?chatban=' . $guidxx . '&guid=' . $guidxx . '&ip=' . $xplayerip . '&nickname=' . $xpnickname . '&geo=' . $flag . '" 
target="_blank" 
style="float:left;color:#fff;padding:8 9px;line-height:12px;text-align:left;width:2px;FONT-SIZE:15PX;" 
class="tags" glose="'.$i_chat.'_'.$i_ban.'❌' . $xpnickname . '"> [CB] </a>
</div>

<div style="float:left;color:#fff;padding:5 9px;font-size:15px;line-height:12px;width:7px;text-align:center;">	
<a href="' . $domain . '/list.php?nicknameSearch=' . trim($guidxx) . '" 
target="_blank" 
style="float:left;color:#fff;padding:14px;line-height:1px;text-align:left;width:2px;FONT-SIZE:15PX;" 
class="tags" glose="✅List"> [L] </a>
</div>
';
		}
		echo '<div style="float:left;color:#fff;padding:12px;text-align:left;width:90px;FONT-SIZE:18PX;min-width:60px;">
	
 

<a href="' . $domain . '/chat.php?geo=' . $flag . '" class="tags" glose="' . $geoinff . '">
 
<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="24" height="12">

</a>
	</div>
	</div>		
	
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:60%;" class="wrapper">
	
<div style="color:#fff;padding:2px;line-height:24px;text-align:center;min-width:90px;overflow:auto;display:inline-block;flex-grow: 1;">
	
<a href="' . $domain . '/chat.php?search=' . $guidxx . '" style="color:#888;" class="tags" glose="' . $guidxx . '">
<div style="color:#ddd;font-size:13px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">
' . colorize($xpnickname) . '</a>
</div>';
		if (!empty($geosearch)) 
			echo '<div style="color:#eee;float:left;TEXT-ALIGN:LEFT;font-size:10px;">&nbsp</br> ' . $guidxx . '</div>';
		
       $txt = colorize($txt);		
		
		
if (isLoginUser()){
 foreach ($multi_servers_array as $arxx => $xxservername) {
						   $zxх = explode("server_md5:", $arxx);
						   $fldd = $zxх[1];
						   
						   $zf = explode("rcon:", $arxx);
						   $rcn = $zf[1];	
						   
						   $zb = explode("port:", $arxx);
						   $prt = $zb[1];
						   
						   $io = explode("ip:", $arxx);
						   $ipv = $io[1];
						   
							       $server_name = $xxservername;
								    $server_md5 = strtok($fldd, " ");
							       $server_rconpass = strtok($rcn, " ");
							       $server_port = strtok($prt, " ");
							       $server_ip = strtok($ipv, " ");							   
 if($server_md5 == $cntz){	
       $txt = "<a href=\"".$domain."/admin/sent.php?server=".$server_md5."&svrnm=".$serverx."&gd=".$guidxx."&plyr=".$xpnickname."\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:#fefefe;\"> ".$txt."</a>";
}		
}}		
		
		
		
	echo '
	</div>
	
<div style="color:#fff;padding:2px;line-height:24px;text-align:center;min-width:100px;overflow:auto;display:inline-block;flex-grow: 1;">
 
<div style="color:#fff;font-size:13px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">&nbsp <a href="' . $domain . '/chat.php?#" style="color:#fff;" title="' . clean($txttitle) . '"> ' .$txt . $txta . ' </a></div> 
	</div>
	
	
	</div>
	
	</div>
<div style="line-height:30px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div>
	
<div id="match_sub' . md5($time . $i) . '" style="display:none;width:calc(100% - 10px);font-size:10px;border-top: 1px solid #222;overflow:auto;margin-top:5px;padding:5px;background:#222;">
	
<div class="match_stats_adv" style="min-width:190px;">Time 
<div style="color:#fff;min-width:190px;">' . $time . '</div></div>
	 
	
<div class="match_stats_adv" style="min-width:100px;">Guid
<div style="color:#fff;width:100px;">' . $guidxx . '</div></div>

	</div>
	
	</div>
 ';
}
echo '</div>';
echo '</br></br>';
if (empty($brofile)) {
		$fff = $top_main_total - $ssssob;
		$t = 0;
		for ($i = 1;$i <= $nb_pages;$i++) {
				$t++;
				if (empty($search)) {
						if (($nb_pages == $page) && ($nb_pages == $t)) {
								for ($k = 1;$k <= $fff;$k++) {
										if ($top_main_total < $ssssob + 10) echo '</br>';
								}
						}
				}
		}
		echo '<br/>

<div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap: wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div class="server_foot_paginator">';
		$pageskey = '<a href="' . $domain . '/chat.php?server=' . $server . '&search=' . $search . '&geo=' . $geosearch . '&timeq=' . $timeq . '&page=';
		// Проверяем нужны ли стрелки назад
		if ($page != 1) $pervpage = $pageskey . '1" class="paginator">' . $t_page_first . '</a> | ' . $pageskey . ($page - 1) . '" class="paginator">' . $t_page_pre . '</a> | ';
		// Проверяем нужны ли стрелки вперед
		if ($page != $nb_pages) $nextpage = ' | ' . $pageskey . ($page + 1) . '" class="paginator">' . $t_page_next . '</a> | ' . $pageskey . $nb_pages . '" class="paginator">' . $t_page_last . '</a>';
		// Находим две ближайшие станицы с обоих краев, если они есть
		if ($page - 8 > 0) $page8left = ' ' . $pageskey . ($page - 8) . '" class="paginator">' . ($page - 8) . '</a> | ';
		if ($page - 7 > 0) $page7left = ' ' . $pageskey . ($page - 7) . '" class="paginator">' . ($page - 7) . '</a> | ';
		if ($page - 6 > 0) $page6left = ' ' . $pageskey . ($page - 6) . '" class="paginator">' . ($page - 6) . '</a> | ';
		if ($page - 5 > 0) $page5left = ' ' . $pageskey . ($page - 5) . '" class="paginator">' . ($page - 5) . '</a> | ';
		if ($page - 4 > 0) $page4left = ' ' . $pageskey . ($page - 4) . '" class="paginator">' . ($page - 4) . '</a> | ';
		if ($page - 3 > 0) $page3left = ' ' . $pageskey . ($page - 3) . '" class="paginator">' . ($page - 3) . '</a> | ';
		if ($page - 2 > 0) $page2left = ' ' . $pageskey . ($page - 2) . '" class="paginator">' . ($page - 2) . '</a> | ';
		if ($page - 1 > 0) $page1left = $pageskey . ($page - 1) . '" class="paginator">' . ($page - 1) . '</a> | ';
		if ($page + 8 <= $nb_pages) $page8right = ' | ' . $pageskey . ($page + 8) . '" class="paginator">' . ($page + 8) . '</a>';
		if ($page + 7 <= $nb_pages) $page7right = ' | ' . $pageskey . ($page + 7) . '" class="paginator">' . ($page + 7) . '</a>';
		if ($page + 6 <= $nb_pages) $page6right = ' | ' . $pageskey . ($page + 6) . '" class="paginator">' . ($page + 6) . '</a>';
		if ($page + 5 <= $nb_pages) $page5right = ' | ' . $pageskey . ($page + 5) . '" class="paginator">' . ($page + 5) . '</a>';
		if ($page + 4 <= $nb_pages) $page4right = ' | ' . $pageskey . ($page + 4) . '" class="paginator">' . ($page + 4) . '</a>';
		if ($page + 3 <= $nb_pages) $page3right = ' | ' . $pageskey . ($page + 3) . '" class="paginator">' . ($page + 3) . '</a>';
		if ($page + 2 <= $nb_pages) $page2right = ' | ' . $pageskey . ($page + 2) . '" class="paginator">' . ($page + 2) . '</a>';
		if ($page + 1 <= $nb_pages) $page1right = ' | ' . $pageskey . ($page + 1) . '" class="paginator">' . ($page + 1) . '</a>';
		// Вывод меню если страниц больше одной
		if ($nb_pages > 1) {
				Error_Reporting(E_ALL & ~E_NOTICE);
				echo $pervpage . $page7left . $page6left . $page5left . $page4left . $page3left . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $page3right . $page4right . $page5right . $page6right . $page7right . $nextpage;
				echo "</div></div>";
		}
}

include($cpath. '/engine/ajax_data/cache-bottom.php');
}
}
?>