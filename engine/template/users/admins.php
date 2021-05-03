<?php 
if(!empty($_GET['guid'])){
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}
$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("users", "", $cpath);
$cpath = str_replace('\\\\', "/", $cpath);
$cpath = str_replace("//", "/", $cpath);

include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

if (isLoginUser()){
createAdminsDB();	
if(!empty($_SESSION['codbxpasssteam']))
$byWhois = isLoginUserWHO($_SESSION['codbxpasssteam']);
else if(!empty($_COOKIE['user_online_login']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_login']);
else if(!empty($_COOKIE['user_online_key']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_key']);
else
$byWhois = '';
 

$uuser = '';
 
if(!empty($_SESSION['codbxuser']))
 $codbxuser = $_SESSION['codbxuser'];

if(!empty($byWhois))
$ouser = $byWhois;
else if(!empty($codbxuser))
$ouser = $codbxuser;


if(!empty($ouser))
{
$ddater = strtotime(date("Y-m-d H:i:s"));

$reponse = "SELECT * FROM users WHERE user = '".$ouser."' ORDER BY time desc LIMIT 1";
$uxz = createscreeninsertadmins('online.rcm', $reponse);
if(is_array($uxz))
{
foreach ($uxz as $key => $val) {
	    $uip = $val['ip'];
	    $uuser = $val['user'];
	    $utime = $val['time'];		
}
}
if(empty($uuser))
{
$sql = "INSERT INTO users (ip,user,time) VALUES ('" .getUserIP(). "','" . $ouser . "','" . $ddater . "')";
createscreeninsertadmins('online.rcm', $sql);
}
else if((!empty($uuser))&&($ddater-$utime>=60))
{
$sql = "UPDATE users SET time='" . $ddater . "', ip='" .getUserIP(). "' WHERE user = '".$ouser."'";
createscreeninsertadmins('online.rcm', $sql);	
}

$reponse = "SELECT * FROM users ORDER BY time desc LIMIT 20";
$uxz = createscreeninsertadmins('online.rcm', $reponse);
 //	echo '<b style="color:lime;font-size:18px;">Online users.</b>';
if(is_array($uxz))
{
 $h = 0;	$fh = 0;   $hh = 0;
foreach ($uxz as $key => $val) {
       ++$fh;
	    $uip = $val['ip'];
	    $uuser = $val['user'];
	    $utime = $val['time'];
		
		$secondx = $ddater-$utime;

if((!empty($uuser))&&($secondx<300))
{
if($secondx>0)
{
$hh = 1;	
$min = ($secondx/60);
$minut = floor($min);
$secondxs = $secondx-$minut*60;
$hours= floor($min/60);
$minutes = $minut-$hours*60;
$timeFormat = sprintf('%02d:%02d:%02d', $hours, $minutes, $secondxs);
	
 	echo '<b style="color:white;font-size:17px;"></br>['.$fh.']</b> <b style="color:orange;font-size:17px;">'.$uuser.'</b> 
	: <b style="color:gray;font-size:17px;"> '.$llefttime.':</b> <b style="color:#6798a1;font-size:17px;">'.$timeFormat.'</b> <b style="color:gray;font-size:17px;">IP:</b> <b style="color:#6798a1;font-size:17px;">'.$uip.'</b>';
}}
 
if(((!empty($uuser))&&($secondx<8886401))&&($hh == 0))
{
if($h == 0)
{
$h=1; 
echo '</br></br>';
}
	
if($secondx>0)
{
$min = ($secondx/60);
$minut = floor($min);
$secondxs = $secondx-$minut*60;
$hours= floor($min/60);
$minutes = $minut-$hours*60;
$timeFormat = sprintf('%02d:%02d:%02d', $hours, $minutes, $secondxs);

 	echo '<b style="color:white;font-size:17px;"></br>['.$fh.']</b> <b style="color:orange;font-size:17px;">'.$uuser.'</b> 
	: <b style="color:gray;font-size:17px;"> '.$llefttime.':</b> <b style="color:#6798a1;font-size:17px;">'.$timeFormat.'</b> <b style="color:gray;font-size:17px;">IP:</b> <b style="color:#6798a1;font-size:17px;">'.$uip.'</b>';

}}
	    $hh = 0;
		
}


}
}
}
}
?>