<?php $page = 'Dashboard' ?>
<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){
		//Si el usuario es un prospecto, lo redireccionamos al panel de prospect
		if($GFUser->isProspect($user_id) == true){
			header('Location: ../proceso/index.php');
		}
	}else{
		header('Location: ../login.php');
	}
?>
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>
		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<!-- title -->
				<div class="section-title">
					<div class="left">
						<h2>Inicio</h2>
						<p>Recuerda revisar tus notificaciones.</p>
					</div>
					<div class="hello">
						<!-- saludo -->
						<?php $GFDashboard->hello($hora); ?>
					</div>
				</div>
				<!-- /title -->

				<div class="row">

					<?php $GFDashboard->compTotalSolicitudesVacantes() ?>

					<!-- box -->
					<div class="col s12 m12 l4 xl4 box-info">
						<div class="box-container z-depth-1">
							<div class="header">
								<h4>Asesoría a clientes</h4>
							</div>
							<div class="middle">
								<i class="material-icons" style="font-size: 75px;">supervisor_account</i>
								<span>0</span>
							</div>
							<div class="footer">
								<a href="#!" class="btn">Ver solicitudes</a>
							</div>
						</div>
					</div>
					<!-- /box -->

					<!-- box -->
					<div class="col s12 m12 l4 xl4 box-info">
						<div class="box-container z-depth-1">
							<div class="header">
								<h4>Mensajes de contacto</h4>
							</div>
							<div class="middle">
								<i class="material-icons">message</i>
								<span>0</span>
							</div>
							<div class="footer">
								<a href="#!" class="btn">Ver mensajes</a>
							</div>
						</div>
					</div>
					<!-- /box -->


				</div>

				<!--sub title -->
				<div class="row" style="margin-bottom: 0;">
					<div class="col s12 m12 l8 xl8">
						<div class="sub-section-tile">
							<h4>Vacantes con mejor ranking</h4>
							<p>Los 5 mejores prospectos para contratar.</p>
						</div>
					</div>
					
					<div class="col s12 m12 l4 xl4">
						<!--sub title -->
						<div class="sub-section-tile">
							<h4>Últimos mensajes</h4>
							<p>Mensajes de contacto desde la pagina más recientes.</p>
						</div>
						<!-- /sub title -->

					</div>
				</div>
				<!-- /sub title -->

				<div class="row">
					<!-- vacantes con mejor rating -->
					<div class="col s12 m12 l8 xl8">
						<ul class="collection rating-users z-depth-1">
						   <?php $GFDashboard->solicitudesRanking(); ?>
						</ul>
					</div>
					<!-- /vacantes con mejor rating -->

					<!-- /notificaciones -->
					<div class="col s12 m12 l4 xl4">
						<ul class="collection notifications z-depth-1">
						    
						    <!--<li class="collection-item avatar">
						      <i class="material-icons circle">message</i>
						      <span class="title">Roberto Mansur</span>
						      <p>martes 10 de noviembre <br>
						         Buenas tardes, quisiera saber acerca de la cámara....
						      </p>
						      <a href="#!" class="secondary-content"><i class="material-icons">remove_red_eye</i></a>
						    </li>-->
						     <h5 style="padding: 20px;color: #ccc;">No hay mensajes disponibles</h5>
						      
						    </li>
						    
						  </ul>
					</div>
					<!-- notificaciones -->
				</div>
				
			</div>
		</div>
	</div>
</main>


<?php include '../includes/footer.php'; ?>