<?php 
$templ = 1; 
error_reporting(E_ALL);  
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
include($cpath ."/inc/data.php"); 
include($cpath ."/engine/functions/langctrl.php");
$baseurlz = basename(__FILE__); 
include($cpath ."/engine/functions/main.php");
if((empty($_COOKIE["codbx_uexec"]))&&(!empty($_SESSION['codbxuserexec'])))
    setcookie("codbx_uexec", $_SESSION['codbxuserexec'], time()+259200);
if(isLoginUser())
{
   if (empty($_GET['fromguid']))
    $fromguid = 0;
   else
    $fromguid = $_GET['fromguid']; 

  if (empty($_GET['rc']))
  $toguid = 0;
  else
  $toguid = $_GET['rc'];

if (empty($_GET['plyr']))
 $plyr = '';
else
 $plyr = $_GET['plyr'];


$toguid = trim($toguid);

if((!empty($fromguid))&&(!empty($toguid))){
	echo '<center><div style="background:#333;">';
foreach ($multi_servers_array as $arx => $f) {
usleep(100000);
$t = ''; $z = '';
	                
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $p = strtok($fld, " ");
					       $svipport = trim($p);

$query = "SELECT `s_pg`, `s_guid`, `s_port` FROM `db_stats_0` WHERE  s_port = '".$svipport."' and `s_guid` = '".$fromguid."' limit 1";
$zl = dbSelectALL('', $query);

foreach ($zl as $keym => $dannye)
{
$z = $dannye['s_pg'];
$oldguid_uid = $z;
}

$query = "SELECT `s_pg`, `s_guid`, `s_port` FROM `db_stats_0` WHERE  s_port = '".$svipport."' and `s_guid` = '".$toguid."' limit 1";
$tl = dbSelectALL('', $query);

foreach ($tl as $keym => $dannye)
{
$t = $dannye['s_pg'];
$newguid_uid = $t; 
}

if(empty($t))
$newguid_uid = abs(hexdec(crc32(trim($svipport . $toguid))));



 if((empty($t))&&(!empty($z)))
 {

echo  '<hr style="border: 5px solid yellow;border-radius: 5px;"><b style="font-family: Titillium Web; color: yellow; font-size:13px;"> SERVER: '.$svipport.' / GUID: '.$toguid.' : OK! </b></br></br>';


for ($i = 0;$i <= 9;$i++) {
	
//////////////////////////////////////////////////////////////////
/////////////////////////  db_stats_0  ///////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$query = "update `db_stats_0` set `s_pg` = '" . $newguid_uid . "', `s_guid` = '".$toguid."' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
//////////////////////////////////////////////////////////////////
/////////////////////////  db_stats_  ////////////////////////////
//////////////////////////////////////////////////////////////////
if(($i > 0)&&($i < 6))
{
$query = "update `db_stats_".$i."` set `s_pg` = '" . $newguid_uid . "' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
	
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_hits  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{
	
$query = "update `db_stats_hits` set `s_pg` = '" . $newguid_uid . "' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
	
//////////////////////////////////////////////////////////////////
////////////////////////  playermaps  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$query = "update `playermaps` set `guid` ='" . $toguid . "' where `guid`='" . $fromguid . "' and `port` =  '" .$svipport. "'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_history  //////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$query = "update `db_stats_history` set `pg` = '" . $newguid_uid . "' where `pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}	
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_week  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$query = "update `db_stats_week` set `s_pg` = '" . $newguid_uid . "' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}

//////////////////////////////////////////////////////////////////
/////////////////////////  db_weapons_  //////////////////////////
//////////////////////////////////////////////////////////////////
if(($i > 0)&&($i < 9))
{	
$query = "update `db_weapons_".$i."` set `s_pg` = '" . $newguid_uid . "' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

}

 }
 else if((!empty($t))&&(!empty($z)))
 {	

echo  '<hr style="border: 5px solid green;border-radius: 5px;"><b style="font-family: Titillium Web; color: green; font-size:13px;"> SERVER: '.$svipport.' / GUID: '.$toguid.' : OK! </b></br></br>';

for ($i = 0;$i <= 10;$i++) {
	
//////////////////////////////////////////////////////////////////
/////////////////////////  db_stats_0  ///////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{


$query = "DELETE FROM `db_stats_0` WHERE `db_stats_0`.`s_pg`=" . $newguid_uid . "";
dbSelectALL('', $query);
	
$query = "update `db_stats_0` set `s_pg` = '" . $newguid_uid . "', `s_guid` = '".$toguid."' where `s_pg` = '".$oldguid_uid."'";
usleep(50000); dbSelectALL('', $query);
}
//////////////////////////////////////////////////////////////////
/////////////////////////  db_stats_  ////////////////////////////
//////////////////////////////////////////////////////////////////
if(($i > 0)&&($i < 6))
{	
$sql = "select * FROM db_stats_".$i." where s_pg='" . $oldguid_uid . "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM db_stats_".$i." where s_pg='" . $newguid_uid . "' limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);


$query = "DELETE FROM `db_stats_".$i."` WHERE `db_stats_".$i."`.`s_pg`=" . $newguid_uid . "";
dbSelectALL('', $query);

$query = "update `db_stats_".$i."` set `s_pg` = '" . $newguid_uid . "' $comma_update_array where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}
	
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_hits  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$sql = "select * FROM db_stats_hits where s_pg='" . $oldguid_uid . "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM db_stats_hits where s_pg='" . $newguid_uid . "' limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);

$query = "DELETE FROM `db_stats_hits` WHERE `db_stats_hits`.`s_pg`=" . $newguid_uid . "";
dbSelectALL('', $query);

$query = "update `db_stats_hits` set `s_pg` = '" . $newguid_uid . "' $comma_update_array where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}
	
//////////////////////////////////////////////////////////////////
////////////////////////  playermaps  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$sql = "select * FROM playermaps where guid='" . $fromguid . "' and port =  '" .$svipport. "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM playermaps where guid='" . $toguid . "' and port = '" .$svipport. "'  limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);


$query = "DELETE FROM `playermaps` WHERE `guid`=" . $toguid . " and `port`=" . $svipport . "";
dbSelectALL('', $query);

$query = "update `playermaps` set `guid` ='" . $toguid . "' $comma_update_array where `guid`='" . $fromguid . "' and `port` =  '" .$svipport. "'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_history  //////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$sql = "select * FROM db_stats_history where pg='" . $oldguid_uid . "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM db_stats_history where pg='" . $newguid_uid . "' limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);

$query = "DELETE FROM `db_stats_history` WHERE `db_stats_history`.`pg`=" . $newguid_uid . "";
dbSelectALL('', $query);

$query = "update `db_stats_history` set `pg` = '" . $newguid_uid . "' $comma_update_array where `pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}	
//////////////////////////////////////////////////////////////////
////////////////////////  db_stats_week  /////////////////////////
//////////////////////////////////////////////////////////////////
if($i == 1)
{	
$sql = "select * FROM db_stats_week where s_pg='" . $oldguid_uid . "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM db_stats_week where s_pg='" . $newguid_uid . "' limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);

$query = "DELETE FROM `db_stats_week` WHERE `db_stats_week`.`s_pg`=" . $newguid_uid . "";
dbSelectALL('', $query);

$query = "update `db_stats_week` set `s_pg` = '" . $newguid_uid . "' $comma_update_array where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}

//////////////////////////////////////////////////////////////////
/////////////////////////  db_weapons_  //////////////////////////
//////////////////////////////////////////////////////////////////
if(($i > 0)&&($i < 9))
{	
$sql = "select * FROM db_weapons_".$i." where s_pg='" . $oldguid_uid . "' limit 1";
$old_stat = dbSelect('', $sql);

$sql = "select * FROM db_weapons_".$i." where s_pg='" . $newguid_uid . "' limit 1";
$new_stat = dbSelect('', $sql);

if((!empty($old_stat))&&(!empty($new_stat)))
{
list($key_array, $value_array,$update_array) = datafromsqlsumm($old_stat,$new_stat);

unset($old_stat);
unset($new_stat);

$comma_update_array = implode(",", $update_array);  
 if(!empty($comma_update_array)) $comma_update_array = ','.$comma_update_array; 
 else $comma_update_array = '';
//echo "\n\n", $comma_valuerrr = implode(",", $value_array);


$query = "DELETE FROM `db_weapons_".$i."` WHERE `db_weapons_".$i."`.`s_pg`=" . $newguid_uid . "";
dbSelectALL('', $query);

$query = "update `db_weapons_".$i."` set `s_pg` = '" . $newguid_uid . "' $comma_update_array where `s_pg` = '".$oldguid_uid."'";
usleep(50000); $a = dbSelectALL('', $query);
echo '<b style="font-size:12px;">',$query; echo '</b></br><hr>';
}
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

}
								
 }
else echo  '<hr style="border: 5px solid red;border-radius: 5px;"><b style="font-family: Titillium Web; color: red; font-size:13px;"> SERVER: '.$svipport.' / GUID: '.$fromguid.' : : '.$lang['nothing_search'].'! </b></br>';
 
				     }	
	echo '</br></br></div></center>';					 
            }                               
                          


if(!empty($_SESSION['codbxpasssteam']))
$byWhois = isLoginUserWHO($_SESSION['codbxpasssteam']);
else if(!empty($_COOKIE['user_online_login']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_login']);
else if(!empty($_COOKIE['user_online_key']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_key']);
else
$byWhois = '';

if(!empty($_SESSION['codbxuser']))
 $codbxuser = $_SESSION['codbxuser'];

if(!empty($byWhois))
$xz = $byWhois;
else if(!empty($codbxuser))
$xz = $codbxuser;
?>
<!DOCTYPE html>
<html>
<html lang="en" class="no-js">
	<head>
		<meta charset="windows-1251" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo 'GUID 2 GUID ',$plyr,' 💭 ' ?></title>
 <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
<script>
var newTxt="<?php echo 'GUID 2 GUID 💭 '.$plyr.' '; ?>";
var oldTxt=document.title;
 
function migalka(){
    if(document.title==oldTxt){
        document.title=newTxt;
    }else{
        document.title=oldTxt;
    }
}
var timer = setInterval(migalka,1000);
</script>
<style>
body{
  transition:0;
  background-color:#2fe; /* #002600 */
  color:#2eb4e9;
  margin: 0;
}
input[type=button], input[type=submit], input[type=reset] {
 font-size:14px;
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}


input[type="submit"]:active {
	font-size:14px;
     background-color: red;	
    color: yellow;
	text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}


input[type="reset"]:active {
	font-size:14px;
     background-color: red;	
    color: yellow;
}

input[type="submit"]:focus {
	font-size:14px;
        color: yellow;
		animation: rainbow 1.1s linear;
		animation-iteration-count: infinite;
		text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}


input[type="reset"]:focus {
	font-size:14px;
        color: yellow;
		animation: rainbow 1.1s linear;
		animation-iteration-count: infinite;
		text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px;
}


span {
  background-color: #a62b2b;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
p {
  background-color: #2b8ba6;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

@keyframes rainbow{
		100%,0%{
			background-color: rgb(255,0,0);
		}
		8%{
			background-color: rgb(255,127,0);
		}
		16%{
			background-color: rgb(255,255,0);
		}
		25%{
			background-color: rgb(127,255,0);
		}
		33%{
			background-color: rgb(0,255,0);
		}
		41%{
			background-color: rgb(0,255,127);
		}
		50%{
			background-color: rgb(0,255,255);
		}
		58%{
			background-color: rgb(0,127,255);
		}
		66%{
			background-color: rgb(0,0,255);
		}
		75%{
			background-color: rgb(127,0,255);
		}
		83%{
			background-color: rgb(255,0,255);
		}
		91%{
			background-color: rgb(255,0,127);
		}
}


</style>
</head>
<body>
<?php
$datetime = date('Y-m-d H:i:s');
$dthx = date('Y-m-d');

?>
</br></br>
<center>
<strong style="font-family: Impact;font-size:18px;color: black;">
<?php if (!empty($_GET['gd'])){ ?>
<?php echo 'GUID: '.$_GET['gd'].'</strong> </BR> <strong style="font-family: Impact;font-size:18px;color: red;">'.$lang['guid_2_guid_replace']; ?></br>
<?php }?>
</strong>
</center>
</br>
<center>
 </br> </br>
   <form>
<?php if (!empty($_GET['gd'])){ ?>
 <input name="fromguid" type="hidden" value="<?php echo $_GET['gd']; ?>">
 <input name="plyr" type="hidden" value="<?php echo $plyr; ?>"> 
 <input style="background:#333; width:295px; height: 28px; font-family: Titillium Web; color: #ccc; font-size:15px;" type="search" name="rc" placeholder="<?php echo $lang['guid_2_guid_to']; ?>">
 <input type="submit" value="<?php echo $lang['guid_2_guid_replace']; ?>">
<?php }?>  
 
  </form>
</center>

<center>


</center>
</body>
</html>	
<?php
 } 
?>	