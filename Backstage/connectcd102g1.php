<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd102g1;charset=utf8";
	$user = "cd102g1";
	$password = "cd102g1";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>