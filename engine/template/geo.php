<?php

	$reponse = 'SELECT w_geo, count(*) as c from db_stats_2 GROUP BY w_geo ORDER BY c desc';
    $geos = dbSelectALL('', $reponse);
	 
foreach ($geos as $keym => $dannye) {
		++$i;
		$xtotal = $dannye['c'];
		$xgeo   = $dannye['w_geo'];
        	
         if($xgeo != 'RU')		
		$xgeo = geosortingw($xgeo);
		
if(!empty($xgeo)){
	$geoarr[$xgeo] =  $xtotal;
    $geoarrw[] =  "['$xgeo',$xtotal]";	
}
}

 
if(is_array($geoarr))
{
//foreach ($geoarr as $geo => $tot)
//{
//	echo '</br>',$geo,$tot;
//}
 $com = implode(",", $geoarrw);
}
 
?>

 
      <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Players'],
		  <?php echo $com;?> ]);

        var options = {
		  colorAxis: {values: [1, 10, 100, 1000], colors: ['green', '#D1E231', 'orange' ,'red'],},
          backgroundColor: '#111111',
          datalessRegionColor: '#fff',
          defaultColor: '#f5f5f5'
		  };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
  
  
  
    <div id="regions_div" style="width: 100%; height:100%;"></div>
 
