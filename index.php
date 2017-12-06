<?php 
	include_once 'core/init.php';

	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){
		header('Location: inicio/index.php');

	}else{
		header('Location: login.php');
	}
?>
