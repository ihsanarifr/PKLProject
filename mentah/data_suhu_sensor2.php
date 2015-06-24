<?php
function temperature2(){
	//echo exec("/www/cgi-bin/sensor2");
	$mentah_suhu2 = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage3_raw");
	$milivolt2 = ($mentah_suhu2/4096.0) * 1800;
	$temperature2 = ($milivolt2 / 10.0);
	echo number_format($temperature2,1);
	//echo $mentah_suhu2;*/
}
temperature2();
?>