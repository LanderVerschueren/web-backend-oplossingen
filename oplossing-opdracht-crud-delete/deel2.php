<?php
	session_start();

	$messageContainer = "";
	$deleted = false;
	$deleteIt = false;
	$deleteMessage = "";
	$deleteNr;

	try {
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		$queryString = 'SELECT * from bieren.brouwers';
		$statement = $db->prepare( $queryString );
		$statement->execute();

		$fetch_assoc = array();

		while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
			$fetch_assoc[] = $row;
		}

		$column = array();
		$column[] = "#";

		foreach( $fetch_assoc[0] as $key => $value ) {
			$column[] = $key;
		}

		if( isset( $_POST["delete"] ) ) {
			$deleteIt = true;
			$deleteNr = $_POST[ "delete" ];
			$deleteString = 'DELETE from bieren.brouwers WHERE brouwernr=' . $deleteNr;

			$_SESSION[ "deletestring" ] = $deleteString;
		}

		if( isset( $_SESSION[ "deleteString" ] ) && isset( $_POST[ "sure" ] ) ) {
			$sql = $_SESSION[ "deletestring" ];
					
			$statement = $db->prepare($sql);
			$statement->execute();

			$deleted = true;

			header( 'Location: deel2.php' );

			if ( $deleted ) {
				$deleteMessage = "De datarij werd goed verwijderd.";
			}
			else {
				$deleteMessage = "De datarij kon niet verwijderd worden. Probeer opnieuw.";
			}
		}
	}	

	catch ( PDOException $e ) {
		$messageContainer = "Er liep iets mis: " . $e->getMessage();
	}

?>

<html>
<head>
	<title></title>
	<style>
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 8px;
		    text-align: left;
		    border-bottom: 1px solid #ddd;
		}

		.even {
			background-color: grey;
		}

		.deleteconfirm {
			border: 2px solid red;
			background: rgba(255,0,0,0.4); 
			border-radius: 5px;
		}

		.deleteconfirm p {
			margin: 0;
		}

	</style>
</head>
<body>
	<pre><?php var_dump($_SESSION[ "deletestring" ]) ?></pre>

	<?php if ( $deleted ): ?>
		<div>
			<p><?= $deleteMessage ?></p>
		</div>
	<?php endif ?>
	
	<form action="#" method="POST">
		<?php if ( $deleteIt ): ?>
			<div class="deleteconfirm">
				<p>Bent u zeker dat u deze datarij wilt verwijderen?</p>
				<button type="submit" name="sure">Ja!</button>
				<button type="submit" name="notsosure">Nee!</button>
			</div>
		<?php endif ?>-
		<table>
			<thead>
				<tr>
					<?php foreach( $column as $key ): ?>
						<th><?php echo $key ?></th>
					<?php endforeach ?>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $fetch_assoc as $key => $value ): ?>
				<tr class="<?= ( ( $key + 1 ) % 2 === 0 ) ? 'even' : '' ?>">
					<td><?php echo $key + 1 ?></td>
					<?php foreach( $value as $bier ): ?>
						<td><?php echo $bier ?></td>
					<?php endforeach ?>
					<td>
						<button type="submit" name="delete" value="<?= $value["brouwernr"] ?>">
							<img src='icon-delete.png' alt=''>
						</button>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</form>
</body>
</html>