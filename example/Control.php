<?php

require_once('Database.php');

class Control {
	
	private Database $con;
	
	public function __construct() {
		
		$database = new Database();
		$this->con = $database;
	}

	public function logging($login, $password) {
		
		$user = filter_input(INPUT_POST, 'user'); 					
		$password = filter_input(INPUT_POST, 'pass');
		
		$sql = 'select password, email from users where user = :login';

		$query = $this->con->runQuery($sql);
		$query->bindValue(':login', $user, PDO::PARAM_STR);
		$query->execute();
			
		$tab = $query->fetch();
			
			$password2 = sha1("$password");
			
			if (hash_equals($password2, $tab['password']) == true) {	

				$_SESSION['zalogowano'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['email'] = $tab['email']; 
				
				if ($user == 'admin') {
					
					header('Location: admin.php');
				}
				
				else {
					
				header('Location: user.php');
				}
			}
			
			else {
				
				echo "Błąd loginu lub hasła".'</br></br>'; 
?>			
				<a href="index.php">Wróć na strone logowania</a></br>
<?php
			}
	}
	
	public function changePass($password1, $password2) {
		
		if (empty($_POST['passNew1']) || (empty($_POST['passNew2']))){
		
			$_SESSION['zmianaHasla'] = false;
		
			echo "Podaj wszystkie dane".'</br></br>';
		}
	
		else {
	
				$passNew1 = $_POST['passNew1'];
				$passNew2 = $_POST['passNew2'];
		
		if ($passNew1 != $passNew2) {
			
				echo "hasła nie pasują".'<br>';
		}
		
		else {
			
				$sql = 'update users set password = :haslo where user = :login';

				$query = $this->con->runQuery($sql);
				$query->bindValue(':haslo', sha1("$passNew1"), PDO::PARAM_STR);
				$query->bindValue(':login', $_SESSION['user'], PDO::PARAM_STR);
				$query->execute();
		
				echo "Hasło zmienione".'<br>';		
		}
	}
		echo "</br></br>";
	}
	
	public function newEmail($newEmail) {
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		$user = $_SESSION['user'];
	
		if (empty($email) || (filter_var($emailB, FILTER_VALIDATE_EMAIL) == false)) {
		
			echo "Podaj poprawny adres email".'<br>';
	
?>
		<a href="changeEmail.php">Wróć do zmiany email</a></br>
<?php

	}
		else {
		
		$sql1 = 'update users set email = :email where user = :user';
		$query1 = $this->con->runQuery($sql1);
		$query1->bindValue(':email', $emailB, PDO::PARAM_STR);
		$query1->bindValue(':user', $user, PDO::PARAM_STR);
		$query1->execute();
		
		$sql2 = 'select email from users where user = :user';
		$query2 = $this->con->runQuery($sql2);
		$query2->bindValue(':user', $user, PDO::PARAM_STR);
		$query2->execute();
		
		$tab = $query2->fetch();
		$_SESSION['email'] = $tab['email'];
		
		echo "Adres zmieniony".'<br>';

	}			
	}
	
	public function register($temp1, $temp2, $temp3, $temp4) {
		
		if (empty($_POST['email']) || empty($_POST['user']) || empty($_POST['pass1']) || empty($_POST['pass2'])) {
		
			$wszystko_ok = false;	
			echo "Nie podałeś wszystkich danych".'<br><br>';		
		}
	
		else {
			$email = $_POST['email'];
			$user = $_POST['user'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			$wszystko_ok = true;
		
		if ((filter_var($emailB, FILTER_SANITIZE_EMAIL) == false) || ($emailB != $email)) {
		
			$wszystko_ok = false;
			echo "Podaj poprawny adres email".'<br><br>';
		}
	
		if((strlen($user) < 3) || (strlen($user) > 20)){
		
			$wszystko_ok = false;
			echo "Nick musi posiadać od 3 do 20 znaków".'<br><br>';
		}
	
		if (ctype_alnum($user) == false){
		
			$wszystko_ok = false;
			echo "Tylko polskie znaki".'<br><br>';
		}
	
		if ((strlen($pass1) < 5) || (strlen($pass1) > 20)){
		
			$wszystko_ok = false;
			echo "Hasło musi posiadać od 5 do 20 znaków".'<br><br>';
		}
	
		if ($pass1 != $pass2){
		
			$wszystko_ok = false;
			echo "Hasła muszą być identyczne".'<br><br>';
		}
		
		$password = sha1("$pass1");
		
		$sql1 = 'select user from users where user = :user';
		$query1 = $this->con->runQuery($sql1);
		$query1->bindValue(':user', $user, PDO::PARAM_STR);
		$query1->execute();
		
		$result1 = $query1->rowCount();

		if ($result1 > 0) {
			
			echo "Uzytkownik o takim loginie istnieje".'<br>';
			$wszystko_ok = false;
		} 	
		
		$sql2 = 'select email from users where email = :email';
		$query2 = $this->con->runQuery($sql2);
		$query2->bindValue(':email', $emailB, PDO::PARAM_STR);
		$query2->execute();
		
		$result2 = $query2->rowCount();

		if ($result2 > 0) {
			
			echo "Uzytkownik o takim email istnieje".'<br>';
			$wszystko_ok = false;
		} 
		
		if ($wszystko_ok == true) {
			
			$sql3 = 'insert into users values (NULL, :user, :pass, :email)';
			$query3 = $this->con->runQuery($sql3);
			$query3->bindValue(':user', $user, PDO::PARAM_STR);
			$query3->bindValue(':pass', $password, PDO::PARAM_STR);
			$query3->bindValue(':email', $emailB, PDO::PARAM_STR);
			$query3->execute();
		
			echo "Uzytkownik dodany do bazy".'<br>';
		}
		}
	}
}

?>