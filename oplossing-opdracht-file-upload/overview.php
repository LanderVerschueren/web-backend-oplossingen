<?php 

	$description = array();
	$imagepath = array();
	$arrayexplode = array();
	$imglocation = array();

	$db = new PDO('mysql:host=localhost;dbname=file_upload', 'root', '');
		
	$queryString = 'select * from files';
	$statement = $db->prepare( $queryString );
	$statement->execute();

	$fetch_assoc = array();

	while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
		$fetch_assoc[] = $row;
	}

	for ( $i = 0; $i < count($fetch_assoc); $i++ ) {
		array_push( $description, $fetch_assoc[ $i ][ "description" ] );
		array_push( $arrayexplode, explode( "_", $fetch_assoc[ $i ][ "picture" ] ) );
		array_push( $imglocation, "img/" . $arrayexplode[$i][1] );

		$result = array_combine($description, $imglocation);
	}

?>

<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="overview.php">File upload</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="overview.php">Overview</a></li>
		      <li><a href="add.php">Add Picture</a></li>
		    </ul>
		  </div>
		</nav>

		<div class="row">
			<?php foreach( $result as $key => $value ): ?>
				<div class="col-md-4">
					<h4><?php echo $key ?></h4>
					<img class="img-responsive" src="<?php echo $value ?>" alt="<?php echo $key ?>">
				</div>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>