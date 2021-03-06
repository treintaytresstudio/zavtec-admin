<!-- datos generales -->
<div class="row">
	<div class="avatar-app avatar-inicio" style="background:url(<?php echo $user->imagen ?>);"></div>
	<h4>Datos generales</h4>

	<!-- item -->
	<div class="input-field col s12">
	  <input id="nombre_sv" type="text" placeholder="Escribe tu número" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->nombre; ?>">
	  <label for="nombre_sv">Nombre</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  <input id="correo_sv" type="text" placeholder="Escribe tu correo electrónico" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->email; ?>">
	  <label for="correo_sv">Correo electrónico</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  <input id="telefono_sv" type="text" placeholder="Escribe tu teléfono" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->telefono; ?>">
	  <label for="telefono_sv">Teléfono</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  <input id="celular_sv" type="text" placeholder="Escribe tu celular" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->celular; ?>">
	  <label for="celular_sv">Celular</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<textarea id="direccion_sv" class="materialize-textarea" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"><?php echo $solicitud->direccion; ?></textarea>
		<label for="direccion">Dirección</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="municipio_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		 <?php if($solicitud->municipio !== ''){ ?>
	  		 <option value="<?php echo $solicitud->municipio; ?>"selected><?php echo $solicitud->municipio; ?></option>
	  		 
	  		<?php }else{ ?>
	  	     <option value="" disabled selected>Selecciona tu municipio</option>
	  	     <option value="Santiago">Santiago</option>
	  		 <option value="Allende">Allende</option>
	  	    <option value="Montemorelos">Montemorelos</option>
	  	    <option value="Monterrey">Monterrey</option>
	  	    <?php } ?>

	  	    <?php if($solicitud->municipio == 'Santiago'){ ?>
	  	    <option value="Allende">Allende</option>
	  	    <option value="Montemorelos">Montemorelos</option>
	  	    <option value="Monterrey">Monterrey</option>
	  	    <?php }else if($solicitud->municipio == 'Allende'){ ?>
			<option value="Santiago">Santiago</option>
	  	    <option value="Montemorelos">Montemorelos</option>
	  	    <option value="Monterrey">Monterrey</option>
			<?php }else if($solicitud->municipio == 'Montemorelos'){ ?>
			<option value="Santiago">Santiago</option>
	  	    <option value="Allende">Allende</option>
	  	    <option value="Monterrey">Monterrey</option>
	  	    <?php }else if($solicitud->municipio == 'Monterrey'){ ?>
	  	     <option value="Santiago">Santiago</option>
	  	     <option value="Allende">Allende</option>
	  	     <option value="Montemorelos">Montemorelos</option>
	  	    <?php } ?>

	  	   </select>
	  	   <label>Municipio</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="estado_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		 <?php if($solicitud->estado == ''){ ?>
	  		 <option value="" disabled selected>Selecciona tu estado</option>
	  		 <option value="Nuevo León">Nuevo León</option>
	  		 <option value="Coahuila">Coahuila</option>
	  	     <?php }else{ ?>
	  	     <option value="<?php echo $solicitud->estado; ?>"selected><?php echo $solicitud->estado; ?></option>
	  	    <?php }  ?>
			
			<?php if($solicitud->estado == 'Nuevo León'){ ?>
			<option value="Coahuila">Coahuila</option>
			<?php }else if($solicitud->estado == 'Coahuila'){ ?>
	  	    <option value="Nuevo León">Nuevo León</option>
	  	    <?php } ?>

	  	   </select>
	  	   <label>Estado</label>
	</div>
	<!-- /item -->
	
	<!-- item -->
	<div class="input-field col s12">
	  <input id="cp_sv" type="text" placeholder="Escribe tu código postal" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->cp; ?>">
	  <label for="cp_sv">C.P.</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="estado_civil_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		 <?php if($solicitud->estado_civil == ''){ ?>
	  	     <option value="" disabled selected>Estado civil</option>
	  	     <option value="Soltero">Soltero</option>
	  	     <option value="Casado">Casado</option>
	  	     <option value="Unión libre">Unión libre</option>
	  	     <option value="Divorciado">Divorciado</option>
	  	     <option value="Viudo">Viudo</option>
	  	     <?php }else{?>
	  	     <option value="<?php echo $solicitud->estado_civil; ?>"selected><?php echo $solicitud->estado_civil; ?></option>
	  	     <?php } ?>

	  	     <?php if($solicitud->estado_civil === 'Soltero'){ ?>
			 <option value="Casado">Casado</option>
	  	     <option value="Unión libre">Unión libre</option>
	  	     <option value="Divorciado">Divorciado</option>
	  	     <option value="Viudo">Viudo</option>
	  	     <?php }else if($solicitud->estado_civil === 'Viudo'){ ?>
			 <option value="Casado">Casado</option>
			 <option value="Unión libre">Unión libre</option>
			 <option value="Divorciado">Divorciado</option>
			 <option value="Soltero">Soltero</option>
			 <?php }else if($solicitud->estado_civil === 'Divorciado'){ ?>
			 <option value="Casado">Casado</option>
	  	     <option value="Unión libre">Unión libre</option>
	  	     <option value="Viudo">Viudo</option>
	  	     <option value="Soltero">Soltero</option>
	  	     <?php }else if($solicitud->estado_civil === 'Unión libre'){ ?>
			 <option value="Casado">Casado</option>
			 <option value="Divorciado">Divorciado</option>
			 <option value="Viudo">Viudo</option>
			 <option value="Soltero">Soltero</option>
			 <?php }else if($solicitud->estado_civil === 'Casado'){ ?>
	  	     <option value="Unión libre">Unión libre</option>
	  	     <option value="Divorciado">Divorciado</option>
	  	     <option value="Viudo">Viudo</option>
	  	     <option value="Soltero">Soltero</option>
	  	     
	  	     <?php } ?>

	  	   </select>
	  	   <label>Estado civil</label>
	</div>
	<!-- /item -->

	<!-- si selecciona divorciado , hay que especificar el monto de pensión -->

	<!-- item -->
	<div class="input-field col s12" id="pension_wrap" style="<?php if($solicitud->estado_civil === 'Divorciado'){echo 'display:block;';} ?>">
	  <input id="monto_pension_sv" type="text" placeholder="Escribe el monto de la pensión" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->pension; ?>">
	  <label for="monto_pension_sv">Monto de pensión</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
		<p style="margin-top: 0;padding-top: 0;">Dependientes</p>
  	    <input type="checkbox" <?php if($dependientes->padres == 1){echo 'checked';} ?>  class="filled-in" id="dep_padres_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" />
  	    <label for="dep_padres_sv">Padres</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
  	    <input type="checkbox" <?php if($dependientes->esposa_hijos == 1){echo 'checked';} ?> class="filled-in" id="dep_esposa_hijos_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" />
  	    <label for="dep_esposa_hijos_sv">Esposa e hijos</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
  	    <input type="checkbox" <?php if($dependientes->hermanos == 1){echo 'checked';} ?> class="filled-in" id="dep_hermanos_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" />
  	    <label for="dep_hermanos_sv">Hermanos</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
  	    <input type="checkbox" class="filled-in" <?php if($dependientes->otros !== ''){echo 'checked';} ?> id="dep_otros_sv" />
  	    <label for="dep_otros_sv">Otros</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12" id="dep_otros_wrap" style="margin-top: 65px; <?php if($dependientes->otros !== ''){echo 'display: block;';} ?>">
	  <input id="dep_esp_otros_sv" type="text" placeholder="Especifique otros" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $dependientes->otros; ?>">
	  <label for="dep_esp_otros_sv">Especifique otros</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12" id="dep_num_hijos_wrap" style="margin-top: 65px; <?php if($dependientes->esposa_hijos == 1){echo 'display: block;';} ?>">
	  <input id="dep_num_hijos" type="text" placeholder="Número de hijos" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $dependientes->num_hijos;?>">
	  <label for="dep_num_hijos">Número de hijos</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12" style="margin-bottom: 15px;">
		<p style="margin-bottom: 0;padding-bottom: 0;">Fecha de nacimiento</p>
  	    <input type="date" id="fecha_nacimiento_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->fecha_nacimiento;?>">
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="licencia_manejo_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  		 <?php if($solicitud->licencia_manejo == ''){ ?>
	  	     <option value="" disabled selected>Licencia de manejo</option>
	  	     <option value="0">No</option>
	  	     <option value="1">Si</option>
	  	     <?php }else{?>
	  	     <option value="<?php echo $solicitud->licencia_manejo; ?>"selected><?php if($solicitud->licencia_manejo == 1){echo 'Si';}else{echo 'No';}?>
	  	     </option>
	  	     <?php } ?>

	  	     <?php if($solicitud->licencia_manejo == 1){ ?>
			 <option value="0">No</option>
			 <?php }else if($solicitud->licencia_manejo == 0){ ?>
	  	     <option value="1">Si</option>
	  	     <?php } ?>
	  	     
	  	   </select>
	  	   <label>Licencia de manejo</label>
	</div>
	<!-- /item -->

	<!-- item si escogen que si tiene licencia -->
	<div class="input-field col s12" id="licencia_manejo_wrap" style="<?php if($solicitud->licencia_manejo == 1){echo'display:block;';} ?>">
	  <input id="tipo_numero_licencia_sv" type="text" placeholder="Tipo y número de licencia" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->tipo_numero_licencia; ?>">
	  <label for="tipo_numero_licencia_sv">Tipo y número de licencia</label>
	</div>
	<!-- /item -->


</div>
<!-- /datos generales -->