<?php

	$dsn = 'mysql:dbname=pcparts;host=localhost;port=3306';
	$username = 'parts_dude';
	$password = 'P@rtzer';

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		include('database_error.php');
		exit();
	}
?>