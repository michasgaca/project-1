<?php

	session_start();
	
	if (!isset($_SESSION['zalogowano'])){
	
	header('Location: index.php');
	exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
</head>

<body>

Podaj nowy email<br><br>
<form method="post" action="newEmail.php">
<input type="text" name="email"><br><br>
<input type="submit" value="Zamień email"><br><br>

</form>

<a href="user.php">Rozmyślam się</a></br></br>

</body>
</html>