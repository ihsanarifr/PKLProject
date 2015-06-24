<?php
function temperature1(){
	//echo exec("/www/cgi-bin/sensor1");
	$mentah_suhu = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage1_raw");
	$millivolt = ($mentah_suhu/4096.0) * 1800;
	$temperature = ($millivolt /  10.0);
	echo number_format($temperature,1);
	//echo $mentah_suhu;*/z
}
temperature1();
?>