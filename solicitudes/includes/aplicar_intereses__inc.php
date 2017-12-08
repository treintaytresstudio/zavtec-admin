<!-- intereses -->
<div class="row">
	<h4>Intereses</h4>

	<!-- item-->
	<div class="input-field col s12">
	  <input id="salario_deseado_sv" type="text" placeholder="Salario deseado" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>" value="<?php echo $solicitud->salario_deseado; ?>">
	  <label for="salario_deseado_sv">Salario deseado</label>
	</div>
	<!-- /item -->
	
	<p style="margin-top: 25px;padding-top: 0;">Áreas laborales en las cuales considera tiene mayor experiencia:</p>

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->exp_administrativo == 1){echo'checked';} ?> class="filled-in" id="exp_administrativo_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="exp_administrativo_sv">Administrativo</label> 
	</div>
	<!-- /item -->
	
	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->exp_atencion_clientes == 1){echo'checked';} ?> class="filled-in" id="exp_atencion_clientes_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="exp_atencion_clientes_sv">Atención a clientes</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->exp_instalaciones == 1){echo'checked';} ?> class="filled-in" id="exp_instalaciones_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="exp_instalaciones_sv">Instalaciones</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->exp_intendencia == 1){echo'checked';} ?> class="filled-in" id="exp_intendencia_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="exp_intendencia_sv">Intendencia</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->exp_otro_interes == 1){echo'checked';} ?> class="filled-in" id="exp_otro_interes_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="exp_otro_interes_sv">Otro interés</label> 
	</div>
	<!-- /item -->
	

	<p style="margin-top: 25px;padding-top: 0;">Áreas laborales en las que les gustaría desarrollarse:</p>
	
	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->des_administrativo == 1){echo'checked';} ?> class="filled-in" id="des_administrativo_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="des_administrativo_sv">Administrativo</label> 
	</div>
	<!-- /item -->
	
	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->des_atencion_clientes == 1){echo'checked';} ?> class="filled-in" id="des_atencion_clientes_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="des_atencion_clientes_sv">Atención a clientes</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->des_instalaciones == 1){echo'checked';} ?> class="filled-in" id="des_instalaciones_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="des_instalaciones_sv">Instalaciones</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->des_intendencia == 1){echo'checked';} ?> class="filled-in" id="des_intendencia_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="des_intendencia_sv">Intendencia</label> 
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field">
		<input type="checkbox" <?php if($solicitud->des_otro_interes == 1){echo'checked';} ?> class="filled-in" id="des_otro_interes_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>"/>
		<label for="des_otro_interes_sv">Otro interés</label> 
	</div>
	<!-- /item -->


</div>
<!-- intereses -->