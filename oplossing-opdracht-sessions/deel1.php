<?php
	session_start();

	$email = ( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email' ] : '';
	$nickname = ( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname' ] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname' ] : '';
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
        <form action="deel2.php" method="POST">
        	<label for="email">e-mail</label><br>
        	<input type="text" name="email" id="email" value="<?= $email ?>" <?php (isset($_GET['focus']) && $_GET == "email" ? 'autofocus' : '' ) ?> > <br>
        	<label for="nickname">nickname</label><br>
        	<input type="text" name="nickname" id="nickname" value="<?= $nickname ?>"><br>
        	<input type="submit" name="submit" value="Volgende">
        </form>
    </body>
</html>