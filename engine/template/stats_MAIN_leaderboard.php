<?php
 
foreach ($xz as $keym => $value) {
    $servername = $value['servername'];
}

if (empty($_GET['server']))
    $srvlist = 111;
else
    $srvlist = $_GET['server'];

$thisFrom_yesterday = '';
if(!empty($_GET['from_yesterday']))
{
	$thisFrom_yesterday = $_GET['from_yesterday'];
}

if (!empty($totalkills))
    $infr = $t_kills;
else if (!empty($thisFrom_yesterday))
    $infr = $Elo_rating . ' ' . $lang['from_yesterday'];
else if (!empty($_GET['from_total']))
    $infr = $Elo_rating . ' ' . $lang['from_total'];
else if (!empty($totaldeaths))
    $infr = $t_deaths;
else if (!empty($totalheadshots))
    $infr = $t_heads;
else if (!empty($totalheadshotspercents))
    $infr = $t_heads . ' %';
else if (!empty($totalsuicides))
    $infr = $medals_suicides;
else if (!empty($totalkdRatio))
    $infr = $t_kd;
else if (!empty($totallastvisit))
    $infr = $t_lasttime;
else if (!empty($globaleloratings))
    $infr = $Global_Elo_rating;
else if (!empty($eloratings))
    $infr = $Elo_rating;

else if (empty($server))
    $infr = $Global_Elo_rating;
else
    $infr = $Elo_rating;

$xplayerip = '';

echo ' 
<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">

<a href="' . $domain . '/stats_maps.php" target="_blank"> &nbsp;&nbsp;&nbsp;&nbsp;
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> ' . $x_top_maps . '</b></a> 

<a href="' . $domain . '/stats_day.php" target="_blank"> &nbsp;&nbsp;&nbsp;&nbsp; 
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> ' . $x_top_day . '</b></a> 

<a href="' . $domain . '/stats_week.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> ' . $x_top_week . '</b></a> 

<a href="' . $domain . '/stats_medals.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 4px #FFF, 0 0 7px #fff, 0 0 1px #08e5c8, 0 0 10px #08e5c8, 
0 0 5px #08e5c8;"> ' . mb_strtoupper($menu_medals) . '</b></a> 

 
 </div></div>  


<div class="content_block"> 
<div style="line-height:40px;">
<b class="rainbow-text" style="font-size:24px;font-style:Impact,Fantasy;font-family: Impact,Fantasy;">  ' . $infr . ' ' . $t_top . '</b>

<div style="background:#;float:right;padding:0px;overflow:hidden;line-height:20px;display:none;">
 </div>
</div>';

$filenamedom = pathinfo($domain);
$z = $filenamedom['filename'] . '/';

if (empty($server))
    echo '<select style="overflow:auto;text-transform:none;background:#fff;color:#222;text-decoration:none;padding:5px;margin:2px;
margin-top:10px;width:calc(100% - 4px);" onchange="document.location=&#39;/' . $z . 'stats.php?&#39;+this.value+&#39;=t&#39;">
   ';
else
    echo '<select style="overflow:auto;text-transform:none;background:#fff;color:#222;text-decoration:none;padding:5px;margin:2px;
margin-top:10px;width:calc(100% - 4px);" onchange="document.location=&#39;/' . $z . 'stats.php?server=' . $server . '&&#39;+this.value+&#39;=t&#39;">
  ';


if (empty($server)) {
    echo '<option value="nothing">' . $infr . '</option>';
    if (empty($globaleloratings)) {
        if ($Global_Elo_rating != $infr) {
            echo '<option value="globaleloratings">' . $Global_Elo_rating . '</option>';

        }


    }
} else {
    echo '<option value="nothing">' . $infr . '</option>';
    if (empty($eloratings))
        echo '<option value="eloratings">' . $Elo_rating . '</option>';


}


if (empty($server)) {
    if ($thisFrom_yesterday != $infr) {
        if (empty($from_yesterday))
            echo '<option value="from_yesterday">' . $Global_Elo_rating . ' ' . $lang['from_yesterday'] . '</option>';
    }
    if (empty($from_total))
        echo '<option value="from_total">' . $Global_Elo_rating . ' ' . $lang['from_total'] . '</option>';
} else {

    if (empty($from_yesterday))
        echo '<option value="from_yesterday">' . $Elo_rating . ' ' . $lang['from_yesterday'] . '</option>';
    if (empty($from_total))
        echo '<option value="from_total">' . $Elo_rating . ' ' . $lang['from_total'] . '</option>';

}

if (empty($totalkills))
    echo '<option value="totalkills">' . $t_kills . '</option>';

if (empty($totaldeaths))
    echo '<option value="totaldeaths">' . $t_deaths . '</option>';
if (empty($totalkdRatio))
    echo '<option value="totalkdRatio">' . $t_kd . '</option>';
if (empty($totalheadshots))
    echo '<option value="totalheadshots">' . $t_heads . '</option>';
if (empty($totalheadshotspercents))
    echo '<option value="totalheadshotspercents">' . $t_heads . ' %</option>';
if (empty($totalsuicides))
    echo '<option value="totalsuicides">' . $medals_suicides . '</option>';
if (empty($totallastvisit))
    echo '<option value="totallastvisit">' . $t_lasttime . '</option>';

echo '</select>
	
	 
	
	<div style="padding:5px;color:#aaa;font-size:12px;">
	 <b> ' . $menu_activity . ' : ' . $StatsDaysLimit . ' (' . $bonus_slot_days . ')</b> </div>
	
	
	
	
	<div style="width:auto;overflow:auto;padding:5px;margin:0px;font-size:12px;
	cursor:pointer;cursor:hand;line-height:30px;">
	<div style="width:calc(100% - 14px);" class="wrapper">
	
	<div style="    display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap;max-width:50%;">
	
	<div style="float:left;min-width:30px;text-align:center;font-weight:bold;font-size:11px;max-width:100px;width:calc(20%);">' . $stats_info_rank . '&nbsp;&nbsp;&nbsp;Geo
	 </div>
		
	
	<div style="width:10%;float:left;max-width:40px;min-width:25px;height:5px;">
	 </div>
	
	<div style=" float:left;display:inline-block;text-align:left;min-width:50px;max-width:145px;overflow:hidden;">
	' . $t_nickname . '</div></div>
	
	
	<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:150px;max-width:220px;text-align:center;">
	' . $i_server . '
	</div>	
		
	
	<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:130px;max-width:190px;text-align:center;">
	' . $stats_info_value . '
	</div>
	
	<div style="    display: flex;overflow:auto;display:inline-block;flex-wrap: wrap;width:30px;position:relative;text-align:center;">
	LVL
	<div style="top:0px;left:0px;width:30px;line-height:30px;position:absolute;font-weight:bold;" class="shad0">D</div>
	</div>
	</div> 
	</div>';


$geoinff = '';
require $cpath . '/engine/geoip_bases/class.iptolocation.php';


$i = 0;
foreach ($xz as $keym => $value) {

    ++$i;
    $plservguid = $value['s_pg'];
    $guid = $value['s_guid'];
    $nickname = $value['s_player'];
    $servername = $value['servername'];
    $serverport = $value['s_port'];
    $timeregistered = $value['s_time'];
    $lasttime = $value['s_lasttime'];
    $kills = $value['s_kills'];
    $deaths = $value['s_deaths'];
    $headshots = $value['s_heads'];
    $damages = $value['s_dmg'];

    if (!empty($value['n_kills']))
        $nkills = $value['n_kills'];
    if (!empty($value['n_deaths']))
        $ndeaths = $value['n_deaths'];
    if (!empty($value['n_heads']))
        $nheadshots = $value['n_heads'];
    if (!empty($value['w_skill']))
        $skill = $value['w_skill'];
    if (!empty($value['w_prestige']))
        $prestige = $value['w_prestige'];
    if (!empty($value['s_suicids']))
        $suicides = $value['s_suicids'];
    if (!empty($value['w_geo']))
        $geo = $value['w_geo'];
    if (!empty($value['w_ip']))
        $xplayerip = $value['w_ip'];
    else {

       
        $result = dbSelect('', "SELECT x_db_ip FROM x_db_players where 
			  x_db_guid='$guid' and x_db_ip !='' and x_db_ip !='0' LIMIT 1");
        if (!empty($result)) {
            foreach ($result as $keys => $val) {
                if (!empty($keys)) {
                    if ($keys === 'x_db_ip') {
                        $xplayerip = $val;
                        $querySQL = "UPDATE db_stats_2  SET w_ip='" . $val . "' 
			where s_pg='" . $plservguid . "'";

                        $gt = dbSelectALL('', $querySQL);

                    }
                }
            }
        }

    }

    if (!empty($value['kdratio']))
        $kdratio = $value['kdratio'];
    if (!empty($value['kdratiosort']))
        $kdratiosort = $value['kdratiosort'];
    if (!empty($value['totalpl']))
        $total_players_ondatabase = $value['totalpl'];
    if (!empty($value['headpercent']))
        $headpercents = $value['headpercent'];
    if (!empty($value['s_fall']))
        $total_played_time = $value['s_fall'];

   //$flag = '';
   $flag = returnGeoData($xplayerip);


    if (strpos(trim(urldecode($sss)), trim($servername)) !== false) {

        echo "
<script type=\"text/javascript\">
    window.location.href = '" . $domain . "/stats.php?id=" . $plservguid . "&server=" . $serverport . "';
</script>
";

        echo '<a href="' . $domain . '/stats.php?id=' . $plservguid . '&server=' . $serverport . '" class="white">';
    }



    foreach ($ranked as $rkilled => $rnk) {
        if ($kills >= $rkilled) {
            $rankx = $rnk;
            $zx = explode("rank:", $rankx);
            $fld = $zx[1];
            $rankxx = strtok($fld, " ");

            $zx = explode("image:", $rankx);
            $fld = $zx[1];
            $rankimg = strtok($fld, " ");

            $zx = explode("name:", $rankx);
            $fld = $zx[1];
            $rano = explode("image:", $fld);
            $rankname = $rano[0];
        }
    }
    if (empty($rankimg))
        $rankimg = 'null.png';
    if (empty($rankname))
        $rankname = '0';
    if (empty($rankxx))
        $rankxx = '0';
    $sefes = rand(42, 69);
    $sefesf = rand(74, 99);
    $nextprolvl = get_percentage($sefes, $sefesf);
    $numimgjj = 0;
    $stoprgj = 0;
    $stoprgjw = 0;
    $numimgj = 0;
    $stoprg = 0;
    foreach ($prestige_images as $numimgjj => $preimagej) {
        $numimgtj = $numimgjj;
 if ($stoprgjw != 1) {
            if ($numimgtj == $numimgj - 1) {
                $stoprgjw = 1;
                $previosprestgu = $preimagej;
            }
        }
        if ($stoprgj != 1) {
            if ($numimgtj == $numimgj + 1) {
                $stoprgj = 1;
                $nextprestg = $preimagej;
            }
        }
    }


    list($timegistered, $lasttimeseen) = explode(';', timelife($timeregistered, $lasttime));

    $color_array = array('#0f1014', '#0f0e0e');
    $class = $color_array[$i % 2];
	
	
	
	

    echo '<div style="width:auto;overflow:auto;padding:5px;background:' . $class . ';margin:0px;font-size:13px;
	cursor:pointer;cursor:hand;line-height:30px;border-top: 1px solid #252525;">
	<div style="width:calc(100% - 14px);" class="wrapper">
	
	<div style="display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap;max-width:65%;">';


    echo '<div style="float:left;min-width:20px;text-align:center;font-weight:bold;font-size:12px;max-width:50px;width:calc(20%);">' . ($premierMessageAafficher + $i) . '';


    echo '</div>';
	    $urldatanew = '';
        $col = '';
        $getSteam_id = '';
		$getSteam_id2 = '';
        $getS_id = '';
    if (isLoginUser()) {


        if (strpos($guid, "23103") === false) {

        $getSteam_id = returnWhat('x_db_guid', 'x_db_players', "steam_id='" . trim($guid) . "' and x_db_guid like '%2310%' limit 1", false);
		
		if($getSteam_id)
		{
		  $getS_id = '+';
	      $col = 'filter: saturate(10);';
		}
		else
		{

		  $getSteam_id2 = $guid;
		  $getS_id = '-';
	      $col = 'filter:invert(100%) saturate(4);';	
			
		}

		}


        echo '<div style="min-width:320px;width:320px;">';

////////////////////////////////////////////////
        $urldatanew1 = 'href="' . $domain . '/img.php?nicknameSearch=' . $guid . '" target="_blank"';
		$urldatanew2 = 'href="' . $domain . '/list.php?nicknameSearch=' . $guid . '" target="_blank"';
		$urldatanew3 = 'href="' . $domain . '/chat.php?search=' . $guid . '" target="_blank"';
        if (!empty($getSteam_id)) {
     $urldatanew1 = 'href="#" onclick="window.open(\'' . $domain . '/img.php?nicknameSearch=' . $guid . '\');
    window.open(\'' . $domain . '/img.php?nicknameSearch=' . $getSteam_id . '\');
	window.open(\'' . $domain . '/img.php?nicknameSearchguid=' . $nickname . '\');"';
	 $urldatanew2 = 'href="#" onclick="window.open(\'' . $domain . '/list.php?nicknameSearch=' . $guid . '\');
    window.open(\'' . $domain . '/list.php?nicknameSearch=' . $getSteam_id . '\');
	window.open(\'' . $domain . '/list.php?nicknameSearchguid=' . $nickname . '\');"';
     $urldatanew3 = 'href="#" onclick="window.open(\'' . $domain . '/chat.php?search=' . $guid . '\');
    window.open(\'' . $domain . '/chat.php?search=' . $getSteam_id . '\');"';
        }elseif (!empty($getSteam_id2)) {
     $urldatanew1 = 'href="#" onclick="window.open(\'' . $domain . '/img.php?nicknameSearch=' . $guid . '\');
	window.open(\'' . $domain . '/img.php?nicknameSearchguid=' . $nickname . '\');"';
	 $urldatanew2 = 'href="#" onclick="window.open(\'' . $domain . '/list.php?nicknameSearch=' . $guid . '\');
	window.open(\'' . $domain . '/list.php?nicknameSearchguid=' . $nickname . '\');"';
     $urldatanew3 = 'href="#" onclick="window.open(\'' . $domain . '/chat.php?search=' . $guid . '\');
    window.open(\'' . $domain . '/chat.php?search=' . $getSteam_id . '\');"';
        }	
	
        echo '<div style="float:left;color:#fff;padding:8 8px;text-align:center;width:13px;">		
<a ' . $urldatanew1 . ' style="float:left;color:#609946;'.$col.'padding:1px;line-height:11px;text-align:left;FONT-SIZE:15PX;width:30px;" 
class="tags" glose="[Sc' . $getS_id . ']&nbsp;' . $menu_screens . ':&nbsp;' . $nickname . '"> <b>[Sc' . $getS_id . ']</b> </a>	
</div>';

//////////////////////////////////////////////
 

        echo '<div style="float:left;color:#fff;padding:8 8px;text-align:center;width:27px;">	
<a ' . $urldatanew2 . ' style="float:left;color:#912323;'.$col.'padding:1px;line-height:11px;text-align:left;FONT-SIZE:15PX;" 
class="tags" glose="[L' . $getS_id . ']&nbsp;List&nbsp;&nbsp;' . $nickname . '"> <b>[L' . $getS_id . ']</b> </a>	
</div>';

///////////////////////////////////////////////
 

        echo '<div style="float:left;color:#fff;padding:8 8px;text-align:center;width:8px;">	
<a ' . $urldatanew3 . ' style="width:30px;float:left;color:#3f7689;'.$col.'padding:1px;line-height:11px;text-align:left;FONT-SIZE:15PX;" 
class="tags" glose="[C' . $getS_id . ']&nbsp;' . $menu_chats . '&nbsp;&nbsp;' . $nickname . '"> <b>[C' . $getS_id . '] &nbsp;&nbsp;&nbsp;&nbsp;</b></a>
</div>';

        echo '<div style="float:left;color:#fff;padding:1 5px;text-align:center;width:20px;">	
&nbsp;&nbsp;&nbsp;&nbsp;
</div>';


        echo '</div>';
    }

    if (!empty($server))
        $drt = '&server=' . $serverport . '';
    else
        $drt = '';

    if (empty($brofile))
        echo '<a href="' . $domain . '/stats.php?player=' . $guid . $drt . '" class="white">';
    else
        echo '<a href="' . $domain . '/stats.php?id=' . $plservguid . '&server=' . $serverport . '" class="white">';


    echo '<div style="width:10%;float:left;max-width:40px;min-width:25px;">
	<img src="' . $domain . '/inc/images/flags-mini/' . $flag . '.png"
	style="height:13px;padding-top:7px;float:left;padding-right:5px;opacity:0.8;" title="' . $geoinff . '">
	</div>';


    echo '<div style=" float:left;display:inline-block;text-align:left;min-width:10px;max-width:calc(65%);overflow:hidden;">
	<div style="max-width:1500px;font-size:15px;letter-spacing:.1em">&nbsp;&nbsp; ' . colorize($nickname) . ' 
	';


    echo '</div></div></div>';


    echo '<div style="min-width:50px;max-width:190px;">
	 <div style="font-size:9px;display:inline-block;text-align:left;float:left;">';

    if (empty($_GET['server']))
        echo colorize($servername);


    echo '</div></div>';

    echo '<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:50px;max-width:170px;text-align:center;">';
    if (!empty($brofile))
        echo ' &nbsp; ', colorize($servername);
    else if (!empty($nicknameSearch))
        echo ' &nbsp; ', $guid, ' &nbsp; &nbsp;', colorize($servername);
    else if ((empty($server)) && (!empty($totallastvisit)))
        echo ' &nbsp; ', $guid, ' &nbsp;', colorize($servername);
    else if ((!empty($server)) && (!empty($totallastvisit)))
        echo ' &nbsp; ', $guid;
    echo '</div>';


    echo '
	<div style="color:#52bafe;display: flex;overflow:auto;display:inline-block;flex-grow: 1; flex-wrap: wrap; min-width:90px;max-width:100px;text-align:center;">
	';

    if (!empty($totalkills))
        echo $kills;
    else if (!empty($totaldeaths))
        echo $deaths;
    else if (!empty($totalheadshots))
        echo $headshots;
    else if (!empty($totalkdRatio))
        echo $kdratio;
    else if (!empty($totalsuicides))
        echo $suicides;
    else if (!empty($totalheadshotspercents))
        echo $headpercents, '%';
    else if (!empty($totallastvisit))
        echo $lasttime;
    else
        echo $skill;


    echo '
	</div> 
	<div style="    display: flex;overflow:auto;display:inline-block;flex-wrap: wrap;width:30px;position:relative;text-align:center;">
	<img src="' . $domain . '/inc/images/ranks/' . $rankimg . '" style="height:30px; filter: grayscale(60%);width: calc(100% / 0.3);max-width:30px;float:left;" alt="' . $rankname . '" title="' . $rankname . '">
	<div style="top:0px;left:0px;width:30px;line-height:30px;position:absolute;font-weight:bold;" class="shad0">' . $rankxx . '</div>
	</div> 
	</div> 
	</div></a>
';

}


echo '</div></br></br>';


if (empty($brofile)) {


    $fff = $top_main_total - $ssssob;
    $t = 0;
    for ($i = 1; $i <= $nb_pages; $i++) {
        $t++;

        if (empty($search)) {

            if (($nb_pages == $page) && ($nb_pages == $t)) {

                for ($k = 1; $k <= $fff; $k++) {
                    if ($top_main_total < $ssssob + 10)
                        echo '</br>';
                }

            }
        }
    }

    echo '<br/>

<div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap: wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div class="server_foot_paginator">';







if(!empty($totalkills))
	$totalkills = '&totalkills='.$totalkills; else $totalkills = '';
if(!empty($search))
	$search = '&search=' . $search; else $search = '';
if(!empty($totalheadshots))
	$totalheadshots = '&totalheadshots=' . $totalheadshots; else $totalheadshots = '';
if(!empty($totalkdRatio))
	$totalkdRatio = '&totalkdRatio=' . $totalkdRatio; else $totalkdRatio = '';
if(!empty($totalsuicides))
	$totalsuicides = '&totalsuicides=' . $totalsuicides; else $totalsuicides = '';
if(!empty($totallastvisit))
	$totallastvisit = '&totallastvisit=' . $totallastvisit; else $totallastvisit = ''; 
if(!empty($totalkills))
	$totalkills = '&totalkills=' . $totalkills; else $totalkills = ''; 
if(!empty($timeq))
	$timeq = '&timeq=' . $timeq; else $timeq = '';
if(!empty($totaldeaths))
	$totaldeaths = '&totaldeaths=' . $totaldeaths; else $totaldeaths = ''; 

		$pageskey = '<a href="' . $domain . '/stats.php?server='.$server.$totaldeaths.$totalkills.$totallastvisit.$search.$totalkdRatio.$totalsuicides.$totalheadshots.$timeq.$totalkills.'&page=';
 
    if ($page != 1) $pervpage = $pageskey . '1" class="paginator">' . $t_page_first . '</a> | ' . $pageskey . ($page - 1) . '" class="paginator">' . $t_page_pre . '</a> | ';

    if ($page != $nb_pages) $nextpage = ' | ' . $pageskey . ($page + 1) . '" class="paginator">' . $t_page_next . '</a> | ' . $pageskey . $nb_pages . '" class="paginator">' . $t_page_last . '</a>';


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


    if ($nb_pages > 1) {
        Error_Reporting(E_ALL & ~E_NOTICE);
        echo $pervpage . $page7left . $page6left . $page5left . $page4left . $page3left . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $page3right . $page4right . $page5right . $page6right . $page7right . $nextpage;
        echo "</div></div>";
    }


}
   
?>   