<?php 
	$getal = 3;

	( $getal === 1 ) ? $dag = 'maandag' : null;
	( $getal === 2 ) ? $dag = 'dinsdag' : null;
	( $getal === 3 ) ? $dag = 'woensdag' : null;
	( $getal === 4 ) ? $dag = 'donderdag' : null;
	( $getal === 5 ) ? $dag = 'vrijdag' : null;
	( $getal === 6 ) ? $dag = 'zaterdag' : null;
	( $getal === 7 ) ? $dag = 'zondag' : null;
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
        
        Dag van de week is: <?= $getal ?>, dus het is <?= $dag ?>
    </body>
</html>