<?php

	require_once('Control.php');

	session_start();
	
	if (!isset($_SESSION['zalogowano'])){
	
	header('Location: index.php');
	exit();
	}
	
	$user = new Control();
	
	$user->newEmail($_POST['email']);
?>
	<a href="user.php">Wróć</a></br>

	