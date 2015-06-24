<?php 
function koneksi(){
	$server = "localhost";
	$user 	= "root";
	$pass	= "";
	$db	= "monitoring_control_suhu";
	
	$koneksi = mysql_connect($server,$user,$pass);
	
	if($koneksi){
		$status = true;
		//echo "koneksi berhasil </br>";
		
		$pilihDB = mysql_select_db($db);
		
		if($pilihDB){
			$status = true;
		}else{
			$status = true;
		}
		
	}else{
		$status = false;
		echo "koneksi ga jalan";
	}
	return $status;
}
?>
