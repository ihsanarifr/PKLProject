<?php
include 'data_suhu_sensor1.php';
include 'data_suhu_sensor2.php';
/*-----------------------------KUMPULAN FUNGSI---------------------------------------*/
function aktif_44()
{
	//shell_exec("echo 1 > /sys/class/gpio/gpio44/value");
	echo "aktif 44";
}

function aktif_45()
{
	shell_exec("echo 1 > /sys/class/gpio/gpio45/value");
	echo "aktif 45";
}

/*-------------------------------------------------------------------------------------*/
	
/* Memakai Pemrograman CPP
$hasil_sensor =  exec("/www/cgi-bin/lm35");
echo $hasil_sensor;
*/
// PENGONTROL FAN OTOMATIS DENGAN VARIABEL SUHU
$temperature1 = temperature1(); 
$temperature2= temperature2();
	if($temperature1> 30)
	{
		//echo "<script>location.href='monitoring_control_suhu.php?led=44&onOff=1'</script>";
		echo "<br>";
		aktif_44();
		echo "<br>";
	}else{
		//echo "<script>location.href='monitoring_control_suhu.php?led=44&onOff=0'</script>";
		//shell_exec("echo 0 > /sys/class/gpio/gpio44/value");
		//aktif_45();
		echo "<br>";
		echo "44 tidak aktif";
		echo "<br>";
	}

	if($temperature2> 30)
	{
		//echo "<script>location.href='monitoring_control_suhu.php?led=45&onOff=1'</script>";
		echo "<br>";
		aktif_45();
		echo "<br>";
	}else{
		//echo "<script>location.href='monitoring_control_suhu.php?led=45&onOff=0'</script>";
		//shell_exec("echo 0 > /sys/class/gpio/gpio45/value");
		echo "<br>";
		echo "45 tidak aktif";
		echo "<br>";
	}
?>