$(document).ready(function(){

	/* /////////////////////
		VARS
	*/ ////////////////////
	var ajaxPhp = '../core/ajax/ajax.php';
	var ajaxPhpRoot = 'core/ajax/ajax.php';

	/* /////////////////////
		LOGIN 
	*/ ////////////////////

	//Loguear usuario
	$("#btnLogin").click(function(){
		var user = $("#user").val();
		var password = $("#password").val();

	    $.ajax({
	        url:ajaxPhpRoot,
	        type: 'POST',
	        data: {ot: 'login', password: password, user: user},
	        beforeSend: function(){
	          $("#btnLogin").hide();
	          $(".loader").show();

	          $(".login-error").fadeOut();
	          $(".login-error").html("");
	        }
	    })
	    .done(function(data) {
	    	setTimeout(function(){
	    		$(".loader").hide();
	    		$("#btnLogin").show();

	    		//Si no llenaron los campos entonces
	    		if(data == 300){
	    			$(".login-error").fadeIn();
	    			$(".login-error").html("Usuario y contraseña son requeridos.");
	    		}
	    		//Si el correo o la contraseña no son correctos
	    		if(data == 200){
	    			$(".login-error").fadeIn();
	    			$(".login-error").html("El usuario y o la contraseña no coinciden.");
	    		}
	    		if(data == 1){
	    			window.location.href = "inicio/index.php";
	    		}
	    	}, 0);
	    });

	});

	//Crear usuario
	$("#newUserBtn").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var user = $("#user").val();
		var rol = $("#rol").val();
		var password = $("#password").val();

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'newUser', name:name, email:email,rol:rol,password: password, user: user},
		    beforeSend: function(){
		      $("#newUserBtn").hide();
		      $(".loader").show();

		      $(".register-error").fadeOut();
		      $(".register-error").html("");
		    }
		})
		.done(function(data) {
			setTimeout(function(){
				$(".loader").hide();
				$("#newUserBtn").show();

				//Si el nombre está vacío
				if(data == 5){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El nombre es requerido.");
				}
				//Si el email está vacío
				if(data == 6){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El correo electrónico es requerido.");
				}
				//Si el usuario está vacío
				if(data == 7){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El usuario es requerido.");
				}
				//Si el rol está vacío
				if(data == 8){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El rol de usuario es requerido.");
				}
				//Si la contraseña está vacía
				if(data == 9){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> La contraseña es requerida.");
				}
				//Si el correo no tiene buen formato
				if(data == 100){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El correo electrónico no tiene un formato válido.");
				}
				//Si el correo ya está en uso
				if(data == 800){
					$(".register-error").fadeIn();
					$(".register-error").html("El correo ya está en uso, intenta con otra opción.");
				}
				//Si el usuario está en uso 
				if(data == 900){
					$(".register-error").fadeIn();
					$(".register-error").html("El usuario ya  está en uso, intenta con otra opción.");
				}
				if(data == 1){
					
					swal({
					  type: 'success',
					  title: 'El usuario fue creado con éxito',
					  showConfirmButton: false,
					  timer: 2500
					})

					setTimeout(function(){
						window.location.href = "users.php";
					}, 2550);
				}
			}, 1000);
		});

	});

	//Crear usuario prospecto
	$("#btnRegister").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var user = $("#user").val();
		var sex = $("#sex").val();
		var password = $("#password").val();

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'registerUser', name:name, email:email,sex:sex,password: password, user: user},
		    beforeSend: function(){
		      $("#btnRegister").hide();
		      $(".loader").show();

		      $(".register-error").fadeOut();
		      $(".register-error").html("");
		    }
		})
		.done(function(data) {
			setTimeout(function(){
				$(".loader").hide();
				$("#btnRegister").show();

				//Si el nombre está vacío
				if(data == 5){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El nombre es requerido.");
				}
				//Si el email está vacío
				if(data == 6){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El correo electrónico es requerido.");
				}
				//Si el usuario está vacío
				if(data == 7){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El usuario es requerido.");
				}
				//Si el sexo está vacío
				if(data == 8){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El sexo del usuario es requerido.");
				}
				//Si la contraseña está vacía
				if(data == 9){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> La contraseña es requerida.");
				}
				//Si el correo no tiene buen formato
				if(data == 100){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El correo electrónico no tiene un formato válido.");
				}
				//Si el correo ya está en uso
				if(data == 800){
					$(".register-error").fadeIn();
					$(".register-error").html("El correo ya está en uso, intenta con otra opción.");
				}
				//Si el usuario está en uso 
				if(data == 900){
					$(".register-error").fadeIn();
					$(".register-error").html("El usuario ya  está en uso, intenta con otra opción.");
				}
				if(data == 1){

					window.location.href = "inicio.php";
				}
			}, 1000);
		});

	});

	//Agregar una vacante
	$("#newVacanteBtn").click(function(){
		var name = $("#name").val();
		var requisitos = $("#requisitos").val();
		var image = $("#image").val();

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'registerVacante', name:name, requisitos:requisitos,image:image},
		    beforeSend: function(){
		      $("#newVacanteBtn").hide();
		      $(".loader").show();

		      $(".register-error").fadeOut();
		      $(".register-error").html("");
		    }
		})
		.done(function(data) {
			setTimeout(function(){
				$(".loader").hide();
				$("#newVacanteBtn").show();

				//Si el nombre está vacío
				if(data == 5){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El nombre es requerido.");
				}
				//Si el email está vacío
				if(data == 6){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> Los requisitos son requerido.");
				}
				if(data == 1){
					swal({
					  type: 'success',
					  title: 'La vacante fue creada con éxito',
					  showConfirmButton: false,
					  timer: 2500
					})

					setTimeout(function(){
						window.location.href = "vacantes-list.php";
					}, 2550);

					
				}
			}, 1000);
		});

	});

	//Editar vacante
	$("#editVacanteBtnData").click(function(){
		var name = $("#name").val();
		var requisitos = $("#requisitos").val();
		var image = $("#image").val();
		var vacante_id = $(this).data("vacante-id");

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'editVacante', name:name, requisitos:requisitos,image:image, vacante_id:vacante_id},
		    beforeSend: function(){
		      $("#editVacanteBtnData").hide();
		      $(".loader").show();

		      $(".register-error").fadeOut();
		      $(".register-error").html("");
		    }
		})
		.done(function(data) {
			setTimeout(function(){
				$(".loader").hide();
				$("#editVacanteBtnData").show();

				//Si el nombre está vacío
				if(data == 5){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> El nombre es requerido.");
				}
				//Si el email está vacío
				if(data == 6){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> Los requisitos son requerido.");
				}
				if(data == 1){
					swal({
					  type: 'success',
					  title: 'La vacante fue editada con éxito',
					  showConfirmButton: false,
					  timer: 2500
					})

					setTimeout(function(){
						window.location.href = "index.php";
					}, 2550);

					
				}
			}, 1000);
		});

	});

});

//Propagation
$(document).on("click", ".deleteUserBtn", function(){
	var data_user = $(this).data("user-id");
	var ajaxPhp = 'core/ajax/ajax.php';

	swal({
	  title: 'Seguro que deseas eliminar el usuario?',
	  text: "Perderás toda su información!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, estoy seguro!'
	}).then((result) => {
	  if (result.value) {

	  	//Borramos el usuario
	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'deleteUser', data_user: data_user},
	  	    beforeSend: function(){
	  			//Antes de enviar peticións
	  	    }
	  	})
	  	.done(function(data) {

	  		if(data == 1){
	  			swal({
	  			  title: 'Eliminado',
	  			  text: "El usuario se eliminó exitosamente",
	  			  type: 'success',
	  			  showCancelButton: false,
	  			  confirmButtonColor: '#3085d6',
	  			  confirmButtonText: 'Ok'
	  			}).then((result) => {
	  				if (result.value) {
	  					window.location.href = "users.php";
	  				}
	  			});
	  		}
	  	});

	  }
	})
});

//Propagation
$(document).on("click", ".deleteVacanteBtn", function(){
	var vacante_id = $(this).data("vacante-id");
	var ajaxPhp = '../core/ajax/ajax.php';

	swal({
	  title: 'Seguro que deseas eliminar la vacante?',
	  text: "Perderás toda su información!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, estoy seguro!'
	}).then((result) => {
	  if (result.value) {

	  	//Borramos el usuario
	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'deleteVacante', vacante_id: vacante_id},
	  	    beforeSend: function(){
	  			//Antes de enviar peticións
	  	    }
	  	})
	  	.done(function(data) {

	  		if(data == 1){
	  			swal({
	  			  title: 'Eliminada',
	  			  text: "La vacante se eliminó exitosamente",
	  			  type: 'success',
	  			  showCancelButton: false,
	  			  confirmButtonColor: '#3085d6',
	  			  confirmButtonText: 'Ok'
	  			}).then((result) => {
	  				if (result.value) {
	  					window.location.href = "index.php";
	  				}
	  			});
	  		}
	  	});

	  }
	})
});


















