<?php
	$password = "Lander";
	$username = "verschueren@live.nl";
	$message = 'Gelieve in te loggen';

	if ( isset( $_POST['submit'] ) ) 
	{
		if ( $_POST['username'] == $username && $_POST['password'] == $password ) 
		{
			$message = 'Welkom!';
		}
		else 
		{
			$message = 'Er ging iets mis, check username en password!';
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
    	<?php echo $message ?>

        <form action="deel1.php" method="POST">
        	<ul>
        	    <li>
        	    	<label for="username">Username:</label>
        	    	<input type="text" name="username" id="username" value="verschueren@live.nl">
        	    </li>
        	    <li>
        	    	<label for="password">Password:</label>
        	    	<input type="text" name="password" id="password" value="Lander">
        	    </li>
        	</ul>

        	<input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>