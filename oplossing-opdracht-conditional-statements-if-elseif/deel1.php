<?php 
	$ondergrens;
	$bovengrens;
	$getal = 59;
	$omgekeerd;

	if($getal >= 0 && $getal < 10) 
	{
		$ondergrens = 0;
		$bovengrens = 10 ;
	}
	elseif ($getal >= 10 && $getal < 20) 
	{
		$ondergrens = 10;
		$bovengrens = 20;
	}
	elseif ($getal >= 20 && $getal < 30) 
	{
		$ondergrens = 20;
		$bovengrens = 30;
	}
	elseif ($getal >= 30 && $getal < 40) 
	{
		$ondergrens = 30;
		$bovengrens = 40;
	}
	elseif ($getal >= 40 && $getal < 50) 
	{
		$ondergrens = 40;
		$bovengrens = 50;
	}
	elseif ($getal >= 50 && $getal < 60) 
	{
		$ondergrens = 50;
		$bovengrens = 60;
	}
	elseif ($getal >= 60 && $getal < 70) 
	{
		$ondergrens = 60;
		$bovengrens = 70;
	}
	elseif ($getal >= 70 && $getal < 80) 
	{
		$ondergrens = 70;
		$bovengrens = 80;
	}
	elseif ($getal >= 80 && $getal < 90) 
	{
		$ondergrens = 80;
		$bovengrens = 90;
	}
	elseif ($getal >= 90 && $getal < 100) 
	{
		$ondergrens = 90;
		$bovengrens = 100;
	}

	$tekst = "Het getal " . $getal . " ligt tussen " . $ondergrens . " en " . $bovengrens;
	$omgekeerd = strrev($tekst);
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
        <h1><?= $tekst ?></h1>
        <h2>Omgedraaid: <?= $omgekeerd ?></h2>
    </body>
</html>