<?php

	session_start();

	$admin = "verschueren@live.nl";
	$email = "";
	$message = "";
	
	if ( isset($_SERVER[ "HTTP_X_REQUESTED_WITH" ]) && strtolower( $_SERVER[ "HTTP_X_REQUESTED_WITH" ] ) == "xmlhttprequest" ) {
		if ( !empty($_POST[ "email" ]) && !empty($_POST[ "message" ]) ) {
			$_SESSION[ "post" ] = $_POST;
			$email = $_POST[ "email" ];
			$message = $_POST[ "message" ];

			if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
				//E-mail not valid
				$ajaxMessage[ 'type' ] = 'error';

				echo json_encode( $ajaxMessage );
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
							$ajaxMessage[ "type" ] = "success";

							unset($_SESSION[ "post" ]);
							echo json_encode( $ajaxMessage );
						}
						else {
							$ajaxMessage[ 'type' ] = 'error';

							echo json_encode( $ajaxMessage );
						}	
					}
					else {
						$ajaxMessage[ "type" ] = "success";
						
						unset($_SESSION[ 'post' ]);
						echo json_encode( $ajaxMessage );
					}
				}
				catch (PDOException $e) {
					$ajaxMessage[ 'type' ] = 'error';

					echo json_encode( $ajaxMessage );
				}
			}
		}
		else {
			$ajaxMessage[ 'type' ] = 'error';

			echo json_encode( $ajaxMessage );
		}
	}
	else {
		$ajaxMessage[ 'type' ] = 'error';

		echo json_encode( $ajaxMessage );
	}

?>
