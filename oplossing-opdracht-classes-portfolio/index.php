<?php
	
	function __autoload( $className ) 
	{
		include ('classes/' . $className . '.php');
	}

	$htmlBuilder = new HTMLBuilder( "header.partial.html", "body.partial.html", "footer.partial.html" );
?>