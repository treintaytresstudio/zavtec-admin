<?php 
	$page = 'Inicia sesión';
?>
<?php 
	//INIT
	include_once '../core/init.php';
	
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){
		header('Location: inicio.php');
	}else{
		include_once '../includes/header.php';
	}
?>

<div class="full">
	<div class="brand-logo animated fadeInUp">
		<img src="../assets/img/logo.png" alt="logo">
	</div>
	<div class="center-box login-form animated fadeIn">
		<div class="header">
			<h2>Inicia sesión</h2>
			<p>Ingresa los datos para acceder a la aplicación.</p>
		</div>
		<div class="form">
			<div class="form-item input-field">
				<input type="text" id="user">
				<label for="user">Usuario</label>
			</div>
			<div class="form-item input-field">
				<input type="password" id="password" autocomplete="new-password">
				<label for="password">Contraseña</label>
			</div>
			<div class="form-item">
				<span class="waves-effect waves-light btn-large bg-accent" id="loginProceso">Inicia sesión</span>
			</div>
			<div class="form-item login-error"></div>
			<div class="loader">
				<div class="preloader-wrapper active">
				   <div class="spinner-layer spinner-blue-only">
				     <div class="circle-clipper left">
				       <div class="circle"></div>
				     </div><div class="gap-patch">
				       <div class="circle"></div>
				     </div><div class="circle-clipper right">
				       <div class="circle"></div>
				     </div>
				   </div>
				 </div>
			</div>

			<div class="account-login">
				<a href="registro.php">¿No te has registrado? <span>Crea una cuenta</span></a>
			</div>
			
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>