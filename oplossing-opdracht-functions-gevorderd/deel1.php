<?php
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

	$needle1 = '2';
	$needle2 = '8';
	$needle3 = 'a';

	function telNeedle1( $haystack, $needle ) 
	{
		$haystackCount = strlen( $haystack );
		$needleAantal = substr_count( $haystack, $needle );
		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	function telNeedle2( $needle ) 
	{
		global $md5HashKey;

		$haystack = $md5HashKey;
		$haystackCount = strlen($haystack);
		$needleAantal = substr_count($haystack, $needle);
		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	function telNeedle3( $needle ) 
	{
		$haystack = $GLOBALS['md5HashKey'];
		$haystackCount = strlen( $haystack );
		$needleAantal = substr_count($haystack, $needle);
		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	$needleFunction1 = telNeedle1( $md5HashKey, $needle1 );
	$needleFunction2 = telNeedle2( $needle2 );
	$needleFunction3 = telNeedle3( $needle3 );
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
        <p>Het karakter "<?= $needle1 ?>" komt <?= $needleFunction1  ?>% voor in de string <?= $md5HashKey ?></p>
        <p>Het karakter "<?= $needle2 ?>" komt <?= $needleFunction2  ?>% voor in de string <?= $md5HashKey ?></p>
        <p>Het karakter "<?= $needle3 ?>" komt <?= $needleFunction3  ?>% voor in de string <?= $md5HashKey ?></p>
    </body>
</html>