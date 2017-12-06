<!-- datos escolares -->
<div class="row">
	<h4>Datos Escolares</h4>

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="nivel_maximo_estudios_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
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
	<div class="input-field col s12" id="avance_actualmente_estudiando_wrap">
	  <input id="avance_actualmente_estudiando_sv" type="text" placeholder="Especifique avance:" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="avance_actualmente_estudiando_sv">Especifique avance</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que estudiaron carrera -->
	<div class="input-field col s12">
	  <input id="tipo_carrera_sv" type="text" placeholder="Carrera estudiada" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="tipo_carrera_sv">Carrera estudiada</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="titulado_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  	     <option value="" disabled selected>Selecciona el estado de tu título</option>
	  	     <option value="Si">Si</option>
	  	     <option value="No">No</option>
	  	     <option value="Trámite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opción a tramitar el título">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opción a tramitar el título">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	   </select>
	  	   <label>¿Titulado?</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que el tramite está en curso -->
	<div class="input-field col s12" id="avance_tramite_wrap">
	  <input id="avance_tramite_sv" type="text" placeholder="Avance del trámite" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="avance_tramite_sv">Avance del trámite</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que el tramite está en curso -->
	<div class="input-field col s12" id="estado_tramite_titulo_wrap">
	  <input id="estado_tramite_titulo_sv" type="text" placeholder="Especifique el estado de su título">
	  <label for="estado_tramite_titulo_sv">Especifique el estado de su título</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que si tienen titulo -->
	<div class="input-field col s12">
	  <input id="ano_graduacion_sv" type="text" placeholder="Año de la graduación">
	  <label for="ano_graduacion_sv">Año de la graduación</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="escuela_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
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
	<div class="input-field col s12" id="otra_escuela_wrap">
	  <input id="otra_escuela_sv" type="text" placeholder="Especifique otra escuela" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="otra_escuela_sv">Especifique otra escuela</label>
	</div>
	<!-- /item -->


</div>
<!-- datos escolares -->