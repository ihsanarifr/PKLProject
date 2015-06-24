<?php
include "koneksi.php";
session_start();

extract($_GET); // $nip $pass

// pengecekan jika di pilih login atau sign up
if (isset($Masuk)){
	if (koneksi() == true){

		// query selet
		$sql = "select * from login where
				username = '".$username."' and
						password = '".$password."'";// or die ("Ada kesalahan ".mysql_error());

		$hasil = mysql_query($sql);
		//$data = mysql_fetch_array($hasil);

		if(empty($username) && empty($password)){
			$status = "<div class='alert alert-danger'>Username atau Password Anda Kosong..</div>";
		}else{

			if(mysql_num_rows($hasil)){
				$_SESSION["username"] = $username;	//dikenali di setiap halaman
				$_SESSION["password"] = $password;	//dikenali di setiap halaman

				header('location:beranda.php');
			}else{
				$status = "<div class='alert alert-danger'>Username atau Password yang Anda Masukkan Salah</div>";
			}
		}
	}else{
		echo 'TIDAK KONEK';
	}
}else{
	$status = "";
}
?>
<html>
<head>
<title>Masuk</title>
<link href="css/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<script src="/js/bootstrap.min.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="panel panel-default"
			style="width: 400px; margin-top: 160px;">
			<div class="panel-heading">
				<h3 class="panel-title">Login Administrator</h3>
			</div>
			<form action="login.php" method="get">
				<div class="panel-body" align="left">
					<div class="input-group input-group-lg"
						style="padding-top: 20px; padding-left: 20px;">
						<span class="input-group-addon">@</span> <input type="text"
							name="username" class="form-control" placeholder="Username"
							style="width: 270px;">
					</div>
					<br>
					<div class="input-group input-group-lg"
						style="padding-top: 3px; padding-left: 20px;">
						<span class="input-group-addon">%</span> <input type="password"
							name="password" class="form-control" placeholder="Password"
							style="width: 270px;">

					</div>
					<div
						style="padding-top: 17px; padding-left: 17px; padding-right: 30px;">
						<?php echo $status; ?>
					</div>
					<input type="submit" class="btn btn-success btn-lg" name="Masuk"
						value="Masuk" style="padding-left: 20px; margin-left: 20px;"> <input
						type="button" class="btn btn-primary btn-lg" name="Beranda"
						value="Beranda" onclick="location.href='index.php'" style="padding-left: 20px;">
				</div>
			</form>
		</div>
	</center>
</body>
</html>
