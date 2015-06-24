<?php 

session_start();

if(!empty($_SESSION["username"])){
	?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Grafik Monitoring Temperatur Suhu Ruang Server</title>

<!-- Core CSS - Include with every page -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Page-Level Plugin CSS - Dashboard -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/plugins/timeline/timeline.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">

<style type="text/css">
#grafik_sensor_1_celcius {
	margin-top: auto;
	margin-bottom: auto;
}

#grafik_sensor_1_fahrenheit {
	margin-top: auto;
	margin-bottom: auto;
}

#grafik_sensor_2_celcius {
	margin-top: auto;
	margin-bottom: auto;
}

#grafik_sensor_2_fahrenheit {
	margin-top: auto;
	margin-bottom: auto;
}
</style>
</head>

<body>

	<div id="wrapper">

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Praktik Kerja Lapang di
					Pusat Penelitian Fisika LIPI</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<?php echo $_SESSION['username']; ?>
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i
						class="fa fa-caret-down"></i>
				</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>
								Logout</a>
						</li>
					</ul> <!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

		</nav>
		<!-- /.navbar-static-top -->

		<nav class="navbar-default navbar-static-side" role="navigation"
			style="padding-top: 50px;">
			<div class="sidebar-collapse">
				<ul class="nav" id="side-menu">
					<li><a href="beranda.php"><i class="fa fa-dashboard fa-fw"></i>
							Beranda</a>
					</li>
					<li><a href="#"><i class="fa fa-wrench fa-fw fa-fw"></i> Sistem<span
							class="fa arrow"></span> </a>
						<ul class="nav nav-second-level">
							<li><a href="monitoring_suhu.php">Monitoring Suhu</a>
							</li>
							<li><a href="control.php">Kontrol Kipas Pendingin</a>
							</li>
							<li><a href="automation_control.php">Automation Control</a>
							</li>

						</ul> <!-- /.nav-second-level -->
					</li>
					<li class="active"><a href="grafik_suhu.php"><i
							class="fa fa-bar-chart-o fa-fw"></i> Grafik Temperatur Suhu</a>
					</li>
					<li><a href="tables.html"><i class="fa fa-table fa-fw"></i> Cara
							Pengaturan</a>
					</li>
					<li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Tentang</a>
					</li>
				</ul>
				<!-- /#side-menu -->
			</div>
			<!-- /.sidebar-collapse -->
		</nav>
		<!-- /.navbar-static-side -->

		<div id="page-wrapper" style="padding-top: 50px;">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Grafik Temperatur Suhu Ruang Server</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Grafik Temperatur Sensor 1</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<div id="chartdiv_1_celcius" align="center"></div>
							<div id="chartdiv_1_fahrenheit" align="center"></div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Grafik Temperatur Sensor 2</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<div id="chartdiv_2_celcius" align="center"></div>
							<div id="chartdiv_2_fahrenheit" align="center"></div>
						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Grafik Temperatur Suhu Ruang Server</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<div id="chartdiv_1"></div>
							<div id="chartdiv_2"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Core Scripts - Include with every page -->
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

	<!-- Page-Level Plugin Scripts - Dashboard -->
	<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
	<script src="js/plugins/morris/morris.js"></script>

	<!-- SB Admin Scripts - Include with every page -->
	<script src="js/sb-admin.js"></script>

	<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
	<script src="js/demo/dashboard-demo.js"></script>

	<script src="js/jquery-latest.js"></script>


	<!-- Fusion Chart Untuk Grafik Temperature Suhu -->
	<script type="text/javascript" src="chart/fusioncharts.js"></script>
	<script type="text/javascript" src="chart/prototype.js"></script>

	<script type="text/javascript">
	new PeriodicalExecuter(function getLatestData() {
		//ngambil data sensor 1 celcius dan fahrenheit dalam 10 data terakhir
		new Ajax.Request('chart/data_grafik_sensor_1_celcius.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_1_celcius', transport.responseText);
			  }
			});
		new Ajax.Request('chart/data_grafik_sensor_1_fahrenheit.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_1_fahrenheit', transport.responseText);
			  }
			});

		//ngambil data sensor 2 celcius dan fahrenheit dalam 10 data terakhir
		new Ajax.Request('chart/data_grafik_sensor_2_celcius.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_2_celcius', transport.responseText);
			  }
			});
		new Ajax.Request('chart/data_grafik_sensor_2_fahrenheit.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_2_fahrenheit', transport.responseText);
			  }
			});

		//ngambil data sensor 1 dan 2 keseluruhan
		new Ajax.Request('chart/data_grafik_sensor_1.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_1', transport.responseText);
			  }
			});
		new Ajax.Request('chart/data_grafik_sensor_2.php', {
			  method: 'get',
			  onSuccess: function(transport) {
			    updateChartXML('grafik_sensor_2', transport.responseText);
			  }
			});
	}, 1);
		// grafik sensor 1 diambil 10 data terakhir
		var grafik_sensor_1_celcius = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_1_celcius", "370", "300", "0", "1");
		grafik_sensor_1_celcius.setDataURL('chart/data_grafik_sensor_1_celcius.php');
		grafik_sensor_1_celcius.render("chartdiv_1_celcius");
	
		var grafik_sensor_1_fahrenheit = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_1_fahrenheit", "370", "300", "0", "1");
		grafik_sensor_1_fahrenheit.setDataURL('chart/data_grafik_sensor_1_fahrenheit.php');
		grafik_sensor_1_fahrenheit.render("chartdiv_1_fahrenheit");

		// grafik sensor 2 diambil 10 data terakhir
		var grafik_sensor_2_celcius = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_2_celcius", "370", "300", "0", "1");
		grafik_sensor_2_celcius.setDataURL('chart/data_grafik_sensor_2_celcius.php');
		grafik_sensor_2_celcius.render("chartdiv_2_celcius");

		var grafik_sensor_2_fahrenheit = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_2_fahrenheit", "370", "300", "0", "1");
		grafik_sensor_2_fahrenheit.setDataURL('chart/data_grafik_sensor_2_fahrenheit.php');
		grafik_sensor_2_fahrenheit.render("chartdiv_2_fahrenheit");

		// grafik secara keseluruhan 
		var grafik_sensor_1 = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_1", "800", "300", "0", "1");
		grafik_sensor_1.setDataURL('chart/data_grafik_sensor_1.php');
		grafik_sensor_1.render("chartdiv_1");

		var grafik_sensor_2 = new FusionCharts("chart/FCF_Line.swf", 
		"grafik_sensor_2", "800", "300", "0", "1");
		grafik_sensor_2.setDataURL('chart/data_grafik_sensor_2.php');
		grafik_sensor_2.render("chartdiv_2");
	</script>
</body>

</html>
<?php }else{
	echo "<script>
		alert('Harus Login Terlebih dahulu');
		location.href='logout.php';
		</script>";
} //session tidak ada nip
?>