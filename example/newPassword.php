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
	
	<title>Zmiana hasła</title>
</head>

<body>

<h2>Zmień hasło</h2>

<form method="post" action="changePassword.php">
Nowe hasło: <input type="password" name="passNew1"></br></br>
Powtórz nowe hasło: <input type="password" name="passNew2"></br></br>
<input type="submit" value="Zmiana hasła"></br></br>
</form>

<a href="user.php">Rozmyślam się</a></br></br>

</body>
</html>