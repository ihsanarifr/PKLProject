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
            },
            complete: function() {
                $('#content_sensor1').show();
            },
            success: function() {
                $('#content_sensor1').show();
            }
        });
        var $container1 = $("#content_sensor1");
        $container1.load("automation_control.php");
        var refreshId = setInterval(function()
        {
            $container1.load('automation_control.php');
        }, 2000);
    });
})(jQuery);
</script>
<!-- ------------------JAVA SCRIPT AUTO RELOAD TUTUP------------------------------ -->

<style type="text/css">
	p { display: table-cell; }
	button { width: 75px; margin: 2px auto; }
	
	#pengumpul{
	width: 450px;
	height: 200px;
	float:center;
	border-style: solid;
	}
	#wrapper{
	margin-left:10px;
	margin-right:10px;
	border-style:solid;
	border-width:1px;
	float:left; 
	width: 200;
	height: 200;
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
<br>
<div id="pengumpul">
	<div id="wrapper">
    	<div id="content_sensor1"></div>
	</div>
</div>
<br>
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
