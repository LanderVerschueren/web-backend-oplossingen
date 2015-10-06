<?php 
	$text = file_get_contents("text-file.txt");



	$textChars = str_split($text);
	rsort($textChars);

	$textCharsReversed = array_reverse($textChars);

	$tellerArray = array();

	foreach ($textCharsReversed as $value) {
		if ( isset ( $tellerArray[ $value ] ) ) {
			$tellerArray[$value]++;
		}
		else {
			$tellerArray[$value] = 1;
		}
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
        <h1>Array van Z naar A</h1>
		<pre><?php //var_dump ( $characterArray ) ?></pre>

		<h1>Array reversed</h1>
		<pre><?php //var_dump ( $characterSortedReversed ) ?></pre>

		<h1>Array reversed</h1>
		<pre><?php var_dump ( $tellerArray ) ?></pre>
    </body>
</html>