//[Dashboard Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	$("#barchart3").sparkline([32,24,26,24,32,26,40,34,22,24,22,24,34,32,38,28], {
		type: 'bar',
		height: '45',
		width: '100%',
		barWidth: 6,
		barSpacing: 4,
		barColor: '#689f38',
	});
	$("#linearea2").sparkline([32,24,26,24,32,26,40,34,22,24,22,24,34,32,38,28], {
		type: 'line',
		width: '100%',
		height: '45',
		lineColor: '#389f99',
		fillColor: '#389f99',
		lineWidth: 2,
	});
	$("#linechart3").sparkline([32,24,26,24,32,26,40,34,22,24,22,24,34,32,38,28], {
		type: 'line',
		width: '100%',
		height: '45',
		lineColor: '#17b3a3',
		fillColor: 'rgba(255, 255, 255, 0)',
		lineWidth: 2,
		minSpotColor: '#ff4c52',
		maxSpotColor: '#ff4c52',
	});	
	$("#barchart2").sparkline([32,24,26,24,32,26,40,34,22,24,22,24,34,32,38,28], {
		type: 'bar',
		height: '45',
		width: '100%',
		barWidth: 6,
		barSpacing: 4,
		barColor: '#ee1044',
	});
	
	
	var options = {
		chart: {
			height: 350,
			type: 'bar',
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '70%',
				endingShape: 'rounded'	
			},
		},
		dataLabels: {
			enabled: false
		},
		colors: ["#ff8f00", '#ee1044', '#38649f'],
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		series: [{
			name: 'Arts',
			data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
		}, {
			name: 'Commerse',
			data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
		}, {
			name: 'Science',
			data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
		}],
		xaxis: {
			categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
		},
		yaxis: {
			title: {
				text: '$ (thousands)'
			}
		},
		fill: {
			opacity: 1

		},
		legend: {
			position: 'top',
			horizontalAlign: 'left'
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "$ " + val + " thousands"
				}
			}
		}
	}

	var chart = new ApexCharts(
		document.querySelector("#uni-earning"),
		options
	);

	chart.render();
	
	
	
	var options = {
		chart: {
			height: 350,
			type: 'line',
			shadow: {
				enabled: true,
				color: '#000',
				top: 18,
				left: 7,
				blur: 10,
				opacity: 1
			},
			toolbar: {
				show: false
			}
		},
		colors: ['#ee1044', '#38649f'],
		dataLabels: {
			enabled: true,
		},
		stroke: {
			curve: 'smooth'
		},
		series: [{
				name: "Students",
				data: [28, 29, 33, 36, 32, 32, 33]
			},
			{
				name: "Employee",
				data: [12, 11, 14, 18, 17, 13, 13]
			}
		],
		grid: {
			borderColor: '#e7e7e7',
			row: {
				colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
				opacity: 0.5
			},
		},
		markers: {

			size: 6
		},
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
			title: {
				text: 'Month'
			}
		},
		yaxis: {
			title: {
				text: 'Attendance'
			},
			min: 5,
			max: 40
		},
		legend: {
			position: 'top',
			horizontalAlign: 'right',
			floating: true,
		}
	}

	var chart = new ApexCharts(
		document.querySelector("#uni-attendance"),
		options
	);

	chart.render();
	
	
	
	
	var options = {
		chart: {
			height: 405,
			type: 'bar',
			stacked: true
		},
		colors: ['#008FFB','#FF4560'],
		plotOptions: {
			bar: {
				horizontal: true,
				barHeight: '80%',

			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			width: 1,
			colors: ["#fff"]
		},
		series: [{
			name: 'Collected',
			data: [0.4, 0.65, 0.76, 0.88, 1.5, 2.1, 2.9, 3.8, 3.9, 4.2, 4]
		},
		{
			name: 'Remaining',
			data: [-0.8, -1.05, -1.06, -1.18, -1.4, -2.2, -2.85, -3.7, -3.96, -4.22, -4.3,]
		}],
		grid: {
			xaxis: {
				showLines: false
			}
		},
		yaxis: {
			min: -5,
			max: 5,
			title: {
			   // text: 'Age',
			},
		},
		legend: {
			position: 'top',
			horizontalAlign: 'left',
			floating: true,
		},
		tooltip: {
			shared: false,
			x: {
				formatter: function(val) {
					return val
				}
			},
			y: {
				formatter: function(val) {
					return Math.abs(val) + "%"
				}
			}
		},
		xaxis: {
		  categories: ['Std A', 'Std B', 'Std C', 'Std D', 'Std E', 'Std F', 'Std I', 'Std J', 'Std K', 'Std L', 'Std M'],
		  title: {
			  text: 'Percent'
		  },
		  labels: {
			formatter: function(val) {
			  return Math.abs(Math.round(val)) + "%"
			}
		  }
		},
	}

   var chart = new ApexCharts(
		document.querySelector("#uni-fee-report"),
		options
	);

	chart.render();
	
	
  
	//dashboard_daterangepicker
	
	if(0!==$("#dashboard_daterangepicker").length) {
		var n=$("#dashboard_daterangepicker"),
		e=moment(),
		t=moment();
		n.daterangepicker( {
			startDate:e, endDate:t, opens:"left", ranges: {
				Today: [moment(), moment()], Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")], "Last 7 Days": [moment().subtract(6, "days"), moment()], "Last 30 Days": [moment().subtract(29, "days"), moment()], "This Month": [moment().startOf("month"), moment().endOf("month")], "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			}
		}
		, a),
		a(e, t, "")
	}
	function a(e, t, a) {
		var r="",
		o="";
		t-e<100||"Today"==a?(r="Today:", o=e.format("MMM D")): "Yesterday"==a?(r="Yesterday:", o=e.format("MMM D")): o=e.format("MMM D")+" - "+t.format("MMM D"), n.find(".subheader_daterange-date").html(o), n.find(".subheader_daterange-title").html(r)
	}
	
}); // End of use strict



  
             

