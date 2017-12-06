<?php 
	$page = 'Registro';
?>
<?php include '../includes/header.php'; ?>
<div class="full" style="height: auto; margin-top: 50px;">
	<div class="brand-logo animated fadeInUp">
		<img src="../assets/img/logo.png" alt="logo">
	</div>
	<div class="center-box login-form animated fadeIn">
		<div class="header">
			<h2>Registro</h2>
			<p>Ingresa los datos para registrarte en la aplicación.</p>
		</div>
		<div class="form">
			<div class="form-item input-field">
				<input type="text" id="name">
				<label for="name">Nombre</label>
			</div>
			<div class="form-item input-field">
				<input type="email" id="email">
				<label for="email">Email</label>
			</div>
			<div class="form-item input-field">
				<input type="text" id="user">
				<label for="user">Usuario</label>
			</div>
			<div class="form-item input-field">
				<select id="sex">
				     <option value="" disabled selected>Selecciona tu sexo</option>
				     <option value="1">Mujer</option>
				     <option value="2">Hombre</option>
				   </select>
				   <label>Sexo</label>
			</div>
			<div class="form-item input-field">
				<input type="password" id="password" autocomplete="new-password">
				<label for="password">Contraseña</label>
			</div>
			<div class="form-item">
				<span class="register-error"></span>
			</div>
			<div class="form-item">
				<span class="waves-effect waves-light btn-large bg-accent" id="btnRegister">Registrate</span>
			</div>
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
			<div class="form-item login-error"></div>
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>