//[Dashboard Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	
	/**************** PIE CHART *******************/
   var piedata = [
      { label: "By Email", data: [[1,10]], color: '#38649f'},
      { label: "By Phone", data: [[1,30]], color: '#389f99'},
      { label: "On Site", data: [[1,90]], color: '#689f38'},
      { label: "By Agent", data: [[1,70]], color: '#ff8f00'}
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
          },			
        },	  
      },
      grid: {
        hoverable: true,
        clickable: true
      }
    });

    function labelFormatter(label, series) {
		  return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	  }
	
	
	      var options = {
            chart: {
                height: 285,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%'	
                },
            },
            dataLabels: {
                enabled: false
            },
			colors: ["#ff8f00", '#ee1044'],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Inquery',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Conform',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
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
            document.querySelector("#bookingstatus"),
            options
        );

        chart.render();
	
	
	
	
	    var options = {
		  chart: {
			height: 285,
			type: 'line',
			zoom: {
			  enabled: false
			}
		  },
		  dataLabels: {
			enabled: false
		  },
	      colors: ["#689f38"],
		  stroke: {
			curve: 'straight'
		  },
		  series: [{
			name: "Revenue",
			data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
		  }],
		  grid: {
			row: {
			  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
			  opacity: 0.5
			},
		  },
		  xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
		  }
		}

		var chart = new ApexCharts(
		  document.querySelector("#revenue"),
		  options
		);

		chart.render();

	
	  // bootstrap WYSIHTML5 - text editor
  		$('.textarea').wysihtml5();
  
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



  
             

