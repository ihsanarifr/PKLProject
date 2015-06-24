<html>
<head>
<title>Auto Refresh DIV</title>
<meta name="description" content="Auto refresh the content of DIV after every 10 seconds or with any time.This Concept is used by many sites on web.">
<meta name="keywords" content="jquery,css,auto refresh,programming tutorials, refresh div jquery,jquery div refresh">
<meta charset="UTF-8">


 <!-- <script type="text/javascript">
 var i=0;
 while (i<=100)
 {
    var auto_refresh = setInterval(
    function ()
    $('#load').fadeOut('slow',$(this).load('auto_reload.php #load', 
       function(){
          $(this).fadeIn("slow");
       })
    )
    }, 3000);
    i++;
 }
    </script>
-->


<style>
#toberefresh
{
	width:700px;
	height:300px;
	border:1px solid black;
	margin-left:300px;
	margin-top:150px;
	position:absolute;
}
#title
{
	width:700px;
	height:120px;
	border:1px solid black;
	margin-left:300px;
	position:absolute;
}
p
{
	font-size:18px;
	padding-top:100px;
	padding-left:85px;
}
#goback
{
font-size:20px;
color:red;
}
</style>
</head>
<body>
<div class = "well" id="load">
  <center><h3><i class="icon-bar-chart"></i> Mt.Gox</h3></center>
  <center><h3>&#579;1 = <?php $file = file_get_contents('text.txt'); 
  								echo $file;?> USD</h3></center>
<hr>
  <center><h3><i class="icon-bar-chart"></i> BTC-e</h3></center>
  <center><h3>&#579;1 = <?php echo "arif"; ?> USD</h3></center>
</div>
</body>
</html>