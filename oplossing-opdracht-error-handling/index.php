<?php

	session_start();

	try 
	{
		if( isset( $_POST[ 'submit' ] ) ) 
		{
			if( isset( $_POST[ 'korting' ] ) ) 
			{
				if( strlen( $_POST[ 'korting' ] ) !== 8 ) 
				{
					throw new exception( 'VALIDATION_CODE_LENGHT' );
				}
			}
			else 
			{
				throw new exception( 'SUBMIT-ERROR' );	
			}
		}
	}

	catch( Exception $e ) 
	{
		$messageCode;
		$message = array();
		$createMessage = false;

		switch ( $e->getMessage() ) {
			case 'SUBMIT-ERROR':
				$message[ 'type' ] = 'error';
				$message[ 'text' ] = 'Er werd met het formulier geknoeid';
				
				$createMessage = true;

				break;

			case 'VALIDATION_CODE_LENGHT':
				$message[ 'type' ] = 'error';
				$message[ 'text' ] = 'De kortingscode is korter of langer dan 8 karakters';
				
				$createMessage = true;

				break;
		}

		if( $createMessage ) 
		{
			createMessage( $message );
		}

		logToFile( $message );
	}

	function logToFile( $messageToFile ) 
	{
		$hourDate = "[" . date("G:i:s d/m/Y") . "]";
		$ip = $_SERVER[ 'REMOTE_ADDR' ];
		$messageType = $messageToFile[ 'type' ];
		$messageText = $messageToFile[ 'text' ];

		$messageEnd = $hourDate . " - " . $ip . " - type:[" . $messageType . "] " . $messageText . "\n\r";

		file_put_contents( 'log.txt', $messageEnd );
	}

	function createMessage( $message ) 
	{
		$_SESSION[ 'message' ] = $message;
	}
?>

<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="POST">
		<h2>Geef uw kortingscode op</h2>



		<p>Kortingscode</p>
		<input type="text" name="korting" id="korting">
		<input type="submit" name="submit" value="Verzenden">
	</form>
</body>
</html>