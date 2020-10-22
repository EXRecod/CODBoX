
function change_last_update(n){
	setTimeout(function(){document.getElementById('last_updated').innerHTML='Stats was updated '
	+(parseInt(n)+1)+' minutes ago';change_last_update(parseInt(n)+1);},1000*60);
	
	
}
var current_graph=0;graph_metric='KDA';module='';
function show_match(id){
	now=document.getElementById('match_sub'+id).style.display;
	if(now=='block')
		document.getElementById('match_sub'+id).style.display='none';
	else
		document.getElementById('match_sub'+id).style.display='block';
}
function show_graph(n){current_graph=n;
metrics=['KDA','Accuracy','Exp Gained', 'Score per minute'];
graph_metric=metrics[n];
	chart.series[0].setData(graph[n][0]);
	
	for(i=0;i<=3;i++){
		if(n==i)w=2;else w=0;
		 chart.yAxis[0].plotLinesAndBands[i].options.width=w;
	} 
	 chart.yAxis[0].update();
}