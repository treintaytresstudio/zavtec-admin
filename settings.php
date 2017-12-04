<?php $page = 'Configuración'; ?>
<?php include 'includes/header.php'; ?>
<?php 
	//Si el usuario no está logueado, lo regresamos al login
	if($GFUser->loggedIn() === true){

	}else{
		header('Location: login.php');
	}
?>


<!-- agregar usuarios -->
<main class="container">
	<div class="row">
		<div class="col s12  bg-container z-depth-1">
			<div class="section-title">
				<div class="left">
					<h2>Configuración</h2>
					<p>Configuraciones de la aplicación.</p>
				</div>
				<div class="nav-section">
					<a href="index.php">Dashboard</a>
					<a href="#!" class="separator">/</a>
			        <a href="#!" class="active"><?php echo $page; ?></a>
				</div>
			</div>
			<form class="col s12 form-wrap">

				  <div class="row">
				  	<div class="sub-section-tile">
				  		<h4>Datos de la Aplicación</h4>
				  	</div>
				  </div>

			      <div class="row">
			        <div class="input-field col s12">
			          <input id="name_app" type="text" placeholder="Escribe el nombre de la aplicación">
			          <label for="name_app">Nombre de la aplicación</label>
			        </div>
			      </div>

			      <div class="row">
			      	<div class="sub-section-tile">
			      		<h4>Datos de la empresa</h4>
			      	</div>
			      </div>

			      <div class="row">
			      	<div class="input-field col s12">
			      	  <input id="name_client" type="text" placeholder="Escribe el nombre de la empresa">
			      	  <label for="name_client">Nombre de la empresa</label>
			      	</div>
			      </div>

			      <div class="row">
			      	<div class="input-field col s6">
			          <input id="contact_client" type="text" placeholder="Escribe el nombre del contacto en la empresa">
			          <label for="contact_client">Contacto en la empresa</label>
			        </div>

			        <div class="input-field col s6">
			          <input id="adress_client" type="text" placeholder="Escribe la dirección de la empresa">
			          <label for="adress_client">Dirección de la empresa</label>
			        </div>
			      </div>

			      <div class="row">
			      	<div class="input-field col s6">
			          <input id="phone_client" type="text" placeholder="Escribe  el teléfono de la empresa">
			          <label for="phone_client">Teléfono de la empresa</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="email_client" type="text" placeholder="Escribe el correo electrónico de la empresa">
			          <label for="email_client">Correo de la empresa</label>
			        </div>
			      </div>

			      <div class="row">
			        <div class="col s12">
			          <a class="waves-effect waves-light btn light-blue darken-3 green accent-4">Actualizar</a>
			        </div>
			      </div>

			    </form>
		</div>
	</div>
</main>
<!-- /agregar usuario -->





<?php include 'includes/footer.php'; ?>