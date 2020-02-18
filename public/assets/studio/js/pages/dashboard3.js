//[Dashboard Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	
	var optionsLine = {
	  chart: {
		height: 360,
		type: 'line',
		zoom: {
		  enabled: false
		},
	  },
	  stroke: {
		curve: 'smooth',
		width: 2
	  },
	  colors: ["#ff8f00", '#ee1044', '#389f99'],
	  series: [{
		  name: "Music",
		  data: [1, 15, 26, 20, 33, 27]
		},
		{
		  name: "Photos",
		  data: [3, 33, 21, 42, 19, 32]
		},
		{
		  name: "Files",
		  data: [0, 39, 52, 11, 29, 43]
		}
	  ],
	  markers: {
		size: 6,
		strokeWidth: 0,
		hover: {
		  size: 9
		}
	  },
	  grid: {
		show: true
	  },
	  labels: ['01/15/2019', '01/16/2019', '01/17/2019', '01/18/2019', '01/19/2019', '01/20/2019'],
	  xaxis: {
		tooltip: {
		  enabled: false
		}
	  },
	  legend: {
		position: 'top',
		horizontalAlign: 'right',
		offsetY: -20
	  }
	}

	var chartLine = new ApexCharts(document.querySelector('#line-adwords'), optionsLine);
	chartLine.render();

	var optionsCircle4 = {
	  chart: {
		type: 'radialBar',
		width: 380,
		height: 360,
	  },
	  plotOptions: {
		radialBar: {
		  size: undefined,
		  inverseOrder: true,
		  hollow: {
			margin: 5,
			size: '48%',
			background: 'transparent',

		  },
		  track: {
			show: false,
		  },
		  startAngle: -180,
		  endAngle: 180

		},
	  },
	  stroke: {
		lineCap: 'round'
	  },
	  colors: ["#ff8f00", '#ee1044', '#389f99'],
	  series: [71, 63, 77],
	  labels: ['June', 'May', 'April'],
	  legend: {
		show: true,
		floating: true,
		position: 'right',
		offsetX: 70,
		offsetY: 240
	  },
	}

	var chartCircle4 = new ApexCharts(document.querySelector('#radialBarBottom'), optionsCircle4);
	chartCircle4.render();
	
	
	
	    window.Apex = {
		  stroke: {
			width: 3
		  },
		  markers: {
			size: 0
		  },
		  tooltip: {
			  theme: 'dark',
		  }
		};

		var randomizeArray = function (arg) {
		  var array = arg.slice();
		  var currentIndex = array.length,
			temporaryValue, randomIndex;

		  while (0 !== currentIndex) {

			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;

			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		  }

		  return array;
		}

		// data for the sparklines that appear below header area
		var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];
		
		var spark1 = {
		  chart: {
			id: 'spark1',
			group: 'sparks',
			type: 'line',
			height: 160,
			sparkline: {
			  enabled: true
			},
			dropShadow: {
			  enabled: true,
			  top: 1,
			  left: 1,
			  blur: 2,
			  opacity: 0.2,
			}
		  },
		  series: [{
			data: randomizeArray(sparklineData)
		  }],
		  stroke: {
			curve: 'smooth'
		  },
		  markers: {
			size: 0
		  },
		  grid: {
			padding: {
			  top: 10,
			  bottom: 10,
			  left: 0
			}
		  },
		  colors: ['#fff'],
		  tooltip: {
			x: {
			  show: false
			},
			y: {
			  title: {
				formatter: function formatter(val) {
				  return '';
				}
			  }
			}
		  }
		}

		var spark2 = {
		  chart: {
			id: 'spark2',
			group: 'sparks',
			type: 'line',
			height: 160,
			sparkline: {
			  enabled: true
			},
			dropShadow: {
			  enabled: true,
			  top: 1,
			  left: 1,
			  blur: 2,
			  opacity: 0.2,
			}
		  },
		  series: [{
			data: randomizeArray(sparklineData)
		  }],
		  stroke: {
			curve: 'smooth'
		  },
		  grid: {
			padding: {
			  top: 10,
			  bottom: 10,
			  left: 0
			}
		  },
		  markers: {
			size: 0
		  },
		  colors: ['#fff'],
		  tooltip: {
			x: {
			  show: false
			},
			y: {
			  title: {
				formatter: function formatter(val) {
				  return '';
				}
			  }
			}
		  }
		}

		var spark3 = {
		  chart: {
			id: 'spark3',
			group: 'sparks',
			type: 'line',
			height: 160,
			sparkline: {
			  enabled: true
			},
			dropShadow: {
			  enabled: true,
			  top: 1,
			  left: 1,
			  blur: 2,
			  opacity: 0.2,
			}
		  },
		  series: [{
			data: randomizeArray(sparklineData)
		  }],
		  stroke: {
			curve: 'smooth'
		  },
		  markers: {
			size: 0
		  },
		  grid: {
			padding: {
			  top: 10,
			  bottom: 10,
			  left: 0
			}
		  },
		  colors: ['#fff'],
		  xaxis: {
			crosshairs: {
			  width: 1
			},
		  },
		  tooltip: {
			x: {
			  show: false
			},
			y: {
			  title: {
				formatter: function formatter(val) {
				  return '';
				}
			  }
			}
		  }
		}

		var spark4 = {
		  chart: {
			id: 'spark4',
			group: 'sparks',
			type: 'line',
			height: 160,
			sparkline: {
			  enabled: true
			},
			dropShadow: {
			  enabled: true,
			  top: 1,
			  left: 1,
			  blur: 2,
			  opacity: 0.2,
			}
		  },
		  series: [{
			data: randomizeArray(sparklineData)
		  }],
		  stroke: {
			curve: 'smooth'
		  },
		  markers: {
			size: 0
		  },
		  grid: {
			padding: {
			  top: 10,
			  bottom: 10,
			  left:0
			}
		  },
		  colors: ['#fff'],
		  xaxis: {
			crosshairs: {
			  width: 1
			},
		  },
		  tooltip: {
			x: {
			  show: false
			},
			y: {
			  title: {
				formatter: function formatter(val) {
				  return '';
				}
			  }
			}
		  }
		}

		new ApexCharts(document.querySelector("#spark1"), spark1).render();
		new ApexCharts(document.querySelector("#spark2"), spark2).render();
		new ApexCharts(document.querySelector("#spark3"), spark3).render();
		new ApexCharts(document.querySelector("#spark4"), spark4).render();
	
	
	
	/*********** REAL TIME UPDATES **************/

    var data = [], totalPoints = 50;

    function getRandomData() {
      if (data.length > 0)
      data = data.slice(1);
      while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50,
        y = prev + Math.random() * 10 - 5;
        if (y < 0) {
          y = 0;
        } else if (y > 100) {
          y = 100;
        }
        data.push(y);
      }
      var res = [];
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }
      return res;
    }


    // Set up the control widget
	 var updateInterval = 1000;

     var plot5 = $.plot('#flotRealtime2', [ getRandomData() ], {
      colors: ['#689f38'],
		  series: {
        lines: {
          show: true,
          lineWidth: 0,
          fill: 0.9
        },
        shadowSize: 0	// Drawing is faster without shadows
		  },
      grid: {
        borderColor: '#ddd',
        borderWidth: 1,
        labelMargin: 5
		  },
      xaxis: {
        color: '#eee',
        font: {
          size: 10,
          color: '#999'
        }
      },
		  yaxis: {
				min: 0,
				max: 100,
        color: '#eee',
        font: {
          size: 10,
          color: '#999'
        }
		  }
	 });

   function update_plot5() {
		  plot5.setData([getRandomData()]);
		  plot5.draw();
		  setTimeout(update_plot5, updateInterval);
	 }

   update_plot5();
	
	
	/**************** PIE CHART *******************/
   var piedata = [
      { label: "Series 1", data: [[1,10]], color: '#38649f'},
      { label: "Series 2", data: [[1,30]], color: '#389f99'},
      { label: "Series 3", data: [[1,90]], color: '#689f38'},
      { label: "Series 4", data: [[1,70]], color: '#ff8f00'},
      { label: "Series 5", data: [[1,80]], color: '#ee1044'}
	 ];

    $.plot('#flotPie2', piedata, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2/3,
            formatter: labelFormatter,
            threshold: 0.1
          }
        }
      },
      grid: {
        hoverable: true,
        clickable: true
      }
    });

    function labelFormatter(label, series) {
		  return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	  }
	
	
	
	$.plot("#flotBar2", [{
		data: [[0, 3], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,8], [14,10]],
		bars: {
		  show: true,
		  lineWidth: 0,
		  fillColor: '#689f38'
		}
	  },{
		data: [[1, 5], [3, 7], [5, 10], [7, 7],[9,9], [11,5],[13,4], [15,6]],
		bars: {
		  show: true,
		  lineWidth: 0,
		  fillColor: '#ee1044'
		}
	  }], {
		grid: {
		  borderWidth: 1,
		  borderColor: '#D9D9D9'
		},
		yaxis: {
		  tickColor: '#d9d9d9',
		  font: {
			color: '#666',
			size: 10
		  }
		},
		xaxis: {
		  tickColor: '#d9d9d9',
		  font: {
			color: '#666',
			size: 10
		  }
		}
	  });
	
	
	
		var data2 = [
			[gd(2019, 1, 1), 7], [gd(2019, 1, 2), 6], [gd(2019, 1, 3), 4], [gd(2019, 1, 4), 8],
			[gd(2019, 1, 5), 9], [gd(2019, 1, 6), 7], [gd(2019, 1, 7), 5], [gd(2019, 1, 8), 4],
			[gd(2019, 1, 9), 7], [gd(2019, 1, 10), 8], [gd(2019, 1, 11), 9], [gd(2019, 1, 12), 6],
			[gd(2019, 1, 13), 4], [gd(2019, 1, 14), 5], [gd(2019, 1, 15), 11], [gd(2019, 1, 16), 8],
			[gd(2019, 1, 17), 8], [gd(2019, 1, 18), 11], [gd(2019, 1, 19), 11], [gd(2019, 1, 20), 6],
			[gd(2019, 1, 21), 6], [gd(2019, 1, 22), 8], [gd(2019, 1, 23), 11], [gd(2019, 1, 24), 13],
			[gd(2019, 1, 25), 7], [gd(2019, 1, 26), 9], [gd(2019, 1, 27), 9], [gd(2019, 1, 28), 8],
			[gd(2019, 1, 29), 5], [gd(2019, 1, 30), 8], [gd(2019, 1, 31), 25]
		];

		var data3 = [
			[gd(2019, 1, 1), 800], [gd(2019, 1, 2), 500], [gd(2019, 1, 3), 600], [gd(2019, 1, 4), 700],
			[gd(2019, 1, 5), 500], [gd(2019, 1, 6), 456], [gd(2019, 1, 7), 800], [gd(2019, 1, 8), 589],
			[gd(2019, 1, 9), 467], [gd(2019, 1, 10), 876], [gd(2019, 1, 11), 689], [gd(2019, 1, 12), 700],
			[gd(2019, 1, 13), 500], [gd(2019, 1, 14), 600], [gd(2019, 1, 15), 700], [gd(2019, 1, 16), 786],
			[gd(2019, 1, 17), 345], [gd(2019, 1, 18), 888], [gd(2019, 1, 19), 888], [gd(2019, 1, 20), 888],
			[gd(2019, 1, 21), 987], [gd(2019, 1, 22), 444], [gd(2019, 1, 23), 999], [gd(2019, 1, 24), 567],
			[gd(2019, 1, 25), 786], [gd(2019, 1, 26), 666], [gd(2019, 1, 27), 888], [gd(2019, 1, 28), 900],
			[gd(2019, 1, 29), 178], [gd(2019, 1, 30), 555], [gd(2019, 1, 31), 993]
		];


		var dataset = [
			{
				label: "Orders Data",
				data: data3,
				color: "#ff8f00",
				bars: {
					show: true,
					align: "center",
					barWidth: 24 * 60 * 60 * 600,
					lineWidth:0
				}

			}, {
				label: "Payments Data",
				data: data2,
				yaxis: 2,
				color: "#38649f",
				lines: {
					lineWidth:1,
						show: true,
						fill: true,
					fillColor: {
						colors: [{
							opacity: 0.2
						}, {
							opacity: 1
						}]
					}
				},
				splines: {
					show: false,
					tension: 0.6,
					lineWidth: 1,
					fill: 0.1
				},
			}
		];


		var options = {
			xaxis: {
				mode: "time",
				tickSize: [3, "day"],
				tickLength: 0,
				axisLabel: "Date",
				axisLabelUseCanvas: true,
				axisLabelFontSizePixels: 12,
				axisLabelFontFamily: 'Arial',
				axisLabelPadding: 10,
				color: "#d5d5d5"
			},
			yaxes: [{
				position: "left",
				max: 1070,
				color: "#d5d5d5",
				axisLabelUseCanvas: true,
				axisLabelFontSizePixels: 12,
				axisLabelFontFamily: 'Arial',
				axisLabelPadding: 3
			}, {
				position: "right",
				clolor: "#d5d5d5",
				axisLabelUseCanvas: true,
				axisLabelFontSizePixels: 12,
				axisLabelFontFamily: ' Arial',
				axisLabelPadding: 67
			}
			],
			legend: {
				noColumns: 1,
				labelBoxBorderColor: "#000000",
				position: "nw"
			},
			grid: {
				hoverable: false,
				borderWidth: 0
			}
		};

		function gd(year, month, day) {
			return new Date(year, month - 1, day).getTime();
		}

		var previousPoint = null, previousLabel = null;

		$.plot($("#monthly-data"), dataset, options);
	
	
	
	
  
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



  
             

