<?php 
	$dsn = 'mysql:host=localhost;dbname=mybookstore';
	$user = 'root';
	$password = '';
	$option = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8");

	try {
		$conn = new PDO($dsn, $user, $password, $option);
		$conn->setAttribute(
				PDO::ATTR_ERRMODE, 
				PDO::ERRMODE_EXCEPTION);
		// echo "Connected";
	} catch (PDOException $e) {
		echo "Connection failed: ".$e->getMessage();
	}
	// echo "<br>";
?>