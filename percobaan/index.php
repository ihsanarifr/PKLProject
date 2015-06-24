<html>
<title>Dynamic Chart</title>
<head>
	<script type="text/javascript" src="FusionCharts.js"></script>
	<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
	new PeriodicalExecuter(function getLatestData() {
		new Ajax.Request('data.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('myChartId', transport.responseText);
			  }
			});
	}, 1);
</script>	
</head>
<body bgcolor="#ffffff">
	<div id="chartdiv" align="center"></div>
	<script type="text/javascript">
		var myChart = new FusionCharts("FCF_Line.swf", 
		"myChartId", "800", "500", "0", "1");
	    myChart.setDataURL('data.php');
	    myChart.render("chartdiv");
	</script>	
</body>
</html>