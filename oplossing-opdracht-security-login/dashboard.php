<?php 
	session_start();

	$controle = false;

	if ( !isset( $_COOKIE[ "login" ] ) ) {
		//Cookie is not set

		$_SESSION[ "notification" ][ "type" ] = "errorCookieNotSet";
		$_SESSION[ "notification" ][ "message" ] = "U moet eerst inloggen!";

		header( "location: registratie-form.php" );
		exit();
	}

	$cookieString = $_COOKIE[ "login" ];
	$cookieArray = [];
	$cookieArray = explode( ",", $cookieString );
	$email = $cookieArray[ 0 ];
	$hash = $cookieArray[ 1 ];

	try {
		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
		$queryString = 'select salt from users where email = "' . $email . '"';

		$statement = $db->prepare( $queryString );
		$statement->execute();

		$fetch_assoc = "";

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$fetch_assoc = $row;

		$hashedEmail = hash("SHA512", $email);
		$hashedEmail .= $fetch_assoc["salt"];

		if ( $hashedEmail == $hash ) {
			$controle = true;
		}
		else {
			header("location: registratie-form.php");
			exit();
		}
	}
	catch (PDOException $e) {
		$e->getMessage();
	}
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<pre><?php var_dump($controle) ?></pre>
	
	<?php if ($controle): ?>
		<h1>Dashboard</h1>
		<p><a href="logout.php">Uitloggen</a></p>
	<?php endif ?>

</body>
</html>