<?php

session_start();

if ((isset($_SESSION['zalogowano'])) && $_SESSION['zalogowano'] == true) {
	
	header('Location: czlonek.php');
	exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Zadanie 1 - PHP</title>
</head>

<body>

<h2>Zadanie 1 - PHP</h2>

<a href="register.php">Jeszcze nie członek?</a></br></br>
Logowanie użytkowników:</br></br>
<form method="post" action="logging.php">
Nazwa użytkownika: <input type="text" name="user"></br></br>
Hasło <input type="password" name="pass"></br></br>
<input type="submit" value="Logowanie"></br></br>
</form>

</body>
</html>