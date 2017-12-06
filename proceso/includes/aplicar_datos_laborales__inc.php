<!-- datos laborales -->
<div class="row">
	<h4>Datos laborales</h4>
	<!-- item-->
	<div class="input-field col s12">
	  <input id="nss_sv" type="text" placeholder="NSS" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="nss_sv">NSS</label>
	</div>
	<!-- /item -->

	<!-- item -->
	<div class="input-field col s12">
	  	<select id="infonavit_sv" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  	     <option value="" disabled selected>Infonavit</option>
	  	     <option value="1">Si</option>
	  	     <option value="0">No</option>
	  	   </select>
	  	   <label>Infonavit</label>
	</div>
	<!-- /item -->

	<!-- item-->
	<div class="input-field col s12" id="num_credito_inf_wrap">
	  <input id="num_credito_inf_sv" type="text" placeholder="Número de crédito" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="num_credito_inf_sv">Número de crédito</label>
	</div>
	<!-- /item -->

	<!-- item-->
	<div class="input-field col s12" id="descuento_vsm_wrap">
	  <input id="descuento_vsm_sv" type="text" placeholder="Número de crédito" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="descuento_vsm_sv">Descuento VSM</label>
	</div>
	<!-- /item -->

	<!-- item-->
	<div class="input-field col s12">
	  <input id="rfc_sv" type="text" placeholder="RFC con Homoclave" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="rfc_sv">RFC con Homoclave</label>
	  <a href="https://www.siat.sat.gob.mx/PTSC/" style="position: relative; top: -16px;">No tengo mi RFC completo</a>
	</div>
	<!-- /item -->

	<!-- item-->
	<div class="input-field col s12">
	  <input id="curp_sv" type="text" placeholder="CURP" data-solicitud-id="<?php echo $_GET['solicitudID']; ?>">
	  <label for="curp_sv">CURP</label>
	</div>
	<!-- /item -->

</div>
<!-- datos laborales -->