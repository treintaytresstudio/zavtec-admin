<?php $page = 'Mi perfil'; ?>
<?php include '../includes/header.php'; ?>

<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() !== true){
		header('Location: login.php');
	}

	$hs= $GFSolicitudVacante->hasSolicitud($user_id);

	if($hs > 0){
		header('Location: solicitudes.php');
	}
?>

<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav-prospect.php'; ?>
		</div>
		
		<!-- si no ha hecho solicitudes -->
		<div class="col s12 m12 l10 xl10 container-full" id="noSolicitud">
			<div class="bg-container z-depth-1">
				<div class="row">
					<div class="col s12" style="padding-bottom: 50px;">
						<span class="avatar-app avatar-inicio" style="background: url(<?php echo $user->imagen; ?>);"></span>
						<h1><?php echo $user->name ?></h1> 
						<h4>Aún no has comenzado tu proceso para registrarte en alguna vacante en Zavtec Security.</h4>
						<p>Para comenzar tu proceso, puedes ver las vacantes disponibles y seleccionar la de tu interés.</p>
						<a href="vacantes.php" class="btn bg-accent">Ver vacantes</a>
					</div>
				</div>
			</div>
		<!-- /si no ha hecho solicitudes -->
				
		</div>
	</div>
</main>
<?php include '../includes/footer.php'; ?>