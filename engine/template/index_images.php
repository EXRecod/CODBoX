<?php
ini_set('max_execution_time', 180); //180 seconds = 3 minutes
 if(empty($templ))
	die("PERMISSIONS DENIED!");
$i = 0;$a = 0;$rx = 0;$f = 1;$skolko = 0;
if(strpos($urlmd, "img.php?nicknameSearch") !== false)$f = 0;
else if(strpos($urlmd, "&page=") !== false)$f = 0;
if(!empty($bannedscrx))$f = 0;
if($f==1){
foreach ($screenshots as $ccc => $r) {
		if (($a % 2) == 0) {
				$weburl = $screenshots[$a]['web_url'];
		}
		else {
				$folder = $screenshots[$a]['folder'];
				$images = getDirContents(trim($folder));
				if (!empty($server)) {
						if (trim(clean($server)) == trim(clean(check_foreach($folder, $images)))) {
							if(is_array($images))
							{
								$xscreenshots[$weburl][$folder] = $images;
								break;
							} 
						}
				}
				else 
				{if(is_array($images))$xscreenshots[$weburl][$folder] = $images;}
		}
		++$a;
}
////////////////////////////////////////////////////////
$allowed_types = array("jpg","jpeg"); //разрешеные типы изображений
$file_parts = array();
if(!empty($xscreenshots))
{
foreach ($xscreenshots as $web_folder => $im) { if($skolko > 4000) break;
		foreach ($im as $fulder => $images) {   if($skolko > 4000) break;
				foreach ($images as $image) {   if($skolko > 4000) break;
						$img = $image;
						++$rx;
						$file_parts = explode(".", $image); //разделить имя файла и поместить его в массив
						$ext = strtolower(array_pop($file_parts)); //последний элеменет - это расширение
						if (in_array($ext, $allowed_types)) {
								$md5imxt = $cpath . '/data/db/screenshots/cache_im/servers/' . basename(dirname($image)) . '/';
								if (!file_exists($md5imxt)) {
										mkdir($md5imxt, 0777, true);
								}
								$md5im = $md5imxt . md5(sha1($image)) . '.CodBoxCache';
								///////////////////////  кеширование  //////////////////////////
								if (!file_exists($md5im)) { ++$skolko;
										$image = $fulder . $image;
										if (file_exists($image)) {
												$b64 = base64_encode($web_folder . $img);
												$tu = check_meta($image);
												//$sizeof = (filesize($fold.''.$image));
												$sizeof = '';
												$ddater = strtotime($tu[2]);
												//$mdserver = md5($tu[3]);
												$sql = "INSERT INTO screens (guid,player,image,reason,size,time,dater,server,nameserver) 
	  VALUES ('" . $tu[0] . "','" . $tu[1] . "','" . $b64 . "','0','" . $sizeof . "','" . $tu[2] . "','" . $ddater . "','LoW','" . trim($tu[3]) . "')";
												$cv = createscreeninsert($sbff, $sql);
												if (!empty($cv)) {
														///////////////////////  кеширование  //////////////////////////
														$fp = fopen($md5im, "w");
														fwrite($fp, '.');
														fclose($fp);
														///////////////////////  кеширование  /////////////////////////
												}
										}
								}
						}
				}
		}
}
}else echo('<center><b class="rainbowQ"></br>ERROR! data/settings.php
</br>Example:</center></b>
<left>
</br>//server 1
</br>$screenshots[][\'web_url\'] = "/codbx/screenshots/galleries/server_1_screenshots/"; 
</br>$screenshots[][\'folder\'] = "/scr/way/to/server_1_screenshots/"; 
</br>//server 2
</br>$screenshots[][\'web_url\'] = "/codbx/screenshots/galleries/server_2_screenshots/"; 
</br>$screenshots[][\'folder\'] = "/scr/way/to/server_2_screenshots/";
</br>............. 
</left>');}
if (isset($_GET['page'])) {$page = $_GET['page'];}
else {$page = 1;}
$premierMessageAafficher = ($page - 1) * $screenshotsZ_page;
if (!empty($nicknameSearch)) {
		$resizex = "SELECT COUNT(*) AS id FROM screens where guid='" . $nicknameSearch . "'";
		$reponse = "SELECT * FROM screens WHERE guid='" . $nicknameSearch . "' GROUP BY image, guid ORDER BY dater desc LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
else if (!empty($nicknameSearchguid)) {
		$resizex = "SELECT COUNT(*) AS id FROM screens where player='".$nicknameSearchguid."'";
		$reponse = "SELECT * FROM screens where player='".$nicknameSearchguid."' LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
else if (!empty($_GET['datesearch'])) {
	       $sds = trim($_GET['datesearch']);
	       $rt = urldecode($sds);
		   
		    $gggg = trim($_GET['gdsearch']);

		$resizex = "SELECT COUNT(*) AS id FROM screens where player='".$nicknameSearchguid."'";
		$reponse = "SELECT * FROM screens where guid='" . $gggg . "' and time='".$rt."' LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
else if (!empty($server)) {
		$resizex = "SELECT COUNT(*) AS id FROM screens where nameserver='".$server."'";
		$reponse = "SELECT * FROM screens WHERE nameserver='".$server."' GROUP BY image, guid ORDER BY dater desc LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
else if (!empty($banssearch)) {
		$resizex = "SELECT COUNT(*) AS id FROM screens where reason=1";
		$reponse = "SELECT * FROM screens WHERE reason=1 GROUP BY image, guid ORDER BY dater desc LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
else {
		$resizex = "SELECT COUNT(*) AS id FROM screens";
	if(!empty($bannedscrx))
		$reponse = "SELECT * FROM screens WHERE reason='1' and dater GROUP BY image, guid ORDER BY dater desc LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
	else
		$reponse = "SELECT * FROM screens WHERE dater GROUP BY image, guid ORDER BY dater desc LIMIT " . $premierMessageAafficher . ", " . $screenshotsZ_page;
}
// create date with your timezone 24-10-2020 00:11:25
//$date = new \DateTime('now', new \DateTimeZone('Europe/London'));
// remove 7 days
//$date->sub(new DateInterval('P7D'));
//var_dump(  createscreeninsert($sbff,"DELETE FROM screens WHERE dater < '{$date->format('d-m-Y H:i:s')}'")  );
if (!empty($nicknameSearch)) $xz = createscreeninsert($sbff, $reponse);
else if (!empty($nicknameSearchguid)) $xz = createscreeninsert($sbff, $reponse);
else $xz = createscreeninsert($sbff, $reponse);
//$rx = 0; $xc = createscreeninsert($sbff,$resizex); foreach($xc as $row){$rx=$row['id'];}

if (empty($rx)) {$rx = '?'; $yu = $xz; 
if(is_array($xz))
$rvx = '? / '.count($yu); else $rvx = '? / 0';
}else $rvx = $rx;

if(empty($bannedscrx))
 echo '<div style="height:auto;overflow:auto;" class="content_block">
<a href="' . $domain . '/img.php?server=' . $server . '&bannedscr=' . md5($sbff) .'" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #08e5c8, 0 0 18px #08e5c8, 0 0 40px #08e5c8, 0 0 65px #08e5c8;"><b> > '.$i_ban.' '.$menu_screens.'</b></a></div>';
else
 echo '<div style="height:auto;overflow:auto;" class="content_block"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px red, 0 0 18px red, 0 0 40px red, 0 0 65px red;">'.$i_ban.' '.$menu_screens.'</b></div>';	

echo '<div class="content_block" style="margin-top:0px;"><div class="title">
<div class="text">'.$menu_screens.' [' . $rvx . ']  </div></div><div class="image-grid">';
if ($rx=='?') {$rx = 12000;}
$nb_pages = ceil($rx / $screenshotsZ_page);
$u = 0;
foreach ($xz as $key => $val) {
	    $image = $val['image'];	
		if (strpos($image, 'https://zona-ato-game.ru/codbox/screenshots/banned/') !== false)
			$image = str_replace('https://zona-ato-game.ru/codbox/screenshots/banned/', $domain.'/data/db_protect/banned_players/', $image);
	    else
	    $image = base64_decode($val['image']);
	
		$eguid = $val['guid'];
		$eplayer = $val['player'];
		$ereason = $val['reason'];
		$esize = $val['size'];
		$etime = $val['time'];
	    $servernamet = $val['nameserver'];
		$esserver = $val['server'];
		++$u;
		
		if((!empty($bannedscrx))&&($ereason == 1))
		{
			if(strpos($image, '/data/db_protect/banned_players/') === false)
			 $image = $domain.'/data/db_protect/banned_players/'.basename($image);
		}
		
		if($ereason == 1) $fv = 'watermarked banned'; else $fv = 'gallery-item';
		if($ereason == 1) $hv = ' watermark'; else $hv = '';
		if($ereason == 1){ if(!empty($esserver))$nv = 'by '.$esserver.''; else $nv = 'by Unknown'; }else $nv = '';
		
		$rrr = 'color:#fff; text-shadow:-1px -1px 0 #000,-1px 1px 0 #000,1px -1px 0 #000,1px 1px 0 #000;';




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isLoginUser())
{
	
if($ereason == 1)
$real = ' ';
else	  
$real = ' ';

	
    $specialssyst = $real;
}
else
	$specialssyst = "";





echo '
<div class="'.$fv.'" id="screeen">  '.$nv.'
<div class="box-crew"><a href="' . $image . '" class=\'fresco\' data-fresco-group="zxzx" 
data-fresco-caption="'.$specialssyst.' ' . clean($eplayer) . ' ✔ ' . $eguid . ' ✔ ' . $etime . ' ✔ ' . clean($servernamet) . '">
        
<span class="gallery-icon lazy'.$hv.'" style="display:inline-block;
background-size: 100% 100%; background-repeat: no-repeat; 
background-image: url(' . $image . ');" oncontextmenu="return false"></span></a>		
<div class="caption" id="galerry_' . md5($servernamet) . '">

<div style="float:center;font-size:15px;'.$rrr.'">	

</br>
<a href="' . $domain . '/img.php?server=' . urlencode($servernamet) . '">' . colorize($servernamet) . '</a>	</br>
<span class="name"><a href="' . $domain . '/img.php?nicknameSearchguid=' . trim($eplayer) . '" style="'.$rrr.'">' . colorize($eplayer) . '</a></span> |
<span style="float:center;font-size:13px;color:#888888;text-shadow:-1px -1px 0 #222,-1px 1px 0 #111,1px -1px 0 #222,1px 1px 0 #111;">' . $etime . '</span> | 
<a href="' . $domain . '/img.php?nicknameSearch=' . $eguid . '">
<span style="float:center;font-size:14px;color:#eee; text-shadow:-1px -1px 0 #000,-1px 1px 0 #000,1px -1px 0 #000,1px 1px 0 #000;">' . $eguid . '</span></a>

<div style="left:4px;height:12px;text-align:right;color:orange;">' . $u . '</div>

 ';



echo '<dt>';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
	$byWho = '';

if (isLoginUser()){
if($ereason == 1)
echo '<a href="' . $domain . '/redirect.php?unban=' . $eguid . '&guid=' . $eguid . '&ip=0&nickname=' . $eplayer . '&url=' . urlencode($image) . '&qserver=' . urlencode($servernamet) .$byWho. '" class="name" target="_blank"> 
	  &emsp;<b class="tags" glose="'.$i_unban.'">
	  <img style="width:40px;height:40px;" src="' . $domain . '/inc/images/unban.png"></b></a>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else	  
echo '<a href="' . $domain . '/redirect.php?guid=' . $eguid . '&ip=0&nickname=' . $eplayer . '&url=' . urlencode($image) . '&qserver=' . urlencode($servernamet) .$byWho. '" class="name" target="_blank"> 
	  &emsp;&emsp;&emsp;&emsp;<b class="tags" glose="'.$i_ban.'">
	  <img style="width:40px;height:40px;" src="' . $domain . '/inc/images/ban.png"></b></a>';	 		  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo '<a href="' . $domain . '/list.php?listguid=' . $eguid . '" class="name" target="_blank"> 
	  &emsp;&emsp;&emsp;&emsp;<b class="tags" glose="LIST">
	  <img style="width:40px;height:40px;" src="' . $domain . '/inc/images/status/online.png"></b></a>';	  

echo '<a href="' . $domain . '/chat.php?search=' . $eguid . '" class="name" target="_blank"> 
	  &emsp;&emsp;&emsp;&emsp;<b class="tags" glose="'.$i_chat.'"><img style="width:40px;height:40px;" src="' . $domain . '/inc/images/flags-mini/AQ.png"></b>&emsp;</a>';		  	  
}

/*
else
{
if($ereason == 1)
echo '<a href="' . $domain . '/admin/login.php" class="name" target="_blank"> 
	  &emsp;<b class="tags" glose="'.$i_unban.'"><img style="width:40px;height:40px;" src="' . $domain . '/inc/images/unban.png"></b></a>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else	  
echo '<a href="' . $domain . '/admin/login.php" class="name" target="_blank"> 
	  &emsp;<b class="tags" glose="'.$i_ban.'"><img style="width:40px;height:40px;" src="' . $domain . '/inc/images/ban.png"></b></a>';	 		  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  		
}
*/


echo '<span style="padding: 0px 15px;">&nbsp;</span>
<a href="' . $domain . '/stats.php?brofile=' . $eguid . '&s=' . urlencode($servernamet) . '" class="name" target="_blank"> 
<b class="tags" glose="'.$i_stats.'"><img src="' . $domain . '/inc/images/statics.png"></b> <span>&nbsp;</span>     </a>';


 ////////////////////////////////////////////////////////  
 $x = 0; $ht = '';
 foreach ($screenshots as $w => $r) 
 {
  if (($x % 2) == 0) 
	  $weburl = $screenshots[$x]['web_url']; 
  else  
	  $folder = $screenshots[$x]['folder'];  
     if(strpos($image, $weburl) !== false){ if(!empty($folder))
		 $ht = $folder.basename($image);} ++$x;
 }
////////////////////////////////////////////////////////

 	
echo '<a href="' . $domain . '/download.php?f=' .base64_encode($ht).'" target="_blank" style="float:right;">';
//if (empty($_GET['datesearch'])) 
echo '<button id="button1"><img style="width:15px;height:15px;margin-top:3px;" src="' . $domain . '/inc/images/downl.png"></button>';
//else   
//echo '<button style="background:green;" id="button1"><img style="width:40px;height:40px;" src="' . $domain . '/inc/images/camera.png"></button>';	
echo '&emsp;</a>';



echo '</dt></div></div></div></div>';
}
	
if(!empty($eguid))
{
echo '<script type=\'text/javascript\'>
 function screenshot(){
   html2canvas(document.getElementById(\'screeen\')).then(function(canvas) {
              return Canvas2Image.saveAsJPEG(canvas, 900, 640, '.$eguid.');
   });}
</script>';		
}

if(!empty($bannedscrx)) $jkl = '&bannedscr='.md5($sbff); else $jkl = '';
echo '</div></div> 
<script type="text/javascript" src="' . $domain . '/inc/inc_screenshots/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="' . $domain . '/inc/inc_screenshots/lazyload.min.js"></script>';

echo '<br/><div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap:wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div class="server_foot_paginator">';
$pageskey = '<a href="' . $domain . '/img.php?server=' . $server.$jkl.'&search=' . $search .'&nicknameSearchguid=' . $nicknameSearchguid .'&nicknameSearch=' . $nicknameSearch . '&page=';
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
?>