<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){
		header('Location: inicio.php');
	}else{
		header('Location: login.php');
	}
?>
<?php include '../includes/footer.php'; ?>