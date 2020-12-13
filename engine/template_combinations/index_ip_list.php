<?php
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
 
 
 
 if (!empty($nicknameSearch))	
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where playername LIKE :keyword DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;

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
else if (!empty($_GET['banip']))
{
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 day'));
				$tmk = str_replace("-", ".", $tmk);	
	
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$_GET['nickname']."','".$_GET['ip']."','".$_GET['ip']."','".$_GET['banip']."','IP BAN','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" .$_GET['byadmin'] . "','cod4 1.8')";
$r = dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime, days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}	
else if (!empty($_GET['baniprange']))
{
			  list($onem, $twom, $threem, $fourm) = explode(".", $_GET['ip']);
              $rangeip = $onem.'.'.$twom;
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 day'));
				$tmk = str_replace("-", ".", $tmk);				  
			  
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$_GET['nickname']."','".$rangeip."','".$_GET['ip']."','".$_GET['baniprange']."','IP RANGE BAN','".date("Y.m.d H:i:s")."', '".$tmk."', '1','" .$_GET['byadmin'] . "','cod4 1.8')";
$r = dbSelectALL('', $re);

sleep(1);
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 echo "<script> window.location.href = '$domain/list_ip_ban.php'; </script>";
}
//////////////////////////////////////////////// EDIT
else if (!empty($_GET['updatetimeban']))
{
	echo $updatetimeban = $_GET['updatetimeban']; 
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
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid LIKE :keyword DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	   
else if (!empty($_GET['listguid']))
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid = '.$_GET['listguid'].' ORDER BY playername DESC LIMIT 500';	   
	
else if (!empty($_GET['listip']))
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where ip = '.urldecode($_GET['listip']).' ORDER BY playername DESC LIMIT 500';	   
	
	
else if (!empty($_GET['poisknickname']))
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid = '.$_GET['poisknickname'].' ORDER BY playername DESC LIMIT 50';	   
   
else if (!empty($nicknameSearch))	
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid LIKE :keyword ORDER BY time desc, playername DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;

else if (!empty($_GET['sort_banned']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = 'IP BAN' or reason = 'IP RANGE BAN' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else if (!empty($_GET['sort_unbanned']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason = '0' ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   
		 
else if (!empty($_GET['sort_fakeip']))
$reponse = "SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where reason LIKE :keyword ORDER BY time DESC LIMIT " . $premierMessageAafficher . ', ' . $top_main_total;	   

else
$reponse = 'SELECT id,playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM banip where guid ORDER BY time DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	   	   
	   
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else if (!empty($_GET['sort_fakeip'])) 
	  $xz = dbSelectALLbyKey('', $reponse, 'FRAUD');
  else 
	  $xz = dbSelectALL('', $reponse);
  
  if(empty($xz))
	  $xz = array();
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
  
include $cpath . "/engine/template/index_list_ip.php";

include $cpath . "/engine/template/footer.php";
}
?>
