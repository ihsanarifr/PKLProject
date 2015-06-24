<?php

extract($_GET);

$user = shell_exec("whoami");
//aktifkan Temperature suhu
if(isset($_GET['temperature']))
{
	shell_exec("echo cape-bone-iio > /sys/devices/bone_capemgr.8/slots");
	$coba = "echo cape-bone-iio > /sys/devices/bone_capemgr.*/slots";
	
	//echo "<script>
	//   alert('Sensor Telah Aktif');
	//   location.href='monitoring_control_suhu.php';
	//  </script>";//diarahkan ke alamat
}	
?>