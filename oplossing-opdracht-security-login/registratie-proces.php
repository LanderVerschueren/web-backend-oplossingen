<?php
    session_start();
    session_unset();


    $_SESSION[ "post" ] = $_POST;

    if ( isset($_POST) ) {
    	$_SESSION[ "registration" ][ "email" ] = $_POST[ "email" ];
    	$_SESSION[ "registration" ][ "password" ] = $_POST[ "password" ];

    	$email = $_POST[ "email" ];
    	$password = $_POST[ "password" ];
    }

    if ( isset($_POST[ "submit-generate" ]) ) {
    	generatePassword();
    }

    function generatePassword() {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    for ($i = 0; $i < 10; $i++) {
	        $randPassword .= $characters[rand(0, $charactersLength - 1)];
	    }
	    
	    $_SESSION[ "registration" ][ "password" ] = $randPassword; 
	    header("location: registratie-form.php");
    }


    if ( isset($_POST[ "submit-register" ]) ) {
    	validateForm();
    }

    function validateForm() {
    	$email = $_POST[ "email" ];
    	$password = $_POST[ "password" ];

    	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    		//E-mail is not valid
    		$_SESSION[ "notification" ][ "type" ] = "errorEmail";
    		$_SESSION[ "notification" ][ "message" ] = "This e-mail is not valid or you already have an account";
    	}
    	else {
    		//E-mail is valid
    		//Check if password is not empty

    		if( $password == "" ) {
    			//No password
    			$_SESSION[ "notification" ][ "type" ] = "errorPassword";
    			$_SESSION[ "notification" ][ "message" ] = "No password!";
    		}
    		else {
    			//Password is OK!
    			try {
    				$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
					$queryString = 'select email from users where email = "' . $email . '"';

					$statement = $db->prepare( $queryString );
					$statement->execute();

					if ( $statement->rowCount() > 0 ) {
						//E-mail already exists!
						$_SESSION[ "notification" ][ "type" ] = "errorEmail";
    					$_SESSION[ "notification" ][ "message" ] = "This e-mail is not valid or you already have an account!";
					}
					else {
						//E-mail doesnt exist
						$salt = uniqid(mt_rand(), true);
						$password .= $salt;
						$hashedPassword = hash("SHA512", $password);

						$sql = 'insert into users ( email, hashed_password, last_login_time, salt ) values ( :email, :hashed_password, now(), :salt )';
						
						$statement2 = $db->prepare($sql);
						$statement2->bindValue(":email", $email);
						$statement2->bindValue(":hashed_password", $hashedPassword);
						$statement2->bindValue(":salt", $salt);
						$statement2->execute();

						$_SESSION[ "notification" ][ "type" ] = "success";
						$cookieValue = $email . ',' . hash('SHA512', $email) . $salt;
						
						setcookie('login', $cookieValue, time() + (86400 * 30));
						header( 'location: dashboard.php' );
						exit();
					}
    			}
    			catch ( PDOException $e ) {
    				$e->getMessage();
    			}
    		}
    	}
    	header("location: registratie-form.php");
    }
?>