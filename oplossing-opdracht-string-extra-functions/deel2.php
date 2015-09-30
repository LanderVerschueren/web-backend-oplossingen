<?php 
	$fruit		     =	"ananas";
	$searchString  = "a";

	$laatstePositie = strrpos( $fruit, $searchString ) + 1;
  $uppercaseFruit = strtoupper( $fruit );
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
       	Positie 'a' in Kokosnoot: <?= $laatstePositie ?>
        <br>
        Ananase in uppercase: <?= $uppercaseFruit ?>
    </body>
</html>