<?php

$user = shell_exec("whoami");



//aktifkan LED dan GPIO
if (isset($_GET['led']) && isset($_GET['onOff']))
{
	$led = $_GET['led'];
	$onOff = $_GET['onOff'];
	$aktif = $_GET['aktif'];
	
	
		//jika menekan tombol 1 lagi
		$ulang = shell_exec("cat /sys/class/gpio/gpio$led/value");
		
		if($ulang == $onOff)
		{
			$status = "GPIO jangan diaktifkan berulang-ulang";
		}else{
			
			shell_exec("echo $onOff > /sys/class/gpio/gpio$led/value");
			if ($onOff == 1) {
				$status = "GPIO $led  telah Aktif";
			}else{
				$status = "GPIO $led tidak aktif";
			}
			
			
		}
		
	
	//exec( "/www/cgi-bin/ledctl $led $onOff" );
	
}
?>
<!-- --------------------------------MENGAKTIFKAN LED CONTROL----------------------------- -->
<center>
<table>
	<tr>
		<td><button type="button" onclick="location.href='enable_control.php?aktif=1'">ENABLE</button>
		<td><button type="button" onclick="location.href='enable_control.php?aktif=0'">DISABLE</button>
	</tr>
</table>
</center>
<div style="align:center;width: 220px;height:100px; margin: 0px auto;">
	<div style="width: 100px; float: left;">
		<p>LED #44:</p>
		<button type="button" 
onclick="location.href='control.php?led=44&onOff=1'">ON</button>
		<button type="button" 
onclick="location.href='control.php?led=44&onOff=0'">OFF</button>
	</div>
	<div style="width: 100px;margin-left:10px;float:left;">
		<p>LED #46:</p>
		<button type="button" 
onclick="location.href='control.php?led=45&onOff=1'">ON</button>
		<button type="button" 
onclick="location.href='control.php?led=45&onOff=0'">OFF</button>
	</div>
</div>
<br>
<div>
	<?php echo $status; ?>
</div>