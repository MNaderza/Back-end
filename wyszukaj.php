<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<a href="index.php">Powrót do strony głównej</a></br></br>

	<input id="szukaj" type="text">
	
	<form method="post" action="check_w.php">
	<div id="wyniki"></div>
	<input type="submit" value="wybierz zaznaczone">
	</form>


<script>
	$("#szukaj").on("input", function(){
		$co_szukac = $("#szukaj").val();
		$.get("wyszukaj_biz.php",{"szukane":$co_szukac},function($data){
			$("#wyniki").html($data);
		})
	});
</script>
</body>
</html>