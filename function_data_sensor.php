<?php
function temperature1(){
	//echo exec("/www/cgi-bin/sensor1");
	$temperature = shell_exec("python python/sensor1.py");
	//$millivolt = ($mentah_suhu/4096.0) * 1800;
	//$temperature = ($millivolt /  10.0);
	echo number_format($temperature,1);
	//echo $mentah_suhu;*/z
	//echo "145.0";
}

function temperature2(){
	//echo exec("/www/cgi-bin/sensor2");
	//$mentah_suhu2 = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage3_raw");
	$temperature = shell_exec("python python/sensor2.py");
	//$milivolt2 = ($mentah_suhu2/4096.0) * 1800;
	//$temperature2 = ($milivolt2 / 10.0);
	echo number_format($temperature,1);
	//echo $mentah_suhu2;*/
	//echo "120.0";
}

function fahrenheit1(){
	//echo exec("/www/cgi-bin/sensor1");
	//$mentah_suhu = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage1_raw");
	$temperature = shell_exec("python python/sensor1_fahrenheit.py");
	//$millivolt = ($mentah_suhu/4096.0) * 1800;
	//$temperature = ($millivolt /  10.0);
	//$fahrenheit = ($temperature * 9/5)+32;
	echo number_format($temperature,1);
	//echo number_format($temperature,1);
	//echo $mentah_suhu;*/z
	//echo 45.0;
}

function fahrenheit2(){
	//echo exec("/www/cgi-bin/sensor1");
	//$mentah_suhu = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage1_raw");
	$temperature = shell_exec("python python/sensor2_fahrenheit.py");
	//$millivolt = ($mentah_suhu/4096.0) * 1800;
	//$temperature = ($millivolt /  10.0);
	//$fahrenheit = ($temperature * 9/5) + 32;
	echo number_format($temperature,1);
	//echo number_format($temperature,1);
	//echo $mentah_suhu;*/z
	//echo 45.0;
}