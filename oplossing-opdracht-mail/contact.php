<?php

	session_start();
	session_unset();

	$admin = "verschueren@live.nl";
	$email = "";
	$message = "";

	if ( !empty($_POST[ "email" ]) && !empty($_POST[ "message" ]) ) {
		$_SESSION[ "post" ] = $_POST;
		$email = $_POST[ "email" ];
		$message = $_POST[ "message" ];

		if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			//E-mail not valid
			$_SESSION[ "error" ][ "message" ] = "Dit e-mailadres is niet geldig!";
		}
		else {
			//E-mail is valid
			$date = date("Y-m-d/H:i:s");

			try {
				$db = new PDO('mysql:host=localhost;dbname=contact_messages', 'root', '');

				$sql = 'insert into contact_messages ( email, message, time_sent ) values ( :email, :message, :time_sent )';
						
				$statement = $db->prepare($sql);
				$statement->bindValue( ":email", $email );
				$statement->bindValue( ":message", $message );
				$statement->bindValue( ":time_sent", $date );
				$statement->execute();

				if ( isset($_POST[ "checkbox" ]) ) {
					$arr = explode(' ', $message);
					$subject = $arr[0] . " " . $arr[1];
					$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$mailMessage = '<html><body><p>';
					$mailMessage .= $message;
					$mailMessage .= '</p></body></html>';

					$result = mail($admin, $subject, $mailMessage, $headers);
					
					if ( $result ) {
						$_SESSION[ "success" ][ "message" ] = "E-mail has been sent!";
						unset($_SESSION[ "post" ]);
					}
					else {
						$_SESSION[ "error" ][ "message" ] = "Something went wrong! E-mail has not been sent.";
					}
				}
			}
			catch (PDOException $e) {
				$_SESSION[ "error" ][ "message" ] = $e->getMessage();
			}
		}
	}
	else {
		$_SESSION[ "error" ][ "message" ] = "Geen e-mailadres of boodschap";
	}



	header("location: contact-form.php");

?>