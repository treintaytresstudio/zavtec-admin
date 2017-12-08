<?php $page = 'Solicitud'; ?>
<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() !== true){
		header('Location: login.php');
	}
?>

<?php 
	//Datos de la solicitud
	$solicitudID = $_GET['solicitudID'];
	$solicitud = $GFSolicitudVacante->solicitudData($solicitudID);
	$dependientes = $GFSolicitudVacante->solicitudDependientes($solicitudID);
	$vacante_id = $solicitud->vacante_id;
	$vacante = $GFVacante->vacanteData($vacante_id);

	$vacante_imagen = $GFSolicitudVacante->vacanteImagen($solicitudID);

?>


<?php if(isset($_GET['solicitudID'])){ ?>
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full solicitud">
			<div class="bg-container z-depth-1" style="background: #fff; height: auto;overflow: hidden;">

				<!-- tabs -->
				<ul id="tabs-swipe-demo" class="tabs">
				   <li class="tab col s3"><a class="active" href="#solicitud">Solicitud</a></li>
				   <li class="tab col s3"><a href="#comentarios">Comentarios internos</a></li>
				   <li class="tab col s3"><a href="#calificacion">Calificación</a></li>
				</ul>

				<!-- solicitud -->
				 <div id="solicitud" class="col s12" style="padding-top: 50px;">
				 		<div class="row title">
				 			<div>
				 				<?php $porcentaje = $GFSolicitudVacante->porcentajeLlenado($solicitudID); ?>
				 				<h1 style="margin:0;padding: 0;">Solicitud de empleo</h1>
				 			</div>

				 			<div class="tiempo">
				 				<span>Tienes 2 días para completar esta información</span>
				 			</div>
				 		</div>

				 		<!-- vacante -->
				 		<div class="row">
				 			<h4>Vacante</h4>
				 			<div class="input-field col s12">
				 			  <select id="vacante">
				 			       <option value="<?php echo $vacante->id; ?>" disabled selected><?php echo $vacante->name; ?></option>
				 			     </select>
				 			     <label>Vacante</label>
				 			  <p>
				 			  	<h6 style="font-size: 19px; border-left: 3px solid red;padding-left: 4px;">Requisitos de la vacante</h6>
				 			  	<?php 
				 			  		$requisitos = str_replace(",", "</br>", $vacante->requisitos);
				 			  		echo $requisitos;
				 			  	?>
				 			  	
				 			  </p>
				 			</div>
				 		</div>
				 		<!-- /vacante -->
				 		
				 		<!-- datos generales -->
				 		<?php include 'includes/aplicar_datos_generales__inc.php'; ?>
				 		<!-- /datos generales -->

				 		<!-- datos escolares -->
				 		<?php include 'includes/aplicar_datos_escolares__inc.php'; ?>
				 		<!-- /datos escolares -->

				 		<!-- cursos -->
				 		<div class="cursos-wrap-data">
				 		<?php include 'includes/aplicar_cursos__inc.php'; ?>
				 		</div>
				 		<!-- /cursos -->

				 		<!-- datos laborales -->
				 		<?php include 'includes/aplicar_datos_laborales__inc.php'; ?>
				 		<!-- /datos laborales -->

				 		<!-- experiencia -->
				 		<?php include 'includes/aplicar_experiencia__inc.php'; ?>
				 		<!-- /experiencia -->

				 		<!-- intereses -->
				 		<?php include 'includes/aplicar_intereses__inc.php'; ?>
				 		<!-- /intereses -->

				 		<!-- borrar -->
						<div class="row" style="margin-top: 50px;">
							<span class="btn bg-main btn-large" id="borrarSolicitudBtn" data-solicitud-id="<?php echo $solicitudID; ?>">Borrar solicitud</span>
						</div>
				 		<!-- /borrar -->

				 	</div>
				 </div>
				<!-- /solicitud -->

				<!-- comentarios -->
				 <div id="comentarios" class="col s12 z-depth-1" style="height: auto;overflow: hidden;background: #fff;padding: 25px 40px;">
				 	<div class="addComment">
				 		<h1 style="margin:0;">Comentarios</h1>
				 		
				 		<div class="row">
				 		   <form class="col s12">
				 		     <div class="row">
				 		       <div class="input-field col s12">
				 		         <textarea id="comentario" class="materialize-textarea"></textarea>
				 		         <label for="comentario">Agregar comentario</label>

				 		       </div>

				 		       <div class="input-field col s12">
				 		         <span class="btn bg-accent" data-user-id="<?php echo $user_id; ?>" data-solicitud-id="<?php echo $solicitudID; ?>" id="addCommentBtn">AGREGAR COMENTARIO</span>
				 		         
				 		       </div>
				 		     </div>
				 		   </form>
				 		 </div>
				 	</div>
				 	<ul class="collection" id="comentarios-load">
				 	    <!-- comentarios db -->
				 	    <?php $GFSolicitudVacante->comentariosList($solicitudID); ?> 
				 	</ul>
				 	            
				 </div>
				<!-- /comentarios -->

				<!-- calificación -->
				 <div id="calificacion" class="col s12 z-depth-1" style="height: auto;overflow: hidden;background: #fff;padding: 25px 40px;"">

				 	<h1 style="margin:0;">Calificación</h1>
					
					<!-- estado de la calificacion -->
				 	<?php $GFSolicitudVacante->statusCalificacion($solicitudID) ?>
				
				 	<div class="row">
				 	   <form class="col s12">
				 	     <div class="row">
				 	       <div class="input-field col s12">
				 	         <textarea id="calificacionVal" class="materialize-textarea"></textarea>
				 	         <label for="calificacionVal">Agregar calificación</label>

				 	       </div>

				 	       <div class="input-field col s12">
				 	         <span class="btn bg-accent"  data-solicitud-id="<?php echo $solicitudID; ?>" id="addCalificacionBtn">EDITAR CALIFICACIÓN</span>
				 	         
				 	       </div>
				 	     </div>
				 	   </form>
				 	 </div>
				 	
				 </div>
				<!-- /calificación -->

				<!-- /tabs -->
				
		</div>
	</div>
</main>
<?php } ?>

<?php include '../includes/footer.php'; ?>