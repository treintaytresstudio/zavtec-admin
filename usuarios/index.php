<?php $page = 'Usuarios'; ?>
<?php include '../includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){

	}else{
		header('Location: login.php');
	}
?>


<?php 
	if(!isset($_GET['newUser'])  AND !isset($_GET['editUser'])){
?>
<!-- lista de usuarios -->
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>
		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<div class="section-title">
					<div class="left">
						<h2>Lista de usuarios</h2>
						<p>Esta es la lista de usuarios registrados en la aplicación.</p>
					</div>
					<a href="users.php?newUser=1" class="waves-effect waves-light btn light-blue bg-accent">Crear usuario</a>
				</div>
				<div class="table-data">
					<table border="1">
					  <thead>
					    <tr>
					        <th>ID</th>
					        <th>Usuario</th>
					        <th>Nombre</th>
					        <th>Email</th>
					        <th>Rol</th>
					        <th>Acciones</th>
					    </tr>
					  </thead>

					  <tbody>
					    <?php $GFUser->allUsers(); ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- /lista de usuarios -->
<?php 
	}
?>


<?php 
	if(isset($_GET['newUser'])){
?>
<!-- agregar usuarios -->
<main>
	<div class="row">
		<div class="col s12 m12 l2 xl2">
			<?php include_once '../includes/side-nav.php'; ?>
		</div>

		<div class="col s12 m12 l10 xl10 container-full">
			<div class="bg-container z-depth-1">
				<div class="section-title">
					<div class="left">
						<h2>Agregar un usuario</h2>
						<p>Llena todos los datos necesarios para crear un usuario.</p>
					</div>
					<a href="users.php" class="waves-effect waves-light btn bg-main">Cancelar</a>
				</div>
				<form class="form-wrap">
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="name" type="text" placeholder="Escribe el nombre">
				          <label for="name">Nombre</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="email" type="text" placeholder="Escribe el email">
				          <label for="email">Email</label>
				        </div>
				      </div>
				      <div class="row">
				      	<div class="input-field col s12">
				          <input id="user" type="text" placeholder="Escribe el usuario">
				          <label for="user">Usuario</label>
				        </div>
				        <div class="input-field col s12">
				          <select id="rol">
				               <option value="" disabled selected>Selecciona una opción</option>
				               <option value="1">Administrador</option>
				               <option value="2">Empleado</option>
				               <option value="3">Prospecto</option>
				             </select>
				             <label>Rol de usuario</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="password" type="password" autocomplete="new-password" placeholder="Escribe la contraseña">
				          <label for="password">Contraseña</label>
				        </div>

				      </div>
				      <div class="row">
				      	<div class="col s12">
				      		<span class="register-error"></span>
				      	</div>
				        <div class="col s12">
				          <span class="waves-effect waves-light btn light-blue darken-3 green accent-4" id="newUserBtn">Crear usuario</span>
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
<!-- /agregar usuario -->
<?php 
	}
?>


<?php 
	if(isset($_GET['editUser'])){

	$user_to_edit_id = $_GET['editUser'];
	$userToEdit = $GFUser->userData($user_to_edit_id);
?>
<!-- /editar usuario -->
<main class="container">
	<div class="row">
		<div class="col s12  bg-container z-depth-1">
			<div class="section-title">
				<div class="left">

					<h2>Editar usuario <?php echo $userToEdit->name; ?></h2>
					<p>Edita los campos para actualizar el usuario.</p>
				</div>
			</div>
			<form class="col s12 form-wrap">
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="name" type="text" placeholder="Escribe el nombre" value="<?php echo $userToEdit->name; ?>">
			          <label for="name">Nombre</label>
			        </div>
			        <div class="input-field col s12">
			          <input id="email" type="text" placeholder="Escribe el email" value="<?php echo $userToEdit->email; ?>">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s12">
			          <input id="user" type="text" placeholder="Escribe el usuario" value="<?php echo $userToEdit->user; ?>">
			          <label for="user">Usuario</label>
			        </div>
			        <div class="input-field col s6">
			          <select>
			               <option value="" disabled selected>Selecciona una opción</option>
			               <option value="1">Usuario</option>
			               <option value="2">Administrador</option>
			             </select>
			             <label>Rol de usuario</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="password" value="<?php echo $userToEdit->password; ?>" autocomplete="new-password" placeholder="Escribe la contraseña">
			          <label for="password">Contraseña</label>
			        </div>

			      </div>
			      <div class="row">
			        <div class="col s12">
			          <a class="waves-effect waves-light btn light-blue darken-3 green accent-4">Crear usuario</a>
			        </div>
			      </div>
			    </form>
		</div>
	</div>
</main>
<!-- /editar usuario -->
<?php 
	}
?>

<?php include '../includes/footer.php'; ?>