<?php $page = 'Aplicar a vacante'; ?>
<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() !== true){
		header('Location: login.php');
	}
?>

<?php 
	//Datos de la vacante
	$vacante_id = $_GET['vacante_id'];
	$vacante = $GFVacante->vacanteData($vacante_id);

		//Datos de la solicitud
		$solicitudID = $_GET['solicitudID'];
		$solicitud = $GFSolicitudVacante->solicitudData($solicitudID);
		$dependientes = $GFSolicitudVacante->solicitudDependientes($solicitudID);

?>

<?php if(!isset($_GET['solicitudID'])){ ?>
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav-prospect.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full">
			<h1><?php echo $user->name; ?></h1>
			<h4>Estás a punto de comenzar tu proceso para la vacante <span><?php echo $vacante->name; ?>.</span></h4>
			<span class="btn" id="comenzarProcesoBtn" data-user-id="<?php echo $user->id; ?>" data-vacante-id="<?php echo $vacante->id; ?>">Comenzar proceso</span>
		</div>
	</div>
</main>
<?php } ?>

<?php if(isset($_GET['solicitudID'])){ ?>
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav-prospect.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full solicitud">
			<div class="bg-container z-depth-1">

				<div class="row title">
					<div>
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
				<?php include 'includes/aplicar_cursos__inc.php'; ?>
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

				<!-- SUBIR CV -->
				<div class="row" style="margin-top: 50px;">
					<div id="subirCV" style="height: auto;overflow: hidden;padding: 25px 0;"></div>
				</div>


			</div>
				
		</div>
	</div>
</main>
<?php } ?>

<?php include '../includes/footer.php'; ?>