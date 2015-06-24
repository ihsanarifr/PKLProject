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
					<li><a href="cara_penggunaan.php"><i class="fa fa-table fa-fw"></i>
							Cara Penggunaan</a>
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
					<h1 class="page-header">Setting Suhu Ideal Ruang Server</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
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
			<!-- /.panel -->
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Cara Penggunaan</h1>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Cara Penggunaan
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div>
								<br>
								<p style="text-align: justify;">Penggunaan Sistem Monitoring
									Suhu Ruang Server diantaranya sebagai berikut:
								
								
								<ul>
									<li>Setiap orang yang akan menggunakan web monitoring ini harus
										terlebih dahulu terdaftar
									
									<li>Jika belum punya akun harus didaftarkan oleh Administator
									
									<li>Penggunaan Monitoring Suhu Ruang Server ini lihat saja pada
										tab menu Monitoring dan tekan
									
									<li>Pada Monitoring ini terdapat Sensor 1 dan Sensor 2 yang
										secara <i>realtime</i> mengambil data dari sensor
									
									<li>Perubahan suhu yang ditampilkan di web ini tercatat di
										dalam database
									
									<li>Perubahan suhu ini tiap 5 detik sekali.
								
								</ul>
								<br> Penggunaan Sistem Kontrol Suhu Ruang Server diantaranya
								sebagai berikut:
								<ul>
									<li>Setiap orang yang akan menggunakan web kontrol ini harus
										terlebih dahulu terdaftar
									
									<li>Jika belum punya akun harus didaftarkan oleh Administrator














									
									
									<li>Pada Kontrol suhu ini terdapat tombol yang nantinya akan
										mengaktifkan kipas sesuai dengan keadaan tempatnya
									
									<li>Sistem kontrol ini terdapat notifikasi sehingga dapat
										dilihat kipas mana yang sedang aktif
								
								</ul>
								<br> <b><p style="font-style: italic; text-align: center;">Menurut
										The American Society of Heating, Refrigerating and
										Air-Conditioning Engineers menjelaskan, "Spesifikasi suhu dan
										kelembaban ruang Data Center sesuai dengan TIA-942-A adalah
										Temperature 18-27C (64-81F), Kelembaban relative maksimum 60%,
										Titik Embun maksimum 15C (59F), dan tingkat maksimum perubahan
										suhu 5C (9F) per jam."
								
								</b>
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
				</div>
				<!-- /.panel -->
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
