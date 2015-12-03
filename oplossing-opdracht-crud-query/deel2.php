<?php
	$bierSelected = false;
	$getIsset = false;

	$messageContainer= "";

	try 
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$queryString = 'SELECT brouwernr, brnaam from bieren.brouwers';
		$statement = $db->prepare( $queryString );
		$statement->execute();

		$fetch_assoc = array();

		while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
			$fetch_assoc[] = $row;
		}

		$column = array();
		$column[] = "Biernummer";

		foreach( $fetch_assoc[0] as $key => $value ) {
			$column[] = $key;
		}

	}

	catch( PDOException $e ) 
	{
		$messageContainer = 'Er ging iets mis: ' . $e->getMessage();
	}


	var_dump( $_GET );

	if( isset( $_GET[ "submit" ] ) ) {
		try {
			$selectBieren = $_GET[ "brouwernr" ];

			$db2 = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

			$queryString2 = 'SELECT naam from bieren.bieren where bieren.brouwernr =  ' . $selectBieren;
			$statement2 = $db2->prepare( $queryString2 );
			$statement2->execute();

			$fetch_assoc2 = array();

			while ( $row = $statement2->fetch( PDO::FETCH_ASSOC ) ) {
				$fetch_assoc2[] = $row;
			}

			$column2 = array();
			$column2[] = "Aantal";

			foreach( $fetch_assoc2[0] as $key => $value ) {
				$column2[] = $key;
			}

			$bierSelected = true;
			$optionSelected = $_GET["brouwernr"];
			$getIsset = true;
		}

		catch( PDOException $e ) {
			$messageContainer = 'Er ging iets mis: ' . $e->getMessage();
		}
	}
?>

<html>
<head>
	<title></title>
	<style>
		thead tr th {
			text-align: center;
			width: 10%;
		}

		tbody tr td {
			text-align: center;
			width: 10%;
		}

		.even {
			background-color: grey;
		}

	</style>
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" 
	crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12"><?php echo $messageContainer ?></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<form method="GET" action="#">
					<select name="brouwernr">
						<?php foreach ($fetch_assoc as $key => $value): ?>
							<option value="<?= $value["brouwernr"] ?>"><?= $value["brnaam"] ?></option>
						<?php endforeach ?>
					</select>
					<input type="submit" name="submit" value="Geef mij alle bieren van deze brouwerij">

					<?php if($bierSelected): ?>
						<table>
							<thead>
								<tr>
									<?php foreach ($column2 as $key): ?>
										<th><?php echo $key ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>

								<?php foreach( $fetch_assoc2 as $key => $value ): ?>
									<tr class="<?= ( ( $key + 1 ) % 2 === 0 ) ? 'even' : '' ?>">
										<td><?= $key + 1 ?></td>
										<?php foreach( $value as $bier ): ?>
											<td><?= $bier ?></td>
										<?php endforeach ?>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					<?php endif ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>