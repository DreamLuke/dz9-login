<?php
	session_start();

	// $_SESSION = array();

	if(isset($SESSION['user'])) {
		unset($SESSION['user']);
	}

	if(isset($COOKIE['token_access'])) {
		setcookie('token_access');
	}

	$_SESSION = array();

	header('Location: ./login.php');
	exit;

?>