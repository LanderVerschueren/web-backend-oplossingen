<?php
	session_start();

	$emailValid = true;
	$emailExist = false;

	$emailIsset = false;
	$email = "";

	$passwordIsset = false;
	$password = "";

	if( isset( $_SESSION[ "registrationData" ][ "e-mail" ] ) ) {
		$emailIsset = true;
		$email = $_SESSION[ "registrationData" ][ "e-mail" ];
	}

	if( isset( $_SESSION[ "registrationData" ][ "password" ] ) ) 
	{
		$passwordIsset = true;
		$password = $_SESSION[ "registrationData" ][ "password" ];
	}

	if ( isset( $_SESSION[ "notification" ][ "errorEmail" ] ) && $_SESSION[ "notification" ][ "errorEmail" ] == true ) {
		$emailValid = true;
	}

	if ( isset( $_SESSION[ "notification" ][ "errorEmail" ] ) && $_SESSION[ "notification" ][ "errorEmail" ] == false ) {
		$emailValid = false;
	}

	if ( isset($_SESSION[ "registrationData" ][ "checkEmailExists" ]) && $_SESSION[ "registrationData" ][ "checkEmailExists" ] == true ) 
	{
		$emailExist = true;
	}
?>


<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		#container {
			margin-left: 10px;
		}

		.emailError {
			background-color: red;
		}
	</style>
</head>
<body>
	<pre><?php var_dump($_SESSION) ?></pre>
	<pre><?php var_dump($emailValid) ?></pre>



	<div id="container">
		<?php if ( !$emailExist ): ?>
			<form action="registratie-proces.php" method="POST"> 
				<h1>Registreren</h1>
				<label for="e-mail">E-mail</label><br>
				<input type="text" name="e-mail" id="e-mail" <?php echo ( $emailIsset ) ? 'value="' . $email . '"' : '' ?> <?php echo ($emailValid) ? '' : 'class="emailError"' ?>><br>
				<label for="password">Paswoord</label><br>
				<input name="password" id="password" <?php echo ($passwordIsset) ? 'type="text" value="' . $password . '"' : 'type="password"' ?>>
						
				<input type="submit" name="submit-generate" id="submit" value="Genereer een paswoord"><br>
				<input type="submit" name="submit-register" id="submit" value="Registreer">
			</form>
		<?php endif ?>
		<?php if ( $emailExist ): ?>
			<h2>Gefeliciteerd, u bent geregistreerd!</h2>
		<?php endif ?>
	</div>
</body>
</html>