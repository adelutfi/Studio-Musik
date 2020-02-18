//[Dashboard Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	
	
	  $('.chart-client').slimScroll({
		height: '240'
	  });
	
	
	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// create chart
	var chart = am4core.create("chartdiv1", am4charts.GaugeChart);
	chart.innerRadius = am4core.percent(82);

	/**
	 * Normal axis
	 */

	var axis = chart.xAxes.push(new am4charts.ValueAxis());
	axis.min = 0;
	axis.max = 100;
	axis.strictMinMax = true;
	axis.renderer.radius = am4core.percent(80);
	axis.renderer.inside = false;
	axis.renderer.line.strokeOpacity = 1;
	axis.renderer.ticks.template.strokeOpacity = 1;
	axis.renderer.ticks.template.length = 10;
	axis.renderer.grid.template.disabled = true;
	axis.renderer.labels.template.radius = 40;
	axis.renderer.labels.template.adapter.add("text", function(text) {
	  return text + "%";
	})

	/**
	 * Axis for ranges
	 */

	var colorSet = new am4core.ColorSet();

	var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
	axis2.min = 0;
	axis2.max = 100;
	axis2.renderer.innerRadius = 10
	axis2.strictMinMax = true;
	axis2.renderer.labels.template.disabled = true;
	axis2.renderer.ticks.template.disabled = true;
	axis2.renderer.grid.template.disabled = true;

	var range0 = axis2.axisRanges.create();
	range0.value = 0;
	range0.endValue = 50;
	range0.axisFill.fillOpacity = 1;
	range0.axisFill.fill = colorSet.getIndex(0);

	var range1 = axis2.axisRanges.create();
	range1.value = 50;
	range1.endValue = 100;
	range1.axisFill.fillOpacity = 1;
	range1.axisFill.fill = colorSet.getIndex(2);

	/**
	 * Label
	 */

	var label = chart.radarContainer.createChild(am4core.Label);
	label.isMeasured = false;
	label.fontSize = 16;
	label.x = am4core.percent(50);
	label.y = am4core.percent(100);
	label.horizontalCenter = "middle";
	label.verticalCenter = "bottom";
	label.text = "50%";


	/**
	 * Hand
	 */

	var hand = chart.hands.push(new am4charts.ClockHand());
	hand.axis = axis2;
	hand.innerRadius = am4core.percent(20);
	hand.startWidth = 10;
	hand.pin.disabled = true;
	hand.value = 50;

	hand.events.on("propertychanged", function(ev) {
	  range0.endValue = ev.target.value;
	  range1.value = ev.target.value;
	  axis2.invalidate();
	});

	setInterval(() => {
	  var value = Math.round(Math.random() * 100);
	  label.text = value + "%";
	  var animation = new am4core.Animation(hand, {
		property: "value",
		to: value
	  }, 1000, am4core.ease.cubicOut).start();
	}, 2000);
	
	var optionsBar = {
		  chart: {
			type: 'bar',
			height: 285,
			width: '100%',
			stacked: true,
			foreColor: '#999'
		  },
		  plotOptions: {
			bar: {
			  dataLabels: {
				enabled: false
			  },
			  columnWidth: '75%',
			  endingShape: 'rounded'
			}
		  },
		  colors: ["#4974e0", '#e83a75'],
		  series: [{
			name: "Sale",
			data: [20, 16, 24, 28, 26, 22, 15, 5, 14, 16, 22, 29, 24, 19, 15, 10, 11, 15, 19, 23],
		  }, {
			name: "Views",
			data: [20, 16, 24, 28, 26, 22, 15, 5, 14, 16, 22, 29, 24, 19, 15, 10, 11, 15, 19, 23],
		  }],
		  labels: [15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 1, 2, 3, 4],
		  xaxis: {
			axisBorder: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
			crosshairs: {
			  show: false
			},
			labels: {
			  show: false,
			  style: {
				fontSize: '14px'
			  }
			},
		  },
		  grid: {
			xaxis: {
			  lines: {
				show: false
			  },
			},
			yaxis: {
			  lines: {
				show: false
			  },
			}
		  },
		  yaxis: {
			axisBorder: {
			  show: false
			},
			labels: {
			  show: false
			},
		  },
		  tooltip: {
			shared: true
		  }

		}

		var chartBar = new ApexCharts(document.querySelector('#revbar'), optionsBar);
		chartBar.render();
	
	
	
	
	// daily-sales
	var dayreport = jQuery('#dayreport')
		if (dayreport.length > 0) {
			var dataSeries = [
				  [{
					  "date": "2016-01-01",
					  "value": 48574589
					},
					{
					  "date": "2016-01-02",
					  "value": 10379978
					},
					{
					  "date": "2016-01-03",
					  "value": 30493749
					},
					{
					  "date": "2016-01-04",
					  "value": 10785250
					},
					{
					  "date": "2016-01-05",
					  "value": 33901904
					},
					{
					  "date": "2016-01-06",
					  "value": 11576838
					},
					{
					  "date": "2016-01-07",
					  "value": 14413854
					},
					{
					  "date": "2016-01-08",
					  "value": 15177211
					},
					{
					  "date": "2016-01-09",
					  "value": 16622100
					},
					{
					  "date": "2016-01-10",
					  "value": 17381072
					},
					{
					  "date": "2016-01-11",
					  "value": 18802310
					},
					{
					  "date": "2016-01-12",
					  "value": 15531790
					},
					{
					  "date": "2016-01-13",
					  "value": 15748881
					},
					{
					  "date": "2016-01-14",
					  "value": 18706437
					},
					{
					  "date": "2016-01-15",
					  "value": 19752685
					},
					{
					  "date": "2016-01-16",
					  "value": 21016418
					},
					{
					  "date": "2016-01-17",
					  "value": 25622924
					},
					{
					  "date": "2016-01-18",
					  "value": 25337480
					},
					{
					  "date": "2016-01-19",
					  "value": 22258882
					},
					{
					  "date": "2016-01-20",
					  "value": 23829538
					},
					{
					  "date": "2016-01-21",
					  "value": 24245689
					},
					{
					  "date": "2016-01-22",
					  "value": 26429711
					},
					{
					  "date": "2016-01-23",
					  "value": 26259017
					},
					{
					  "date": "2016-01-24",
					  "value": 25396183
					},
					{
					  "date": "2016-01-25",
					  "value": 23107346
					},
					{
					  "date": "2016-01-26",
					  "value": 28659852
					},
					{
					  "date": "2016-01-27",
					  "value": 25270783
					},
					{
					  "date": "2016-01-28",
					  "value": 26270783
					},
					{
					  "date": "2016-01-29",
					  "value": 27270783
					},
					{
					  "date": "2016-01-30",
					  "value": 28270783
					},
					{
					  "date": "2016-01-31",
					  "value": 29270783
					},
					{
					  "date": "2016-02-01",
					  "value": 30270783
					},
					{
					  "date": "2016-02-02",
					  "value": 31270783
					},
					{
					  "date": "2016-02-03",
					  "value": 32270783
					},
					{
					  "date": "2016-02-04",
					  "value": 33270783
					},
					{
					  "date": "2016-02-05",
					  "value": 28270783
					},
					{
					  "date": "2016-02-06",
					  "value": 27270783
					},
					{
					  "date": "2016-02-07",
					  "value": 35270783
					},
					{
					  "date": "2016-02-08",
					  "value": 34270783
					},
					{
					  "date": "2016-02-09",
					  "value": 28270783
					},
					{
					  "date": "2016-02-10",
					  "value": 35270783
					},
					{
					  "date": "2016-02-11",
					  "value": 36270783
					},
					{
					  "date": "2016-02-12",
					  "value": 34127078
					},
					{
					  "date": "2016-02-13",
					  "value": 33124078
					},
					{
					  "date": "2016-02-14",
					  "value": 36227078
					},
					{
					  "date": "2016-02-15",
					  "value": 37827078
					},
					{
					  "date": "2016-02-16",
					  "value": 36427073
					},
					{
					  "date": "2016-02-17",
					  "value": 37570783
					},
					{
					  "date": "2016-02-18",
					  "value": 38627073
					},
					{
					  "date": "2016-02-19",
					  "value": 37727078
					},
					{
					  "date": "2016-02-20",
					  "value": 38827073
					},
					{
					  "date": "2016-02-21",
					  "value": 40927078
					},
					{
					  "date": "2016-02-22",
					  "value": 41027078
					},
					{
					  "date": "2016-02-23",
					  "value": 42127073
					},
					{
					  "date": "2016-02-24",
					  "value": 43220783
					},
					{
					  "date": "2016-02-25",
					  "value": 44327078
					},
					{
					  "date": "2016-02-26",
					  "value": 40427078
					},
					{
					  "date": "2016-02-27",
					  "value": 41027078
					},
					{
					  "date": "2016-02-28",
					  "value": 45627078
					},
					{
					  "date": "2016-03-01",
					  "value": 44727078
					},
					{
					  "date": "2016-03-02",
					  "value": 44227078
					},
					{
					  "date": "2016-03-03",
					  "value": 45227078
					},
					{
					  "date": "2016-03-04",
					  "value": 46027078
					},
					{
					  "date": "2016-03-05",
					  "value": 46927078
					},
					{
					  "date": "2016-03-06",
					  "value": 47027078
					},
					{
					  "date": "2016-03-07",
					  "value": 46227078
					},
					{
					  "date": "2016-03-08",
					  "value": 47027078
					},
					{
					  "date": "2016-03-09",
					  "value": 48027078
					},
					{
					  "date": "2016-03-10",
					  "value": 47027078
					},
					{
					  "date": "2016-03-11",
					  "value": 47027078
					},
					{
					  "date": "2016-03-12",
					  "value": 48017078
					},
					{
					  "date": "2016-03-13",
					  "value": 48077078
					},
					{
					  "date": "2016-03-14",
					  "value": 48087078
					},
					{
					  "date": "2016-03-15",
					  "value": 48017078
					},
					{
					  "date": "2016-03-16",
					  "value": 48047078
					},
					{
					  "date": "2016-03-17",
					  "value": 48067078
					},
					{
					  "date": "2016-03-18",
					  "value": 48077078
					},
					{
					  "date": "2016-03-19",
					  "value": 48027074
					},
					{
					  "date": "2016-03-20",
					  "value": 48927079
					},
					{
					  "date": "2016-03-21",
					  "value": 48727071
					},
					{
					  "date": "2016-03-22",
					  "value": 48127072
					},
					{
					  "date": "2016-03-23",
					  "value": 48527072
					},
					{
					  "date": "2016-03-24",
					  "value": 48627027
					},
					{
					  "date": "2016-03-25",
					  "value": 48027040
					},
					{
					  "date": "2016-03-26",
					  "value": 48027043
					},
					{
					  "date": "2016-03-27",
					  "value": 48057022
					},
					{
					  "date": "2016-03-28",
					  "value": 49057022
					},
					{
					  "date": "2016-03-29",
					  "value": 50057022
					},
					{
					  "date": "2016-03-30",
					  "value": 51057022
					},
					{
					  "date": "2016-03-31",
					  "value": 52057022
					},
					{
					  "date": "2016-04-01",
					  "value": 53057022
					},
					{
					  "date": "2016-04-02",
					  "value": 54057022
					},
					{
					  "date": "2016-04-03",
					  "value": 52057022
					},
					{
					  "date": "2016-04-04",
					  "value": 55057022
					},
					{
					  "date": "2016-04-05",
					  "value": 58270783
					},
					{
					  "date": "2016-04-06",
					  "value": 56270783
					},
					{
					  "date": "2016-04-07",
					  "value": 55270783
					},
					{
					  "date": "2016-04-08",
					  "value": 58270783
					},
					{
					  "date": "2016-04-09",
					  "value": 59270783
					},
					{
					  "date": "2016-04-10",
					  "value": 60270783
					},
					{
					  "date": "2016-04-11",
					  "value": 61270783
					},
					{
					  "date": "2016-04-12",
					  "value": 62270783
					},
					{
					  "date": "2016-04-13",
					  "value": 63270783
					},
					{
					  "date": "2016-04-14",
					  "value": 64270783
					},
					{
					  "date": "2016-04-15",
					  "value": 65270783
					},
					{
					  "date": "2016-04-16",
					  "value": 66270783
					},
					{
					  "date": "2016-04-17",
					  "value": 67270783
					},
					{
					  "date": "2016-04-18",
					  "value": 68270783
					},
					{
					  "date": "2016-04-19",
					  "value": 69270783
					},
					{
					  "date": "2016-04-20",
					  "value": 70270783
					},
					{
					  "date": "2016-04-21",
					  "value": 71270783
					},
					{
					  "date": "2016-04-22",
					  "value": 72270783
					},
					{
					  "date": "2016-04-23",
					  "value": 73270783
					},
					{
					  "date": "2016-04-24",
					  "value": 74270783
					},
					{
					  "date": "2016-04-25",
					  "value": 75270783
					},
					{
					  "date": "2016-04-26",
					  "value": 76660783
					},
					{
					  "date": "2016-04-27",
					  "value": 77270783
					},
					{
					  "date": "2016-04-28",
					  "value": 78370783
					},
					{
					  "date": "2016-04-29",
					  "value": 79470783
					},
					{
					  "date": "2016-04-30",
					  "value": 80170783
					}
				  ],
				  [{
					  "date": "2016-01-01",
					  "value": 150000000
					},
					{
					  "date": "2016-01-02",
					  "value": 160379978
					},
					{
					  "date": "2016-01-03",
					  "value": 170493749
					},
					{
					  "date": "2016-01-04",
					  "value": 160785250
					},
					{
					  "date": "2016-01-05",
					  "value": 167391904
					},
					{
					  "date": "2016-01-06",
					  "value": 161576838
					},
					{
					  "date": "2016-01-07",
					  "value": 161413854
					},
					{
					  "date": "2016-01-08",
					  "value": 152177211
					},
					{
					  "date": "2016-01-09",
					  "value": 143762210
					},
					{
					  "date": "2016-01-10",
					  "value": 144381072
					},
					{
					  "date": "2016-01-11",
					  "value": 154352310
					},
					{
					  "date": "2016-01-12",
					  "value": 165531790
					},
					{
					  "date": "2016-01-13",
					  "value": 175748881
					},
					{
					  "date": "2016-01-14",
					  "value": 187064037
					},
					{
					  "date": "2016-01-15",
					  "value": 197520685
					},
					{
					  "date": "2016-01-16",
					  "value": 210176418
					},
					{
					  "date": "2016-01-17",
					  "value": 196122924
					},
					{
					  "date": "2016-01-18",
					  "value": 207337480
					},
					{
					  "date": "2016-01-19",
					  "value": 200258882
					},
					{
					  "date": "2016-01-20",
					  "value": 186829538
					},
					{
					  "date": "2016-01-21",
					  "value": 192456897
					},
					{
					  "date": "2016-01-22",
					  "value": 204299711
					},
					{
					  "date": "2016-01-23",
					  "value": 192759017
					},
					{
					  "date": "2016-01-24",
					  "value": 203596183
					},
					{
					  "date": "2016-01-25",
					  "value": 208107346
					},
					{
					  "date": "2016-01-26",
					  "value": 196359852
					},
					{
					  "date": "2016-01-27",
					  "value": 192570783
					},
					{
					  "date": "2016-01-28",
					  "value": 177967768
					},
					{
					  "date": "2016-01-29",
					  "value": 190632803
					},
					{
					  "date": "2016-01-30",
					  "value": 203725316
					},
					{
					  "date": "2016-01-31",
					  "value": 218226177
					},
					{
					  "date": "2016-02-01",
					  "value": 210698669
					},
					{
					  "date": "2016-02-02",
					  "value": 217640656
					},
					{
					  "date": "2016-02-03",
					  "value": 216142362
					},
					{
					  "date": "2016-02-04",
					  "value": 201610971
					},
					{
					  "date": "2016-02-05",
					  "value": 196704289
					},
					{
					  "date": "2016-02-06",
					  "value": 190436945
					},
					{
					  "date": "2016-02-07",
					  "value": 178891686
					},
					{
					  "date": "2016-02-08",
					  "value": 171613962
					},
					{
					  "date": "2016-02-09",
					  "value": 157579773
					},
					{
					  "date": "2016-02-10",
					  "value": 158677098
					},
					{
					  "date": "2016-02-11",
					  "value": 147129977
					},
					{
					  "date": "2016-02-12",
					  "value": 151561876
					},
					{
					  "date": "2016-02-13",
					  "value": 151627421
					},
					{
					  "date": "2016-02-14",
					  "value": 143543872
					},
					{
					  "date": "2016-02-15",
					  "value": 136581057
					},

					{
					  "date": "2016-02-16",
					  "value": 135560715
					},
					{
					  "date": "2016-02-17",
					  "value": 122625263
					},
					{
					  "date": "2016-02-18",
					  "value": 112091484
					},
					{
					  "date": "2016-02-19",
					  "value": 98810329
					},
					{
					  "date": "2016-02-20",
					  "value": 99882912
					},
					{
					  "date": "2016-02-21",
					  "value": 94943095
					},
					{
					  "date": "2016-02-22",
					  "value": 104875743
					},
					{
					  "date": "2016-02-23",
					  "value": 116383678
					},
					{
					  "date": "2016-02-24",
					  "value": 125028841
					},
					{
					  "date": "2016-02-25",
					  "value": 123967310
					},
					{
					  "date": "2016-02-26",
					  "value": 133167029
					},
					{
					  "date": "2016-02-27",
					  "value": 128577263
					},
					{
					  "date": "2016-02-28",
					  "value": 115836969
					},
					{
					  "date": "2016-03-01",
					  "value": 119264529
					},
					{
					  "date": "2016-03-02",
					  "value": 109363374
					},
					{
					  "date": "2016-03-03",
					  "value": 113985628
					},
					{
					  "date": "2016-03-04",
					  "value": 114650999
					},
					{
					  "date": "2016-03-05",
					  "value": 110866108
					},
					{
					  "date": "2016-03-06",
					  "value": 96473454
					},
					{
					  "date": "2016-03-07",
					  "value": 104075886
					},
					{
					  "date": "2016-03-08",
					  "value": 103568384
					},
					{
					  "date": "2016-03-09",
					  "value": 101534883
					},
					{
					  "date": "2016-03-10",
					  "value": 115825447
					},
					{
					  "date": "2016-03-11",
					  "value": 126133916
					},
					{
					  "date": "2016-03-12",
					  "value": 116502109
					},
					{
					  "date": "2016-03-13",
					  "value": 130169411
					},
					{
					  "date": "2016-03-14",
					  "value": 124296886
					},
					{
					  "date": "2016-03-15",
					  "value": 126347399
					},
					{
					  "date": "2016-03-16",
					  "value": 131483669
					},
					{
					  "date": "2016-03-17",
					  "value": 142811333
					},
					{
					  "date": "2016-03-18",
					  "value": 129675396
					},
					{
					  "date": "2016-03-19",
					  "value": 115514483
					},
					{
					  "date": "2016-03-20",
					  "value": 117630630
					},
					{
					  "date": "2016-03-21",
					  "value": 122340239
					},
					{
					  "date": "2016-03-22",
					  "value": 132349091
					},
					{
					  "date": "2016-03-23",
					  "value": 125613305
					},
					{
					  "date": "2016-03-24",
					  "value": 135592466
					},
					{
					  "date": "2016-03-25",
					  "value": 123408762
					},
					{
					  "date": "2016-03-26",
					  "value": 111991454
					},
					{
					  "date": "2016-03-27",
					  "value": 116123955
					},
					{
					  "date": "2016-03-28",
					  "value": 112817214
					},
					{
					  "date": "2016-03-29",
					  "value": 113029590
					},
					{
					  "date": "2016-03-30",
					  "value": 108753398
					},
					{
					  "date": "2016-03-31",
					  "value": 99383763
					},
					{
					  "date": "2016-04-01",
					  "value": 100151737
					},
					{
					  "date": "2016-04-02",
					  "value": 94985209
					},
					{
					  "date": "2016-04-03",
					  "value": 82913669
					},
					{
					  "date": "2016-04-04",
					  "value": 78748268
					},
					{
					  "date": "2016-04-05",
					  "value": 63829135
					},
					{
					  "date": "2016-04-06",
					  "value": 78694727
					},
					{
					  "date": "2016-04-07",
					  "value": 80868994
					},
					{
					  "date": "2016-04-08",
					  "value": 93799013
					},
					{
					  "date": "2016-04-09",
					  "value": 99042416
					},
					{
					  "date": "2016-04-10",
					  "value": 97298692
					},
					{
					  "date": "2016-04-11",
					  "value": 83353499
					},
					{
					  "date": "2016-04-12",
					  "value": 71248129
					},
					{
					  "date": "2016-04-13",
					  "value": 75253744
					},
					{
					  "date": "2016-04-14",
					  "value": 68976648
					},
					{
					  "date": "2016-04-15",
					  "value": 71002284
					},
					{
					  "date": "2016-04-16",
					  "value": 75052401
					},
					{
					  "date": "2016-04-17",
					  "value": 83894030
					},
					{
					  "date": "2016-04-18",
					  "value": 90236528
					},
					{
					  "date": "2016-04-19",
					  "value": 99739114
					},
					{
					  "date": "2016-04-20",
					  "value": 96407136
					},
					{
					  "date": "2016-04-21",
					  "value": 108323177
					},
					{
					  "date": "2016-04-22",
					  "value": 101578914
					},
					{
					  "date": "2016-04-23",
					  "value": 115877608
					},
					{
					  "date": "2016-04-24",
					  "value": 112088857
					},
					{
					  "date": "2016-04-25",
					  "value": 112071353
					},
					{
					  "date": "2016-04-26",
					  "value": 101790062
					},
					{
					  "date": "2016-04-27",
					  "value": 115003761
					},
					{
					  "date": "2016-04-28",
					  "value": 120457727
					},
					{
					  "date": "2016-04-29",
					  "value": 118253926
					},
					{
					  "date": "2016-04-30",
					  "value": 117956992
					}
				  ],
				  [{
					  "date": "2016-01-01",
					  "value": 50000000
					},
					{
					  "date": "2016-01-02",
					  "value": 60379978
					},
					{
					  "date": "2016-01-03",
					  "value": 40493749
					},
					{
					  "date": "2016-01-04",
					  "value": 60785250
					},
					{
					  "date": "2016-01-05",
					  "value": 67391904
					},
					{
					  "date": "2016-01-06",
					  "value": 61576838
					},
					{
					  "date": "2016-01-07",
					  "value": 61413854
					},
					{
					  "date": "2016-01-08",
					  "value": 82177211
					},
					{
					  "date": "2016-01-09",
					  "value": 103762210
					},
					{
					  "date": "2016-01-10",
					  "value": 84381072
					},
					{
					  "date": "2016-01-11",
					  "value": 54352310
					},
					{
					  "date": "2016-01-12",
					  "value": 65531790
					},
					{
					  "date": "2016-01-13",
					  "value": 75748881
					},
					{
					  "date": "2016-01-14",
					  "value": 47064037
					},
					{
					  "date": "2016-01-15",
					  "value": 67520685
					},
					{
					  "date": "2016-01-16",
					  "value": 60176418
					},
					{
					  "date": "2016-01-17",
					  "value": 66122924
					},
					{
					  "date": "2016-01-18",
					  "value": 57337480
					},
					{
					  "date": "2016-01-19",
					  "value": 100258882
					},
					{
					  "date": "2016-01-20",
					  "value": 46829538
					},
					{
					  "date": "2016-01-21",
					  "value": 92456897
					},
					{
					  "date": "2016-01-22",
					  "value": 94299711
					},
					{
					  "date": "2016-01-23",
					  "value": 62759017
					},
					{
					  "date": "2016-01-24",
					  "value": 103596183
					},
					{
					  "date": "2016-01-25",
					  "value": 108107346
					},
					{
					  "date": "2016-01-26",
					  "value": 66359852
					},
					{
					  "date": "2016-01-27",
					  "value": 62570783
					},
					{
					  "date": "2016-01-28",
					  "value": 77967768
					},
					{
					  "date": "2016-01-29",
					  "value": 60642156
					},
					{
					  "date": "2016-01-30",
					  "value": 103721547
					},
					{
					  "date": "2016-01-31",
					  "value": 98229653
					},
					{
					  "date": "2016-02-01",
					  "value": 60698569
					},
					{
					  "date": "2016-02-02",
					  "value": 6764528
					},
					{
					  "date": "2016-02-03",
					  "value": 66148956
					},
					{
					  "date": "2016-02-04",
					  "value": 10147548
					},
					{
					  "date": "2016-02-05",
					  "value": 66709563
					},
					{
					  "date": "2016-02-06",
					  "value": 60437854
					},
					{
					  "date": "2016-02-07",
					  "value": 78845218
					},
					{
					  "date": "2016-02-08",
					  "value": 71618569
					},
					{
					  "date": "2016-02-09",
					  "value": 107573259
					},
					{
					  "date": "2016-02-10",
					  "value": 58672121
					},
					{
					  "date": "2016-02-11",
					  "value": 87124521
					},
					{
					  "date": "2016-02-12",
					  "value": 51578546
					},
					{
					  "date": "2016-02-13",
					  "value": 5162145269
					},
					{
					  "date": "2016-02-14",
					  "value": 83548542
					},
					{
					  "date": "2016-02-15",
					  "value": 66584521
					},
					{
					  "date": "2016-02-16",
					  "value": 65560715
					},
					{
					  "date": "2016-02-17",
					  "value": 62645125
					},
					{
					  "date": "2016-02-18",
					  "value": 92094258
					},
					{
					  "date": "2016-02-19",
					  "value": 48815215
					},
					{
					  "date": "2016-02-20",
					  "value": 49884856
					},
					{
					  "date": "2016-02-21",
					  "value": 44542158
					},
					{
					  "date": "2016-02-22",
					  "value": 104877854
					},
					{
					  "date": "2016-02-23",
					  "value": 96384258
					},
					{
					  "date": "2016-02-24",
					  "value": 105025632
					},
					{
					  "date": "2016-02-25",
					  "value": 63968965
					},

					{
					  "date": "2016-02-26",
					  "value": 63167548
					},
					{
					  "date": "2016-02-27",
					  "value": 685774589
					},
					{
					  "date": "2016-02-28",
					  "value": 95834526
					},
					{
					  "date": "2016-03-01",
					  "value": 99262542
					},
					{
					  "date": "2016-03-02",
					  "value": 109364521
					},
					{
					  "date": "2016-03-03",
					  "value": 93988452
					},
					{
					  "date": "2016-03-04",
					  "value": 94658562
					},
					{
					  "date": "2016-03-05",
					  "value": 90867458
					},
					{
					  "date": "2016-03-06",
					  "value": 46475426
					},
					{
					  "date": "2016-03-07",
					  "value": 84079563
					},
					{
					  "date": "2016-03-08",
					  "value": 103567542
					},
					{
					  "date": "2016-03-09",
					  "value": 101534526
					},
					{
					  "date": "2016-03-10",
					  "value": 95825447
					},
					{
					  "date": "2016-03-11",
					  "value": 66139512
					},
					{
					  "date": "2016-03-12",
					  "value": 96509563
					},
					{
					  "date": "2016-03-13",
					  "value": 80168569
					},
					{
					  "date": "2016-03-14",
					  "value": 84298564
					},
					{
					  "date": "2016-03-15",
					  "value": 86347526
					},
					{
					  "date": "2016-03-16",
					  "value": 31483521
					},
					{
					  "date": "2016-03-17",
					  "value": 82818453
					},
					{
					  "date": "2016-03-18",
					  "value": 89674521
					},
					{
					  "date": "2016-03-19",
					  "value": 95512135
					},
					{
					  "date": "2016-03-20",
					  "value": 97637452
					},
					{
					  "date": "2016-03-21",
					  "value": 62344256
					},
					{
					  "date": "2016-03-22",
					  "value": 62343521

					},
					{
					  "date": "2016-03-23",
					  "value": 65614235
					},
					{
					  "date": "2016-03-24",
					  "value": 65598542
					},
					{
					  "date": "2016-03-25",
					  "value": 63405123
					},
					{
					  "date": "2016-03-26",
					  "value": 91994254
					},
					{
					  "date": "2016-03-27",
					  "value": 96123456
					},
					{
					  "date": "2016-03-28",
					  "value": 92817654
					},
					{
					  "date": "2016-03-29",
					  "value": 93023456
					},
					{
					  "date": "2016-03-30",
					  "value": 108759876
					},
					{
					  "date": "2016-03-31",
					  "value": 49382345
					},
					{
					  "date": "2016-04-01",
					  "value": 100187654
					},
					{
					  "date": "2016-04-02",
					  "value": 44983456
					},
					{
					  "date": "2016-04-03",
					  "value": 52919878
					},
					{
					  "date": "2016-04-04",
					  "value": 48748767
					},
					{
					  "date": "2016-04-05",
					  "value": 23827656
					},
					{
					  "date": "2016-04-06",
					  "value": 58696545
					},
					{
					  "date": "2016-04-07",
					  "value": 50866543
					},
					{
					  "date": "2016-04-08",
					  "value": 43765789
					},
					{
					  "date": "2016-04-09",
					  "value": 4012345
					},
					{
					  "date": "2016-04-10",
					  "value": 47298765
					},
					{
					  "date": "2016-04-11",
					  "value": 53358765
					},
					{
					  "date": "2016-04-12",
					  "value": 71241234
					},
					{
					  "date": "2016-04-13",
					  "value": 75276543
					},
					{
					  "date": "2016-04-14",
					  "value": 68973568
					},
					{
					  "date": "2016-04-15",
					  "value": 71002284
					},
					{
					  "date": "2016-04-16",
					  "value": 75059876
					},
					{
					  "date": "2016-04-17",
					  "value": 83896789
					},
					{
					  "date": "2016-04-18",
					  "value": 50232345
					},
					{
					  "date": "2016-04-19",
					  "value": 59736543
					},
					{
					  "date": "2016-04-20",
					  "value": 56402345
					},
					{
					  "date": "2016-04-21",
					  "value": 108325432
					},
					{
					  "date": "2016-04-22",
					  "value": 101572345
					},
					{
					  "date": "2016-04-23",
					  "value": 95877345
					},
					{
					  "date": "2016-04-24",
					  "value": 82088857
					},
					{
					  "date": "2016-04-25",
					  "value": 72071353
					},
					{
					  "date": "2016-04-26",
					  "value": 91790062
					},
					{
					  "date": "2016-04-27",
					  "value": 115003761
					},
					{
					  "date": "2016-04-28",
					  "value": 120457727
					},
					{
					  "date": "2016-04-29",
					  "value": 58253926
					},
					{
					  "date": "2016-04-30",
					  "value": 47956992
					}
				  ]
				]
			var ts2 = 1484418600000;
			var dates = [];
			for (var i = 0; i < 120; i++) {
			ts2 = ts2 + 86400000;
			var innerArr = [ts2, dataSeries[1][i].value];
			dates.push(innerArr)
			}
			var options = {
			chart: {
				type: 'area',
				stacked: false,
				height: 390,
				zoom: {
				type: 'x',
				padding: {
					left: 30,
					right: 20
				  }
				},
				toolbar: {
					show: true,
					autoSelected: 'zoom'
				}
			},
			plotOptions: {
				line: {
				curve: 'smooth',
				}
			},
			dataLabels: {
				enabled: false
			},
			series: [{
				name: 'Sales',
				data: dates
			}],
			colors: ['#e83a75'],
			fill: {
				gradient: {
				enabled: true,
				shadeIntensity: 0,
				inverseColors: false,
				opacityFrom: 1,
				opacityTo: 0
				},
			},
			grid: {
				show: true,
				borderColor: '#fff',
			},
			yaxis: {
				min: 20000000,
				max: 250000000,
				labels: {
				formatter: function (val) {
					return (val / 1000000).toFixed(0);
				},
				},
			},
			xaxis: {
				type: 'datetime',
				labels: {
					style: {
						colors: ['#949494', '#949494', '#949494', '#949494', '#949494', '#949494', '#949494', '#949494','#949494', '#949494', '#949494','#949494','#949494'],
						cssClass: 'apexcharts-xaxis-label',
					},
					offsetX: -25
				},

				axisBorder: {
					show: false
				},
			},
			tooltip: {
				shared: false,
				y: {
				formatter: function (val) {
					return (val / 1000000).toFixed(0)
				}
				}
			}
			}

			var chart = new ApexCharts(
			document.querySelector("#dayreport"),
			options
			);

			chart.render();

	}
	
	
	
	
	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("zonereport", am4charts.XYChart);
	chart.scrollbarX = new am4core.Scrollbar();

	// Add data
	chart.data = [{
	  "country": "USA",
	  "visits": 3025
	}, {
	  "country": "China",
	  "visits": 1882
	}, {
	  "country": "Japan",
	  "visits": 1809
	}, {
	  "country": "Germany",
	  "visits": 1322
	}, {
	  "country": "UK",
	  "visits": 1122
	}, {
	  "country": "France",
	  "visits": 1114
	}, {
	  "country": "India",
	  "visits": 984
	}, {
	  "country": "Spain",
	  "visits": 711
	}, {
	  "country": "Netherlands",
	  "visits": 665
	}];

	prepareParetoData();

	function prepareParetoData(){
		var total = 0;

		for(var i = 0; i < chart.data.length; i++){
			var value = chart.data[i].visits;
			total += value;
		}

		var sum = 0;
		for(var i = 0; i < chart.data.length; i++){
			var value = chart.data[i].visits;
			sum += value;   
			chart.data[i].pareto = sum / total * 100;
		}    
	}

	// Create axes
	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "country";
	categoryAxis.renderer.grid.template.location = 0;
	categoryAxis.renderer.minGridDistance = 60;
	categoryAxis.tooltip.disabled = true;

	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.minWidth = 50;
	valueAxis.min = 0;
	valueAxis.cursorTooltipEnabled = false;

	// Create series
	var series = chart.series.push(new am4charts.ColumnSeries());
	series.sequencedInterpolation = true;
	series.dataFields.valueY = "visits";
	series.dataFields.categoryX = "country";
	series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
	series.columns.template.strokeWidth = 0;

	series.tooltip.pointerOrientation = "vertical";

	series.columns.template.column.cornerRadiusTopLeft = 10;
	series.columns.template.column.cornerRadiusTopRight = 10;
	series.columns.template.column.fillOpacity = 0.8;

	// on hover, make corner radiuses bigger
	var hoverState = series.columns.template.column.states.create("hover");
	hoverState.properties.cornerRadiusTopLeft = 0;
	hoverState.properties.cornerRadiusTopRight = 0;
	hoverState.properties.fillOpacity = 1;

	series.columns.template.adapter.add("fill", (fill, target)=>{
	  return chart.colors.getIndex(target.dataItem.index);
	})


	var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	paretoValueAxis.renderer.opposite = true;
	paretoValueAxis.min = 0;
	paretoValueAxis.max = 100;
	paretoValueAxis.strictMinMax = true;
	paretoValueAxis.renderer.grid.template.disabled = true;
	paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
	paretoValueAxis.numberFormatter.numberFormat = "#'%'"
	paretoValueAxis.cursorTooltipEnabled = false;

	var paretoSeries = chart.series.push(new am4charts.LineSeries())
	paretoSeries.dataFields.valueY = "pareto";
	paretoSeries.dataFields.categoryX = "country";
	paretoSeries.yAxis = paretoValueAxis;
	paretoSeries.tooltipText = "pareto: {valueY.formatNumber('#.0')}%[/]";
	paretoSeries.bullets.push(new am4charts.CircleBullet());
	paretoSeries.strokeWidth = 2;
	paretoSeries.stroke = new am4core.InterfaceColorSet().getFor("alternativeBackground");
	paretoSeries.strokeOpacity = 0.5;

	// Cursor
	chart.cursor = new am4charts.XYCursor();
	chart.cursor.behavior = "panX";
	
	
	
	
	
  
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



  
             

