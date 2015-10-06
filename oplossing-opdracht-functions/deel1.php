<?php
	function berekenSom ( $getal1, $getal2 ) 
	{
		$resultaat = $getal1 + $getal2;
		return $resultaat;
	}

	function vermenigvuldig ( $getal1, $getal2 ) 
	{
		$resultaat2 = $getal1 * $getal2;
		return $resultaat2;
	}

	function isEven ( $getal ) 
	{
		if ( $getal % 2 === 0 ) 
		{
			return true;
		}
		return false;
	}

	function lengthUpper ( $string ) 
	{
		$stringArray['uppercase'] = strtoupper($string);
		$stringArray['lenght'] = strlen($string);

		return $stringArray;
	}

	$som = berekenSom( 2, 4 );
	$product = vermenigvuldig( 2, 4 );
	$even = isEven( 15 );

	$string = "Ik ben een malle idioot.";
	$stringRes = lengthUpper( $string );
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
        <?php echo $som ?><br>
        <?= $product ?>
        <?php if( $even ): ?>
        	<p>Even</p>
        <?php else: ?>
        	<p>Oneven</p>
        <?php endif ?>

        <p><?= $string ?></p>
        <ul>
        	<?php foreach ( $stringRes as $key => $value ): ?>
        		<li><?php echo $key ?>: <?php echo $value ?></li>
        	<?php endforeach ?>
    	</ul>
    </body>
</html>