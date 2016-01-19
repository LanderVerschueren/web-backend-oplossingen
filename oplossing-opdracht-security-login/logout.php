<?php
	session_unset();

	if ( isset( $_COOKIE ) ) {
		unset( $_COOKIE );
		$_SESSION[ "notification" ] = "U bent uitgelogd. Tot de volgende keer!"
		header("location: login-form.php");
		exit();
	}
?>