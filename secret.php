<?php
	session_start(); //стартуем сессию

	if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
		header('Location: ./login.php');
		exit;
	}
?>
<h1>SECRET CONTENT. Only auth user. </h1>
<a href="./login.php">back</a>
<a href="./logout.php">exit</a>




