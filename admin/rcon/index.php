<?php
 if(!empty($server_ip)){
$rcon_cached = 1;
	
include($cpath. '/engine/ajax_data/cache-top.php');
$cx = "<script language = 'javascript'>
  var delay = 10000;
  setTimeout(\"location.reload()\", delay);</script>";

$tx = $cx.'<div class="content_block">
 <center><span class="rainbowQ">'.$menu_rcon_error.' </span> </br> </br>
<span style="color:green;">'.$admin_logins_reten.'</span> </br></br></br></center></div>';

$txerrrcon = $cx.'<div class="content_block">
 <center></br><span class="rainbowQ"> BAD RCON PASSWORD! </span> </br></br></center></div>';
 
$table_color_1 = '222';
$table_color_2 = '333';

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

if (strpos($xz, '~') !== false)
       $txtcmd = "<a href=\"".$domain."/admin/cmd.php?server=".$server_port."&svrnm=".$server_name."&gd=servercmd&plyr=servercmd\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:#fefefe;padding:0 45px;\" class=\"tags\" glose=\"RCON&nbsp;".$lang['command']."\"> <b>|🛠|</b></a>";
     else
       $txtcmd = "";

 
echo '<div style="height:auto;overflow:auto;text-align:center;padding:10 30px;" class="content_block wrapper">';
echo '<h1> RCon  ✅  '.colorize($server_name).' '.$txtcmd.' </h1></div>';

ob_flush();flush(); // display header before contacting target server
 

$connect = connectToGame();
$output = RequestToGame('status');
  
if(!empty($output))
{
$output = explode ("\xff\xff\xff\xffprint\n", $output);

$newoutputtwo  = implode ('!', $output);
$newoutputtwo  = explode ("\n",$newoutputtwo );

unset($output[0]);
$output = implode ('👀', $output);

$output = ColorizeName($output);

$output = explode ("\n", $output);
 
$color2 = false;
$cnt = count($output)-2;	
	
//die(var_dump($output));

$patternx[0] = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+)\s+(\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
$patternx[1] = '#^\s*(\d+)\s+(-?\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)$#';
$patternx[2] = "#\s*(\d+)\s+(-?\d+)\s+(\d+)\s* (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)#";

	      $newoutput  = preg_grep ('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $newoutputtwo);
 
		foreach ($newoutput as $nm) {
		foreach ($patternx as $rr => $pattern) {
			if (preg_match($pattern, $nm, $sb)) {
				 //echo "\n".$nm;
			if(!empty($sb[1]))
			{		
		$patternrn = $pattern;
        $sbouts = str_replace(' ', '', implode(",", $output));

if($rr == 2)
	{

if(strpos($sbouts,'numscorepingnamelastmsgaddressqportrate') !== false)
        { 
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[6], $sbn)) {
			
				if (preg_match('/[0-9]{1,2}/', $sb[1], $sbn)) {
					
				if($sb[6] == '127.0.0.1') $sb[6] = '111.111.111.111';	

				$rconarray[] = array(
					"num" => trim($sb[1]),
					"score" => trim($sb[2]),
					"ping" => trim($sb[3]),
					"name" => uncolorize($sb[4]),
					"guid" => fakeguid($sb[4]),
					"lastmsg" => $sb[5],
					"ip" => trim($sb[6])
				);
		}			
	   }}
	   
	   //var_dump($rconarray);
	   
	}		 
else if($rr == 1)
	{	
if(strpos($sbouts,'numscorepingguidnamelastmsgaddressqportrate') !== false)
        { 
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[7], $sbn)) {
			if (preg_match('/[a-fA-F0-9]{16,32}/', $sb[4], $sbn)) {
				if (preg_match('/[0-9]{1,2}/', $sb[1], $sbn)) {
		//НИКНЕЙМ ПОПРАВКА :7
		$sb[5] = str_replace('^7', '', $sb[5]);
				$rconarray[] = array(
					"num" => trim($sb[1]),"score" => trim($sb[2]),"ping" => trim($sb[3]),"guid" => trim($sb[4]),"name" => trim($sb[5]),"ip" => trim($sb[7])
					);
		}			
	   }
	   }}
	}
else if($rr == 0)
	{

if(strpos($sbouts,'numscorepingplayeridsteamidnamelastmsgaddressqportrate') !== false)
{
		//НИКНЕЙМ ПОПРАВКА :7
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[8], $sbn)) {		
		$sb[6] = str_replace('^7', '', $sb[6]);
				$rconarray[] = array(
				    //"g" => $sb[0],
					"num" => trim($sb[1]),"score" => trim($sb[2]),"ping" => trim($sb[3]),"guid" => trim($sb[4]),"steam" => trim($sb[5]),"name" => trim($sb[6]),"lastmsg" => $sb[7],"ip" => trim($sb[8]),
					"port" => trim($sb[9]),
					//"qport" => $sb[10],
					//"rate" => $sb[11],
					);
}
	}	
	
	}
	
			}
		}
	}
}
//echo "\n -----------------------------\n ";	
//echo $patternrn;
//echo "\n -----------------------------\n ";	
/*			
echo "\n -----------------------------\n ";
var_dump($rconarray);
echo "\n -----------------------------";
*/

if(empty($rconarray))
echo "<script language = 'javascript'>
  var delay = 5000;
  setTimeout(\"location.reload()\", delay);</script>";

if(!empty($output))
{

echo '<div style="width:100%;height:auto;overflow:auto;text-align:center;padding:10 1px;color:black;font-size:15px;" class="content_block wrapper">';


echo '	
<div class="wrapper" style="width:calc(100% - 100px);flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:20%;flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:1 1px;line-height:14px;width:90px;text-align:center;">Num</div>
	
<div style="float:left;color:#fff;padding:1 1px;line-height:14px;text-align:left;width:120px;">
<div style="color:#777;">'.$t_nickname.'</div></div>
</div>	

<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:35%;flex-wrap: wrap; " class="wrapper">
<div style="float:left;color:#fff;padding:1 1px;line-height:14px;text-align:left;width:200px;min-width:40%;">	
<div style="color:orange;">'.$menu_guids.'</div></div>
</div>
	
	
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:20%;" class="wrapper">
	
<div style="float:left;color:#fff;padding:1 1px;line-height:14px;text-align:left;color:#ff0000;min-width:30px;width:15%;">
IP   </div>

</div>
</div>
</div>';	

$i = 0;
if(!empty($rconarray))
{
require $cpath.'/engine/geoip_bases/class.iptolocation.php';
$db = new \IP2Location\Database($cpath.'/engine/geoip_bases/IP2LOCATION-LITE-DB3.BIN', \IP2Location\Database::FILE_IO);	
	
foreach ($rconarray as $list){	

 //$list['ip'] = '111.111.222.111';

		if (!empty($list['ip'])) {
				$record = $db->lookup($list['ip'], \IP2Location\Database::ALL);
				if (!empty($record)) {
					$geoinff = '';
					
				if (isLoginUser()) {	
					
						$flg = $record['countryCode'];
						$flag = $flg;
						$cn_nm = $record['countryName'];
						$geoinff = "🅲🅾🆄🅽🆃🆁🆈:".$record['countryName']." </br>  🆁🅴🅶🅸🅾🅽:".$record['regionName']." </br>  🅲🅸🆃🆈:".$record['cityName'];
						
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


       $txt = "<a href=\"".$domain."/admin/sent.php?server=".$server_port."&svrnm=".$server_name."&gd=".$list['guid']."&plyr=".$list['name']."\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:#fefefe;padding:0 1px;\"> <div class=\"tooltip\"><b>|SMS|</b><span class=\"tooltiptext\">|SMS|&nbsp;".$t_messages.":&nbsp;".$list['name']."</span></div></a>";

       $txtscreen = "<a href=\"".$domain."/admin/screen.php?server=".$server_port."&svrnm=".$server_name."&gd=".$list['guid']."&plyr=".$list['name']."&playernumber=".$list['num']."\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:#fefefe;padding:0 1px;\"> <div class=\"tooltip\"><b>|SS|</b><span class=\"tooltiptext\">|SS|&nbsp;".$makescreens.":&nbsp;".$list['name']."</span></div></a>";

if (strpos($xz, '~') !== false)
       $txtkick = "<a href=\"".$domain."/admin/kick.php?server=".$server_port."&svrnm=".$server_name."&gd=".$list['guid']."&plyr=".$list['name']."&playernumber=".$list['num']."\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:#fefefe;padding:0 1px;\"><div class=\"tooltip\"><b>|KK|</b><span class=\"tooltiptext\">|KK|&nbsp;KICK:&nbsp;".$list['name']." </span></div></a>";
     else $txtkick = "";
 ++$i;	
echo '
<div style="width:auto;overflow:auto;padding:2px;background: #000000aa;
margin:2px;font-size:15px;cursor:pointer;cursor:hand;" id="match' . md5($i) . '" onclick="show_match(\'' . md5($i) . '\')">	


<div class="wrapper" style="width:calc(100% - 100px);flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:20%;flex-wrap: wrap; " class="wrapper">


<div style="float:left;color:#fff;padding:7 111px;line-height:25px;width:190px;text-align:center;position:absolute;">
<a href="' . $domain . '/chat.php?geo=' . $flag . '">
<div class="tooltip"><img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png" width="24" height="12">
<span class="tooltiptext" style="height:80px;width=120px;">'.$geoinff.'</span></div>
</a>
</div>

	
<div style="float:left;color:#fff;padding:1 1px;line-height:25px;width:190px;text-align:center;position:absolute;">'.$list['num'].' &nbsp; '.$txt.' '.$txtscreen.' '.$txtkick.'</div>
<div style="float:left;color:#fff;padding:1 1px;line-height:25px;width:190px;text-align:center;"></div>
	
<div style="float:left;color:#fff;padding:1 1px;line-height:25px;text-align:left;width:120px;">
<div style="color:#777;"> <a href="'.$domain.'/list.php?nicknameSearchguid='.trim($list['name']).'" target="_blank" class="tags" glose="'.$list['name'].'"> <div style="color:#777;">'.colorize($list['name']).'</div> </a> </div></div>

</div>	

<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:35%;flex-wrap: wrap; " class="wrapper">
<div style="float:left;color:#fff;padding:1 1px;line-height:25px;text-align:left;width:200px;min-width:40%;">








	
<a href="'.$domain.'/list.php?nicknameSearch='.trim($list['guid']).'" target="_blank" class="tags" glose="'.$list['guid'].'"><div style="color:orange;">'.$list['guid'].'</div></a></div>
</div>
	
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:20%;" class="wrapper">	 
<div style="float:left;color:#fff;padding:1 1px;line-height:25px;text-align:left;color:#ff0000;min-width:30px;width:15%;">
<div style="color:#ff0000;">
<a href="'.$domain.'/list.php?listip='.trim($list['ip']).'" target="_blank" style="color:#ff0000;">'.$list['ip'].' </a>
</div>
</div>
  
</div>
</div>
</div>'; 	
}
}
echo '
</div>   
';
 
if((!empty($output[1]))&&(!empty($rconarray)))
 {
echo '</br></br></br><table>
<tr style="width:48%;height:auto;overflow:auto;text-align:left;padding:10 1px;color:white;" bgcolor="#'.(($color2) ? $table_color_1 : $table_color_2).'">
<td><pre>'.$output[1]."</pre></td></tr>\n";
for($i=3; $i<$cnt; $i++)
	{
	$line = $output[$i];
	$pat[0] = "/^\s+/";
	$pat[1] = "/\s{2,}/";
	$pat[2] = "/\s+\$/";
	$rep[0] = "";
	$rep[1] = " ";
	$rep[2] = "";
	$t = preg_replace($pat,$rep,$line); 
/*	 
	<td align=center>'
		.(($is_num)?'<a href="#" onclick="Kick(\''.$t[0].'\'); return false">'.$lang['kick'].'</a>':'').'</td><td align=center>'
		.(($is_num)?'<a href="#" onclick="Mail(\''.$t[0].'\'); return false">'.$lang['whisper'].'</a>':'').'</td> 
	 
*/	 
	$t = explode(' ', $t, 2);
    if (strpos($t[0], '!') !== false) $t[0] = '';
    $color2 = ! $color2;
    $is_num = is_numeric($t[0]);
	echo '<tr bgcolor="#'.(($color2) ? $table_color_1 : $table_color_2).'">
		<td><pre style="color:#fff;">'
		.$line."</pre></td></tr>\n";
}
 
echo '</table>';
 }
 else  if((empty($output[1]))&&(empty($rconarray)))
	echo "<script language = 'javascript'>
  var delay = 10000;
  setTimeout(\"location.reload()\", delay);</script>"; 

echo '</div>';
echo '<br>';



}else {echo $tx;}

}else {echo $tx;}
include($cpath. '/engine/ajax_data/cache-bottom.php');
}
?>
