<?php 
include 'koneksi.php';
koneksi();

extract($_POST);

$sql = "Update suhu set
		suhu = '".$suhu."'
		where id ='".$id."'";

mysql_query($sql);
echo "<script>
		alert('Has been Updated');
		location.href='automation_control.php';
		</script>";
	
	
?>
?>