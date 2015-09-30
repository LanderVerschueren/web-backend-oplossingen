<?php 
	$jaartal = 2015;

	if( $jaartal % 4 == 0 && $jaartal % 100 != 0 || $jaartal % 400 == 0 ) {
		$boodschap = 'een schrikkeljaar';
	} else {
		$boodschap = 'geen schrikkeljaar';
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
        
        Het jaar <?= $jaartal ?> is <?= $boodschap ?>!

    </body>
</html>