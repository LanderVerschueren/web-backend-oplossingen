<?php 
	$lettertje      = 'e';
    $cijfertje      = 3;
    $langstewoord   = 'zandzeepsodemineralenwatersteenstralen';

    $replace      = str_replace( $lettertje, $cijfertje, $langstewoord );
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
       	Vervang 'e' door 3: <?= $replace ?>
    </body>
</html>