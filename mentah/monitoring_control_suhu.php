<html>
<head>
<title>BeagleBone MONITORING SUHU</title>

<!-- ------------------JAVA SCRIPT AUTO RELOAD------------------------------ -->
<script src="jquery-latest.js"></script>
<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
            },
            complete: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
            },
            success: function() {
                $('#content_sensor1').show();
                $('#content_sensor2').show();
            }
        });
        var $container1 = $("#content_sensor1");
        var $container2 = $("#content_sensor2");
        $container1.load("data_suhu_sensor1.php");
        $container2.load("data_suhu_sensor2.php");
        var refreshId = setInterval(function()
        {
            $container1.load('data_suhu_sensor1.php');
            $container2.load('data_suhu_sensor2.php');
        }, 2000);
    });
})(jQuery);
</script>
<!-- ------------------JAVA SCRIPT AUTO RELOAD TUTUP------------------------------ -->

<style type="text/css">
	#pengumpul{
	width: 450px;
	height: 200px;
	float:center;
	border-style: solid;
	}
	#content_sensor1{
	margin-top: 20px;
	margin-bottom: auto;
	font-size: 60px;
	}
	#content_sensor2{
	margin-top: 20px;
	margin-bottom: auto;
	font-size: 60px;
	}
	#content_sensor_otomatis{
	margin-top: 20px;
	margin-bottom: auto;
	font-size: 60px;
	}
</style>
</head>
<body>
<center>
<h1>SISTEM KONTROL LED & MONITORING SUHU BERBASIS WEB</h1>
<br>
<br>
<table>
<tr>
	<td>MENGAKTIFKAN PORT SENSOR	: <button type="button" 
onclick="location.href='aktifkan_suhu.php?temperature=1'">ENABLE</button>
</tr>
</table>
<br>
<div id="pengumpul">
	<div id="wrapper">
    	<div id="content_sensor1"></div>
    		<!-- <img src="loading.gif" id="loading" alt="loading" style="display:none;" /> -->
	</div>
	<div id="wrapper">
		<div id="content_sensor2"></div>
	</div>
</div>
<br>
<h2>
<!--Temperature Suhu Ruangan TIDAK AUTO:<br>  -->
</h2>
<div id="content_sensor_otomatis"></div>
</div>
<br>
	<?php
		echo exec("whoami");
                echo "<br>";
		//echo $status;
		//echo "<br>";
		//echo $aktif;
		//echo "<br>";
		//cho $status_temperature;
		//echo $coba;
		//echo ("ihsan $aktif");
                //echo exec('pwd');
	?>
</div>
</center>
</body>
</html>
