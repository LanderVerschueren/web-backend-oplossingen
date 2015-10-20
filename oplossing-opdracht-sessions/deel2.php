<?php 
	session_start();

	if( isset( $_POST['submit'] ) ) {
		$_SESSION[ 'registrationData' ][ 'deel1' ][ 'email' ] = $_POST[ 'email' ];
		$_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname' ] = $_POST[ 'nickname' ];
	}

	$registrationData[ 'deel1' ] = $_SESSION[ 'registrationData' ][ 'deel1' ];

	$straat = ( isset($_SESSION[ 'registrationData' ][ 'deel2' ][ 'straat' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'straat' ] : '';
	$nummer = ( isset($_SESSION[ 'registrationData' ][ 'deel2' ][ 'nummer' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'nummer' ] : '';
	$gemeente = ( isset($_SESSION[ 'registrationData' ][ 'deel2' ][ 'gemeente' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'gemeente' ] : '';
	$postcode = ( isset($_SESSION[ 'registrationData' ][ 'deel2' ][ 'postcode' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'postcode' ] : '';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <form action="deel3.php" method="POST">
        	<label>E-mail: <?= $registrationData[ 'deel1' ][ 'email' ]?></label><br>
        	<label>Nickname: <?= $registrationData[ 'deel1' ][ 'nickname' ]?></label><br>

        	<label for="straat">straat</label><br>
        	<input type="text" name="straat" id="straat" value="<?= $straat ?>"><br>
        	<label for="nummer">nummer</label><br>
        	<input type="text" name="nummer" id="nummer" value="<?= $nummer ?>"><br>

        	<label for="gemeente">gemeente</label><br>
        	<input type="text" name="gemeente" id="gemeente" value="<?= $gemeente ?>"><br>
        	<label for="postcode">postcode</label><br>
        	<input type="text" name="postcode" id="postcode" value="<?= $postcode ?>"><br>
        	<input type="submit" name="submit" value="Volgende">
        </form>
    </body>
</html>