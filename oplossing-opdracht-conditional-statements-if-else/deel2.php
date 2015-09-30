<?php 
	$minuut         =   60; 
    $uur            =   60 * $minuut; 
    $dag            =   24 * $uur; 
    $week           =   7 * $dag; 
    $maand          =   31 * $dag; 
    $jaar           =   365 * $dag; // officieel 365.2425 
  
    $gegevenSeconden    =   221108521; 
          
    $aantalMinuten  =   floor( $gegevenSeconden / $minuut ); 
    $aantalUren     =   floor( $gegevenSeconden / $uur );    
    $aantalDagen    =   floor( $gegevenSeconden / $dag ); 
    $aantalWeken    =   floor( $gegevenSeconden / $week ); 
    $aantalMaanden  =   floor( $gegevenSeconden / $maand ); 
    $aantalJaren    =   floor( $gegevenSeconden / $jaar ); 
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
        
    	Aantal seconden: <?= $gegevenSeconden ?>
    	<br><br>
        Aantal minuten: <?= $aantalMinuten ?><br>
        Aantal uren: <?= $aantalUren ?><br>
        Aantal dagen: <?= $aantalDagen ?><br>
        Aantal weken: <?= $aantalWeken ?><br>
        Aantal maanden (31): <?= $aantalMaanden ?><br>
        Aantal jaren (365): <?= $aantalJaren ?>

    </body>
</html>