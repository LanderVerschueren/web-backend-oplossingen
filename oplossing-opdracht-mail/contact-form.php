<?php
	session_start();

	$error = false;
	$errorMessage = "";

	$success = false;
	$sucessMessage = "";

	$email = "";
	$message = "";

	if ( isset($_SESSION[ "post" ]) ) {
		$email = $_SESSION[ "post" ][ "email" ];
		$message = $_SESSION[ "post" ][ "message" ];
	}

	if ( isset($_SESSION[ "error" ][ "message" ]) ) {
		$error = true;
		$errorMessage = $_SESSION[ "error" ][ "message" ];
	}

	if ( isset($_SESSION[ "success" ][ "message" ]) ) {
		$success = true;
		$successMessage = $_SESSION[ "success" ][ "message" ];
	}
?>

<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<style>
	.error {
		color: red;
	}

	.errorDiv {
		border: 1px solid red;
		background-color: rgba(255,0,0,0.4);
		border-radius: 5px;
	}

	.success {
		color: green;
	}

	.successDiv {
		border: 1px solid green;
		background-color: rgba(0,255,0,0.4);
		border-radius: 5px;
	}
</style>

</head>
<body>
	<pre><?php var_dump($_SESSION) ?></pre>
	<pre><?php var_dump($_POST) ?></pre>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Contacteer ons</h1>
			</div>

			<div class="col-sm-12<?php echo ($error) ? " errorDiv" : "" ?>">
				<?php echo ( $error ) ? "<h4 class='error'>" . $errorMessage . "</h4>" : "" ?>
			</div>

			<div class="col-sm-12<?php echo ($success) ? " successDiv" : "" ?>">
				<?php echo ( $success ) ? "<h4 class='success'>" . $successMessage . "</h4>" : "" ?>
			</div>

			<div class="col-sm-12">
				<form role="form" action="contact.php" method="POST">
				  <div class="form-group">
				    <label for="email">E-mailadres:</label>
				    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
				  </div>
				  <div class="form-group">
				    <label for="message">Boodschap:</label>
				    <textarea required type="text" class="form-control" id="message" name="message"><?= $message ?></textarea>
				  </div>
				  <div class="checkbox">
				    <label><input type="checkbox" name="checkbox"> Stuur een kopie naar mezelf</label>
				  </div>
				  <button type="submit" name="sent" class="btn btn-default">verzenden</button>
				</form>					
			</div>
		</div>
	</div>
</body>
</html>