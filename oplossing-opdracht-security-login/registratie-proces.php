<?php 
	session_start();

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
		$email = $_POST[ "e-mail" ];
		if ( filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
		{
			$_SESSION[ "notification" ][ "errorEmail" ] = true;
		}
		else 
		{
			$_SESSION[ "notification" ][ "errorEmail" ] = false;
		}


		if ( $_SESSION[ "notification" ][ "errorEmail" ] == true ) {
			try {
				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
				$queryString = 'SELECT email from users where email = ' . $email;
				//$queryString->bindValue( 1, $email);
				$statement = $db->prepare( $queryString );
				$statement->execute();

				$row = $statement->fetch(PDO::FETCH_ASSOC);

				if ( $row ) 
				{
					//E-mail does exist
					$_SESSION[ "registrationData" ][ "checkEmailExists" ] = false;
				}
				else {
					//E-mail doesn't exists
					$_SESSION[ "registrationData" ][ "checkEmailExists" ] = true;
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

	$_SESSION[ "registrationData" ][ "e-mail" ] = $_POST[ "e-mail" ];

	header("location: registratie-form.php");
 ?>