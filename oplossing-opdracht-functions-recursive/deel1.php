<?php
	$geld = 100000;
	$teller = 1;

	function renteVoet ( $geld ) 
	{
		global $teller;

		if( $teller <= 10 ) {
			$geld = $geld + ( $geld * 0.08 ); 
			echo 'Na ' . $teller . ' jaar heeft Hans: ' . floor( $geld ) . '.<br>';
			$teller++;
			renteVoet( $geld );
		}
	}

	$winst = renteVoet( $geld );
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
        <p>Het startkapitaal is: <?= $geld ?></p>
        <p><?= $winst ?></p>
    </body>
</html>