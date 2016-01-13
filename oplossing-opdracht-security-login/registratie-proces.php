<?php 
	session_start();

	$_SESSION[ "registrationData" ][ "e-mail" ] = $_POST[ "e-mail" ];

	function generatePassword () 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLength = strlen( $characters );
		$length = 8;
		$randomPassword;
		for ( $i = 0; $i < $length; $i++ ) {
			$randomPassword .= $characters[ rand( 0, $charLength - 1 ) ];
		}

		$_SESSION[ "registrationData" ][ "password" ] = $randomPassword;
	}

	function checkForm () 
	{
		$_SESSION[ "registrationData" ][ "password" ] = $_POST[ "password" ];
		$password = $_POST[ "password" ];
		$email = $_POST[ "e-mail" ];

		if ( filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
		{
			$_SESSION[ "notification" ][ "errorEmail" ] = true;
		}
		else 
		{
			$_SESSION[ "notification" ][ "errorEmail" ] = false;
			$_SESSION[ "notification" ][ "errorEmailMessage" ] = "Het opgegeven e-mailadres is niet geldig!";
		}


		if ( $_SESSION[ "notification" ][ "errorEmail" ] == true ) {
			try {
				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
				$queryString = 'select email from users where email = ' . $email;
				//$queryString->bindValue( 1, $email);

				$statement = $db->prepare( $queryString );
				$statement->execute();

				if ( $statement->rowCount() > 0 ) 
				{
					//E-mail does exist
					$_SESSION[ "registrationData" ][ "checkEmailExists" ] = false;
				}
				else {
					//E-mail doesn't exists
					if ( $_SESSION[ "registrationData" ][ "password" ] == "" ) 
					{
						$checkPassword = false;
						$_SESSION[ "notification" ][ "errorPassword" ] = $checkPassword;
						$_SESSION[ "notification" ][ "errorPasswordMessage" ] = "Geen paswoord ingevuld!";
					}
					else 
					{
						$_SESSION[ "registrationData" ][ "checkEmailExists" ] = true;
						$salt = uniqid(mt_rand(), true);
						$password .= $salt;
						$hashedPassword = hash("SHA512", $password);

						try 
						{
							$sql = 'insert into users ( email, hashed_password, last_login_time, salt ) values ( :email, :hashed_password, now(), :salt )';

							$statement2 = $db->prepare($sql);
							$statement2->bindValue(":email", $email);
							$statement2->bindValue(":hashed_password", $hashedPassword);
							$statement2->bindValue(":salt", $salt);
							$statement2->execute();

							$cookieValue = $email . ',' . hash('SHA512', $email) . $salt;

							setcookie('login', $cookieValue, time() + (86400 * 30));
							header( 'location: dashboard.php' );
						}

						catch ( PDOException $e ) 
						{
							$messageContainer = "Er liep iets mis: " . $e->getMessage();
						}
					}
				}
			}

			catch ( PDOException $e ) {
				$messageContainer = "Er liep iets mis: " . $e->getMessage();
			}
		}
	}

	if( isset( $_POST[ "submit-generate" ] ) ) 
	{
		generatePassword();
	}

	if( isset( $_POST[ "submit-register" ] ) ) 
	{
		checkForm();
	}

	header("location: registratie-form.php");
 ?>