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
?>

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
				<div class="row">
					<h4>Datos generales</h4>

					<!-- item -->
					<div class="input-field col s12">
					  <input id="nombre" type="text" placeholder="Escribe tu número">
					  <label for="nombre">Nombre</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  <input id="correo" type="text" placeholder="Escribe tu correo electrónico">
					  <label for="correo">Correo electrónico</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  <input id="telefono" type="text" placeholder="Escribe tu teléfono">
					  <label for="telefono">Teléfono</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  <input id="celular" type="text" placeholder="Escribe tu celular">
					  <label for="celular">Celular</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<textarea id="direccion" class="materialize-textarea"></textarea>
						<label for="direccion">Dirección</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="municipio">
					  	     <option value="" disabled selected>Selecciona tu municipio</option>
					  	     <option value="1">Santiago</option>
					  	     <option value="2">Allende</option>
					  	     <option value="3">Montemorelos</option>
					  	     <option value="4">Monterrey</option>

					  	   </select>
					  	   <label>Municipio</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="estado">
					  	     <option value="" disabled selected>Selecciona tu estado</option>
					  	     <option value="1">Nuevo León</option>
					  	     <option value="2">Coahuila</option>

					  	   </select>
					  	   <label>Estado</label>
					</div>
					<!-- /item -->
					
					<!-- item -->
					<div class="input-field col s12">
					  <input id="cp" type="text" placeholder="Escribe tu código postal">
					  <label for="cp">C.P.</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="estado_civil">
					  	     <option value="" disabled selected>Estado civil</option>
					  	     <option value="1">Soltero</option>
					  	     <option value="2">Casado</option>
					  	     <option value="3">Unión libre</option>
					  	     <option value="4">Divorciado</option>
					  	     <option value="5">Viudo</option>
					  	   </select>
					  	   <label>Estado civil</label>
					</div>
					<!-- /item -->

					<!-- si selecciona divorciado , hay que especificar el monto de pensión -->

					<!-- item -->
					<div class="input-field col s12">
					  <input id="monto_pension" type="text" placeholder="Escribe el monto de la pensión">
					  <label for="monto_pension">Monto de pensión</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
						<p style="margin-top: 0;padding-top: 0;">Dependientes</p>
				  	    <input type="checkbox" class="filled-in" id="padres"/>
				  	    <label for="padres">Padres</label> 
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
				  	    <input type="checkbox" class="filled-in" id="esposa-e-hijos" />
				  	    <label for="esposa-e-hijos">Esposa e hijos</label> 
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
				  	    <input type="checkbox" class="filled-in" id="hermanos" />
				  	    <label for="hermanos">Hermanos</label> 
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
				  	    <input type="checkbox" class="filled-in" id="otros" />
				  	    <label for="otros">otros</label> 
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12" style="margin-top: 50px;">
					  <input id="cp" type="text" placeholder="num_hijos">
					  <label for="num_hijos">Número de hijos</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
				  	    <input type="text" class="datepicker" id="fecha_nacimiento"> 
				  	    <label for="fecha_nacimiento">Fecha de nacimiento</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="licencia_manejo">
					  	     <option value="" disabled selected>Licencia de manejo</option>
					  	     <option value="1">Si</option>
					  	     <option value="0">No</option>
					  	   </select>
					  	   <label>Licencia de manejo</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que si tiene licencia -->
					<div class="input-field col s12" style="margin-top: 50px;">
					  <input id="tipo_numero_licencia" type="text" placeholder="Tipo y número de licencia">
					  <label for="tipo_numero_licencia">Tipo y número de licencia</label>
					</div>
					<!-- /item -->


				</div>
				<!-- /datos generales -->



				<!-- datos escolares -->
				<div class="row">
					<h4>Datos Escolares</h4>

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="nivel_maximo_estudios">
					  	     <option value="" disabled selected>Nivel máximo de estudios</option>
					  	     <option value="Primaria">Primaria</option>
					  	     <option value="Secundaria">Secundaria</option>
					  	     <option value="Preparatoria">Preparatoria</option>
					  	     <option value="Carrera técnica">Carrera técnica</option>
					  	     <option value="Carrera universitaria">Carrera universitaria</option>
					  	     <option value="Maestría">Maestría</option>
					  	     <option value="Actualmente estudiando">Actualmente estudiando</option>

					  	   </select>
					  	   <label>Nivel máximo de estudios</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que estan actualmente estudiando -->
					<div class="input-field col s12">
					  <input id="avance_actualmente_estudiando" type="text" placeholder="Especifique avance:">
					  <label for="avance_actualmente_estudiando">Especifique avance</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que estudiaron carrera -->
					<div class="input-field col s12">
					  <input id="tipo_carrera" type="text" placeholder="Carrera estudiada">
					  <label for="tipo_carrera">Carrera estudiada</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="nivel_maximo_estudios">
					  	     <option value="" disabled selected>Selecciona el estado de tu título</option>
					  	     <option value="Si">Si</option>
					  	     <option value="Trámite en curso">Trámite en curso</option>
					  	     <option value="Pasante con opción a tramitar el título">Pasante con opción a tramitar el título</option>
					  	     <option value="Pasante sin opción a tramitar el título">Pasante sin opción a tramitar el título</option>
					  	     <option value="Otro">Otro</option>

					  	   </select>
					  	   <label>¿Titulado?</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que si tienen titulo -->
					<div class="input-field col s12">
					  <input id="ano_graduacion" type="text" placeholder="Año de la graduación">
					  <label for="ano_graduacion">Año de la graduación</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que el tramite está en curso -->
					<div class="input-field col s12">
					  <input id="avance_tramite" type="text" placeholder="Avance del trámite">
					  <label for="avance_tramite">Avance del trámite</label>
					</div>
					<!-- /item -->

					<!-- item si escogen que el tramite está en curso -->
					<div class="input-field col s12">
					  <input id="otro_tramite" type="text" placeholder="Especifique el estado de su título">
					  <label for="otro_tramite">Especifique el estado de su título</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  	<select id="escuela">
					  	     <option value="" disabled selected>Selecciona tu escuela</option>
					  	     <option value="UANL">UANL</option>
					  	     <option value="ITESM">ITESM</option>
					  	     <option value="UR">UR</option>
					  	     <option value="UDEM">UDEM</option>
					  	     <option value="UVM">UVM</option>
					  	     <option value="Otra">Otra</option>

					  	   </select>
					  	   <label>Escuela</label>
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="input-field col s12">
					  <input id="otra_escuela" type="text" placeholder="Especifique otra escuela">
					  <label for="otra_escuela">Especifique otra escuela</label>
					</div>
					<!-- /item -->

					<h6 style="font-size: 19px; border-left: 3px solid red;padding-left: 4px;">Cursos tomados</h6>

					<!-- item-->
					<div class="input-field col s12">
					  <input id="nombre_curso" type="text" placeholder="Nombre del curso">
					  <label for="nombre_curso">Nombre del curso</label>
					</div>
					<!-- /item -->

					<!-- item-->
					<div class="input-field col s12">
					  <input id="fecha_curso" type="text" placeholder="Fecha">
					  <label for="fecha_curso">Fecha</label>
					</div>
					<!-- /item -->

					<!-- item-->
					<div class="input-field col s12">
					  <input id="lugar_curso" type="text" placeholder="Lugar donde se impartió">
					  <label for="lugar_curso">Lugar donde se impartió</label>
					</div>
					<!-- /item -->


				</div>
				<!-- datos escolares -->

			</div>
				
		</div>
	</div>
</main>
<?php include '../includes/footer.php'; ?>