<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Rejestracja</title>
</head>

<body>

<h2>Zarejestruj się</h2>

<form method="post" action="registerNew.php">
Adres poczty elektronicznej <input type="text" name="email"></br>
Nazwa użytkownika <input type="text" name="user"></br>
Hasło <input type="password" name="pass1"></br>
Powtórz hasło <input type="password" name="pass2"></br>
<input type="submit" value="Rejestracja"></br>
</form>

<a href="user.php">Wróć</a></br></br>

</body>
</html>