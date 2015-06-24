<html>
<title>Control Fan</title>
<head>

<script src="jquery-1.7.1.js"></script>
<script type="text/javascript">
$(document).on('click','input[type=button]', function() {
    buttonVal = $(this).val();
switch (buttonVal)
{
  case 'Enable': 
	  	$(this).prop("disabled", true);
		$('#disable,#gpio_44_on,#gpio_45_on,#gpio_44_off,#gpio_45_off').prop("disabled", false);
		<?php 
		shell_exec("echo 44 > /sys/class/gpio/export");
		shell_exec("echo out > /sys/class/gpio/gpio44/direction");
		
		shell_exec("echo 45 > /sys/class/gpio/export");
		shell_exec("echo out > /sys/class/gpio/gpio45/direction");
		?>
        break;
  case 'Disable':
  		$(this).prop("disabled", true);
		$('#disable,#gpio_44_on,#gpio_44_off,#gpio_45_on,#gpio_45_off').prop("disabled", true);
		$('#enable').prop("disabled", false);
  		break;
}
});
</script>

</head>

<body>
<?php
$user = shell_exec("whoami");

//aktifkan LED dan GPIO
//exec( "/www/cgi-bin/ledctl $led $onOff" );

if(isset($_GET['aktif']))
{	
	shell_exec("echo 44 > /sys/class/gpio/export");
	shell_exec("echo out > /sys/class/gpio/gpio44/direction");
	
	shell_exec("echo 45 > /sys/class/gpio/export");
	shell_exec("echo out > /sys/class/gpio/gpio45/direction");
}else{
	shell_exec("echo 44 > /sys/class/gpio/unexport");
	shell_exec("echo 45 > /sys/class/gpio/unexport");
}
?>
<!-- --------------------------------MENGAKTIFKAN LED CONTROL----------------------------- -->
<center>
<table>
	<tr>
		<td><input type="button" value="Enable" id="enable" name="enable">
		<td><input type="button" value="Disable" id="disable" name="disable" Button" disabled="disabled">
	</tr>
</table>
</center>
<div style="align:center;width: 220px;height:100px; margin: 0px auto;">
	<div style="width: 100px; float: left;">
		<p>LED #44:</p>
		<input type="button" value="ON_44" id="gpio_44_on" name="gpio_44_on" disabled="disabled" onclick="location.href='aktif_gpio.php?led=44&onOff=1'">
		<input type="button" value="OFF_44" id="gpio_44_off" name="gpio_44_off" disabled="disabled" onclick="location.href='aktif_gpio.php?led=44&onOff=0'">
	</div>
	<div style="width: 100px;margin-left:10px;float:left;">
		<p>LED #45:</p>
		<input type="button" value="ON_45" id="gpio_45_on" name="gpio_45_on" disabled="disabled" onclick="location.href='aktif_gpio.php?led=45&onOff=1'">
		<input type="button" value="OFF_45" id="gpio_45_off" name="gpio_45_off" disabled="disabled" onclick="location.href='aktif_gpio.php?led=45&onOff=0'">
	</div>
</div>
<br>
<div>
	<?php echo $status; ?>
</div>
</body>
</html>