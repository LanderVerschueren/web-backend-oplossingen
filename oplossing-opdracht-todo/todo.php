<?php
	session_start();

	if( isset($_POST['submit']) ) {
		$_SESSION['todos'][] = $_POST['todo'];
		$sessionlengthtodos = count($_SESSION['todos']);
	}

	if( isset($_POST['done']) ) {
		$postnumber = $_POST['done'];
		$diddone = $_SESSION['todos'][$postnumber];
		$_SESSION['done'][] = $diddone;
		unset( $_SESSION['todos'][$postnumber] );
	}

	if( isset($_POST['delete']) ) {
		$deletenumber = $_POST['delete'];
		unset( $_SESSION['todos'][$deletenumber] );
	}

	if( isset($_POST['destroy']) ) {
		session_destroy();
		header("location: todo.php");
	}	

	if( isset($_POST['notsodone']) ) {
		$postnumber = $_POST['notsodone'];
		$notdone = $_SESSION['done'][$postnumber];
		$_SESSION['todos'][] = $notdone;
		unset( $_SESSION['done'][$postnumber] );
	}

	if( isset($_POST['foreverdone']) ) {
		$deletenumber = $_POST['foreverdone'];
		unset( $_SESSION['done'][$deletenumber] );
	}
?> 

<html>
<head>
	<title></title>
</head>
<body>

	<h1>Todo App</h1>
	
	<?php if( empty($_SESSION['todos']) && empty($_SESSION['done']) ): ?>
		<p>Je hebt nog geen TODO's toegevoegd; Zo weinig werk of meesterplanner?</p>
	<?php else: ?>

	<form action="#" method="POST">
		<h2>Nog te doen</h2>
		<?php if( !empty($_SESSION['todos']) ): ?>
			<ul>
				<?php foreach ( $_SESSION['todos'] as $value => $key): ?>
			    	<li style="list-style-type:none">
			    		<button type="submit" name="done" value="<?= $value ?>">Done</button>
			    		<?= $key ?>
			    		<button type="submit" name="delete" value="<?= $value ?>">x</input>
			    	</li>
				<?php endforeach ?>
			</ul>
		<?php else: ?>
			<p>Goed gedaan! Geen werk meer!</p>
		<?php endif ?>	

		<h2>Done and done</h2>
			<?php if ( !empty($_SESSION['done']) ): ?>
				<ul>
					<?php foreach ( $_SESSION['done'] as $value => $key ): ?>
				    	<li style="list-style-type:none">
				    	<button type="submit" name="notsodone" value="<?= $value ?>">Not Done</button>
			    		<?= $key ?>
			    		<button type="submit" name="foreverdone" value="<?= $value ?>">x</input>
				    	</li>
					<?php endforeach ?>
				</ul>
			<?php else: ?>
				<p>Werk aan de winkel..</p>
			<?php endif ?>
	</form>

	<?php endif ?>

	<h2>Todo toevoegen</h2>
	<form action="#" method="POST">
		<label for="todo">Beschrijving</label>
		<input type="text" name="todo" id="todo"><br>
		<input type="submit" name="submit" value="Toevoegen">
	</form>

	<pre><?php print_r($_SESSION) ?></pre>

	<form action="#" method="POST">
		<input type="submit" name="destroy" value="destroy" onclick="destroy()">
	</form>
</body>
</html>