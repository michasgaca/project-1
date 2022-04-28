<?php

	require_once('Control.php');

	session_start();
	
	if (!isset($_SESSION['zalogowano'])){
	
	header('Location: index.php');
	exit();
	}
	
	$user = new Control();
	
	$user->changePass($_POST['passNew1'], $_POST['passNew2']);

?>

<a href="user.php">Wróć</a></br></br>