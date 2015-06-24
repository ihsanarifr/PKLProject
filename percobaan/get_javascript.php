<html>
<head>
</head>
<body>
    <input type="text" name="enter" class="enter" value="" id="lolz"/>
    <input type="button" value="click" OnClick="kk('aktif')"/>
    <script type="text/javascript">
       var lol = document.getElementById('lolz');
       function kk() {
           alert(lol.value);
       }
    </script>
</body>
</html>