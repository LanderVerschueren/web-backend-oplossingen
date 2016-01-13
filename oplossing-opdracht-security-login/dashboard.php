<?php
	session_start();

	if ( isset($_COOKIE[ "login" ]) ) 
	{
		var_dump($_COOKIE);
	}
	else 
	{
		$_SESSION[ "notification" ][ "$setCookie" ] = "U moet eerst ingloogen!";
		header('location: login-form.php')
	}
?>