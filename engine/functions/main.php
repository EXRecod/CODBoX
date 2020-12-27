<?php
ini_set('memory_limit', '256M'); 
//settings
include $cpath .'/data/settings.php';
include($cpath ."/admin/core/class.simpleSQLinjectionDetect.php");
include($cpath ."/admin/core/functions.php");
$url = $_SERVER["SCRIPT_NAME"];
/*
$test_HTTP_proxy_headers = array(
	'HTTP_VIA',
	'VIA',
	'Proxy-Connection',
	'HTTP_X_FORWARDED_FOR',  
	'HTTP_FORWARDED_FOR',
	'HTTP_X_FORWARDED',
	'HTTP_FORWARDED',
	'HTTP_CLIENT_IP',
	'HTTP_FORWARDED_FOR_IP',
	'X-PROXY-ID',
	'MT-PROXY-ID',
	'X-TINYPROXY',
	'X_FORWARDED_FOR',
	'FORWARDED_FOR',
	'X_FORWARDED',
	'FORWARDED',
	'CLIENT-IP',
	'CLIENT_IP',
	'PROXY-AGENT',
	'HTTP_X_CLUSTER_CLIENT_IP',
	'FORWARDED_FOR_IP',
	'HTTP_PROXY_CONNECTION');
	
	foreach($test_HTTP_proxy_headers as $header){
		if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
			exit("Please disable your proxy connection!");
		}
	}
*/


$bodytag = str_replace("https://", "", $domain);
$domainname = str_replace("http://", "", $bodytag);
$domainname = dirname($domainname);


require_once $cpath . '/engine/arrays/gametypes_maps.php';
require_once $cpath . '/engine/arrays/weapons_cod.php';
require_once $cpath . '/engine/arrays/ranks.php';
require_once $cpath . '/engine/arrays/geo.php';

function newdigistHash($s) {
$digistHash = strtr(md5($s), [
    'a' => 0,
    'b' => 1,
    'c' => 2,
    'd' => 3,
    'e' => 4,
    'f' => 5,
    'g' => 6,
    'h' => 7,
	'i' => 8,
]);
return $digistHash;
}

function errorspdo($s) {
  global $cpath;
  $fp = fopen($cpath.'/data/errors/sql_pdo_errors.log', 'a');
  fwrite($fp, $s . "\n");
  fclose($fp);
}
 /*
function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $kei => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
if((strpos($path, ".jpg") !== false)||(strpos($path, ".jpeg") !== false)||(strpos($path, ".gif") !== false))  			
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
			if((strpos($path, ".jpg") !== false)||(strpos($path, ".jpeg") !== false)||(strpos($path, ".gif") !== false))
               $results[] = $path;
        }
    }
    return $results;
} 
*/

function rcon($sz, $zreplace = '', $connect, $server_rconpass)
{
	global $connect, $server_rconpass;
	fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
		'%s' => $zreplace
	)));
	$output = fread($connect, 1); //512
	usleep(200);
	return $output;
}


function getDirContents($dir){
	@$files = scandir($dir);
	unset($files[0], $files[1]);
	return $files;
} 
 
 
function IsSteamCast($guidq) {
	$steamerid = '';
$reponse = "SELECT CONCAT(\"STEAM_\", ((CAST('".$guidq."' AS UNSIGNED) >> CAST('56' AS UNSIGNED)) - CAST('1' AS UNSIGNED)),
	\":\", (CAST('".$guidq."' AS UNSIGNED) &	CAST('1' AS UNSIGNED)), \":\", (CAST('".$guidq."' AS UNSIGNED) 
	&	CAST('4294967295' AS UNSIGNED)) >> CAST('1' AS UNSIGNED)) AS steam_id;";
$steamid = dbSelectALLSourceBans('', $reponse);

foreach ($steamid as $keym => $value) { 
$steamerid = $value['steam_id'];
 }
 return $steamerid;
 }
 
 
function geosorting($geoloc){
	global $geo_array,$languagefor; $k = '';
	if(!empty($geoloc))
	{
foreach ($geo_array as $k) {
foreach ($k as $va) { 	
	 if($va==$geoloc)
	 {
	
    if($languagefor != 'ru') 	
	   next($k);
return next($k);
	}}}}else return $k;
	}
 
 
 
function geosortingw($geoloc){
	global $geo_array,$languagefor; $k = '';
	if(!empty($geoloc))
	{
foreach ($geo_array as $k) {
foreach ($k as $va) { 	
	 if($va==$geoloc)
	 {	
	   next($k);
return next($k);
	}}}}else return $k;
	}
 
 
 
 
function IsChatBanned($guidxx) {
   global $cpath,$sourcebans_host_adress;
//$arraybans[] = 14325634634636363;
 $arraybanstwo[][] = 14325634634636363; 
$reponse = "SELECT CONCAT(\"STEAM_\", ((CAST('".$guidxx."' AS UNSIGNED) >> CAST('56' AS UNSIGNED)) - CAST('1' AS UNSIGNED)),
	\":\", (CAST('".$guidxx."' AS UNSIGNED) &	CAST('1' AS UNSIGNED)), \":\", (CAST('".$guidxx."' AS UNSIGNED) 
	&	CAST('4294967295' AS UNSIGNED)) >> CAST('1' AS UNSIGNED)) AS steam_id;";

$steamid = dbSelectALLSourceBans('', $reponse);

if(is_array($steamid)){ 
foreach ($steamid as $keym => $value) { 

$steamerid = $value['steam_id'];

//if (in_array($steamerid, $arraybans)) 
//    echo "";
//else
//{

//$arraybans[] = $steamerid;

if(!empty($sourcebans_host_adress))
{
$reponse = "SELECT RemovedOn,authid,length,ends,bid from sb_comms where authid = '".$steamerid."' ORDER BY `bid` DESC limit 1";


$steamid = dbSelectALLSourceBans('', $reponse);

foreach ($steamid as $keym => $dv) 	
{
     $lenght = $dv['RemovedOn'];
	$authid = $dv['authid'];
	 $authidlenght = $dv['length'];
	 $authidlenghtends = $dv['ends'];
	
	if((empty($lenght))&&(empty($authidlenght)))
		$lenght = 1970621897;
	else if((empty($lenght))&&(!empty($authidlenght)))
		$lenght = $authidlenght+$authidlenghtends;
	
	if(!empty($authid))
$arraybanstwo[$lenght.'%'.$guidxx][] = $lenght.'%'.$guidxx;
 }
}
}
}
 
 foreach($arraybanstwo as $fuck => $nothing)
 {
	 
	 $infr = explode("%", $fuck);
	 if(!empty($infr[1])){
     $chat_ban_guidccc = $infr[1];
	 $chat_ban_dayscccv = $infr[0];
	 $chat_ban_status  = $infr[0];
	 
	 $chat_ban_daysccc = gmdate("Y-m-d H:i:s", $chat_ban_dayscccv);
	 
  

	    $chat_ban_day = explode(" ", $chat_ban_daysccc);
		$chat_ban_day[0] = str_replace("-", "", $chat_ban_day[0]);
		$todaay = date("Ymd");
		
		$chat_ban_guid = $guidxx;
		
		if($todaay >= $chat_ban_day[0])
		{
          $chat_ban_guid = 0;
          $chat_ban_status = 0;
          $chat_ban_daysccc = 0;
        }


return $chat_ban_guid."%".$chat_ban_daysccc."%".$chat_ban_status;

/*
$crn_skf = $cpath."/data/db/chat/chatbans/".$guidxx.".codbox";	
if(!file_exists($crn_skf))
touch($crn_skf);

 	$fpl = fopen($crn_skf, 'w+');
	fwrite($fpl, $chat_ban_guid."%".$chat_ban_daysccc."%".$chat_ban_status);	
    fclose($fpl);	 
*/ 	 
	 
	 
	 }
	 
 }
 
}
 
  
 /*
 
 
if(((file_exists($crn_skf))&&(strpos($geo, "ZAG") === false)) || ($chat_ban_guidccc == $guidxx) )
{
	
	
	
 
if((file_exists($crn_skf))&&(strpos($geo, "ZAG") === false))
{		
	
$fpl = file($crn_skf);
$dfc = $fpl[0];

$infff = explode("%", $dfc);

$chat_ban_guid = trim($infff[0]);		
$chat_ban_days = trim($infff[1]);	
$chat_ban_status = trim($infff[2]);



	    $chat_ban_day = explode(" ", $chat_ban_days);
		$chat_ban_day[0] = str_replace("-", "", $chat_ban_day[0]);
		$todaay = date("Ymd");
		
		if($todaay >= $chat_ban_day[0])
		{
			
			//echo '<br/>'.$todaay.'=-=-'.$chat_ban_day[0];
			
          $chat_ban_guid = 0;
          $chat_ban_status = 0;
          $chat_ban_days = 0;
        }
		
}		
		
		
		
if(!empty($chat_ban_guidccc))
$chat_ban_guid = $chat_ban_guidccc;
if(!empty($chat_ban_statusccc))
$chat_ban_status = $chat_ban_statusccc;
if(!empty($chat_ban_daysccc))
$chat_ban_days = $chat_ban_daysccc;


  
	  
	if(!empty($key)){
		
		
if(!empty($chat_ban_days))
{		
$txt = "<div class=\"flascensortwo\"> &emsp; $i_chat_ban [ $chat_ban_days ] &emsp; ".$txt." &emsp; </div>";	
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.6; font-family: Titillium Web; font-size: ".$pixels."px;\">
<strong style=\"font-family: Titillium Web; color: $color_txt_chat; text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px #000, 0 0 20px red, 0 0 20px #000, 0 0 10px red, 0 0 20px #000, 0 0 3px #000;>" . $txt . "</strong></td></tr>";  
}
else
{
$txt = "<div class=\"flascensortwo\">&emsp; $i_chat_exp &emsp;".$txt."&emsp;</div>";		
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.6; font-family: Titillium Web; font-size: ".$pixels."px;\">
<strong style=\"font-family: Titillium Web; color: $color_txt_chat; text-shadow: 0 0 10px lime, 0 0 20px lime, 0 0 30px #000, 0 0 20px lime, 0 0 20px #000, 0 0 10px lime, 0 0 20px #000, 0 0 3px #000;>" . $txt . "</strong></td></tr>";  
}	
	
	
	}else{
	
	
 
if(!empty($chat_ban_days))
{	
  if($chat_ban_dayscccv == 1970621897)
	  $chat_ban_days = $i_chatn_forver;
 
 $txt = "&emsp;&emsp;";	
 $txt = "<div class=\"flascensortwo\"> &emsp; $i_chat_ban [ $chat_ban_days ] &emsp; ".$txt." &emsp; </div>"; 
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.6; font-family: Titillium Web; font-size: ".$pixels."px;\">
<strong style=\"font-family: Titillium Web; color: $color_txt_chat; text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px #000, 0 0 20px red, 0 0 20px #000, 0 0 10px red, 0 0 20px #000, 0 0 3px #000;>" . $txt . "</strong></td></tr>";  
			 
		 
}
else{	
$txt = "<div class=\"flascensortwo\">&emsp; $i_chat_exp &emsp;".$txt."&emsp;</div>";	
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.6; font-family: Titillium Web; font-size: ".$pixels."px;\">
<strong style=\"font-family: Titillium Web; color: $color_txt_chat; text-shadow: 0 0 10px lime, 0 0 20px lime, 0 0 30px #000, 0 0 20px lime, 0 0 20px #000, 0 0 10px lime, 0 0 20px #000, 0 0 3px #000;>" . $txt . "</strong></td></tr>";  
}	
	
	}  
	
}
else  
	echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: $color_txt_chat; font-size: ".$pixels."px;\"><strong>" . $txt . "</strong></td></tr>";  
 
*/
 
$n = $cpath."/data/cache/";	
if(!file_exists($n))
	mkdir($n, 0777, true);

$n = $cpath."/data/errors/";	
if(!file_exists($n))
	mkdir($n, 0777, true);

$n = $cpath. "/data/db/";	
if(!file_exists($n))
	mkdir($n, 0777, true);


$n = $cpath. "/data/db/caches/";	
if(!file_exists($n))
	mkdir($n, 0777, true);


$n = $cpath. "/data/db/chat/";	
if(!file_exists($n))
	mkdir($n, 0777, true);
 

$n = $cpath. "/data/db/chat/cached_chat_ban/";	
if(!file_exists($n))
	mkdir($n, 0777, true);

$n = $cpath. "/data/db/chat/chatbans/";	
if(!file_exists($n))
	mkdir($n, 0777, true);


$i = $cpath . '/data/db/screenshots/';
if(!file_exists($i))
	mkdir($i, 0777, true);


$i = $cpath . '/data/db/users/';
if(!file_exists($i))
	mkdir($i, 0777, true);


$i = $cpath . '/data/db/screenshots/cache_im/';
if(!file_exists($i))
	mkdir($i, 0777, true);

 
$i = $cpath . '/data/db_protect/';
if(!file_exists($i))
	mkdir($i, 0777, true);

$i = $cpath . '/data/db_protect/banned_players/';
if(!file_exists($i))
	mkdir($i, 0777, true);
 
$i = $cpath . '/data/db_protect/banned_db/';
if(!file_exists($i))
	mkdir($i, 0777, true); 
 
///////////////////////////////////////////////////////////////////////////////
  
 
function antimat($mat) {
  global $cpath;
  if(!empty($mat))
  {
  include_once ($cpath . '/engine/functions/classes/antimat.class.php');
  include_once ($cpath . '/engine/functions/classes/ReflectionTypehint.php');
  include_once ($cpath . '/engine/functions/classes/UTF8.php');
  //$mat = Censure::parse($mat,'10','',true,'%CENSORED%','CP1251');
  $mat = Censure::parse($mat, '10', '', true, '<div class="blob"><B>%CENSORED%</B></div>');
  
  if(badwordslisting($mat))
  return '<div class="blob"><B>%CENSORED%</B></div>';
else
  return $mat;
  }
  else
	  return $mat;  
} 
 
 
 
 
 
function createscreenDB() { 
global $cpath;
$gh = $cpath . '/data/db/screenshots/screenshots.rcm';
 if(file_exists($gh)){
if((filesize($gh))< 2)
unlink($gh);
 }
 if(!file_exists($gh)){
try
  {
    $screens = new PDO('sqlite:'. $gh);
    $screens->exec("CREATE TABLE screens (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,			
			guid bigint(24) NOT NULL,	
			player varchar(70) NOT NULL,
			image TEXT NOT NULL,
			reason tinyint(2) NOT NULL,
			size bigint(22) NOT NULL,
            time timestamp NOT NULL,
			dater timestamp NOT NULL,
			server varchar(32) NOT NULL,
			nameserver varchar(80) NOT NULL)"); 
    $screens = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
  
  
 if(!file_exists($gh)){
echo "</br></br></br></br></br></br></br><h1> Can't write database in folder $cpath/data/db/screenshots/</h1>";
}   
  
  
} 

$src = '/data/db_protect/banned_db/screenshots_banned.rcm'; 
if(!file_exists($cpath . $src)){
try
  {
    $screens_banned = new PDO('sqlite:'. $cpath . $src);
    $screens_banned->query("CREATE TABLE screens (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,			
			guid bigint(24) NOT NULL,	
			player varchar(70) NOT NULL,
			image TEXT NOT NULL,
			reason tinyint(2) NOT NULL,
			size bigint(22) NOT NULL,
            time timestamp NOT NULL,
			dater timestamp NOT NULL,
			server varchar(32) NOT NULL,
			nameserver varchar(200) NOT NULL)"); 
    $screens_banned = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
}
} 



function createAdminsDB() { 
global $cpath;
$gh = $cpath . '/data/db/users/online.rcm';
 if(file_exists($gh)){
if((filesize($gh))< 2)
unlink($gh);
 }
 if(!file_exists($gh)){
try
  {
    $admins = new PDO('sqlite:'. $gh);
    $admins->exec("CREATE TABLE users (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,			
			ip varchar(20) NOT NULL,	
			user varchar(200) NOT NULL,
			time timestamp NOT NULL)"); 
    $admins = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
  
 if(!file_exists($gh)){
echo "</br></br></br></br></br></br></br><h1> Can't write database in folder $gh</h1>";
}   
   
} 
} 

 
 
function createscreeninsertprotect($SqlDataBase,$query) {
  $result = ''; $rt = '';
  global $cpath, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try { 
$db = new PDO('sqlite:'. $cpath . '/data/db_protect/banned_db/'.$SqlDataBase);
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
        }	
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 496 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  if(empty($result))
  return $rt;
   else
	 return $result;  
} 
 
  
function createscreeninsert($SqlDataBase,$query) {
  $result = '';
  $rt = '';
  if($SqlDataBase == "screenshots.rcm")
  {
  global $cpath, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try { 
$db = new PDO('sqlite:'. $cpath . '/data/db/screenshots/'.$SqlDataBase);
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
        }	
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 496 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  if(empty($result))
  return $rt;
   else
	 return $result;
} 
 else {return createscreeninsertprotect($SqlDataBase,$query);}
} 


function createscreeninsertadmins($SqlDataBase,$query) {
  $result = '';
  $rt = '';
  global $cpath, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try { 
$db = new PDO('sqlite:'. $cpath . '/data/db/users/'.$SqlDataBase);
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
        }	
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 496 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  if(empty($result))
  return $rt;
   else
	 return $result; 
}



function DataSqlLiteDB($SqlDataBase,$query,$wherefile) {
  $result = '';
  $rt = '';
  global $cpath, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try { 
$db = new PDO('sqlite:'. $wherefile);
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
        }	
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 496 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  if(empty($result))
  return $rt;
   else
	 return $result; 
}


function DataSqlLitecreateDB($wherefile,$data) { 
global $cpath;
 if(file_exists($wherefile)){
if((filesize($wherefile))< 2)
unlink($wherefile);
 }
 if(!file_exists($wherefile)){
try
  {
    $admins = new PDO('sqlite:'. $wherefile);
    $admins->exec($data); 
    $admins = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
 if(!file_exists($wherefile)){
echo "</br></br></br></br></br></br></br><h1> Can't write database in folder $wherefile</h1>";
}}}


function badwordslisting($player_msg) {
	  global $cpath;
	  $stolwlp = 0;
       $list = file($cpath . "/data/badwords.lst");
       if ($list === false)
       {
        $badwords_list = false;
        return;
       }
       $normal = array();
       $regexp = array();
       foreach ($list as $value)
       {
        $value = trim($value);
        if (preg_match('|{([\d.]+)}$|', $value, $subpatterns))
        {
         $multi = $subpatterns[1];
         $value = str_replace($subpatterns[0], "", $value);
        }
        else
        {
         $multi = 1;
        }
        if (stripos($value, "regexp:") === 0)
        {
         $regexp[] = array(
          substr($value, 7),
          $multi
         );
        }
        else
        {
         $normal[] = array(
          $value,
          $multi
         );
        }
       }
       $badwords_list = array(
        "normal" => $normal,
        "regexp" => $regexp
       );
      
       $bad = false;
       foreach ($badwords_list["normal"] as $value)
       {
        if (stripos($player_msg, $value[0]) !== false)
        {
         $bad     = true;
         $badword = $value[0];
         $multi   = $value[1];
         break;
        }
       }
       if (!$bad)
       {
        foreach ($badwords_list["regexp"] as $value)
        {
         if (preg_match("/ґ" . str_replace("ґ", "\\xB4", $value[0]) . "ґi/", $player_msg, $subpatterns))
         {
          $bad     = true;
          $badword = $subpatterns[0];
          $multi   = $value[1];
          break;
         }
		 
		 
		 //2020
         $player_msg = mb_strtolower($player_msg);
         if (preg_match("/" . $value[0] . "/i", $player_msg, $subpatterns))
         {
          $bad     = true;
          $badword = $subpatterns[0];
          $multi   = $value[1];
          break;
         }		 
		 
		 
        }
       }
      
       if ($bad)
       {
        if ($stolwlp == 0)
        {
         $stolwlp = 1;
   //echo " == " . $badword;
         return true;
        
        }
       }
       else
           return false;		   
} 
 
 
 
 
 
 
 
 
 
 

function isJson($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}

function clean($string) {
$string = str_replace("^^00", "", $string);
$string = str_replace("^^11", "", $string);
$string = str_replace("^^22", "", $string);
$string = str_replace("^^33", "", $string);
$string = str_replace("^^44", "", $string);
$string = str_replace("^^55", "", $string);
$string = str_replace("^^66", "", $string);
$string = str_replace("^^77", "", $string);
$string = str_replace("^^88", "", $string);
$string = str_replace("^^99", "", $string);
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
return $string;
}

function my_array_unique($array, $keep_key_assoc = false){
    $duplicate_keys = array();
    $tmp = array();       

    foreach ($array as $key => $val){
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array)$val;

        if (!in_array($val, $tmp))
            $tmp[] = $val;
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
}

function dbSelect($SQLiteDatabase, $query) {
  $result = '';
  global $cpath, $SqlDataBase, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try { 
      $dsn = "mysql:host=" . $host_adress . ";dbname=" . $db_name . ";charset=utf8";
	  $db = new PDO($dsn, $db_user, $db_pass);
	  
    $result = $db->query($query)->fetch(PDO::FETCH_LAZY); //;
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 464  " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  return $result;
}


function dbSelectALL($SQLiteDatabase, $query) {
  $result = '';
  global $cpath, $SqlDataBase, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try {
     
      $dsn = "mysql:host=" . $host_adress . ";dbname=" . $db_name . ";charset=utf8";
      if (empty($msqlconnect)) 
		  $db = new PDO($dsn, $db_user, $db_pass);
     
    //$result = $db->query($query)->fetchAll(); //;
	 
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
 }	
	 
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 496 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  return $result;
}

  
function dbcheck() {
  global $cpath, $SqlDataBase, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;	
  $result = '';
  $query = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db_name'";
  try {
     
      $dsn = "mysql:host=" . $host_adress . ";dbname=" . $db_name . ";charset=utf8";
      if (empty($msqlconnect)) 
		  $db = new PDO($dsn, $db_user, $db_pass);
      
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchColumn();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . "
       \n # SqlDataBase : $SqlDataBase, msqlconnect: $msqlconnect, host_adress: $host_adress, db_name: $db_name
	   \n # $query \n\n");
 }	
	 
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."] 522 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
	if(!empty($e->getMessage()))
	echo $e->getMessage();
  }
  return $result;
} 
  
 
 
 
function dbSelectALLSourceBans($SQLiteDatabase, $query) {
  $result = '';
  global $cpath, $sourcebans_host_adress, $sourcebans_db_name, $sourcebans_db_user, $sourcebans_db_pass,$sourcebans_charset_db;
  
 
  try {
	    $dsn = "mysql:host=".$sourcebans_host_adress.";dbname=".$sourcebans_db_name.";charset=".$sourcebans_charset_db."";
        $db = new PDO($dsn, $sourcebans_db_user, $sourcebans_db_pass);
	 
    //$result = $db->query($query)->fetchAll(); //;
	 
 $rt = $db->query($query);
 if ($rt) {
     $result=$rt->fetchAll();
 }
 else {
      // Handle errors
	  errorspdo("[" .date("Y.m.d H:i:s")."] 519 " . __FILE__ . "
       source bans \n # $query \n\n");
 }	
	 
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."]  " . __FILE__ . " 555 Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  return $result;
}


 
function dbSelectALLbyKey($SQLiteDatabase, $query, $keyword) {
  global $cpath, $SqlDataBase, $msqlconnect, $host_adress, $db_name, $db_user, $db_pass;
  try {
    
      $dsn = "mysql:host=" . $host_adress . ";dbname=" . $db_name . ";charset=utf8";
	  $db = new PDO($dsn, $db_user, $db_pass);
	  
	$q=$db->prepare($query);
    $q->bindValue(':keyword','%'.$keyword.'%');
    $q->execute();
	
	while ($r=$q->fetch(PDO::FETCH_ASSOC)) {
    $result[] = $r;
    }
	
	$q = null;
    $db = null;
  }
  catch(PDOException $e) 
  {
    errorspdo("[" .date("Y.m.d H:i:s")."]  583 " . __FILE__ . "  Exception / function db Select / : \n = $query \n = ". $e->getMessage());
  }
  if(!empty($result))
  return $result;
  else return false;
}

 

function timelife($timee,$lasttime) {
	global $cpath;
include($cpath ."/engine/functions/langctrl.php");
				 if((!empty($timee))&&(!empty($lasttime))){
					 
                      $now = new DateTime(); // текущее время на сервере
					
					
                     $datetime1 =  DateTime::createFromFormat("Y-m-d H:i:s", $lasttime);//создаем из переменной
                     $datetime2 =  DateTime::createFromFormat("Y-m-d H:i:s", $timee);
                     $raznica = $datetime1->diff($datetime2);//разница					
					 $xyears = $raznica->y; // кол-во лет
					 $xmonth = $raznica->m; // кол-во mesac
					 $xday = $raznica->d;   // кол-во дней
					 $xhours = $raznica->h; // кол-во часов
					 $xmin = $raznica->i;   // кол-во минут
                     $xsek = $raznica->s;   // кол-во c		

			  if(!empty($xday)){
				if((!empty($xhours))&&($xhours > 0)){ 
				  if((!empty($xmin))&&($xmin > 0)){
					  //$xmin = '';
				     if((!empty($xsek))&&($xsek > 0))
					   $xsek = '';
				  }
				} 
			  }
				 
					 if(!empty($xyears)) $xyears = $xyears.'.'.$t_xyears.' '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'.'.$t_xmonth.' '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'.'.$t_xday.' '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'.'.$t_xhours.' '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'.'.$t_xmin.' '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'.'.$t_xsek.' '; else $xsek = '';	
					  
                     $lasttime2 = $xyears.''.$xmonth.''.$xday.''.$xhours.''.$xmin; //.''.$xsek;	
				 
				     $strrwer = strlen($lasttime2);
				 
				      if($strrwer > 75)
                        $lasttime2 = $today;
			
					 
					 $date = DateTime::createFromFormat("Y-m-d H:i:s", $lasttime); // задаем дату в любом формате
					 $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
					 $xyears = $interval->y; // кол-во лет
					 $xmonth = $interval->m; // кол-во mesac
					 $xday = $interval->d;   // кол-во дней
					 $xhours = $interval->h; // кол-во часов
					 $xmin = $interval->i;   // кол-во минут
                     $xsek = $interval->s;   // кол-во c	
                  
			  if(!empty($xday)){
				if((!empty($xhours))&&($xhours > 0)){ 
				  if((!empty($xmin))&&($xmin > 0)){
					  //$xmin = '';
				     if((!empty($xsek))&&($xsek > 0))
					   $xsek = '';
				  }
				} 
			  }
				
					 if(!empty($xyears)) $xyears = $xyears.'.'.$t_xyears.' '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'.'.$t_xmonth.' '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'.'.$t_xday.' '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'.'.$t_xhours.' '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'.'.$t_xmin.' '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'.'.$t_xsek.' '; else $xsek = '';	
					 
                     $timee2 = $xyears.''.$xmonth.''.$xday.''.$xhours.''.$xmin.''.$xsek;
					 
					 if(empty($timee2))
						 $timee2 = " сейчас"; 
					 
					 
					 
				     $strrwer = strlen($timee2);
				      if($strrwer > 75)
					    $timee2 = $lasttime;	

                   return $timee2.';'.$lasttime2;					
			
                 } else{$lasttime2 = 0;  $timee = 0; $timee2 = 0;
				 
				 return '0;0';
				 }	
}


function Persentages($var, $basa = 100, $persent = true) {
  $d = $var/$basa;
  if($persent) return round($d*100);
  return $d;
}



function get_percentage($percentage, $of)
{
	if($of > 0)
	$percent = $percentage / $of;
    else
	$percent = 0;
	return  number_format( $percent * 100, 2 );
}


function get_percentage_circle($percentage, $of)
{
	if($of > 0)
	$percent = $percentage / $of;
    else
	$percent = 0;
	return  number_format( $percent * 360, 2 );
}


 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'год',
        'm' => 'месяц',
        'w' => 'неделя',
        'd' => 'день',
        'h' => 'час',
        'i' => 'мин',
        's' => 'сек',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . '. ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ' : 'сейчас';
}

// Colorize Function
function colorize($string) {
$string = substr($string, 0, 777);
$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
$string = str_replace("^^11", "</font><font color=\"red\">", $string);
$string = str_replace("^^22", "</font><font color=\"lime\">", $string);
$string = str_replace("^^33", "</font><font color=\"yellow\">", $string);
$string = str_replace("^^44", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^^55", "</font><font color=\"aqua\">", $string);
$string = str_replace("^^66", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^^77", "</font><font color=\"white\">", $string);
$string = str_replace("^^88", "</font><font color=\"pink\">", $string);
$string = str_replace("^^99", "</font><font color=\"silver\">", $string);
$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
$string = str_replace("^11", "</font><font color=\"red\">", $string);
$string = str_replace("^22", "</font><font color=\"lime\">", $string);
$string = str_replace("^33", "</font><font color=\"yellow\">", $string);
$string = str_replace("^44", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^55", "</font><font color=\"aqua\">", $string);
$string = str_replace("^66", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^77", "</font><font color=\"white\">", $string);
$string = str_replace("^88", "</font><font color=\"pink\">", $string);
$string = str_replace("^99", "</font><font color=\"silver\">", $string);
$string = str_replace("^^1", "</font><font color=\"red\">", $string);
$string = str_replace("^^2", "</font><font color=\"lime\">", $string);
$string = str_replace("^^3", "</font><font color=\"yellow\">", $string);
$string = str_replace("^^4", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^^5", "</font><font color=\"aqua\">", $string);
$string = str_replace("^^6", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^^7", "</font><font color=\"white\">", $string);
$string = str_replace("^^8", "</font><font color=\"pink\">", $string);
$string = str_replace("^^9", "</font><font color=\"silver\">", $string);
$string = str_replace("^0", "</font><font color=\"gray\">", $string);
$string = str_replace("^1", "</font><font color=\"red\">", $string);
$string = str_replace("^2", "</font><font color=\"lime\">", $string);
$string = str_replace("^3", "</font><font color=\"yellow\">", $string);
$string = str_replace("^4", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^5", "</font><font color=\"aqua\">", $string);
$string = str_replace("^6", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^7", "</font><font color=\"white\">", $string);
$string = str_replace("^8", "</font><font color=\"pink\">", $string);
$string = str_replace("^9", "</font><font color=\"silver\">", $string);
$string = str_replace("^", "", $string);
return $string . "</font>";
}

function check_meta($image){
$filecontent=file_get_contents($image);
$metapos=strpos($filecontent, "CoD4X");
$meta = substr($filecontent,$metapos);
$data=explode("\0",$meta);
  if ((!empty($data[4]))&& (strlen($data[4])>15))
  {
 $hostname=$data[1];
 $map=$data[2];
 $playername=$data[3];
 $guid=$data[4];
 $shotnum=$data[5];
 $time=$data[6];
 $playername = preg_replace('/[^ a-zа-яё\d]/ui', '_', $playername);
 $playername = str_replace(' ', '_', $playername);
 $time = date("d-m-Y H:i:s", strtotime($time));	  
    return array($guid,$playername,$time,$hostname,$map);
  }
  else{
	 return array('0','0','0','0','0'); 
      }

  return false;   
}  



function check_foreach($folder,$images){
$allowed_types=array("jpg", "jpeg");
$file_parts = array();	
foreach($images as $image)
{     $file_parts = explode(".",$image);
      $ext = strtolower(array_pop($file_parts));
      if(in_array($ext,$allowed_types))
      {
		  $a = check_meta($folder.$image);
		  $z = trim($a[3]);
if($z!=false)		  
return $z;
break;
	  }
}  
return false;
}

  
function percent2Color($value,$brightness = 255, $max = 100,$min = 0, $thirdColorHex = '00')
{       
    // Calculate first and second color (Inverse relationship)
    $first = (1-($value/$max))*$brightness;
    $second = ($value/$max)*$brightness;

    // Find the influence of the middle color (yellow if 1st and 2nd are red and green)
    $diff = abs($first-$second);    
    $influence = ($brightness-$diff)/2;     
    $first = intval($first + $influence);
    $second = intval($second + $influence);

    // Convert to HEX, format and return
    $firstHex = str_pad(dechex($first),2,0,STR_PAD_LEFT);     
    $secondHex = str_pad(dechex($second),2,0,STR_PAD_LEFT); 

    return $firstHex . $secondHex . $thirdColorHex ; 

    // alternatives:
    // return $thirdColorHex . $firstHex . $secondHex; 
    // return $firstHex . $thirdColorHex . $secondHex;

}

class COD4xServerStatus{
		private $server = '142.93.227.74';
		private $port = '28960';
		private $protocol = 'udp';
		private $data = '';
		private $serverData = array();
		private $players = array();
		private $scores = array();
		private $pings = array();
		private $meta = array();
		private $timeout = 1;
		
		public function __construct($server, $port, $timeout = 1){
			
			global $timeout,$servex3x;
			$server = $servex3x;
			$this->server = $server;
			$this->port = $port;
			$this->timeout = $timeout;
		}
		
		function getServerStatus(){
			$error = false;
			 
			global $timeout,$servex3x;
			$server = $servex3x;
			
			if (!empty($this->server) && !empty($this->port)){					
				$handle = @fsockopen($this->protocol . '://' . $this->server, $this->port);
				
				if ($handle){				
					//socket_set_timeout($handle, $timeout);
					//stream_set_blocking($handle, 1);
					//stream_set_timeout($handle, 5);
					stream_set_timeout ($handle, 1, 1e5); //1e5  
							
					fputs($handle, "\xFF\xFF\xFF\xFFgetstatus\x00");
					fwrite($handle, "\xFF\xFF\xFF\xFFgetstatus\x00");					
					
					$this->data = fread($handle, 6192);
					$this->meta = stream_get_meta_data($handle);
					$counter = 6192;
					
					while (!feof($handle) && !$error && $counter < $this->meta['unread_bytes']){
						$this->data .= fread($handle, 4192);
						$this->meta = stream_get_meta_data($handle);
						
						if ($this->meta['timed_out']){
							$error = true;
						}
						
						$counter += 2192;
					}
					
					if ($error){
						echo 'Request timed out.';
						return false;							
					}else{
						if (strlen(trim($this->data)) == 0){							
							//echo 'No data received from server.';
							return false;
						}else{
							return true;
						}
					}
				}else{
					echo 'Could not connect to server.';
					return false;
				}
				
				fclose($handle);
			}
		}
		
		function parseServerData(){
			$this->serverData = explode("\n", $this->data);
			$tempplayers = array();
			for ($i = 2; $i <= sizeof($this->serverData) - 1; $i++){
			
				$tempplayers[sizeof($tempplayers)] = trim($this->serverData[$i]);
			}
			
			$tempdata = array();
			$tempdata = explode('\\', $this->serverData[1]);
			$this->serverData = array();
			
			foreach($tempdata as $i => $v){
				if (fmod($i, 2) == 1){
					$t = $i + 1;
					
					$this->serverData[$v] = $tempdata[$t];
				}
			}
			
			$this->serverData['sv_hostname'];
			$this->serverData['gamename'];
			$this->serverData['shortversion'];
			
			//$this->serverData['_Maps'] = explode('-', $this->serverData['_Maps']);
			
			foreach($tempplayers as $i => $v){
							
				if (strlen(trim($v)) > 1){
					$temp = explode(' ', $v);					
					$this->scores[sizeof($this->scores)] = $temp[0];
					$this->pings[sizeof($this->pings)] = $temp[1];
					
					$pos = strpos($v, '"') + 1;
					$endPos = strlen($v) - 1;
					
					$this->players[sizeof($this->players)] = substr($v, $pos, $endPos - $pos);
				}
			}			
		}
		
		
		function returnData(){
			return $this->data;
		}
		
		function returnMeta(){
			return $this->meta;
		}
		
		function returnServerData(){
			return $this->serverData;
		}
		
		function returnPlayers(){
			return $this->players;
		}
		
		function returnPings(){
			return $this->pings;
		}
		
		function returnScores(){
			return $this->scores;
		}
	}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

 /*
////////////////////////////////////////////
 if(!empty($keyxxx))
 { 
  if (!empty($_GET['chhguid'])) 
   $chhguid = $_GET['chhguid'];
else
	$chhguid = '0';	 
	
 if(file_exists($cpath . $src)){
try {
       $screens_banned = new PDO('sqlite:'. $src);	
	   $screens = new PDO('sqlite:'. $cpath . $srcl);
       $screens_banned->query("UPDATE screens SET reason='0' WHERE guid = $chhguid");	
	   $screens->query("UPDATE screens SET reason='0' WHERE guid = $chhguid");	
	
    }
    catch (Exception $e) {
        die('Errors : ' . $e->getMessage());
    }
   }
 } 
 
 
 
 */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
             $plservguid = '';
			 $nkills = 1;
			 $ndeaths = 1;
			 $nheadshots = 1; 			 
			 $nickname = '';  
			 $servername = '';
			 $timeregistered = ''; 
			 $lasttime = '';  
			 $kills = 1;
			 $deaths = 1; 
			 $headshots = 1; 
			 $damages = 1;	
			 $guid = '';  			 
			 $prestige = 0; 
			 $suicides = 1;
			 $geo = 'RU';			 
 			 $kdratio = 0.5;
             $kdratiosort	= 1001; 	
             $total_players_ondatabase = 10000;	
			 $headpercents = 1;

             $ids = '';


$ssssob = 0;
if (isset($_GET['page'])){$page = $_GET['page']; }else {$page = 1; }
$premierMessageAafficher = ($page - 1) * $top_main_total;
if (!empty($_GET['ip'])) 
   $search_ip = $_GET['ip']; 
else
  	$search_ip = 0;

if (!empty($_GET['st1'])) 
   $statusx1 = $_GET['st1']; 
else
  	$statusx1 = 0;

if (!empty($_GET['st2'])) 
   $statusx2 = $_GET['st2']; 
else
  	$statusx2 = 0;

if(empty($top_main_total))   
$top_main_total=40; 

if (!empty($_GET['search'])) 
   $searchplayername = $_GET['search']; 
else
  	$searchplayername = 0;

if (!empty($_GET['timeh'])) 
$timesearch = $_GET['timeh'];
else
  	$timesearch = 0;
  
   if (empty($_GET['page']))
     $paages = 1;
  else
   $paages = $_GET['page'];	  
 
  if (empty($_GET['server']))
  {
$cache_time = 12; 
$server = 0;
  }
   else
	$server = $_GET['server']; 

if (!empty($paages)){
	if($paages < 3)
  $cache_time = 12; 
    else
		$cache_time = 10*$paages;}

if (!empty($_GET['search']))
  $cache_time = 55; 

 
if (!empty($server))
		$cache_time = 25; 

if (empty($cache_time))
if (!empty($server))
	$cache_time = 10;

    $cc = round($cache_time, 0);       
    $xcache_time = $cc;


if (empty($_GET['search']))
 $search = 0; 
else
$search = $_GET['search'];


if (empty($_GET['s']))
 $sss = 0; 
else
$sss = $_GET['s'];


if (empty($_GET['brofile']))
 $brofile = 0;
else
$brofile = $_GET['brofile'];

if (empty($_GET['profile']))
 $profile = 0; 
else
$profile = $_GET['profile'];

if (empty($_GET['geo']))
$geosearch = 0; 
else
$geosearch = trim($_GET['geo']);

if (empty($_GET['timeq']))
$timeq = 0; 
else
$timeq = trim($_GET['timeq']);



// MAIN SORT RANKING




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (empty($_GET['totalknife']))
 $totaltotalknife = 0; 
else
{
$totaltotalknife = $_GET['totalknife'];
}


if (empty($_GET['totalknife']))
 $totaltotalknife = 0; 
else
{
$totaltotalknife = $_GET['totalknife'];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if (empty($_GET['totalkills']))
 $totalkills = 0; 
else
{
$totalkills = $_GET['totalkills'];
}

if (empty($_GET['totaldeaths']))
 $totaldeaths = 0; 
else
{
$totaldeaths = $_GET['totaldeaths'];
}

if (empty($_GET['totalheadshots']))
 $totalheadshots = 0; 
else
{
$totalheadshots = $_GET['totalheadshots'];
}

if (empty($_GET['totalkdRatio']))
 $totalkdRatio = 0; 
else
{
$totalkdRatio = $_GET['totalkdRatio'];
}

if (empty($_GET['totalsuicides']))
 $totalsuicides = 0; 
else
{
$totalsuicides = $_GET['totalsuicides'];
}
















if (empty($_GET['nicknameSearch']))
 $nicknameSearch = 0; 
else
{
$nicknameSearch = $_GET['nicknameSearch'];
}


if (empty($_GET['nicknameSearchguid']))
 $nicknameSearchguid = 0; 
else
{
$nicknameSearchguid = $_GET['nicknameSearchguid'];
}

if (empty($_GET['totalheadshotspercents']))
 $totalheadshotspercents = 0; 
else
{
$totalheadshotspercents = $_GET['totalheadshotspercents'];
}
 
if (empty($_GET['totallastvisit']))
 $totallastvisit = 0; 
else
{
$totallastvisit = $_GET['totallastvisit'];
}

if (empty($_GET['globaleloratings']))
 $globaleloratings = 0; 
else
{
$globaleloratings = $_GET['globaleloratings'];
}

if (empty($_GET['eloratings']))
 $eloratings = 0; 
else
{
$eloratings = $_GET['eloratings'];
}
 


$nheadshots = 1;
$nkills = 1;



///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
 
	 
 if(strpos($_SERVER["SCRIPT_NAME"], "img.php") === false)
 {
 
if(empty(dbcheck()))
	die('<H1> Possible CODBX not instaled or..! </br>Database ['.$db_name.'] does not exist or you do not have access to it! </br>( look in </br> //DATABASE SETTINGS </br> data/settings.php </br> file)</H1>');
 
 
$r = 'SELECT id FROM db_stats_day GROUP BY servername ORDER BY id DESC limit 2';

//ZAPROS NR - 1
$ssss = dbSelectALL('', $r);	
if(!is_array($ssss))
{	
$cccc = dbSelectALL("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))", $r);
if(empty($cccc))
{
echo "ERROR:</br>  ENTER IN myphpadmin </br> SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
</br></br></br></br>
";

echo '
Must add a new line into /etc/mysql/mysql.conf.d/mysqld.cnf
</br>
At the end of the section [mysqld], add
</br>
sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"

</br></br></br>
<H3>Then restart</H3>
</br>
sudo systemctl restart mysql
';
	
exit;	
}}

 }




             $plservguid = 0;
			 $nkills = 0;
			 $ndeaths = 0; 
			 $nheadshots = 0; 			 
			 $nickname = '';  
			 $servername = '';
			 $serverport = '';
			 $timeregistered = ''; 
			 $lasttime = ''; 
			 $skill = 100; 
			 $kills = 0;
			 $deaths = 0; 
			 $headshots = 0; 
			 $damages = 0;	
			 $guid = '';  			 
			 $prestige = 0; 
			 $suicides = 0;
			 $geo = '';			 
 			 $kdratio = 0;
             $kdratiosort	= 0; 	
             $total_players_ondatabase = '';	
			 $headpercents = 0;

$zanim1 = "nothings"; 
$zanim2 = "nothings";
$zanim3 = "nothings";
$zanim4 = "nothings";
$zanim5 = "nothings";
$zanim6 = "nothings";
$zanim7 = "nothings";
$zanim8 = "nothings";
$zanim9 = "nothings";
$zanim10 = "nothings";
$zanim11 = "nothings";
$zanim12 = "nothings";
$zanim13 = "nothings";
$zanim14 = "nothings";
$zanim15 = "nothings";
$zanim16 = "nothings";
$zanim17 = "nothings";
$head = '0';
$torso_lower = '0';
$torso_upper = '0';
$right_arm_lower = '0';
$left_leg_upper = '0';
$neck = '0';
$right_arm_upper = '0';
$left_hand = '0';
$left_arm_lower = '0';
$none = '0';
$right_leg_upper = '0';
$left_arm_upper = '0';
$right_leg_lower = '0';
$left_foot = '0';
$right_foot = '0';
$right_hand = '0';
$left_leg_lower = '0';

 //$servlisting = my_array_unique($servlisting);
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////// 
$urlmdf = $_SERVER["REQUEST_URI"];
if (strpos($urlmdf,'chat.php') === false)
{
if (strpos($urlmdf,'logins.php') === false)
{
if (strpos($urlmdf,'admin/sent.php') === false)
{
if (strpos($urlmdf,'admin/index.php') === false)
{
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

$yy = "SELECT * FROM users WHERE user = '".$ouser."' ORDER BY time desc LIMIT 1";
$uxz = createscreeninsertadmins('online.rcm', $yy);
if(is_array($uxz))
{
foreach ($uxz as $p => $sd) {
	    $uip = $sd['ip'];
	    $uuser = $sd['user'];
	    $utime = $sd['time'];		
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



$yy = "SELECT * FROM users ORDER BY time desc LIMIT 20";
$uxz = createscreeninsertadmins('online.rcm', $yy);
//echo '<b style="position:absolute;color:lime;padding: 20 18px;font-size:18px;"> &emsp;'.$i_online.'.</b>';
if(is_array($uxz))
{
$h = 0;
//echo '<div style="position:absolute;color:white;padding:20 40px;font-size:15px;">';	 
foreach ($uxz as $p => $sd) {
	    ++$h;	
	    $uip = $sd['ip'];
	    $uuser = $sd['user'];
	    $utime = $sd['time'];
		$secondx = $ddater-$utime;

if((!empty($uuser))&&($secondx<300)){
//echo '<b style="color:white;font-size:17px;"></br>['.$h.']</b> <b style="color:orange;font-size:17px;">'.$uuser.'</b> : <b style="color:yellow;font-size:17px;">'.$secondx.'(sec.)</b>';
}		
}
//echo '</div>';
}
}
}
}
}
}
}
function FloodDetection(){
	/*
if (!isset($_SESSION)) {
	session_start();
}
if(!empty($_SESSION['last_session_request']))
{
if($_SESSION['last_session_request'] > time() - 3){
    // users will be redirected to this page if it makes requests faster than 2 seconds
    header("location: https://youtu.be/j9V78UbdzWI?t=38");
    exit;
}
}
$_SESSION['last_session_request'] = time();
*/
}
?>