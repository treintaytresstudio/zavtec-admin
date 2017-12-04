<?php $page = 'Inicia sesión'; ?>

<?php include_once 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.css">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- lecxa admin css -->
    <link rel="stylesheet" href="assets/css/lecxa_admin.css">

    <!-- upload care -->
    <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.2.1/uploadcare.full.min.js"></script>
               
    <title><?php echo $page; ?></title>
</head>
<body>

<?php 
    //Si el usuario no está logueado, lo regresamos al login
    if($GFUser->loggedIn() === true){
        //Usuario conectado
        $user_id = $_SESSION['id'];
        //Datos del usuario almacenados en $user ej. $user->name
        $user = $GFUser->userData($user_id);

        include_once '../includes/menu-top.php';
    }
?>


<div class="full">
	<div class="brand-logo animated fadeInUp">
		<img src="assets/img/logo.png" alt="logo">
	</div>
	<div class="center-box login-form animated fadeIn">
		<div class="header">
			<h2>Inicia sesión</h2>
			<p>Ingresa los datos para acceder a la aplicación</p>
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
				<span class="waves-effect waves-light btn-large bg-accent" id="btnLogin">Incia sesión</span>
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

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<!-- sweet alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.js"></script>

<!--- Main Core JS -->
<script src="core/js/ajax.js"></script>
<script src="core/js/main.js"></script>

</body>
</html>