<!-- cursos -->
<div class="row">
	<h4>Cursos</h4>
	
	<div class="cursos-load">
		<?php $cursos= $GFSolicitudVacante->cursos($solicitudID); ?>
	</div>
	

	<p class="exitoCurso">El curso se agregó exitosamente</p>

	<span class="waves-effect waves-light btn bg-accent ingresarCurso"><i class="material-icons left">add</i>Ingresar curso</span>

	<div id="agregarCurso" style="margin-top: 25px;">
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

		<div class="input-field col s12">
			<span class="waves-effect waves-light btn bg-accent agregarCursoBtn" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"><i class="material-icons left">add</i>Agregar curso</span>
		</div>
	</div>
</div>
<!-- /cursos -->