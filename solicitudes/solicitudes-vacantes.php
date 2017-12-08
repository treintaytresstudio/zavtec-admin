<?php $page = 'Solicitudes para vacantes'; ?>
<?php include '../includes/header.php'; ?>

<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() !== true){
		header('Location: login.php');
	}

?>

<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">

				<div class="row">
					<div class="col s12" style="padding-bottom: 50px;">
						<h1>Solicitudes de Vacantes</h1>

						<!-- lista de solicitudes -->
						<table class="bordered highlight responsive-table" id="solicitudes_vacantes">
						       <thead>
						         <tr>
						             <th>ID</th>
						             <th>Nombre de la vacante</th>
						             <th>Nombre</th>
						             <th>Email</th>
						             <th>Teléfono</th>
						             <th>Calificación</th>
						             <th>Fecha</th>
						             <!--<th>Estatus</th>-->
						             <th>Acciones</th>
						         </tr>
						       </thead>

						       <tbody>
						         <?php $GFSolicitudVacante->todasSolicitudesList($user_id); ?>
						       </tbody>
						     </table>
						           
						<!-- /lista de solicitudes -->
					</div>

				</div>
			</div>
				
		</div>
	</div>
</main>
<?php include '../includes/footer.php'; ?>