<?php
	setlocale(LC_ALL, 'nld_NLD');
	$date = mktime(22, 35, 25, 1, 21, 1904);
	$formatedDate = strftime('%d %B %Y, %I:%M:%S %p', $date);
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