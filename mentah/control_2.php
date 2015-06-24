<?php

$user = shell_exec("whoami");



//aktifkan LED dan GPIO
if (isset($_GET['led']) && isset($_GET['onOff']))
{
	$led = $_GET['led'];
	$onOff = $_GET['onOff'];
	
	if($onOff == 1)
	{
		shell_exec("echo $led > /sys/class/gpio/export");
		shell_exec("echo out > /sys/class/gpio/gpio$led/direction");
		$status = "GPIO $led telah aktif";
	}else{
		shell_exec("echo $led > /sys/class/gpio/unexport");
	}
		
	
	//exec( "/www/cgi-bin/ledctl $led $onOff" );
	
}
?>
<!-- --------------------------------MENGAKTIFKAN LED CONTROL----------------------------- -->

<div style="align:center;width: 220px;height:100px; margin: 0px auto;">
	<div style="width: 100px; float: left;">
		<p>LED #44:</p>
		<button type="button" 
onclick="location.href='control_2.php?led=44&onOff=1'">ON</button>
		<button type="button" 
onclick="location.href='control_2.php?led=44&onOff=0'">OFF</button>
	</div>
	<div style="width: 100px;margin-left:10px;float:left;">
		<p>LED #46:</p>
		<button type="button" 
onclick="location.href='control_2.php?led=45&onOff=1'">ON</button>
		<button type="button" 
onclick="location.href='control_2.php?led=45&onOff=0'">OFF</button>
	</div>
</div>
<br>
<div>
	<center><?php echo $status; ?></center>
</div>