<html>
<title>Dynamic Chart</title>
<head>
	<script type="text/javascript" src="FusionCharts.js"></script>
	<script type="text/javascript" src="prototype.js"></script>
	<script type="text/javascript">
	new PeriodicalExecuter(function getLatestData() {
		new Ajax.Request('data_2.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('data_2', transport.responseText);
			  }
			});
		new Ajax.Request('data_grafik_sensor_1_celcius.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_1_celcius', transport.responseText);
			  }
			});
		new Ajax.Request('data_grafik_sensor_1_fahrenheit.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_1_fahrenheit', transport.responseText);
			  }
			});
		new Ajax.Request('data_grafik_sensor_2_celcius.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_2_celcius', transport.responseText);
			  }
			});
		new Ajax.Request('data_grafik_sensor_2_fahrenheit.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_2_fahrenheit', transport.responseText);
			  }
			});
	}, 1);
	</script>
		
</head>
<body bgcolor="#ffffff">
<div id="data_2" align="center"></div>
	<div id="chartdiv_1_celcius" align="center"></div>
	<div id="chartdiv_1_fahrenheit" align="center"></div>
	<div id="chartdiv_2_celcius" align="center"></div>
	<div id="chartdiv_2_fahrenheit" align="center"></div>
	
	<script type="text/javascript">
			var data_2 = new FusionCharts("FCF_Line.swf", 
			"data_2", "370", "300", "0", "1");
			data_2.setDataURL('data_grafik_sensor_1_celcius.php');
			data_2.render("data_2");
	
		var grafik_sensor_1_celcius = new FusionCharts("FCF_Line.swf", 
		"grafik_sensor_1_celcius", "370", "300", "0", "1");
		grafik_sensor_1_celcius.setDataURL('data_grafik_sensor_1_celcius.php');
		grafik_sensor_1_celcius.render("chartdiv_1_celcius");
	
		var grafik_sensor_1_fahrenheit = new FusionCharts("FCF_Line.swf", 
		"grafik_sensor_1_fahrenheit", "370", "300", "0", "1");
		grafik_sensor_1_fahrenheit.setDataURL('data_grafik_sensor_1_fahrenheit.php');
		grafik_sensor_1_fahrenheit.render("chartdiv_1_fahrenheit");

		var grafik_sensor_2_celcius = new FusionCharts("FCF_Line.swf", 
		"grafik_sensor_2_celcius", "370", "300", "0", "1");
		grafik_sensor_2_celcius.setDataURL('data_grafik_sensor_2_celcius.php');
		grafik_sensor_2_celcius.render("chartdiv_2_celcius");

		var grafik_sensor_2_fahrenheit = new FusionCharts("FCF_Line.swf", 
		"grafik_sensor_2_fahrenheit", "370", "300", "0", "1");
		grafik_sensor_2_fahrenheit.setDataURL('data_grafik_sensor_2_fahrenheit.php');
		grafik_sensor_2_fahrenheit.render("chartdiv_2_fahrenheit");
	</script>
</body>
</html>