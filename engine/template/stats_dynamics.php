<?php
if(!empty($_GET['guid'])){
	$uid = $_GET['guid'];
	$guidn = $uid;
if (strpos($_SERVER["HTTP_REFERER"], 'stats.php') !== false)
{

if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
}

$cpath = str_replace("engine", "", $cpath);
$cpath = str_replace("template", "", $cpath);
$cpath = str_replace("//", "/", $cpath);

//include($cpath. '/engine/ajax_data/cache-top.php');
sleep(2);
include($cpath ."/engine/functions/langctrl.php");
 
$baseurlz = basename(__FILE__); 

include($cpath ."/engine/functions/main.php");

$now = time();	

$c = 0; 
$dyhist = $cpath . '/data/cache/stats_graph/'.$uid.'.js';
 
if(!file_exists($dyhist))
$c = 1;
else if ($now - filemtime($dyhist) >= 60*60*5)
$c = 1;
	  
if($c == 1)
{
	
//$query = "DELETE FROM db_stats_history WHERE date < NOW() - INTERVAL 50 DAY";
//$query = "DELETE FROM db_stats_history WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) > date";
 	
	
$query = "SELECT pg,skill,kills,deaths,heads,date FROM db_stats_history WHERE pg = '".$uid."' and DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= date limit 30";

$stat = dbSelectALL('', $query);

foreach ($stat as $key => $v) {
   $vss[]  = $v["skill"];
   $vsk[]  = $v["kills"];
   $vsd[]  = $v["deaths"];
   
   if(($v["kills"] > 0)&&($v["deaths"] > 0))
   {
     $vsktt   = $v["kills"]/$v["deaths"];
	 $vskd[]  = round($vsktt, 3);
   }
   else
   {
	 $vsktt   = 1;   
     $vskd[]  = $vsktt;
   }
 
   if(($v["kills"] > 0)&&($v["heads"] > 0))
     $vshp[]  = get_percentage($v["heads"], $v["kills"]);
   else
     $vshp[]  = 0; 

   $vsh[]  = $v["heads"];
   list($vdate,$non) = explode(' ', $v["date"]);
   $vsx[]  = '"<br>'.$playeed_date.': '.$vdate.'<br><br>'.$t_kills.': '.$v["kills"].'<br>'.$t_deaths.': '.$v["deaths"].'<br>'.$t_heads.': '.$v["heads"].'<br>'.$t_kd.': '.round($vsktt, 3).'"';
}


if(!empty($vss))
{
$avg_skill  = array_sum($vss)/count($vss); 
$avg_kills  = array_sum($vsk)/count($vsk); 
$avg_deaths = array_sum($vsd)/count($vsd); 
$avg_heads  = array_sum($vsh)/count($vsh); 
$avg_kd     = array_sum($vskd)/count($vskd); 
$avg_hp     = array_sum($vshp)/count($vshp); 

$comma_skill  = implode(",", $vss); 
$comma_kills  = implode(",", $vsk); 
$comma_deaths = implode(",", $vsd); 
$comma_heads  = implode(",", $vsh); 
$comma_kd  = implode(",", $vskd); 
$comma_hp  = implode(",", $vshp);
$comma_date   = implode(",", $vsx); 

$data = 'var graph=[[[],[]],[],[],[],[],[]];
graph[0][0]=['.$comma_skill.'];
graph[1][0]=['.$comma_kills.'];
graph[2][0]=['.$comma_heads.'];
graph[3][0]=['.$comma_deaths.'];
graph[4][0]=['.$comma_kd.'];
graph[5][0]=['.$comma_hp.'];

graph[0][1]=['.$comma_skill.'];
graph[1][1]=['.$comma_kills.'];
graph[2][1]=['.$comma_heads.'];
graph[3][1]=['.$comma_deaths.'];
graph[4][1]=['.$comma_kd.'];
graph[5][1]=['.$comma_hp.'];
match_time=['.$comma_date.'];
graph_avg=['.$avg_skill.','.$avg_kills.','.$avg_heads.','.$avg_deaths.','.$avg_kd.','.$avg_hp.'];
//Highcharts.setOptions(Highcharts.theme);


function change_last_update(n){
	setTimeout(function(){document.getElementById(\'last_updated\').innerHTML=\'Stats was updated \'
	+(parseInt(n)+1)+\' minutes ago\';change_last_update(parseInt(n)+1);},1000*6000);	
}
var current_graph=0;graph_metric=\''.$t_skill.'\';module=\'\';
function show_match(id){
	now=document.getElementById(\'match_sub\'+id).style.display;
	if(now==\'block\')
		document.getElementById(\'match_sub\'+id).style.display=\'none\';
	else
		document.getElementById(\'match_sub\'+id).style.display=\'block\';
}
function show_graph(n){current_graph=n;
metrics=[\''.$t_skill.'\',\''.$t_kills.'\',\''.$t_heads.'\', \''.$t_deaths.'\', \''.$t_kd.'\', \''.$t_heads.' %\'];
graph_metric=metrics[n];
	chart.series[0].setData(graph[n][0]);
	
	for(i=0;i<=3;i++){
		if(n==i)w=2;else w=0;
		 chart.yAxis[0].plotLinesAndBands[i].options.width=w;
	} 
	 chart.yAxis[0].update();
}


var chart=Highcharts.chart(\'container\', {
   chart: {
        type: \'spline\',
        scrollablePlotArea: {
            scrollPositionX: 1
        }
    },
    title: {
        text: \'\'
    },

    subtitle: {
        text: \'\'
    },
yAxis: {
    // ...Options
    plotLines: [,
	{
        color: \'#004c00\',
        value: \''.$avg_skill.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg0\'
    },
	{
        color: \'#A1A100\',
        value: \''.$avg_kills.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg1\'
    },
	{
        color: \'#197E4C\',
        value: \''.$avg_heads.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg2\'
    },
	{
        color: \'#703900\',
        value: \''.$avg_deaths.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg3\'
    },
    {
        color: \'#000099\',
        value: \''.$avg_kd.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg4\'
    },
    {
        color: \'#990000\',
        value: \''.$avg_hp.'\', 
        width: \'2\',
        zIndex: 2 ,id:\'avg5\'
    }
	]
},


xAxis: {
enabled:false
},
        minorGridLineWidth: 0,
        gridLineWidth: 0,
  legend: {  enabled: false,
        align: \'center\',
        verticalAlign: \'bottom\',
        borderWidth: 0
    },

    scrollbar: {
        enabled: false
    },
    plotOptions: {
        spline: {
            lineWidth: 2,
            states: {
                hover: {
                    lineWidth: 3
                }
            }
					,
            marker: {
                enabled: false
            },
        }
    },
	

		
exporting: {
        buttons: {
            contextButton: {
                enabled: false
            }    
        }
    },
	  credits: {
      enabled: false
  },
    series: [{
        name: \'\',
        data: graph[0][1],
		color:\'#185d95\'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: \'horizontal\',
                    align: \'center\',
                    verticalAlign: \'bottom\'
                }
            }
        }]
    }
	

});


';
}

}


if(!empty($data))
{
//write $data once in 5h
if(!file_exists($dyhist))
{
touch($dyhist);
 	$fpl = fopen($dyhist, 'w+');
	fwrite($fpl, $data);	
    fclose($fpl);
}
else if ($now - filemtime($dyhist) >= 60*60*5)
	  { 
 	$fpl = fopen($dyhist, 'w+');
	fwrite($fpl, $data);	
    fclose($fpl);
	  }
}	  


if(file_exists($dyhist))
{
/* 
echo '
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
';
*/


echo '
<script src="'.$domain.'/inc/graph_highcharts.js"></script>
<script src="'.$domain.'/inc/graph_export-data.js"></script>';



echo '<script src="'.$domain.'/inc/graph_theme.js"></script>

<div class="content_block">

<div style="overflow:auto;">


<div class="title" style="">
<div class="text">
 

<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>'.$lang_skill_history.' / '.$yuuyyuyuyuu.'</h1>
</div>
</div>

<div style="float:right;text-align:center;font-size:10px;">

<div style="display:inline-block;background:#004c00;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(0);">'.$t_skill.'</div>

<div style="display:inline-block;background:#A1A100;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(1);">'.$t_kills.'</div>

<div style="display:inline-block;background:#197E4C;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(2);">'.$t_heads.'</div>

<div style="display:inline-block;background:#703900;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(3);">'.$t_deaths.'</div>

<div style="display:inline-block;background:#000099;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(4);">'.$t_kd.'</div>

<div style="display:inline-block;background:#990000;padding:5 5px;width:75px;cursor:pointer;border-radius: 4px;text-shadow: 2px 2px 4px #000000;" onclick="show_graph(5);">'.$t_heads.' %</div>

';
 

//<div style="display:inline-block;background:#444;padding:5 5px;width:60px;cursor:pointer;" onclick="show_graph(2);">'.$t_skill.'</div>
//<div style="display:inline-block;background:#444;padding:5 5px;width:60px;cursor:pointer;" onclick="show_graph(3);">Score/Min</div>

echo '
</div></div>
</div>

<div id="container" style="overflow:auto;width:auto;height:300px;"></div>
</div>

<script src="'.$domain.'/data/cache/stats_graph/'.$uid.'.js"></script>';
//include($cpath. '/engine/ajax_data/cache-bottom.php');
}
}
}
?>