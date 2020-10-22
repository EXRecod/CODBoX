var graph=[[[],[]],[],[],[]];
graph[0][0]=[0.90909090909091,0.33333333333333,1,5,8,0.6,0.5,2.9,4.1666666666667,2.1724137931034];
graph[1][0]=[10.5109,9.23077,100,18.8679,34.0909,23.2558,45.9215,9.38662,11.3739,10.1775];
graph[2][0]=[6027,315,235,4611,6442,7860,1795,10495,17726,14129];
graph[3][0]=[367.317,33.4262,254.717,98.5714,114.077,37.8682,179.752,758.744,922.457,737.851];
graph[0][1]=[0.90909090909091,0.62121212121212,0.74747474747475,2.1111111111111,4.6666666666667,4.5333333333333,3.0333333333333,1.3333333333333,2.5222222222222,3.07969348659];
graph[1][1]=[10.5109,9.870835,39.91389,42.699556666667,50.986266666667,25.404866666667,34.422733333333,26.187973333333,22.22734,10.312673333333];
graph[2][1]=[6027,3171,2192.3333333333,1720.3333333333,3762.6666666667,6304.3333333333,5365.6666666667,6716.6666666667,10005.333333333,14116.666666667];
graph[3][1]=[367.317,200.3716,218.48673333333,128.90486666667,155.78846666667,83.505533333333,110.56573333333,325.45473333333,620.31766666667,806.35066666667];
match_time=["16 Jul<br>22:27","16 Jul<br>22:35","16 Jul<br>22:58","17 Jul<br>00:17","17 Jul<br>00:28","17 Jul<br>00:40","21 Jul<br>22:07","21 Jul<br>22:22","21 Jul<br>22:30","21 Jul<br>22:40"];
graph_avg=[2.5581504702194,27.281579];
//Highcharts.setOptions(Highcharts.theme);


var chart=Highcharts.chart('container', {
   chart: {
        type: 'spline',
        scrollablePlotArea: {
            scrollPositionX: 1
        }
    },
    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },
yAxis: {
    // ...Options
    plotLines: [,
	{
        color: '#555',
        value: '2.5581504702194', 
        width: '2',
        zIndex: 2 ,id:'avg0'
    },
	{
        color: '#555',
        value: '27.281579', 
        width: '2',
        zIndex: 2 ,id:'avg1'
    },
	{
        color: '#555',
        value: '6963.5', 
        width: '2',
        zIndex: 2 ,id:'avg2'
    },
	{
        color: '#555',
        value: '350.47808', 
        width: '2',
        zIndex: 2 ,id:'avg3'
    }]
},

xAxis: {
enabled:false
},
        minorGridLineWidth: 0,
        gridLineWidth: 0,
  legend: {  enabled: false,
        align: 'center',
        verticalAlign: 'bottom',
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
        name: '',
        data: graph[0][1],
		color:'#185d95'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
	

});