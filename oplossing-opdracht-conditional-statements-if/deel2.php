<?php 
	$getal = 1;
    $a_lowercase = "a";

	( $getal === 1 ) ? $dag = 'maandag' : null;
	( $getal === 2 ) ? $dag = 'dinsdag' : null;
	( $getal === 3 ) ? $dag = 'woensdag' : null;
	( $getal === 4 ) ? $dag = 'donderdag' : null;
	( $getal === 5 ) ? $dag = 'vrijdag' : null;
	( $getal === 6 ) ? $dag = 'zaterdag' : null;
	( $getal === 7 ) ? $dag = 'zondag' : null;

    $laatstePositie = strrpos( $dag, $a_lowercase );
    $dagUpper = strtoupper( $dag );
    $dagUpperZonderA = str_replace( "A", $a_lowercase, $dagUpper );
    $laatsteA = substr_replace( $dagUpper, $a_lowercase, $laatstePositie, 1);
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
        <br>
        Dag in hoofdletters: <?= $dagUpper ?>
        <br>
        Dag in hoofdletters zonder A: <?= $dagUpperZonderA ?>
        <br>
        Dag in hoofdletters zonder laatste A: <?= $laatsteA ?>

    </body>
</html>