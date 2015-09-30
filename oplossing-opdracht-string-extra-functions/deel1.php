<?php 
	$fruit		=	"kokosnoot";
	$searchString = "o";

	$aantalKaraktersFruit = strlen( $fruit );
	$eerstePositie = strpos($fruit, $searchString) + 1;
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
       	Aantal letters: <?= $aantalKaraktersFruit ?>
       	<br>
       	Positie 'O' in Kokosnoot: <?= $eerstePositie ?>
    </body>
</html>