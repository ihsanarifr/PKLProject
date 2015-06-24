<?php
include 'koneksi.php';
$user = shell_exec("whoami");

session_start();

if(!empty($_SESSION["username"])){

//aktifkan LED dan GPIO
if (isset($_GET['led']) && isset($_GET['onOff']))
{
	$led = $_GET['led'];
	$onOff = $_GET['onOff'];

	if($onOff == 1)
	{
		shell_exec("echo 0 > /sys/class/gpio/gpio$led/value");

		koneksi();
		mysql_query("update control set status='".$onOff."' where gpio='".$led."'");

		if($led == 44)
		{
			$status = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
				
			$query = mysql_query("select status from control where gpio=45") or die(mysql_error());
			$cek_gpio45a = mysql_fetch_row($query);
				
			if($cek_gpio45a[0] == 1)
			{
				$status2 = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
			}
			else
			{
				$status2 = "<div><div class='alert alert-danger'>Kipas Pendingin Non-aktif Aktif</div></div>";
			}

		}
		elseif($led == 45)
		{
			$status2 = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
			
			$query2 = mysql_query("select status from control where gpio=44") or die(mysql_error());
			$cek_gpio44a = mysql_fetch_row($query2);
			
			if($cek_gpio44a[0] == 1)
			{
				$status = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
			}
			else
			{
				$status = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
			}
		}
	}else{
		shell_exec("echo 1 > /sys/class/gpio/gpio$led/value");
		
		koneksi();
		mysql_query("update control set status='".$onOff."' where gpio='".$led."'");
		
		if($led == 44)
		{
			$status = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
			
			$query3 = mysql_query("select status from control where gpio=45") or die(mysql_error());
			$cek_gpio45b = mysql_fetch_row($query3);
			
			if($cek_gpio45b[0] == 1)
			{
				$status2 = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
			}
			else
			{
				$status2 = "<div><div class='alert alert-danger'>Kipas Pendingin Non-aktif</div></div>";
			}
		}else{
			$status2 = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
				
			$query4 = mysql_query("select status from control where gpio=44") or die(mysql_error());
			$cek_gpio44b = mysql_fetch_row($query4);
				
			if($cek_gpio44b[0] == 1)
			{
				$status = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
			}
			else
			{
				$status = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
			}
		}
	}


	//exec( "/www/cgi-bin/ledctl $led $onOff" );

}
else{
	koneksi();
	
	// pengecekan kondisi awal status fans nyala atau tidak untuk GPIO 44
	$query5 = mysql_query("select status from control where gpio=44");
	$cek44 = mysql_fetch_row($query5);
	
	if($cek44[0] == 1)
	{
		$status = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
	}
	else
	{
		$status = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
	}
	
	// pengecekan kondisi awal status fans nyala atau tidak untuk GPIO 44
	$query6 = mysql_query("select status from control where gpio=45");
	$cek45 = mysql_fetch_row($query6);
	
	if($cek45[0] == 1)
	{
		$status2 = "<div><div class='alert alert-success'>Kipas Pendingin Aktif</div></div>";
	}
	else
	{
		$status2 = "<div><div class='alert alert-danger'>Kipas Pendingin Non-Aktif</div></div>";
	}
}

?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kontrol Suhu Ruang Server</title>

<!-- Core CSS - Include with every page -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Page-Level Plugin CSS - Dashboard -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/plugins/timeline/timeline.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>

	<div id="wrapper" style="height: 700px;">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation"
			style="margin-bottom: 0;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="beranda.php">Praktik Kerja Lapang di Pusat Penelitian Fisika LIPI</a>
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
							<li><a href="monitoring_suhu.php"> Monitoring Suhu</a>
							</li>
							<li><a href="control.php"> Kontrol Kipas Pendingin</a>
							</li>
							<li><a href="automation_control.php"> Automation Control</a>
							</li>

						</ul> <!-- /.nav-second-level -->
					</li>
					<li><a href="grafik_suhu.php"><i class="fa fa-bar-chart-o fa-fw"></i> 
					Grafik Suhu</a>
					</li>
					<li><a href="tables.html"><i class="fa fa-table fa-fw"></i> 
					Cara Pengaturan</a>
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
					<h1 class="page-header">Kontrol Kipas Pendingin</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-5">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Kipas Pendingin Berankas 1</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<br> <br>
							<button type="button" id="the-thing-that-opens-your-alert"
								onclick="location.href='control.php?led=44&onOff=1'"
								class="btn btn-lg btn-success">AKTIFKAN</button>
								&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-lg btn-danger"
								onclick="location.href='control.php?led=44&onOff=0'">NON-AKTIF</button>
							<br> <br>
							<div class="panel-body">
								<?php echo $status;?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Kipas Pendingin Berankas 2</h3>
						</div>
						<div class="panel-body" style="text-align: center;">
							<br> <br>
							<button type="button" id="the-thing-that-opens-your-alert"
								onclick="location.href='control.php?led=45&onOff=1'"
								class="btn btn-lg btn-success">AKTIFKAN</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-lg btn-danger"
								onclick="location.href='control.php?led=45&onOff=0'">NON-AKTIF</button>
							<br> <br>
							<div class="panel-body"><?php echo $status2;?></div>
						</div>
					</div>
				</div>
				<!-- /.col-md-8 -->
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

	<script type="text/javascript" src="js/jquery-1.7.1.js"></script>

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