<?php
	$date = mktime(22, 35, 25, 1, 21, 1904);
	$formatedDate = date( 'd F Y, h:i:s a', $date);
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
        <?= $formatedDate ?>
    </body>
</html>