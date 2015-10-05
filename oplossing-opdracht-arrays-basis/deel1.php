<?php
	$dieren[] 		= 'Hond';
	$dieren[] 		= 'Kat';
	$dieren[] 		= 'Paard';
	$dieren[] 		= 'Vis';
	$dieren[] 		= 'Konijn';
	$dieren[]		= 'Ezel';
	$dieren[]		= 'Geit';
	$dieren[]		= 'Olifant';
	$dieren[]		= 'Leeuw';
	$dieren[]	 	= 'Arend';

	$dier = array('Hond', 'Kat', 'Paard', 'Vis', 'Konijn', 
		'Ezel', 'Geit', 'Olifant', 'Leeuw', 'Arend');

	$voertuigen = array('Landvoertuigen' => array('auto', 'fiets', 'brommer'),
					   	'Watervaartuigen' => array('boot', 'kano', 'hovercraft'),
					   	'Luchtvaartuigen' => array('vliegtuig', 'glider', 'zeppellin')
		);
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
        <pre><?php var_dump($dieren) ?></pre>
        <pre><?php var_dump($dier) ?></pre>
        <pre><?php var_dump($voertuigen) ?></pre>
    </body>
</html>