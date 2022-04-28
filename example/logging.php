<?php

require_once('Control.php');

session_start();

if (empty($_POST['user']) || (empty($_POST['pass']))) {
	
	echo "Podaj login lub hasło".'</br></br>';
?>

	<a href="index.php">Wróć na strone logowania</a></br>
	
<?php
	exit();
}

	$user = new Control();
	
	$user->logging($_POST['user'], $_POST['pass']);

?>