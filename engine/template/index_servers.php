<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
echo ' 
<script src="' . $domain . '/data/graph/dynamics2.js"></script>';



echo '<div style="height:auto;overflow:auto;padding:5 10px;" class="content_block">';

echo '<h1>' . $i_stats . '</h1>';


echo '<div style="overflow:auto;width:95%;padding:5 1px;">
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.$t_total_players.' : '.$allplayers.'
</div></div>';


echo '<div style="overflow:auto;width:85%;padding:5 1px;">
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.$t_total_players_v.' : '.array_sum($msum).'
</div></div>';



  if(!empty($xz_yesterday))
  {
//////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 

	
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:pointer;cursor:hand;padding:5 1px;">'.$t_total_players_y.' : '.array_sum($ysum).'</div>';
arsort($xz_yesterday);
foreach ($xz_yesterday as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.colorize($value['servername']).' : '.$value['todayplayedyesterday'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }


  if((!empty($xz_day))&&(!empty($xzf)))
  {
//////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:pointer;cursor:hand;padding:5 1px;">'.$t_total_players_t.' : '.array_sum($tsum).'</div>';

arsort ($xz_day);
foreach ($xz_day as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.colorize($value['servername']).' : '.$value['todayplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }



  if(!empty($xz_week))
  {
//////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:pointer;cursor:hand;padding:5 1px;">'.$t_total_players_w.' </div>';
arsort ($xz_week);
foreach ($xz_week as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.colorize($value['servername']).' : '.$value['weekplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }






  if(!empty($x_monthh))
  {
//////////////////////////////////////////////////////////////////////////////
echo '<div style="padding:10px;margin:5px;width:257px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

echo '<div style="overflow:auto;width:99%;padding:5 1px;">';
echo '<div style="font-size:12px;cursor:pointer;cursor:hand;padding:5 1px;">'.$t_total_players_m.' </div>';
arsort ($x_monthh);
foreach ($x_monthh as $keym => $value) {
echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:1px;font-size:13px;cursor:pointer;cursor:hand;">
'.colorize($value['servername']).' : '.$value['monthplayed'].'
</div>';
}
echo '</div>';
echo ' </div></div></div></div>';
  }


echo '</div>';







echo '<div class="content_block">
<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>' . $index_server . '</h1> </div>
';
$gtplayer_list = $cpath . '/data/db/getstatus_gtplayer_list.json';
if (!file_exists($gtplayer_list)) $gtimes = 0;
else {
    $gtimes = 1;
    $cron_time = filemtime($gtplayer_list);
    if (time() - $cron_time >= 120) $gtimes = 0;
    else $gtimes = 1;
}
if ((empty($gtimes))||(!file_exists($gtplayer_list))) {
    foreach ($multi_servers_array as $arx => $f) {
        $zx = explode("port:", $arx);
        $fld = $zx[1];
        $p = strtok($fld, " ");
        $zxu = explode("ip:", $arx);
        $fldb = $zxu[1];
        $servex3x = strtok($fldb, " ");
        usleep(80000);
        $status = new COD4xServerStatus(trim($servex3x) , trim($p));
        if ($status->getServerStatus()) {
			
            $status->parseServerData();
            $serverStatus = $status->returnServerData();
            $servername = $serverStatus['sv_hostname'];
            $servermap = $serverStatus['mapname'];
            $mpgamenname = $serverStatus['gamename'];
            $mpshortver = $serverStatus['shortversion'];
            $mxplayers = $serverStatus['sv_maxclients'];
            $players = $status->returnPlayers();
            $pings = $status->returnPings();
            $scores = $status->returnScores();
            $plyr_cnt = sizeof($players);
			
            if (!empty($plyr_cnt)) {
                $postsc[] = array(
                    'servername' => trim($servername) ,
                    'map' => trim($servermap) ,
                    'game' => trim($mpgamenname) ,
                    'version' => trim($mpshortver) ,
                    'playercount' => trim($plyr_cnt) ,
                    'players' => array(
                        $players
                    ) ,
                    'pings' => array(
                        $pings
                    ) ,
                    'scores' => array(
                        $scores
                    ) ,
                    'maxplayers' => trim($mxplayers) ,
                    'ip' => trim($servex3x) ,
                    'port' => trim($p)
                );
                $respm[] = $postsc;
				 
            }
            $status = null;
        }
    }
	
	$rpm = json_encode($respm);
	
 	if(empty($respm))
	{
		sleep(5);
echo '<script type="text/javascript">location.reload(true);</script>';
	}
	
	if((!empty($rpm))&&(isJson($rpm)))
	{
		if((count($respm)) > 0)
		{
			//print_r($respm);
			
                $fp = fopen($gtplayer_list, 'w');
                fwrite($fp, $rpm);
                fclose($fp);
		}
    }				
	
}


 

$i = 0;
if (file_exists($gtplayer_list))
{
$json_data = file_get_contents($gtplayer_list);
$dxq = json_decode($json_data);
$arraysearchdata = array();
if (is_array($dxq[0])) {
    foreach ($dxq[sizeof($dxq) - 1] as $key) {
        if ((!empty($key->servername)) && (!empty($key->scores))) {
            $servername = $key->servername;
            $serverxmap = $key->map;
            $mpgamenname = $key->game;
            $mpshortver = $key->version;
            $plyr_cnt = $key->playercount;
            $mxpl = $key->maxplayers;
            $ipm = $key->ip;
            $prt = $key->port;
            $players = $key->players;
            $pings = $key->pings;
            $scores = $key->scores;
            ++$i;
            echo '
<div style="width:auto;overflow:auto;padding:5px;background: #000000aa;
margin:10px;font-size:13px;cursor:pointer;cursor:hand;" id="match' . md5($i) . '" onclick="show_match(\'' . md5($i) . '\')">
	
	
<div class="wrapper" style="width:calc(100% - 100px);flex-grow: 1; display: flex; float:left;">
	
<div style="overflow:auto;display:inline-block;flex-grow: 1; display: flex; min-width:30%; flex-wrap: wrap; " class="wrapper">
	
<div style="float:left;color:#fff;padding:5 3px;font-size:12px;line-height:14px;width:20px;text-align:center;">' . $i . '</div>
	
 
 
 <div style="color:#fff;padding:5 3px;font-size:12px;line-height:14px;width:20px;display:inline-block;float:left;TEXT-ALIGN:LEFT;">' . $plyr_cnt . '/' . $mxpl . '</div>
 
 
	
<div style="display:inline-block;float:left;TEXT-ALIGN:LEFT;color:#fff;padding:5 3px;line-height:24px;width:100px;FONT-SIZE:15PX;min-width:50%;">
	
<div style="color:#777;font-size:15px;"></div>
<a href="cod4://' . $ipm . ':' . $prt . '" class="tags" glose="' . $ipm . ':' . $prt . '">' . colorize($servername) . '</a>
	</div>
	</div>
	
	
<div style="overflow:auto;width:auto;display:inline-block;flex-grow: 1; display: flex; min-width:50%;" class="wrapper">';
	
 if(!empty($mapsall[$serverxmap]))
	 $mapnm = $mapsall[$serverxmap];
 else
	 $mapnm = $serverxmap;

	
echo '<div style="color:#fff;padding:5 3px;line-height:24px;text-align:center;min-width:30%;overflow:auto;display:inline-block;flex-grow: 1;">
	
<div style="color:#d5dee7;font-size:15px;display:inline-block;float:right;TEXT-ALIGN:right;">'.$mapnm.' 
 </div>
 
 
 
  
 
 
	
  
	</div>
	</div></div>
	
	
	
	
	
	
	
	
	
	
	
<div style="line-height:30px;display:inline-block;width:20px;float:right;text-align:right;">&#9660;</div>
	
	
<div id="match_sub' . md5($i) . '" style="display:none;width:calc(100% - 10px);
font-size:14px;border-top: 1px solid #222;overflow:auto;margin-top:5px;padding:5px;background:#222;">
';	
  
 
 
 echo '<div class="match_stats_adv" style="min-width:280px;">';


 if(file_exists($cpath .'/inc/images/maps/'.$serverxmap.'.jpg'))
echo '<img src="' . $domain . '/inc/images/maps/' . $serverxmap . '.jpg" width="280px" >';
    else
echo '<img src="' . $domain . '/inc/images/maps/no-pic.png" width="280px">';	
	 
	echo '</div>';
 


echo '<div class="match_stats_adv" style="min-width:180px;">Players
 ';
            foreach ($players as $pl => $e) {
                foreach ($e as $r => $j) {
                    echo '<div style="color:#fff;width:257px;">' . $j . '</div>';
                }
            }
            echo '
</div>






<div class="match_stats_adv" style="min-width:100px;">Score
 ';
            foreach ($scores as $pl => $e) {
                foreach ($e as $r => $j) {
                    echo '<div style="color:#fff;width:100px;">' . $j . '</div>';
                }
            }
            echo '
</div>





<div class="match_stats_adv" style="min-width:100px;">Pings
 ';
            foreach ($pings as $pl => $e) {
                foreach ($e as $r => $j) {
                    echo '<div style="color:#fff;width:100px;">' . $j . '</div>';
                }
            }
            echo '
</div> ';


           echo '</div></div>';
	
	 

        }
    }
}
}
echo '</div>';
?>