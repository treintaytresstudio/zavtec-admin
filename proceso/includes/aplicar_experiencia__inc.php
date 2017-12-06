
<!-- experiencia -->
<div class="row">
	<h4>Experiencia</h4>

	<p class="exitoExperiencia">El trabajo se agregó exitosamente</p>

	<span class="waves-effect waves-light btn bg-accent ingresarExperiencia"><i class="material-icons left">add</i>Ingresar curso</span>

	<div id="agregarExperiencia">

		<!-- item-->
		<div class="input-field col s12">
		  <input id="empresa_sv" type="text" placeholder="Empresa" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="empresa_sv">Empresa</label>
		</div>
		<!-- /item -->

		<!-- item -->
		<div class="input-field col s12">
		  	<select id="trabajo_actual_val_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  	     <option value="" disabled selected>¿Es su trabajo actual?</option>
		  	     <option value="1">si</option>
		  	     <option value="0">no</option>
		  	   </select>
		  	   <label>¿Es su trabajo actual?</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="ramo_sv" type="text" placeholder="Ramo de la empresa" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="ramo_sv">Ramo de la empresa</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="fecha_inicio_trabajo_sv" type="text" placeholder="Fecha de inicio del trabajo" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="fecha_inicio_trabajo_sv">Fecha de inicio del trabajo</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="puesto_sv" type="text" placeholder="Puesto" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="puesto_sv">Puesto</label>
		</div>
		<!-- /item -->

		<!-- item -->
		<div class="input-field col s12">
		  	<select id="personas_cargo_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  	     <option value="" disabled selected>Personas a tu cargo</option>
		  	     <option value="0">0</option>
		  	     <option value="1">1 a 5</option>
		  	     <option value="2">6 a 10</option>
		  	     <option value="3">10 en adelante</option>
		  	   </select>
		  	   <label>Personas a tu cargo</label>
		</div>
		<!-- /item -->

		<!-- item -->
		<div class="input-field col s12">
		  	<textarea id="actividades_sv" class="materialize-textarea" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"></textarea>
			<label for="actividades_sv">Actividades</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="salario_sv" type="text" placeholder="Salario" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="salario_sv">Salario</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="jefe_directo_sv" type="text" placeholder="Jefe directo" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="jefe_directo_sv">Jefe directo</label>
		</div>
		<!-- /item -->

		<!-- item-->
		<div class="input-field col s12">
		  <input id="telefono_jefe_sv" type="text" placeholder="Teléfono" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  <label for="telefono_jefe_sv">Teléfono</label>
		</div>
		<!-- /item -->

		<!-- item -->
		<div class="input-field col s12">
		  	<select id="prestaciones_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
		  	     <option value="" disabled selected>Prestaciones</option>
		  	     <option value="0">Prestaciones de ley</option>
		  	     <option value="1">Seguro de gastos médicos</option>
		  	     <option value="2">Fondo de ahorro</option>
		  	   </select>
		  	   <label>Prestaciones</label>
		</div>
		<!-- /item -->

		<div class="input-field col s12">
			<span class="waves-effect waves-light btn bg-accent agregarExperienciaBtn" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"><i class="material-icons left">add</i>Agregar curso</span>
		</div>

	</div>

</div>
<!-- /experiencia -->