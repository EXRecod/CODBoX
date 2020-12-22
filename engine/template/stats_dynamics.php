<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
echo '

<script src="https://code.highcharts.com/highcharts.js"></script>


<script src="https://code.highcharts.com/modules/series-label.js"></script>


<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script src="https://code.highcharts.com/modules/export-data.js"></script>


<script src="'.$domain.'/inc/theme.js"></script>







<div class="content_block">

<div style="overflow:auto;">


<div class="title" style="">
<div class="text">
 

<div style="overflow:auto;width:100%;padding:5 10px;">
<h1>'.$yuuyyuyuyuu.'</h1>
</div>
</div>

<div style="float:right;text-align:center;font-size:10px;">

<div style="display:inline-block;background:#444;padding:5 5px;width:50px;cursor:pointer;" onclick="show_graph(0);">'.$t_kd.'</div>

<div style="display:inline-block;background:#444;padding:5 5px;width:55px;cursor:pointer;" onclick="show_graph(1);">'.$t_skill.'</div>
';


//<div style="display:inline-block;background:#444;padding:5 5px;width:60px;cursor:pointer;" onclick="show_graph(2);">'.$t_skill.'</div>
//<div style="display:inline-block;background:#444;padding:5 5px;width:60px;cursor:pointer;" onclick="show_graph(3);">Score/Min</div>

echo '
</div></div>
</div>

<div id="container" style="overflow:auto;width:auto;height:300px;"></div>
</div>


<script src="'.$domain.'/data/graph/dynamics1.js"></script>
<script src="'.$domain.'/data/graph/dynamics2.js"></script>
 

';

?>