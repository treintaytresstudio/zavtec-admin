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

	//Loguear usuario
	$("#loginProceso").click(function(){
		var user = $("#user").val();
		var password = $("#password").val();

	    $.ajax({
	        url:ajaxPhp,
	        type: 'POST',
	        data: {ot: 'loginProceso', password: password, user: user},
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
	    			window.location.href = "inicio.php";
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
		var imagen = $("#imagen_cv").val();

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'registerUser',imagen:imagen, name:name, email:email,sex:sex,password: password, user: user},
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
				//Si la imagen está vacía
				if(data == 10){
					$(".register-error").fadeIn();
					$(".register-error").html("<i class='material-icons'>error</i> La imagen es requerida.");
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


	//Agregar un comentario
	$("#addCommentBtn").click(function(){
		var comentario = $("#comentario").val();
		var user_id = $(this).data("user-id");
		var solicitud_id = $(this).data("solicitud-id");

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'newComment',solicitud_id:solicitud_id, comentario:comentario, user_id:user_id},
		    beforeSend: function(){

		    }
		})
		.done(function(data) {
			$('.comentarios-no').fadeOut();
			$('#comentarios-load').prepend('<li class="collection-item avatar animated bounceInUp" style="padding-top: 25px !important;"> <img src="../assets/img/man.png" alt="" class="circle"> <span class="title">'+user_id+'</span> <p style="padding: 15px 0;"> '+comentario+' </p> <a href="#!" class="secondary-content">En este momento</a></li>');
			$("#comentario").val('');
		});

	});

	//Agregar calificación
	$("#addCalificacionBtn").click(function(){
		var calificacion = $("#calificacionVal").val();
		var solicitud_id = $(this).data("solicitud-id");

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'newCalificacion',solicitud_id:solicitud_id, calificacion:calificacion},
		    beforeSend: function(){

		    }
		})
		.done(function(data) {
			var path = window.location.href;
			window.location.href = path;
		});

	});


	//Comenzar proceso vacante
	$("#comenzarProcesoBtn").click(function(){
		var user_id = $(this).data("user-id");
		var vacante_id = $(this).data("vacante-id");

		$.ajax({
		    url:ajaxPhp,
		    type: 'POST',
		    data: {ot: 'comenzarProceso',user_id:user_id,vacante_id:vacante_id},
		    beforeSend: function(){
		    
		    }
		})
		.done(function(data) {
			var path = window.location.href;
			window.location.href = path+'&solicitudID='+data;
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

//borramos la solicitud
$(document).on("click", "#borrarSolicitudBtn", function(){
	var solicitud_id = $(this).data("solicitud-id");
	var ajaxPhp = '../core/ajax/ajax.php';

	swal({
	  title: 'Seguro que deseas eliminar la solicitud?',
	  text: "Perderás toda su información!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, estoy seguro!'
	}).then((result) => {
	  if (result.value) {

	  	//Borramos la solicitud
	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'deleteSolicitud', solicitud_id: solicitud_id},
	  	    beforeSend: function(){
	  			//Antes de enviar peticións
	  	    }
	  	})
	  	.done(function(data) {

	  		if(data == 1){
	  			swal({
	  			  title: 'Eliminado',
	  			  text: "La solicitud se eliminó exitosamente",
	  			  type: 'success',
	  			  showCancelButton: false,
	  			  confirmButtonColor: '#3085d6',
	  			  confirmButtonText: 'Ok'
	  			}).then((result) => {
	  				if (result.value) {
	  					window.location.href = "solicitudes-vacantes.php";
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


/* /////////////////////
	SOLICITUD DE VACANTE
*/ ////////////////////

//Nombre
$(document).on("change", "#nombre_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'nombre';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Fecha de nacimiento
$(document).on("change", "#fecha_nacimiento_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'fecha_nacimiento';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Licencia manejo
$(document).on("change", "#licencia_manejo_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'licencia_manejo';

	if(val == 1){
		$("#licencia_manejo_wrap").fadeIn();
	}else{
		$("#licencia_manejo_wrap").fadeOut();
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Licencia manejo
$(document).on("change", "#tipo_numero_licencia_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'tipo_numero_licencia';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Nivel maximo de estudios
$(document).on("change", "#nivel_maximo_estudios_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'nivel_maximo_estudios';

	if(val === 'Actualmente estudiando'){
		$("#avance_actualmente_estudiando_wrap").fadeIn();
	}else{
		$("#avance_actualmente_estudiando_wrap").fadeOut();
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Avance de estudios
$(document).on("change", "#avance_actualmente_estudiando_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'avance_actualmente_estudiando';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//titulado
$(document).on("change", "#titulado_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'titulado';

	if(val === 'Trámite en curso'){
		$("#avance_tramite_wrap").fadeIn();
	}else if(val !== 'Trámite en curso'){
		$("#avance_tramite_wrap").fadeOut();
	}else if(val === 'Otro'){
		$("#estado_tramite_titulo_wrap").fadeIn();
	}else if(val !== 'Otro'){
		$("#estado_tramite_titulo_wrap").fadeOut();
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Avance del tramite del titulo
$(document).on("change", "#avance_tramite_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'avance_tramite_titulo';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Escuela
$(document).on("change", "#escuela_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'escuela';

	if(val === 'Otra'){
		$("#otra_escuela_wrap").fadeIn();
	}else{
		$("#otra_escuela_wrap").fadeOut();
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Otra escuela
$(document).on("change", "#otra_escuela_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'otra_escuela';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Ingresar curso
$(document).on("click", ".ingresarCurso", function(){
	$(this).hide();
	$("#agregarCurso").fadeIn();
});

//Agregar curso
$(document).on("click", ".agregarCursoBtn", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var nombre_curso = $("#nombre_curso").val();
	var fecha_curso = $("#fecha_curso").val();
	var lugar_curso = $("#lugar_curso").val();
	var solicitudID = $(this).data("solicitud-id");


	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'agregarCursoSV', solicitudID:solicitudID, nombre_curso:nombre_curso, fecha_curso:fecha_curso, lugar_curso:lugar_curso},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {
	  		var curso_id = 'curso'+data;

	  		$('.cursos-load').append('<div class="cursos-data" id="'+curso_id+'"><h5>'+nombre_curso+'</h5><span class="eliminarCursoBtn" data-curso-id="'+data+'">Eliminar curso</span></div>');
	  		$("#nombre_curso").val("");
	  		$("#fecha_curso").val("");
	  		$("#lugar_curso").val("");

	  		$("#agregarCurso").fadeOut();
	  		$(".ingresarCurso").fadeIn();



	  	});
});

//Ingresar experiencia
$(document).on("click", ".ingresarExperiencia", function(){
	$(this).hide();
	$("#agregarExperiencia").fadeIn();
});

//Agregar experiencia
$(document).on("click", ".agregarExperienciaBtn", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var empresa= $("#empresa_sv").val();
	var trabajo_actual_val = $("#trabajo_actual_val_sv").val();
	var ramo = $("#ramo_sv").val();
	var fecha_inicio_trabajo = $("#fecha_inicio_trabajo_sv").val();
	var puesto = $("#puesto_sv").val();
	var personas_cargo = $("#personas_cargo_sv").val();
	var actividades = $("#actividades_sv").val();
	var salario = $("#salario_sv").val();
	var jefe_directo = $("#jefe_directo_sv").val();
	var telefono_jefe = $("#telefono_jefe_sv").val();
	var prestaciones = $("#prestaciones_sv").val();
	var solicitudID = $(this).data("solicitud-id");


	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'agregarExperienciaSV', solicitudID:solicitudID, empresa:empresa, trabajo_actual_val:trabajo_actual_val, ramo:ramo, fecha_inicio_trabajo:fecha_inicio_trabajo,puesto:puesto,personas_cargo:personas_cargo,actividades:actividades,salario:salario,jefe_directo:jefe_directo,telefono_jefe:telefono_jefe,telefono_jefe:telefono_jefe,prestaciones:prestaciones},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {
	  		var experiencia_id = 'experiencia'+data;

	  		$('.experiencia-load').append('<div class="experiencia-data" id="experiencia'+data+'"><div><h5>Empresa: '+empresa+'</h5><ul><li> Puesto: '+puesto+'</li><li> Actividades: '+actividades+' </li><li> Salario: '+salario+' </li></ul></div><span class="eliminarExperienciaBtn" data-experiencia-id="'+data+'">Eliminar experiencia</span></div>');

	  		$("#empresa").val("");
	  		$("#trabajo_actual_val").val("");
	  		$("#ramo").val("");
	  		$("#fecha_inicio_trabajo").val("");
	  		$("#puesto").val("");
	  		$("#personas_cargo").val("");
	  		$("#actividades").val("");
	  		$("#salario").val("");
	  		$("#jefe_directo").val("");
	  		$("#telefono_jefe").val("");
	  		$("#prestaciones").val("");

	  		$("#agregarExperiencia").fadeOut();
	  		$(".ingresarExperiencia").fadeIn();

	  	});
});

//nss
$(document).on("change", "#nss_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'nss';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//infonavit
$(document).on("change", "#infonavit_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'infonavit';


		if(val === '1'){
			$("#num_credito_inf_wrap").fadeIn();
			$("#descuento_vsm_wrap").fadeIn();
		}else{
			$("#num_credito_inf_wrap").fadeOut();
			$("#descuento_vsm_wrap").fadeOut();
		}


	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//numero de credito infonavit
$(document).on("change", "#num_credito_inf_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'num_credito_inf';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//numero de credito infonavit
$(document).on("change", "#descuento_vsm_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'descuento_vsm';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//RFC
$(document).on("change", "#rfc_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'rfc';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//RFC
$(document).on("change", "#curp_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'curp';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Salario deseado
$(document).on("change", "#salario_deseado_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'salario_deseado';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Carrera estudiada
$(document).on("change", "#tipo_carrera_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'carrera_estudiada';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Email
$(document).on("change", "#correo_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'email';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Teléfono
$(document).on("change", "#telefono_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'telefono';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Celular
$(document).on("change", "#celular_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'celular';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Dirección
$(document).on("change", "#direccion_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'direccion';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Municipio
$(document).on("change", "#municipio_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'municipio';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Estado
$(document).on("change", "#estado_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'estado';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//CP
$(document).on("change", "#cp_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'cp';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Estado civil
$(document).on("change", "#estado_civil_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'estado_civil';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});

	  	//Si seleccionan divorciado mostramos pensión
	  	if(val == 'Divorciado'){
	  		$("#pension_wrap").fadeIn();
	  	}else{
	  		$("#pension_wrap").fadeOut();
	  	}
});

//CP
$(document).on("change", "#monto_pension_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var val = $(this).val();
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'pension';

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Dependientes padres
$(document).on("change", "#dep_padres_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveDepPadresSV', val:val, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});



//Dependientes esposa e hijos
$(document).on("change", "#dep_esposa_hijos_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");

	if ($(this).is(':checked')){
		var val = 1;
		$("#dep_num_hijos_wrap").fadeIn();
	}else{
		var val = 0;
		$("#dep_num_hijos_wrap").fadeOut();
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveDepEsposaHijosSV', val:val, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Dependientes hermanos
$(document).on("change", "#dep_hermanos_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveDepHermanosSV', val:val, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Dependientes otros
$(document).on("change", "#dep_otros_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");

	if ($(this).is(':checked')){
		$("#dep_otros_wrap").fadeIn();
	}else{
		$("#dep_otros_wrap").fadeOut();
	}
});

//Dependientes Otros
$(document).on("change", "#dep_esp_otros_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var val = $(this).val();

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveDepEspOtrosSV', val:val, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Dependientes Número de hijos
$(document).on("change", "#dep_num_hijos", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var val = $(this).val();

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveDepNumHijosSV', val:val, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Experiencia administrativo
$(document).on("change", "#exp_administrativo_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'exp_administrativo';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia atención a clientes
$(document).on("change", "#exp_atencion_clientes_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'exp_atencion_clientes';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia instalaciones
$(document).on("change", "#exp_instalaciones_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'exp_instalaciones';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia intendencia
$(document).on("change", "#exp_intendencia_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'exp_intendencia';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia otro interés
$(document).on("change", "#exp_otro_interes_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'exp_otro_interes';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Experiencia desarrollar administrativo
$(document).on("change", "#des_administrativo_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'des_administrativo';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia desarrollar atención a clientes
$(document).on("change", "#des_atencion_clientes_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'des_atencion_clientes';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Experiencia desarrollar instalaciones
$(document).on("change", "#des_instalaciones_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'des_instalaciones';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Experiencia desarrollar administrativo
$(document).on("change", "#des_intendencia_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'des_intendencia';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});


//Experiencia desarrollar administrativo
$(document).on("change", "#des_otro_interes_sv", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var solicitudID = $(this).data("solicitud-id");
	var campo = 'des_otro_interes';

	if ($(this).is(':checked')){
		var val = 1;
	}else{
		var val = 0;
	}

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'saveSV', val:val, campo:campo, solicitudID:solicitudID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {

	  	});
});

//Eliminar curso
$(document).on("click", ".eliminarCursoBtn", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var cursoID = $(this).data("curso-id");

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'deleteCurso', cursoID:cursoID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {
	  		$("#curso"+cursoID).fadeOut();
	  	});
});

//Eliminar experiencia
$(document).on("click", ".eliminarExperienciaBtn", function(){
	var ajaxPhp = '../core/ajax/ajax.php';
	var experienciaID = $(this).data("experiencia-id");

	  	$.ajax({
	  	    url:ajaxPhp,
	  	    type: 'POST',
	  	    data: {ot: 'deleteExperiencia', experienciaID:experienciaID},
	  	    beforeSend: function(){
	  			//Antes de enviar peticiones

	  	    }
	  	})
	  	.done(function(data) {
	  		$("#experiencia"+experienciaID).fadeOut();
	  	});
});











