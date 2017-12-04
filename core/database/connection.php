<?php 
	$db = 'mysql:host='.$dbHost.'; dbname='.$dbName.';charset=utf8';
	$user = $dbUser;
	$password =$dbPass;

	try{
		$pdo = new PDO($db, $user, $password);
	}catch(PDOException $e){
		echo 'Connection error! '. $e->getMessage(); 
	}

?>