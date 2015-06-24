<?php
function automation_control1(){
	//echo exec("/www/cgi-bin/sensor1");
	$mentah_suhu = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage1_raw");
	$millivolt = ($mentah_suhu/4096.0) * 1800;
	$temperature = ($millivolt /  10.0) - 2;
	//echo number_format($temperature,1);
	//echo $mentah_suhu;*/z
	//echo "145.0";
	//$temperature = 34;
	/* include 'koneksi.php';
	koneksi();
	$sql = "select * from suhu";
	$hasil = mysql_query($sql);
	$row = mysql_fetch_array($hasil);
	
	$suhu = $row['suhu'];
	
	if($temperature > $suhu)
	{
		shell_exec("echo out > /sys/class/gpio/gpio44/direction");
		echo "<div class='alert alert-success'>Kipas Sensor 2 Aktif</div>";
	}else{
		shell_exec("echo in > /sys/class/gpio/gpio44/direction");
		echo "<div class='alert alert-danger'>Kipas Sensor 2 Non-Aktif</div>";
	} */
}
automation_control1();
?>