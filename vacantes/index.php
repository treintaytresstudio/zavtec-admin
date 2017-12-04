<?php $page = 'Vacantes'; ?>
<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){

	}else{
		header('Location: login.php');
	}
?>

<?php 
	if(!isset($_GET['newVacante'])  AND !isset($_GET['editVacante'])){
?>
<!-- lista de vacantes -->
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>
		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<div class="section-title">
					<div class="left">
						<h2>Lista de vacantes</h2>
						<p>Esta es la lista de vacantes.</p>
					</div>
					<a href="index.php?newVacante=1" class="waves-effect waves-light btn light-blue bg-accent">Crear vacante</a>
				</div>
				<div class="table-data">
					<table border="1">
					  <thead>
					    <tr>
					        <th>ID</th>
					        <th>Nombre</th>
					        <th>Fecha de registro</th>
					        <th>Acciones</th>
					    </tr>
					  </thead>

					  <tbody>
					    <?php $GFVacante->allVacantes(); ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- /lista de vacantes -->
<?php 
	}
?>

<!-- nueva vacante -->
<?php 
	if(isset($_GET['newVacante'])){
?>

<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<div class="section-title">
					<div class="left">
						<h2>Agrega una vacante nueva</h2>
						<p>Llena todos los datos necesarios para crear una vacante.</p>
					</div>
					<a href="index.php" class="waves-effect waves-light btn bg-main">Cancelar</a>
				</div>
				<form class="form-wrap">

						<div class="row">
							<input 
							id="image" 
							type="hidden" 
							role="uploadcare-uploader" 
							name="content" 
							data-images-only />
						</div>

				      <div class="row">
				        <div class="input-field col s12">
				          <input id="name" type="text" placeholder="Escribe el nombre de la vacante">
				          <label for="name">Nombre de la vacante</label>
				        </div>
				      </div>

				      <div class="row">
				      		<div class="input-field col s12">
			      	          <textarea id="requisitos" class="materialize-textarea"></textarea>
			      	          <label for="requisitos">Requisitos de la vacante</label>
				      	    </div>
				      	    <p>*Puedes utilizar la "," para utilizar el salto de línea. (en el campo requisitos)</p>
				      </div>

				      <div class="row">

				      	<div class="col s12">
				      		<span class="register-error"></span>
				      	</div>

				        <div class="col s12">
				          <span class="waves-effect waves-light btn light-blue darken-3 green accent-4" id="newVacanteBtn">Crear vacante</span>

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

				        </div>

				      </div>
				    </form>
				</div>
		</div>
	</div>
</main>



<?php 
	}
?>
<!-- /nueva vacante -->


<!-- editar vacante -->
<?php 
	if(isset($_GET['editVacante'])){

	//Datos de la vacante a editar
	$vacante_id = $_GET['id'];
	$vacante = $GFVacante->vacanteData($vacante_id);
?>
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<div class="section-title">
					<div class="left">
						<h2>Editar vacante</h2>
						<p>Actualiza los datos necesarios para la vacante.</p>
					</div>
					<a href="vacantes-list.php" class="waves-effect waves-light btn bg-main">Cancelar</a>
				</div>
				<form class="form-wrap">
						<?php 
							if($vacante->image !== ''){
						 ?>
						<div class="row">
							<img style="width: 200px;" src="<?php echo $vacante->image; ?>" alt="">
						</div>
						<?php }else{  ?>
						<div class="row">
							<h5>No has seleccionado imagen para esta vacante</h5>
						</div>
						<?php } ?>

						<div class="row">
							<input 
							id="image"
							value="<?php echo $vacante->image; ?>"
							type="hidden" 
							role="uploadcare-uploader" 
							name="content" 
							data-images-only />
						</div>

				      <div class="row">
				        <div class="input-field col s12">
				          <input id="name" type="text" placeholder="Escribe el nombre de la vacante" value="<?php echo $vacante->name; ?>">
				          <label for="name">Nombre de la vacante</label>
				        </div>

				      <div class="row">
				      		<div class="input-field col s12">
			      	          <textarea id="requisitos" class="materialize-textarea"><?php echo $vacante->requisitos; ?></textarea>
			      	          <label for="requisitos">Requisitos de la vacante</label>
				      	    </div>
				      	    <p>*Puedes utilizar la "," para utilizar el salto de línea. (en el campo requisitos)</p>
				      </div>

				      <div class="row">

				      	<div class="col s12">
				      		<span class="register-error"></span>
				      	</div>

				        <div class="col s12">
				          <span class="waves-effect waves-light btn light-blue darken-3 green accent-4" id="editVacanteBtnData" data-vacante-id="<?php echo $vacante->id; ?>">Editar vacante</span>

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

				        </div>

				      </div>
				    </form>
				</div>
		</div>
	</div>
</main>

<?php 
	}
?>
<!-- /editar vacante -->


<?php include '../includes/footer.php'; ?>