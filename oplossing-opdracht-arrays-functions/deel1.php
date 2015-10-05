<?php 
	$dieren = array('Kat', 'Hond', 'Paard', 'Vis', 'Ezel');
	$aantalElementenDier = count($dieren);
	
	$teZoekenDier = 'Kat';
	$gevonden = in_array($teZoekenDier, $dieren);
	$tekst;

	if( $gevonden = true ) {
		$tekst = "Het woord '" . $teZoekenDier . "' is gevonden in de array 'dieren'.";
	}
	else {
		$tekst = "Het woord " . $teZoekenDier . " is niet gevonden in de array 'dieren'.";
	}
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
        <h1>Aantal elementen in array dieren: <?= $aantalElementenDier ?></h1>
        <h2><?= $tekst ?></h2>
    </body>
</html>