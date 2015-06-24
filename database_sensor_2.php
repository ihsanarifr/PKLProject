<div style="height: 400px;overflow-y: scroll; "><table class="table table-striped">
	<th>Waktu</th>
	<th>Celcius</th>
	<th>Fahrenheit</th>
	<?php 
	include 'koneksi.php';
	//include 'function_data_sensor.php';
	koneksi();
	$hasil = mysql_query("select * from data_sensor_2 ORDER BY no DESC");
	while($row = mysql_fetch_array($hasil)){
?>
	<tr>
		<td height="20"><?php echo $row[1]?></td>
		<td><?php echo $row[2]?>&deg</td>
		<td><?php echo $row[3]?>&deg</td>
	</tr>
	<?php 
	} // akhir while
	?>
</table>
</div>