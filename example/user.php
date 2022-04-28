<?php

	session_start();
	
	if (!isset($_SESSION['zalogowano'])){
	
	header('Location: index.php');
	exit();
	}

	echo "Witaj ".$_SESSION['user'].", Twój adres email to: ".$_SESSION['email'].'</br></br>';
	
?>
<a href="changeEmail.php">Zmiana adresu email?</a></br>

<a href="newPassword.php">Zmiana hasła</a></br>

<a href="logout.php">Wyloguj się</a></br></br>

