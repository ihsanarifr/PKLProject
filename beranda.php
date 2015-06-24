<?php 

session_start();

if(!empty($_SESSION["username"])){
	?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Selamat Datang di Official Monitoring dan Kontrol Suhu Ruang
	Server</title>

<!-- Core CSS - Include with every page -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Page-Level Plugin CSS - Dashboard -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/plugins/timeline/timeline.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">
<style type="text/css">
img,img.scale-with-grid {
	outline: 0;
	max-width: 100%;
	height: auto;
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
					<li><a href="grafik_suhu.php"><i class="fa fa-bar-chart-o fa-fw"></i>
							Grafik Suhu</a>
					</li>
					<li><a href="cara_penggunaan.php"><i class="fa fa-table fa-fw"></i> Cara
							Penggunaan</a>
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
					<h1 class="page-header">Dashboard</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Selamat Datang
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body"><center>
							<img src="gambar/beranda.jpg" class="img-rounded"
								style="width: 510px; height: 220px;"></center> <br>
							<div>
								<br>
								<b><p style="font-style: italic; text-align: center;">Menurut The
									American Society of Heating, Refrigerating and Air-Conditioning
									Engineers menjelaskan, "Spesifikasi suhu dan kelembaban ruang
									Data Center sesuai dengan TIA-942-A adalah Temperature 18-27C
									(64-81F), Kelembaban relative maksimum 60%, Titik Embun
									maksimum 15C (59F), dan tingkat maksimum perubahan suhu 5C
									(9F) per jam."
							</b>
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
				</div>
				<!-- /.panel -->
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bell fa-fw"></i> Teman PKL
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="list-group">
								<div class="panel">
									<table>
										<tr>
											<td><img src="gambar/mas_yayan.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Mas Yayan
										
										</tr>
										<tr>
											<td><img src="gambar/adi.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Adi Nugroho
										
										</tr>
										<tr>
											<td><img src="gambar/agung.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Agung
												Triwicaksono
											
											<td>&nbsp;
										
										</tr>
										<tr>
											<td><img src="gambar/desrayen.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Ahmad Desrayen






											
											
											<td>&nbsp;
										
										</tr>
										<tr>
											<td><img src="gambar/aldi.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Aldi Arikandi
											
											<td>&nbsp;
										
										</tr>
										<tr>
											<td><img src="gambar/irma.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Irma Irmayanti






											
											
											<td>&nbsp;
										
										</tr>
										<tr>
											<td><img src="gambar/luthfi.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Mochammad
												Luthfi
											
											<td>&nbsp;
										
										</tr>
										<tr>
											<td><img src="gambar/tri.jpg" class="img-circle"
												style="width: 70px; height: 70px;">
											
											<td style="padding-left: 15px;" height="80px">Tri Agung
											
											<td>&nbsp;
										
										</tr>
									</table>
								</div>
							</div>
							<!-- /.list-group -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
					<!-- /.panel .chat-panel -->
				</div>
				<!-- /.col-md-4 -->
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

</body>

</html>
<?php }else{
	echo "<script>
		alert('Harus Login Terlebih dahulu');
		location.href='logout.php';
		</script>";
} //session tidak ada nip
?>
