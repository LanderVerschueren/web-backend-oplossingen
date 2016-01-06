<?php
	
	$messageContainer = "";
	$image = "icon-asc.png";
	$image_alt = "Pijltje naar boven";

	try 
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$queryString = 'SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol
from bieren
join brouwers on bieren.brouwernr = bieren.brouwers.brouwernr
join soorten on bieren.soortnr = soorten.soortnr  
ORDER BY `bieren`.`biernr` ASC';
		$statement = $db->prepare( $queryString );
		$statement->execute();

		$fetch_assoc = array();

		while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
			$fetch_assoc[] = $row;
		}

		$column = array();

		foreach( $fetch_assoc[0] as $key => $value ) {
			$column[] = $key;
		}

		if( isset( $_GET[] ) )

	}

	catch( PDOException $e ) 
	{
		$messageContainer = 'Er ging iets mis: ' . $e->getMessage();
	}
?>

<html>
<head>
	<title></title>
	<style>
		thead tr th {
			width: 10%;
			text-align: center;
		}

		tbody tr td {
			text-align: center;
		}

		.even {
			background-color: gray;
		}

	</style>
</head>
<body>
	<pre><?php var_dump( $_GET ) ?></pre>
	<div>
		<div>
			<div class="col-md-12"><?php echo $messageContainer ?></div>
		</div>
			<table>
				<thead>
					<tr>
						<?php foreach( $column as $key ): ?>
							<th>
								<a href="deel1.php" id="<?php echo $key ?>"><?php echo $key ?></a>
								<img src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
							</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $fetch_assoc as $key => $value ): ?>
					<tr class="<?= ( ( $key + 1 ) % 2 === 0 ) ? 'even' : '' ?>">
						<?php foreach( $value as $bier ): ?>
							<td><?php echo $bier ?></td>
						<?php endforeach ?>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
	</div>
</body>
</html>