<?php
	session_start();

	$email = "";
	$password = "";

	if ( isset($_POST) ) {
		$email = $_POST[ "email" ];
		$password = $_POST[ "password" ];
	}

	try {
		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
		$queryString = 'select * from users where email = "' . $email . '"';

		$statement = $db->prepare( $queryString );
		$statement->execute();

		if ( $statement->rowCount() < 1 ) {
			//E-mail doesn't exists!
			$_SESSION[ "notification" ] = "Je moet je eerst registreren alvorens je kan inloggen!";
			header("location: login-form.php");
			exit();
		}
		else {
			$fetch_assoc = array();

			while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
				$fetch_assoc[] = $row;
			}

			//E-mail does exist!
			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
			$queryString = 'select salt from users where email = "' . $email . '"';

			$statement = $db->prepare( $queryString );
			$statement->execute();

			$salt_from_db = "";

			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$salt_from_db = $row;

			$password .= $salt_from_db[ "salt" ];
			$hashedPassword = hash("SHA512", $password);

			$_SESSION[ "password_plus_hash" ] = $hashedPassword;
			$_SESSION[ "fetch_assoc" ] = $fetch_assoc[ 0 ][ "hashed_password" ];

			$passwordDb = $fetch_assoc[0][ "hashed_password" ];
			$cookieValue = $email . ',' . hash('SHA512', $email) . $salt_from_db[ "salt" ];

			if ( $hashedPassword == $passwordDb ) {
				setcookie('login', $cookieValue, time() + (86400 * 30));
				header( 'location: dashboard.php' );
				exit();
			}
			else {
				$_SESSION[ "notification" ] = "Verkeerd paswoord!";
				header("location: login-form.php");
				exit();
			}
		}
	}
	catch (PDOException $e) {
		$e->getMessage();
	}

?>