<?php
	$tekst   = '';
	$tekst2  = '';
	$teller  = 0;
	$teller2 = 0;

	while ( $teller <= 100) {
		$tekst = $tekst . $teller . ", ";

		$teller++;
	}

	while ( $teller2 <= 100 ) {
		if( $teller2 % 3 === 0 && $teller2 > 40 && $teller2 < 80 ) {
			$tekst2 = $tekst2 . $teller2 . ", ";
		}

		$teller2++;
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
        <?= $tekst ?>
        <br><br>
        <?= $tekst2 ?>
    </body>
</html>