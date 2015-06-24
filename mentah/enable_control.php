<?php
extract($_GET);

if($_GET['aktif']== 1)
{	
	shell_exec("echo 44 > /sys/class/gpio/export");
	shell_exec("echo out > /sys/class/gpio/gpio44/direction");
	
	shell_exec("echo 45 > /sys/class/gpio/export");
	shell_exec("echo out > /sys/class/gpio/gpio45/direction");
	
	echo "<script>
	   alert('Data Sensor Diaktifkan');
	   location.href='control.php';
	  </script>";//diarahkan ke alamat
}else{
	shell_exec("echo 44 > /sys/class/gpio/unexport");
	shell_exec("echo 45 > /sys/class/gpio/unexport");
	
	echo "<script>
	   alert('Data Sensor Disable');
	   location.href='control.php';
	  </script>";//diarahkan ke alamat
}
?>