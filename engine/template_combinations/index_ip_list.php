<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");


//sort_banned


if (isLoginUser()) {
 $top_main_total = 100;

if (!empty($nicknameSearch))
{	
 $nicknameSearchguid = $nicknameSearch;
 $nicknameSearch = '';
}
else if (!empty($nicknameSearchguid))
{	
$nicknameSearch  = $nicknameSearchguid;
$nicknameSearchguid = '';
}	
 
 if(!empty($_GET['byadmin']))
 $byadmin = $_GET['byadmin'];
 else
	$byadmin = 'unknown'; 


 
 if(!empty($_GET['visited']))
 $visited = $_GET['visited'];
 else
	$visited = '1'; 

 
if (!empty($_GET['banip']))
{
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 day'));
				$tmk = str_replace("-", ".", $tmk);	
	
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$_GET['nickname']."','".$_GET['ip']."','".$_GET['ip']."','".$_GET['banip']."','IP BAN','".date("Y.m.d H:i:s")."', 
'".$tmk."', '1','" .$byadmin . "','" .$visited . "') 
ON DUPLICATE KEY UPDATE ip='" . $_GET['ip'] . "', playername='".$_GET['nickname']."', patch='" .$visited . "', 
reason='IP BAN', time='".date("Y.m.d H:i:s")."', bantime = '".$tmk."', whooo='" .$byadmin . "'";
$r = dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime, days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
} 
else if (!empty($_GET['unbanip']))
{
if(substr_count($_GET['ip'], '.') == 1)
{
    $re = "UPDATE banip SET reason='0' WHERE ip = '".$_GET['ip']."'";
}
else
	$re = "UPDATE banip SET reason='0' WHERE ip = '".$_GET['ip']."'";
dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}
else if (!empty($nicknameSearch))	
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where playername LIKE :keyword ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 



else if (!empty($_GET['forever']))
{
	    $timeban = urldecode($_GET['timeban']);
     	$iptimeban = urldecode($_GET['iptimeban']);
 		
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +10 year'));
				$tmk = str_replace("-", ".", $tmk);	

$re = "UPDATE banip SET bantime='".$tmk."' WHERE ip = '".$iptimeban."' and  bantime = '".$timeban."'";
$r = dbSelectALL('', $re);
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
	 
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	  	
}



	
else if (!empty($_GET['baniprangetwo']))
{
			  list($onem, $twom, $threem, $fourm) = explode(".", $_GET['ip']);
              $rangeip = $onem.'.'.$twom;
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +30 day'));
				$tmk = str_replace("-", ".", $tmk);			
			  
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$_GET['nickname']."','".$rangeip."','".$_GET['ip']."','".$_GET['baniprangetwo']."','IP RANGE BAN','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" .$byadmin . "','" .$visited . "') 
ON DUPLICATE KEY UPDATE ip='" . $_GET['ip'] . "', playername='".$_GET['nickname']."', patch='" .$visited . "', reason='IP BAN', time='".date("Y.m.d H:i:s")."', bantime = '".$tmk."', whooo='" .$byadmin . "'";
$r = dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}


else if (!empty($_GET['baniprangethree']))
{
			  list($onem, $twom, $threem, $fourm) = explode(".", $_GET['ip']);
              $rangeip = $onem.'.'.$twom.'.'.$threem;
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +30 day'));
				$tmk = str_replace("-", ".", $tmk);			
			  
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$_GET['nickname']."','".$rangeip."','".$_GET['ip']."','".$_GET['baniprangethree']."','IP RANGE BAN','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" .$byadmin . "','" .$visited . "') 
ON DUPLICATE KEY UPDATE ip='" . $_GET['ip'] . "', playername='".$_GET['nickname']."', patch='" .$visited . "', reason='IP BAN', time='".date("Y.m.d H:i:s")."', bantime = '".$tmk."', whooo='" .$byadmin . "'";
$r = dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}


//////////////////////////////////////////////// EDIT
else if (!empty($_GET['updatetimeban']))
{
	$updatetimeban = $_GET['updatetimeban']; 
	$timeban = urldecode($_GET['timeban']);
	$iptimeban = urldecode($_GET['iptimeban']);
	
if((strpos($updatetimeban, '+') !== false)||(strpos($updatetimeban, '-') !== false))
	{		
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' '.$updatetimeban.' day'));
				$tmk = str_replace("-", ".", $tmk);	

$re = "UPDATE banip SET bantime='".$tmk."' WHERE ip = '".$iptimeban."' and  bantime = '".$timeban."'";
$r = dbSelectALL('', $re);
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
	}
	else 
		die("Time in days is $updatetimeban , but need +$updatetimeban or -$updatetimeban!!!");

$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	  	
}

else if (!empty($_GET['deleteid']))
{ 
$re = "DELETE FROM banip where id='".$_GET['deleteid']."'";
$r = dbSelectALL('', $re);

$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";  		  	
}

else if (!empty($_GET['deleteidiinfo']))
{ 
$re = "DELETE FROM demos where id='".$_GET['deleteidiinfo']."'";
$r = dbSelectALL('', $re);

$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM demos where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/admin/index.php?iinfo=demos'; </script>";  		  	
}

else if (!empty($_GET['dub']))
{ 
$re = "DELETE FROM banip WHERE NOT EXISTS (
 SELECT * FROM (
    SELECT MIN(id) minID FROM banip    
    GROUP BY ip HAVING COUNT(*) > 0
  ) AS q
  WHERE minID=id order by time
)";
dbSelectALL('', $re);

$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";  		  	
}  


else if (!empty($_GET['iptimeban']))
{ 
		die("Запиши дни!!!");

$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	  	
}  
else if (!empty($nicknameSearchguid))
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid LIKE :keyword ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;

else if (!empty($_GET['listguid']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid = '".$_GET['listguid']."' ORDER BY playername DESC LIMIT 500";	   
	   
else if (!empty($_GET['listvisits']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where patch ORDER BY time,patch DESC LIMIT " . $premierMessageAafficher . ", " . $top_main_total;
	
else if (!empty($_GET['listip']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where ip LIKE :keyword ORDER BY playername DESC LIMIT 500";	   
	
	
else if (!empty($_GET['poisknickname']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where playername = '".$_GET['poisknickname']."' ORDER BY playername DESC LIMIT 50";	   
 
else if ((empty($_GET['sort_banned']))&&(strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '=') === false))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = 'IP BAN' or reason = 'IP RANGE BAN' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

 
else if (!empty($_GET['sort_banned']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = 'IP BAN' or reason = 'IP RANGE BAN' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else if (!empty($_GET['sort_unbanned']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = '0' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   
		 
else if (!empty($_GET['sort_fakeip']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason LIKE :keyword ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else if (!empty($_GET['sort_banned_visited']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = 'bvisit' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else if (!empty($_GET['sort_screenfakers']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = 'screens' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else if (!empty($iixnfo))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM demos ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	   	   
	   
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else if (!empty($_GET['sort_fakeip'])) 
	  $xz = dbSelectALLbyKey('', $reponse, 'FRAUD');
  else if (!empty($_GET['listip'])) 
	  $xz = dbSelectALLbyKey('', $reponse, $_GET['listip']);
  else 
	  $xz = dbSelectALL('', $reponse);
  
  if(empty($xz))
	  $xz = array();
  
if(empty($iixnfo))
{
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
}
  
if (empty($xz))
	echo '<center>'.$lang['nothing_search'].'</br></center>';  
  
include $cpath . "/engine/template/index_list_ip.php";
if(empty($iixnfo))
{
include $cpath . "/engine/template/footer.php";
}
}
?>
