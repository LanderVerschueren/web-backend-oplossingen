<?php
	
	function __autoload( $className ) 
	{
		include ('classes/' . $className . '.php');
	}

	$animalClassKermit = new Animal( "Kermit", "mannelijk", "100" );
	$animalClassDikkie = new Animal( "Dikkie", "mannelijk", "50" );
	$animalClassFlipper = new Animal( "Flipper", "vrouwelijk", "100" );

	$lionClassSimba = new Lion( "Simba", "mannelijk", "100", "Congo lion" );
	$lionClassScar = new Lion( "Scar", "mannelijk", "100", "Kenia lion" );

	$zebraClassZeke = new Zebra( "Zeke", "mannelijk", "100", "Quagga" );
	$zebraClassZana = new Zebra( "Zana", "vrouwelijk", "100", "Selous" );
?>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>Instanties van de Animal class</h1>
	<p><?= $animalClassKermit->getName() ?> is van het <?= $animalClassKermit->getGender() ?> geslacht en heeft momenteel <?= $animalClassKermit->getHealth() ?> levenspunten. (Special move: <?= $animalClassKermit->doSpecialMove() ?>)</p>
	<p><?= $animalClassDikkie->getName() ?> is van het <?= $animalClassDikkie->getGender() ?> geslacht en heeft momenteel <?= $animalClassDikkie->changeHealth('40') ?> levenspunten. (Special move: <?= $animalClassDikkie->doSpecialMove() ?>)</p>
	<p><?= $animalClassFlipper->getName() ?> is van het <?= $animalClassFlipper->getGender() ?> geslacht en heeft momenteel <?= $animalClassFlipper->changeHealth('-50') ?> levenspunten. (Special move: <?= $animalClassFlipper->doSpecialMove() ?>)</p>

	<h1>Instanties van de Lion class</h1>
	<p>De speciale move van <?= $lionClassSimba->getName() ?> (soort: <?= $lionClassSimba->getSpecies() ?>): <?= $lionClassSimba->doSpecialMove() ?></p>
	<p>De speciale move van <?= $lionClassScar->getName() ?> (soort: <?= $lionClassScar->getSpecies() ?>): <?= $lionClassScar->doSpecialMove() ?></p>

	<h1>Instanties van de Zebra class</h1>
	<p>De speciale move van <?= $zebraClassZana->getName() ?> (soort: <?= $zebraClassZana->getSpecies() ?>): <?= $zebraClassZana->doSpecialMove() ?></p>
	<p>De speciale move van <?= $zebraClassZeke->getName() ?> (soort: <?= $zebraClassZeke->getSpecies() ?>): <?= $zebraClassZeke->doSpecialMove() ?></p>
</body>
</html>