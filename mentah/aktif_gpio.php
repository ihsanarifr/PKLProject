<?php
extract($_GET);

if (isset($_GET['led']) && isset($_GET['onOff']))
{
	$led = $_GET['led'];
	$onOff = $_GET['onOff'];
	
	shell_exec("echo $onOff > /sys/class/gpio/gpio$led/value");
	
	if($onOff == 1)
	{
		echo "<script>
	   location.href='control.php';
	  </script>";//diarahkan ke alamat
	}else{
		echo "<script>
		location.href='control.php';
		</script>";//diarahkan ke alamat
	}
}
?>