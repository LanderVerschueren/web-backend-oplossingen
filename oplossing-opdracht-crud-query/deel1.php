<?php

	/*<?php foreach( $fetch_assoc as $key ): ?>
					<thead><pre><?php var_dump($key) ?></pre></thead>
				<?php endforeach ?>*/

	$messageContainer= "";

	try 
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$queryString = 'SELECT * from bieren WHERE naam LIKE "Bu%" OR naam LIKE "A%"';
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
				<table>
					<thead>
						<tr>
							<?php foreach( $column as $key ): ?>
								<th><?php echo $key ?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach( $fetch_assoc as $key => $value ): ?>
						<tr class="<?= ( ( $key + 1 ) % 2 === 0 ) ? 'even' : '' ?>">
							<td><?php echo $key +1 ?></td>
							<?php foreach( $value as $bier ): ?>
								<td><?php echo $bier ?></td>
							<?php endforeach ?>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<!--<?php foreach($fetch_assoc as $key => $value): ?>
				<pre><?php var_dump($value) ?></pre>
				<?php endforeach ?>//-->
			</div>
		</div>
	</div>
</body>
</html>