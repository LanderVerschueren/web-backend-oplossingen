<?php
	session_start();
	session_unset();

	if ( isset( $_COOKIE ) ) {
		setcookie('login', $cookieValue, time() - (86400 * 30));
		$_SESSION[ "notification" ] = "U bent uitgelogd. Tot de volgende keer!";
	}

	header("location: login-form.php");
	exit();
?>