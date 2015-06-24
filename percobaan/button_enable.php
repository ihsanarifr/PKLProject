<html>
<head>
<title>Button enable</title>
<script src="jquery-1.7.1.js"></script>
<script type="text/javascript">
$(document).on('click','input[type=button]', function() {
    buttonVal = $(this).val();
switch (buttonVal)
{
  case 'Enable': 
	  	$(this).prop("disabled", true);
		$('#disable,#gpio_44_on,#gpio_45_on,#gpio_44_off,#gpio_45_off').prop("disabled", false);
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
<input type="button" value="Enable" id="enable" name="enable">
<input type="button" value="Disable" id="disable" name="disable" Button" disabled="disabled"><br><br>
<input type="button" value="ON_44" id="gpio_44_on" name="gpio_44_on" disabled="disabled">
<input type="button" value="OFF_44" id="gpio_44_off" name="gpio_44_off" disabled="disabled">
<input type="button" value="ON_45" id="gpio_45_on" name="gpio_45_on" disabled="disabled">
<input type="button" value="OFF_45" id="gpio_45_off" name="gpio_45_off" disabled="disabled">
</body>
</html>