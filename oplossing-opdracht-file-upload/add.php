<?php 
	session_start();

	$description = "";
	$file = array();
	$succes = false;
	$error = false;
	$message = "";

	if ( isset($_SESSION[ "error" ]) ) {
		$error = true;
		$message = $_SESSION[ "error" ];
	}

	if( isset($_POST[ "description" ]) && isset($_FILES)) {
		$description = $_POST[ "description" ];
		$file = $_FILES;

		if ( $_FILES[ "file" ][ "type" ] == ( "image/png" || "image/jpg" || "image/gif") ) {
			if ( $_FILES[ "file" ][ "size" ] < 200000000 ) {

				if ( $_FILES[ "file" ][ "error" ] == 1 ) {
					$_SESSION[ "error" ] = "Something went wrong!";
				}
				else {	

					$move = "D:\school\web-backend\oplossingen\oplossing-opdracht-file-upload\img/" . $_FILES[ "file" ][ "name" ];

					$extension = pathinfo($_FILES[ "file" ][ "type" ]);
					$filename = pathinfo($_FILES[ "file" ][ "name" ]);

					$name = date("Y-m-d/H:i:s");
					$name .= "_";
					$name .= $filename[ "filename" ];
					$name .= ".";
					$name .= $extension[ "basename" ];

					$_SESSION[ "name" ] = $name;
					$description = $_POST[ "description" ];

					move_uploaded_file( $_FILES[ "file" ][ "tmp_name" ], $move ); 

					try {
						$db = new PDO('mysql:host=localhost;dbname=file_upload', 'root', '');

						$sql = 'insert into files ( description, picture ) values ( :description, :name )';
						
						$statement = $db->prepare($sql);
						$statement->bindValue( ":description", $description );
						$statement->bindValue( ":name", $name );
						$statement->execute();
					}
					catch (PDOException $e) {
						$e->getMessage();
					}

				}

			}
			else {
				$error = true;
				$_SESSION = "File to big!";
			}
		}
		else {
			$error = true;
			$_SESSION[ "error" ] = "Description or no file";
		}
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
	li {
		list-style-type: none;
		margin: 0;
		padding: 0;
	}

	ul {
		padding: 0;
	}
</style>

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
			<div class="col-sm-12">

				<?php echo ($error) ? "<h4>" . $message . "</h4>" : "" ?>

				<form method="POST" action="#" enctype="multipart/form-data">
					<ul>	
						<li class="form-group">
						  <label for="description">Description:</label>
						  <input type="text" class="form-control" id="description" name="description">
						</li>
						<li class="form-group">
						  <label for="file">Choose your file:</label>
						  <input type="file" class="form-control" id="file" name="file">
						</li>
						<button type="submit" class="btn btn-default">Submit</button>
						</ul>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>