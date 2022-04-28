<?php

	require_once('Control.php');
	
	session_start();

	
	$user = new Control();
	
	$user->register($_POST['email'], $_POST['user'], $_POST['pass1'], $_POST['pass2']);

?>

<a href="register.php">Wróć do rejestracji</a><br><br>
<a href="index.php">Wróć do strony głównej</a><br><br>