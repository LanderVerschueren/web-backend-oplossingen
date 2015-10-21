<?php
	$isAuthenticated = false;
	$message = '';
	$gebruikersnaam = '';

	$inlezen = file_get_contents("test.txt");
	$arraySplitBr = explode(PHP_EOL, $inlezen); /*PHP_EOL*/

	foreach( $arraySplitBr as $splitBr => $id) {
		$arraySplitComma[$splitBr] = explode(',', $id);
	}

	if( isset( $_GET[ 'cookie' ] ) ) {
		if( $_GET[ 'cookie' ] == 'delete' ) {
			setcookie('cookie', '', time() - 3600 );
			header('location: deel1.php');
		}
	}

	if( isset( $_POST[ 'submit' ] ) ) {
		if( in_array( $_POST[ 'gebruikersnaam' ], $arraySplitComma ) && in_array( $_POST[ 'paswoord'], $arraySplitComma ) ) {
			/*$isAuthenticated = true;*/
			if( isset( $_POST[ 'checkbox' ] ) ) {				
				setcookie('cookie', true, time() + 2592000);
				header('location: deel1.php');	
			}
			else {
				setcookie('cookie');
				header('location: deel1.php');
			}

			$gebruikersnaam = $_POST[ 'gebruikersnaam' ];
		}

		else {
			$message = "Verkeerde gebruikersnaam of paswoord";
		}
	}

	if( isset( $_COOKIE[ 'cookie' ] ) ) {
		$isAuthenticated = true;
	}
	print '<pre>';
	print_r($arraySplitComma);
	print '</pre>'
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<?php if ( $isAuthenticated ): ?>
    		<p>Hallo <?php echo $gebruikersnaam ?>, fijn dat je er weer bent!</p>
    		<p><a href="deel1.php?cookie=delete">Uitloggen</a></p>
    	<?php else: ?>
    		<?php if( $message ): ?>
    			<p><?php echo $message ?></p>
    		<?php endif ?>
	        <form action="deel1.php" method="POST">
	        	<ul>
	        	    <label for="gebruikersnaam">gebruikersnaam</label><br>
	        	    <input type="text" name="gebruikersnaam" id="gebruikersnaam"><br>
	        	    <label for="paswoord">paswoord</label><br>
	        	    <input type="password" name="paswoord" id="paswoord"><br>
	        	    <input type="checkbox" name="checkbox">Mij onthouden<br><br>
	        	    <input type="submit" name="submit" value="Verzenden">        	    
	        	</ul>
	        </form>
	    <?php endif ?>
    </body>
</html>