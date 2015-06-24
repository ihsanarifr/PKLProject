<?php

  $dbConn = mysql_connect('localhost', 'root', 'root') 
  or die("database error!!");
  mysql_select_db('monitoring_control_suhu') 
  or die("Database name not available !!");
 
  $resultSet = mysql_query("SELECT * FROM data_chart ORDER BY id DESC LIMIT 10", $dbConn);
  $rowCount = mysql_num_rows($resultSet) or die (mysql_error());
 
  $xmlData = "<graph caption='Dynamic Chart Using AJAX Technique'
  yAxisMinValue='0' 
  yAxisMaxValue='100' animation='0' 
  canvasBorderColor='FFFFFF' xAxisName='Value 1' yAxisName='Value 2'
  showNames='1' decimalPrecision='0' 
  formatNumberScale='0'>";
 
  $index = $rowCount - 1;
  for ($i=0;$i<$rowCount;$i++) {
  	$value1 = mysql_result($resultSet, $index, "id");
  	$value2 = mysql_result($resultSet, $index, "value2");
  	$xmlData .= "<set name='" . $value1 . "' value='" . $value2 . "' 
	color='000000' />";
  	$index--;
  }
    $xmlData .= "</graph>";
 
  //mysql_query("INSERT INTO data_chart (value1, value2) VALUES (" . rand() . 
  //", " . rand() . ")", $dbConn);
 
  echo $xmlData;
?>
