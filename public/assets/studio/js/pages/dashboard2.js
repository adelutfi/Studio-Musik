//[Dashboard Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	var options = {
      chart: {
        height: 445,
        type: 'line',
        zoom: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false
      },
	  colors: ["#ff8f00", '#ee1044', '#389f99'],
      stroke: {
        width: [5, 7, 5],
        curve: 'smooth',
        dashArray: [0, 8, 5]
      },
      series: [{
          name: "In Store",
          data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
          name: "Online",
          data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
          name: 'Total Visits',
          data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
      ],
      markers: {
        size: 0,

        hover: {
          sizeOffset: 6
        }
      },
      xaxis: {
        categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
          '10 Jan', '11 Jan', '12 Jan'
        ],
      },
      tooltip: {
        y: [{
          title: {
            formatter: function (val) {
              return val + " (Avg)"
            }
          }
        }, {
          title: {
            formatter: function (val) {
              return val + " Avg"
            }
          }
        }, {
          title: {
            formatter: function (val) {
              return val;
            }
          }
        }]
      },
      grid: {
        borderColor: '#f1f1f1',
      }
    }
    
    var chart = new ApexCharts(
      document.querySelector("#sales-overview"),
      options
    );

    chart.render();
	
	
	var options = {
		chart: {
			height: 290,
			type: 'area',
		},
		dataLabels: {
			enabled: false
		},
		colors: ["#ff8f00", '#ee1044'],
		stroke: {
			curve: 'smooth'
		},
		series: [{
			name: 'Online',
			data: [31, 40, 28, 51, 42, 109, 100]
		}, {
			name: 'In Store',
			data: [11, 32, 45, 32, 34, 52, 41]
		}],

		xaxis: {
			type: 'datetime',
			categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],                
		},
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		}
	}

	var chart = new ApexCharts(
		document.querySelector("#sales-difference"),
		options
	);

	chart.render();
	
	
	
	
	$("#linearea2").sparkline([32,24,26,24,32,26,40,34,22,24,22,24,34,32,38,28,36,36,40,38,30,34,38], {
		type: 'line',
		width: '100%',
		height: '45',
		lineColor: '#38649f',
		fillColor: '#38649f',
		lineWidth: 2,
	});
	
	
	// table
	$('#invoice-list').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : true,
	});	
	
	$('.storesales').sparkline(
		  [32,24,26,24,32,26,40,34,22,24,32,24,26,24,32],
		  {
			type: 'bar',
			width: '100%',
			height: '80',
			barWidth: '4',
			resize: true,
			barSpacing: '6',
			barColor: 'rgba(255, 255, 255, 0.8)'
		  }
		);
	
  
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

// easypie chart
	$(function() {
		'use strict'
		$('.easypie').easyPieChart({
			easing: 'easeOutBounce',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
		var chart = window.chart = $('.easypie').data('easyPieChart');
		$('.js_update').on('click', function() {
			chart.update(Math.random()*200-100);
		});
	});// End of use strict

  
             

