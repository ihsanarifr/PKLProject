<?php 
session_start();
extract($_GET);

if(!empty($_SESSION["username"])){

$user = shell_exec("whoami");
//aktifkan Temperature suhu
if(isset($_GET['temperature']))
{
	shell_exec("echo cape-bone-iio > /sys/devices/bone_capemgr.8/slots");
	$coba = "echo cape-bone-iio > /sys/devices/bone_capemgr.*/slots";

	$status = "<div class='alert alert-success'>Sensor Suhu sudah diaktifkan</div>";
	//echo "<script>
	//   alert('Sensor Telah Aktif');
	//   location.href='monitoring_control_suhu.php';
	//  </script>";//diarahkan ke alamat
}
else
{
	$status = "<div class='alert alert-danger'>Sensor Suhu belum diaktifkan</div>";
}

?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Automation Control Suhu Ruang Server</title>

<!-- Core CSS - Include with every page -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Page-Level Plugin CSS - Dashboard -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/plugins/timeline/timeline.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">

<style type="text/css">
#content_sensor1 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 60px;
}

#content_sensor2 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 60px;
}

#fahrenheit_sensor1 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 60px;
}

#fahrenheit_sensor2 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 60px;
}

#content_automation_suhu1 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 12px;
}

#content_automation_suhu2 {
	margin-top: 10px;
	margin-bottom: auto;
	font-size: 12px;
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
				<a class="navbar-brand" href="index.html">Praktik Kerja Lapang di Pusat Penelitian Fisika</a>
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
					<li class="active"><a href="#"><i class="fa fa-wrench fa-fw fa-fw"></i>
							Sistem<span class="fa arrow"></span> </a>
						<ul class="nav nav-second-level">
							<li><a href="monitoring_suhu.php"> Monitoring Suhu <sup><label class="label label-success">PKL</label></sup></a>
							</li>
							<li><a href="control.php"> Kontrol Kipas Pendingin <sup><label class="label label-success">PKL</label></sup></a>
							</li>
							<li><a href="automation_control.php"> Automation Control <sup><label class="label label-success">TA</label></sup></a>
							</li>

						</ul> <!-- /.nav-second-level -->
					</li>
					<li><a href="grafik_suhu.php"><i class="fa fa-bar-chart-o fa-fw"></i>
							Grafik Suhu</a>
					
					<li><a href="cara_penggunaan.php"><i class="fa fa-table fa-fw"></i> Cara
							Pengaturan</a>
					</li>
					<li><a href="tentang.php"><i class="fa fa-edit fa-fw"></i> Tentang</a>
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
					<h1 class="page-header">Automation Control Suhu Ruang Server</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Setting
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<?php 
							include 'koneksi.php';
							koneksi();
							$sql = "select * from suhu";
							$hasil = mysql_query($sql);
							$row = mysql_fetch_array($hasil);
							?>
							<div class="row">
								<div class="col-md-12">
								<div class="panel">
								<font style="font-size: 16pt;">Suhu Ruang Ideal Ditetapkan Saat Ini adalah :  <?php echo $row['suhu']?>&degC</font>
								</div>
								</div>
								<form action="update_suhu.php" method="post">
									<input type="text" name="id" value="1" hidden="true">
									<div class="col-md-3">
										<select name="suhu" class="form-control">
										<option value="18">18&degC</option>
										<option value="19">19&degC</option>
										<option value="20">20&degC</option>
										<option value="21">21&degC</option>
										<option value="22">22&degC</option>
										<option value="23">23&degC</option>
										<option value="24">24&degC</option>
										<option value="25">25&degC</option>
										<option value="26">26&degC</option>
										<option value="27">27&degC</option>
										<option value="28">28&degC</option>
										<option value="29">29&degC</option>
										<option value="30">30&degC</option>
										</select>
									</div>
									<div class="col-md-3">
										<button type="submit" name="submit" class="btn btn-primary"><span class="fa fa-pencil"></span> Ubah</button>
									</div>
								</form>

							</div>

						</div>
						<!-- /.panel-body -->
					</div>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Sensor 1</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<br>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Celcius</h3>
									</div>
									<div id="content_sensor1" class="panel-body"
										style="text-align: center;"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Fahrenheit</h3>
									</div>
									<div id="fahrenheit_sensor1" class="panel-body"
										style="text-align: center;"></div>
								</div>
							</div>
							<div class="panel-body">
							<div id="content_automation_suhu1"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Sensor 2</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<br>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Celcius</h3>
									</div>
									<div id="content_sensor2" class="panel-body"
										style="text-align: center;"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Fahrenheit</h3>
									</div>
									<div id="fahrenheit_sensor2" class="panel-body"
										style="text-align: center;"></div>
								</div>
							</div>
							<div class="panel-body">
							<div id="content_automation_suhu2"></div>
							</div>
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
	<script src="js/bootstrap.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

	<!-- Page-Level Plugin Scripts - Dashboard -->
	<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
	<script src="js/plugins/morris/morris.js"></script>

	<!-- SB Admin Scripts - Include with every page -->
	<script src="js/sb-admin.js"></script>

	<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
	<script src="js/demo/dashboard-demo.js"></script>

	<script src="js/jquery-latest.js"></script>
	<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
                $('#fahrenheit_sensor1').show();
                $('#fahrenheit_sensor2').show();
                $('#content_automation_suhu1').show();
                $('#content_automation_suhu2').show();
            },
            complete: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
                $('#fahrenheit_sensor1').show();
                $('#fahrenheit_sensor2').show();
                $('#content_automation_suhu1').show();
                $('#content_automation_suhu2').show();
            },
            success: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
                $('#fahrenheit_sensor1').show();
                $('#fahrenheit_sensor2').show();
                $('#content_automation_suhu1').show();
                $('#content_automation_suhu2').show();
            }
        });
        var $container1 = $("#content_sensor1");
        var $container2 = $("#content_sensor2");
        var $container3 = $('#fahrenheit_sensor1');
        var $container4 = $('#fahrenheit_sensor2');
        var $container5 = $('#content_automation_suhu1');
        var $container6 = $('#content_automation_suhu2');
        $container1.load("data_suhu_sensor1.php");
        $container2.load("data_suhu_sensor2.php");
        $container3.load("fahrenheit_sensor1.php");
        $container4.load("fahrenheit_sensor2.php");
        $container5.load("automation_control_suhu1.php");
        $container6.load("automation_control_suhu2.php");
        var refreshId = setInterval(function()
        {
            $container1.load('data_suhu_sensor1.php');
            $container2.load('data_suhu_sensor2.php');
            $container3.load('fahrenheit_sensor1.php');
            $container4.load('fahrenheit_sensor2.php');
            $container5.load('automation_control_suhu1.php');
            $container6.load('automation_control_suhu2.php');
        }, 4000);
    });
})(jQuery);
</script>

	<script type="text/javascript">
	$('#the-thing-that-opens-your-alert').click(function () {
		  $('#le-alert').addClass('in'); // shows alert with Bootstrap CSS3 implem
	});

	$('.close').click(function () {
	  $('#le-alert').removeClass('in'); // hides alert with Bootstrap CSS3 implem
	});
</script>
</body>
</html>
<?php 
}else{
	echo "<script>
	   alert('Harus Login Terlebih dahulu');
	   location.href='logout.php';
	  </script>";
} //session tidak ada nip
?>
