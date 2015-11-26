<?php
	$messageContainer= "";

	try 
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$queryString = 'SELECT * from bieren WHERE naam LIKE "Bu% OR naam LIKE "A%"';
		$db->prepare($queryString);
		$db->execute();


	}
	catch( PDOException $e ) 
	{
		$messageContainer = 'Er ging iets mis: ' . $e->getMessage();
	}
?>

<html>
<head>
	<title></title>
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
			<div class="col-md-6">
				<?php echo $database ?>
			</div>
			<div class="col-md-6">
				<?php echo $database ?>
			</div>
		</div>
	</div>
</body>
</html>