<?php 
	$naam 			= 	"Verschueren";
	$voornaam 		= 	"Lander";

	$volledigeNaam	=	$voornaam . $naam;

	$aantalLetters	=	strlen( $volledigeNaam );
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
        <?php echo $volledigeNaam ?>
        <br>
        <?= $aantalLetters ?>

    </body>
</html>