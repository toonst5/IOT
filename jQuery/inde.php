<link rel="stylesheet" href="styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jqxcore.js"></script>
<script type="text/javascript" src="jqxchart.js"></script>
<script type="text/javascript" src="jqxdata.js"></script>

<div id="jqxChart"></div>

<script type="text/javascript">
	$(document).ready(function () {
		var source =
		{
			 datatype: "json",
			 datafields: [
				 { name: 'tijd', type: 'date'},
				 { name: 'waarde'}
			],
			url: 'data.php'
		};

	   var dataAdapter = new $.jqx.dataAdapter(source,
		{
			autoBind: true,
			async: false,
			downloadComplete: function () { },
			loadComplete: function () { },
			loadError: function () { }
		});

	 // prepare jqxChart settings
		var settings = {
			title: "Orders by Date",
			showLegend: true,
			padding: { left: 5, top: 5, right: 5, bottom: 5 },
			titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
			source: dataAdapter,
			categoryAxis:
				{
					text: 'Category Axis',
					textRotationAngle: 0,
					dataField: 'OrderDate',
					formatFunction: function (value) {
						return $.jqx.dataFormat.formatdate(value, 'dd/MM/yyyy');
					},
					showTickMarks: true,
					tickMarksInterval: Math.round(dataAdapter.records.length / 6),
					tickMarksColor: '#888888',
					unitInterval: Math.round(dataAdapter.records.length / 6),
					showGridLines: true,
					gridLinesInterval: Math.round(dataAdapter.records.length / 3),
					gridLinesColor: '#888888',
					axisSize: 'auto'
				},
			colorScheme: 'scheme05',
			seriesGroups:
				[
					{
						type: 'line',
						valueAxis:
						{
							displayValueAxis: true,
							description: 'Quantity',
							//descriptionClass: 'css-class-name',
							axisSize: 'auto',
							tickMarksColor: '#888888',
							unitInterval: 20,
							minValue: 0,
							maxValue: 100
						},
						series: [
								{ dataField: 'Quantity', displayText: 'Quantity' }
						  ]
					}
				]
		};

		// setup the chart
		$('#jqxChart').jqxChart(settings);
	});
</script>