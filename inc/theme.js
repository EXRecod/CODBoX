

Highcharts.theme = {
    colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
        '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
    chart: {
        backgroundColor: 'transparent',
        style: {
          
        },
        plotBorderColor: '#606063'
    },
    title: {
        style: {
            color: '#E0E0E3',
            textTransform: 'uppercase',
            fontSize: '20px'
        }
    },
    subtitle: {
        style: {
            color: '#E0E0E3',
            textTransform: 'uppercase'
        }
    },
    xAxis: {
        gridLineColor: '#707073',
        labels: {
            style: {
                color: '#111'
            }
        },
        lineColor: '#111',
        minorGridLineColor: '#222',
        tickColor: '#111',
        title: {
            style: {
                color: '#A0A0A3'

            }
        },
		 labels: {
            enabled: false
        }
    },
    yAxis: {
        gridLineColor: '#181818',
        labels: {
            style: {
                color: '#E0E0E3'
            }
        },
        lineColor: '#707073',
        minorGridLineColor: '#505053',
        tickColor: '#151515',
        tickWidth: 1,
        title: {enabled:false,text:'',
            style: {
                color: '#A0A0A3'
            }
        }
    },

	    tooltip: {
      borderColor: '#2c3e50',
	          backgroundColor: '#111',
        style: {
            color: '#aaa'
        },
      shared: true,
      formatter: function (tooltip) {
        const header = `<span style='color:#185d95;font-weight:bold;'>`+graph_metric+': '+graph[current_graph][0][`${this.x}`].toFixed(1)+`</span>`
        
        return header + "<br>"+(match_time[`${this.x}`])
      }
    },
    plotOptions: {
        series: {
            dataLabels: {
                color: '#B0B0B3'
            },
            marker: {
                lineColor: '#333'
            }
        },
        boxplot: {
            fillColor: '#505053'
        },
        candlestick: {
            lineColor: 'white'
        },
        errorbar: {
            color: 'white'
        }
    },
    legend: {
        itemStyle: {
            color: '#E0E0E3'
        },
        itemHoverStyle: {
            color: '#FFF'
        },
        itemHiddenStyle: {
            color: '#606063'
        }
    },


    scrollbar: {
        barBackgroundColor: '#808083',
        barBorderColor: '#808083',
        buttonArrowColor: '#CCC',
        buttonBackgroundColor: '#606063',
        buttonBorderColor: '#606063',
        rifleColor: '#FFF',
        trackBackgroundColor: '#404043',
        trackBorderColor: '#404043'
    },


};





Highcharts.setOptions(Highcharts.theme);