<?php
	session_start();

	$logout_success = false;
	$message = "";

	if ( isset( $_SESSION[ "notification" ] ) ) {
		$logout_success = true;
		$message = $_SESSION[ "notification" ];
	}
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<pre><?php var_dump($_SESSION) ?></pre>
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-12">
					<?= ($logout_success) ? '<h4>' . $message . '</h4>' : '' ?>
					<h1>Inloggen</h1>

					<form action="login-process.php" method="POST">
						<label for="email">E-mail</label><br>
                        <input type="text" name="email" id="email"><br>

                        <label for="password">Paswoord</label><br>
                        <input name="password" id="password" type="text"><br>
                                    
                        <input type="submit" name="submit-login" id="submit" value="Inloggen"><br>
						<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>