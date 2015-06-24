<html>
<head>
<title>BeagleBone Temperature</title>
<style type="text/css">
	p { display: table-cell; }
	button { width: 75px; margin: 2px auto; }
</style>
</head>
<body>
<?php
	echo exec("/www/cgi-bin/lm35");
	/*$mentah_suhu = shell_exec("cat /sys/bus/iio/devices/iio:device0/in_voltage1_raw");
	$millivolt = ($mentah_suhu/4096.0) * 1800;
	$temperature = ($millivolt /  10.0);
	echo number_format($temperature,1);
	echo $temperate;*/
?>
</body>
</html>
