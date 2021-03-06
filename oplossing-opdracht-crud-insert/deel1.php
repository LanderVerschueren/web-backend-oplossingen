<?php
	$messageContainer = "";
	$insertMessage = "";
	$insertSucces = false;

	if( isset( $_POST[ "submit" ] ) ) {
		try {
			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
			$queryString = 'SELECT * from bieren';
			$statement = $db->prepare( $queryString );
			$statement->execute();

			$arraykeys = array_keys($_POST);

			$sql = 'INSERT INTO brouwers ( ' . $arraykeys[0] . ', ' . $arraykeys[1] . ', ' . $arraykeys[2] . ', ' . $arraykeys[3] . ', ' . $arraykeys[4] . ') 
			VALUES ( "' . $_POST["brnaam"] . '", "' . $_POST["adres"] . '", "'. $_POST["postcode"] . '", "' . $_POST["gemeente"] . '", "' . $_POST["omzet"] . '" )';

			$statement = $db->prepare($sql);
			$statement->execute();

			$last_id = $db->lastInsertId();

			$insertSucces = true;

			if( $insertSucces ) {
				$insertMessage = "Het unieke nummer van deze brouwerij is " . $last_id . ", waarbij " . $last_id . " de primary key is van de toegevoegde datarij.";
			}
			else {
				$insertMessage = "Er ging iets mis met het toevoegen. Probeer opnieuw.";
			}
		}

		catch ( PDOException $e ) {
			$messageContainer = "Er liep iets mis: " . $e->getMessage();
		}
	}
?>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>Voeg een brouwer toe</h1>

	<form method="POST" action="deel1.php">
		<label for="brnaam">Brouwernaam</label><br>
		<input type="text" name="brnaam"><br>
		<label for="adres">adres</label><br>
		<input type="text" name="adres"><br>
		<label for="postcode">postcode</label><br>
		<input type="text" name="postcode"><br>
		<label for="gemeente">gemeente</label><br>
		<input type="text" name="gemeente"><br>
		<label for="omzet">omzet</label><br>
		<input type="text" name="omzet"><br>
		<input type="submit" name="submit" value="Verzenden">
	</form>

	<?php if( $insertSucces ): ?>
		<h3><?= $insertMessage ?></h3>
	<?php endif ?>
</body>
</html>