<!-- datos escolares -->
<div class="row">
	<h4>Datos Escolares</h4>

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="nivel_maximo_estudios_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
			<?php if($solicitud->nivel_maximo_estudios == ''){ ?>
	  	    <option value="" disabled selected>Nivel máximo de estudios</option>
	  	    <option value="Primaria">Primaria</option>
	  	    <option value="Secundaria">Secundaria</option>
			<option value="Preparatoria">Preparatoria</option>
			<option value="Carrera técnica">Carrera técnica</option>
			<option value="Carrera universitaria">Carrera universitaria</option>
			<option value="Maestría">Maestría</option>
			<option value="Actualmente estudiando">Actualmente estudiando</option>
	  	    <?php }else{?>
			<option value="<?php echo $solicitud->nivel_maximo_estudios; ?>"selected><?php echo $solicitud->nivel_maximo_estudios; ?></option>
			<?php } ?>

			<?php if($solicitud->nivel_maximo_estudios == 'Primaria'){ ?>
			<option value="Secundaria">Secundaria</option>
			<option value="Preparatoria">Preparatoria</option>
			<option value="Carrera técnica">Carrera técnica</option>
			<option value="Carrera universitaria">Carrera universitaria</option>
			<option value="Maestría">Maestría</option>
			<option value="Actualmente estudiando">Actualmente estudiando</option>

			<?php }else if($solicitud->nivel_maximo_estudios == 'Secundaria'){ ?>
			<option value="Primaria">Primaria</option>
			<option value="Preparatoria">Preparatoria</option>
			<option value="Carrera técnica">Carrera técnica</option>
			<option value="Carrera universitaria">Carrera universitaria</option>
			<option value="Maestría">Maestría</option>
			<option value="Actualmente estudiando">Actualmente estudiando</option>

			<?php }else if($solicitud->nivel_maximo_estudios == 'Preparatoria'){ ?>
			<option value="Primaria">Primaria</option>
			<option value="Secundaria">Secundaria</option>
			<option value="Carrera técnica">Carrera técnica</option>
			<option value="Carrera universitaria">Carrera universitaria</option>
			<option value="Maestría">Maestría</option>
			<option value="Actualmente estudiando">Actualmente estudiando</option>

			<?php }else if($solicitud->nivel_maximo_estudios == 'Carrera técnica'){ ?>
			<option value="Primaria">Primaria</option>
	  	     <option value="Secundaria">Secundaria</option>
	  	     <option value="Preparatoria">Preparatoria</option>
	  	     <option value="Carrera universitaria">Carrera universitaria</option>
	  	     <option value="Maestría">Maestría</option>
	  	     <option value="Actualmente estudiando">Actualmente estudiando</option>

	  	     <?php }else if($solicitud->nivel_maximo_estudios == 'Carrera universitaria'){ ?>
	  	     <option value="Primaria">Primaria</option>
	  	     <option value="Secundaria">Secundaria</option>
	  	     <option value="Preparatoria">Preparatoria</option>
	  	     <option value="Carrera técnica">Carrera técnica</option>
	  	     <option value="Maestría">Maestría</option>
	  	     <option value="Actualmente estudiando">Actualmente estudiando</option>

	  	     <?php }else if($solicitud->nivel_maximo_estudios == 'Maestría'){ ?>
			<option value="Primaria">Primaria</option>
			<option value="Secundaria">Secundaria</option>
			<option value="Preparatoria">Preparatoria</option>
			<option value="Carrera técnica">Carrera técnica</option>
			<option value="Carrera universitaria">Carrera universitaria</option>
			<option value="Actualmente estudiando">Actualmente estudiando</option>

			 <?php }else if($solicitud->nivel_maximo_estudios == 'Actualmente estudiando'){ ?>
	  	     <option value="Primaria">Primaria</option>
	  	     <option value="Secundaria">Secundaria</option>
	  	     <option value="Preparatoria">Preparatoria</option>
	  	     <option value="Carrera técnica">Carrera técnica</option>
	  	     <option value="Carrera universitaria">Carrera universitaria</option>
	  	     <option value="Maestría">Maestría</option>
			
			<?php } ?>
	  	   </select>
	  	   <label>Nivel máximo de estudios</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que estan actualmente estudiando -->
	<div class="input-field col s12" id="avance_actualmente_estudiando_wrap">
	  <input id="avance_actualmente_estudiando_sv" type="text" placeholder="Especifique avance:" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" 
	  <label for="avance_actualmente_estudiando_sv">Especifique avance</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que estudiaron carrera -->
	<div class="input-field col s12">
	  <input id="tipo_carrera_sv" type="text" placeholder="Carrera estudiada" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->carrera_estudiada; ?>">
	  <label for="tipo_carrera_sv">Carrera estudiada</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="titulado_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		<?php if($solicitud->titulado == ''){ ?>
	  	    <option value="" disabled selected>Selecciona el estado del título</option>
	  	    <option value="Si">Si</option>
	  	    <option value="No">No</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opcion a tramitar el titulo">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>
	  	    <?php }else{?>
			<option value="<?php echo $solicitud->titulado; ?>"selected><?php echo $solicitud->titulado; ?></option>
			<?php } ?>

			<?php if($solicitud->titulado == 'Si'){ ?>
	  	     <option value="No">No</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opcion a tramitar el titulo">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	    <?php }else if($solicitud->titulado == 'No'){ ?>
			<option value="Si">Si</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opcion a tramitar el titulo">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	     <?php }else if($solicitud->titulado == 'Tramite en curso'){ ?>
			<option value="Si">Si</option>
	  	     <option value="No">No</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opción a tramitar el titulo">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	     <?php }else if($solicitud->titulado == 'Pasante con opcion a tramitar el titulo'){ ?>
	  	     <option value="Si">Si</option>
	  	     <option value="No">No</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante sin opcion a tramitar el titulo">Pasante sin opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	     <?php }else if($solicitud->titulado == 'Pasante sin opcion a tramitar el titulo'){ ?>
	  	     <option value="Si">Si</option>
	  	     <option value="No">No</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Otro">Otro</option>

	  	     <?php }else if($solicitud->titulado == 'Otro'){ ?>
	  	     <option value="Si">Si</option>
	  	     <option value="No">No</option>
	  	     <option value="Tramite en curso">Trámite en curso</option>
	  	     <option value="Pasante con opcion a tramitar el titulo">Pasante con opción a tramitar el título</option>
	  	     <option value="Pasante sin opcion a tramitar el titulo">Pasante sin opción a tramitar el título</option>
			
			<?php } ?>

	  	   </select>
	  	   <label>¿Titulado?</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que el tramite está en curso -->
	<div class="input-field col s12" id="avance_tramite_wrap">
	  <input id="avance_tramite_sv" type="text" placeholder="Avance del trámite" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->estado_tramite_titulo; ?>">
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
	<div class="input-field col s12" style="display: none;">
	  <input id="ano_graduacion_sv" type="text" placeholder="Año de la graduación">
	  <label for="ano_graduacion_sv">Año de la graduación</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="escuela_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		<?php if($solicitud->escuela == ''){ ?>
	  	    <option value="" disabled selected>Selecciona la escuela</option>
	  	    <option value="UANL">UANL</option>
	  	    <option value="ITESM">ITESM</option>
	  	    <option value="UR">UR</option>
	  	    <option value="UDEM">UDEM</option>
	  	    <option value="UVM">UVM</option>
	  	    <option value="Otra">Otra</option>
	  	    <?php }else{?>
			<option value="<?php echo $solicitud->escuela; ?>"selected><?php echo $solicitud->escuela; ?></option>
			<?php } ?>

			<?php if($solicitud->escuela == 'UANL'){ ?>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UR">UR</option>
	  	     <option value="UDEM">UDEM</option>
	  	     <option value="UVM">UVM</option>
	  	     <option value="Otra">Otra</option>

	  	    <?php } else if($solicitud->escuela == 'ITESM'){ ?>
			<option value="UANL">UANL</option>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UR">UR</option>
	  	     <option value="UDEM">UDEM</option>
	  	     <option value="UVM">UVM</option>
	  	     <option value="Otra">Otra</option>
			
			<?php } else if($solicitud->escuela == 'UR'){ ?>
			  <option value="UANL">UANL</option>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UDEM">UDEM</option>
	  	     <option value="UVM">UVM</option>
	  	     <option value="Otra">Otra</option>

	  	     <?php } else if($solicitud->escuela == 'UDEM'){ ?>
			<option value="UANL">UANL</option>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UR">UR</option>
	  	     <option value="UVM">UVM</option>
	  	     <option value="Otra">Otra</option>

	  	     <?php } else if($solicitud->escuela == 'UVM'){ ?>
			<option value="UANL">UANL</option>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UR">UR</option>
	  	     <option value="UDEM">UDEM</option>
	  	     <option value="UVM">UVM</option>
	  	     <option value="Otra">Otra</option>

	  	     <?php } else if($solicitud->escuela == 'Otra'){ ?>
	  	     <option value="UANL">UANL</option>
	  	     <option value="ITESM">ITESM</option>
	  	     <option value="UR">UR</option>
	  	     <option value="UDEM">UDEM</option>
	  	     <option value="UVM">UVM</option>

	  	    <?php } ?>

	  	   </select>
	  	   <label>Escuela</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12" id="otra_escuela_wrap" style="<?php if($solicitud->escuela == 'Otra'){echo 'display: block;';} ?>">
	  <input id="otra_escuela_sv" type="text" placeholder="Especifique otra escuela" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->otra_escuela; ?>">
	  <label for="otra_escuela_sv">Especifique otra escuela</label>
	</div>
	<!-- /item -->


</div>
<!-- datos escolares -->