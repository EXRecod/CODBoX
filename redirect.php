<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (empty($cpath)) {
		$cpath = dirname(__FILE__);
}
include ($cpath . "/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__);
include ($cpath . "/engine/functions/main.php");
if (isLoginUser()) $key = 1;
else $key = '';
if (empty($key)) die('GOODBYE HACHER!');
if (!empty($_GET['chatban'])) {
		if (!empty($_GET['guid'])) {
				$guid = $_GET['guid'];
				if (isset($_GET['nickname'])) $nick = $_GET['nickname'];
				else $nick = '';
				header("Location: " . $ssylka_sourcebans . "?p=admin&c=comms&xnickname=" . $nick . "&xguid=" . $guid . "");
				die();
		}
}
else if (!empty($_GET['unban'])) {
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
$guid = '';
$reponse = 'SELECT x_db_ip,x_db_name,x_db_guid,s_port,x_db_conn,x_db_date,x_date_reg 
FROM x_db_players where x_db_ip='.$_SERVER['REMOTE_ADDR'].' DESC LIMIT 1';
	  $xz = dbSelectALL('', $reponse);
	  if(is_array($xz))
	  {
foreach ($xz as $keym => $dannye) 
{
$guid = $dannye['x_db_guid']; $namr = $dannye['x_db_name']; $guid = $dannye['x_db_guid']; 
} 
	  }
$n = $cpath. "/data/db/steam_logs/";	
if(!file_exists($n))
	mkdir($n, 0777, true);
 	$fpl = fopen($n.'_admin_bans.log', 'w+');
	if(!empty($guid))
	fwrite($fpl, "\n Date: ".date("Y.m.d H:i:s")." IP: ".$_SERVER['REMOTE_ADDR']."  GUID: ".$guid." NICK: ".$namr);
      else
	fwrite($fpl, "\n Date: ".date("Y.m.d H:i:s")." IP: ".$_SERVER['REMOTE_ADDR']);
    fclose($fpl);		
 	$guid = $_GET['guid'];
				if (!empty($_GET['url']))
				{					
			          $url = $_GET['url'];
					  
			if(strpos($url,'http')!==false)
			{		$bfolder = $cpath . '/data/db_protect/banned_players/';
                    if(file_exists($bfolder.basename($url)))
					{						
			         unlink($bfolder.basename($url));
					 
		$sql = "UPDATE screens SET reason='0' WHERE guid = $guid";
		createscreeninsertprotect('screenshots_banned.rcm', $sql);
					}
			}}
 
		$reponse = "UPDATE screens SET reason='0' WHERE guid = $guid";
		createscreeninsert('screenshots.rcm', $reponse);
                
        $STEAM_ID = IsSteamCast($guid);
				//https://zona-ato-game.ru/sourcebans/index.php?p=banlist&advSearch=STEAM_31:0:878543413&advType=steamid
				if($STEAM_ID)
				    header("Location: " . $ssylka_sourcebans . "?p=banlist&advSearch=" . trim($STEAM_ID) . "&advType=steamid");
				else
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				die();

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
}
else {
		if (!empty($_GET['guid'])) {
$n = $cpath. "/data/db/steam_logs/";	
if(!file_exists($n))
	mkdir($n, 0777, true);

$guid = '';
$reponse = 'SELECT x_db_ip,x_db_name,x_db_guid,s_port,x_db_conn,x_db_date,x_date_reg 
FROM x_db_players where x_db_ip='.$_SERVER['REMOTE_ADDR'].' DESC LIMIT 1';
	  $xz = dbSelectALL('', $reponse);
	  if(is_array($xz))
	  {
foreach ($xz as $keym => $dannye) 
{
$namr = $dannye['x_db_name']; $guid = $dannye['x_db_guid']; 
} 
	  }

 	$fpl = fopen($n.'_admin_bans.log', 'w+');
	if(!empty($guid))
	fwrite($fpl, "\n Date: ".date("Y.m.d H:i:s")." IP: ".$_SERVER['REMOTE_ADDR']."  GUID: ".$guid." NICK: ".$namr);
      else
	fwrite($fpl, "\n Date: ".date("Y.m.d H:i:s")." IP: ".$_SERVER['REMOTE_ADDR']);
    fclose($fpl);		
			
if(isset($_GET['byadmin']))
$byadmin	 = $_GET['byadmin'];
else 
$byadmin	 = '0';		
		
				$ip = '';
				$guid = $_GET['guid'];
				if (isset($_GET['nickname'])) $nick = $_GET['nickname'];
				else $nick = '';
				if (isset($_GET['url'])) $url = $_GET['url'];
				else $url = '';
				if (isset($_GET['qserver'])) $qserver = $_GET['qserver'];
				else $qserver = '';
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if (!empty($url)){
				$reponse = "UPDATE screens SET reason='1' WHERE guid = $guid";
				createscreeninsert('screenshots.rcm', $reponse);					
					
						$decoded_image_url = urldecode($url);
						$qserver = urldecode($qserver);
						$content = file_get_contents($decoded_image_url);
						$imagname = basename($decoded_image_url);
						$rty = $cpath . '/data/db_protect/banned_players/';
						file_put_contents($rty . $imagname, $content, FILE_APPEND | LOCK_EX);
				
				$timej = date("d-m-Y H:i:s");
				$ddater = strtotime($timej);
				$b64 = base64_encode($decoded_image_url);
				$tu = check_meta($image);
				

				//$sizeof = (filesize($fold.''.$image));
				$sizeof = '';
				$sql = "INSERT INTO screens (guid,player,image,reason,size,time,dater,server,nameserver) 
VALUES ('" . $guid . "','" . $nick . "','" . $b64 . "','1','0','" . $timej . "','" . $ddater . "','" .$byadmin . "','" . $qserver . "')";
				$cv = createscreeninsertprotect('screenshots_banned.rcm', $sql);
				}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$reponse = "SELECT t0.x_db_name,t0.x_db_guid,t1.guid,t0.x_db_date,t1.ip, t0.x_db_ip   
FROM x_db_players t0 JOIN ( SELECT ip,guid,name FROM x_up_players ) 
t1 ON  t0.x_db_guid = t1.guid where t1.ip  > '0' and  t0.x_db_ip  > '0' and t0.x_db_guid = '".$guid."' or t1.guid = '".$guid."'
GROUP BY t1.guid,t0.x_db_ip,t1.ip ORDER BY (x_db_date)  DESC LIMIT 1";
				if (!empty($_GET['ip'])) $ip = $_GET['ip'];
				else {
						$xz = dbSelectALL('', $reponse);
						foreach ($xz as $keym => $dannye) {
										if(strpos($dannye['x_db_ip'],'.')!==false)
											 $ip = $dannye['x_db_ip'];
										else 
											 $ip = $dannye['ip'];
						}
				}
				if (strpos($domain, "http") === false) {
						$url = urldecode($url);
						$parse = parse_url($domain);
						$hoost = $parse['host'];
						if (strpos($domain, "https:") !== false) $ht = 'https://';
						else $ht = 'http://';
						$url = urlencode($ht . $hoost . $url);
				}
				
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 day'));
				$tmk = str_replace("-", ".", $tmk);
				 
				 
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$nick."','".$ip."','".$ip."','".$guid."','IP BAN','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" .$byadmin . "','cod4 1.8')";
$r = dbSelectALL('', $re);
				header("Location: " . $ssylka_sourcebans . "?p=admin&c=bans&xnickname=" . $nick . "&xguid=" . $guid . "&xurl=" . $url . "&xip=" . $ip . "");
				die();
		}
}
?>