<?php
    session_start();

	$registrationData[ 'deel1' ] = $_SESSION[ 'registrationData' ][ 'deel1' ];
	$registrationData[ 'deel2' ] = $_SESSION[ 'registrationData' ][ 'deel2' ];
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
        <label>E-mail: <?= $registrationData[ 'deel1' ][ 'email' ]?> | <a href="deel1.php">Wijzig</a></label><br>
        <label>Nickname: <?= $registrationData[ 'deel1' ][ 'nickname' ]?> | <a href="deel1.php">Wijzig</a></label><br>
        <label>Straat: <?= $registrationData[ 'deel2' ][ 'straat' ]?> | <a href="deel2.php">Wijzig</a></label><br>
        <label>Nummer: <?= $registrationData[ 'deel2' ][ 'nummer' ]?> | <a href="deel2.php">Wijzig</a></label><br>
        <label>Postcode: <?= $registrationData[ 'deel2' ][ 'postcode' ]?> | <a href="deel2.php">Wijzig</a></label><br>
        <label>Gemeente: <?= $registrationData[ 'deel2' ][ 'gemeente' ]?> | <a href="deel2.php">Wijzig</a></label><br>
    </body>
</html>