<?php 
	include '../init.php';

	 //Login
	if(isset($_POST['ot']) && $_POST['ot'] === 'login'){
	    $user = $_POST['user'];
	    $password = $_POST['password'];

	    if(!empty($email) or !empty($password)){
            if($GFUser->login($user, $password) === false){
                //Si el correo o la contraseña estan mal entonces
                echo 200;
            }
	    }else{
	        //el correo o la contraseña o ambos están vacíos
	        echo 300;
	    }
	  }

	  //Registro usuario nuevo
	  if(isset($_POST['ot']) && $_POST['ot'] === 'newUser'){
	      $name = $_POST['name'];
	      $password = $_POST['password'];
	      $email = $_POST['email'];
	      $user = $_POST['user'];
	      $rol = $_POST['rol'];

	      if(empty($name)){
	          echo 5;
	      }else if(empty($email)){
	          echo 6;
	      }else if(empty($user)){
	          echo 7;
	      }else if(empty($rol)){
	          echo 8;
	      }else if(empty($password)){
	          echo 9;
	      }else{

	          if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
	              //Si el correo no tiene un formato válido
	              echo 100;
	          }else{
	              if($GFUser->checkEmail($email) === true){
	                  //El correo ya está en uso
	                  echo 800;
	              }else if($GFUser->checkUserName($user) === false){
	                  //El usuario ya está en uso
	                  echo 900;
	              }else{
	                  $GFUser->registerUser($email, $name, $password, $user, $rol);
	                 
	              }
	          }
	      }

	  }

	  //Registro prospecto nuevo
	  if(isset($_POST['ot']) && $_POST['ot'] === 'registerUser'){
	      $name = $_POST['name'];
	      $password = $_POST['password'];
	      $email = $_POST['email'];
	      $user = $_POST['user'];
	      $sex = $_POST['sex'];

	      if(empty($name)){
	          echo 5;
	      }else if(empty($email)){
	          echo 6;
	      }else if(empty($user)){
	          echo 7;
	      }else if(empty($sex)){
	          echo 8;
	      }else if(empty($password)){
	          echo 9;
	      }else{

	          if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
	              //Si el correo no tiene un formato válido
	              echo 100;
	          }else{
	              if($GFUser->checkEmail($email) === true){
	                  //El correo ya está en uso
	                  echo 800;
	              }else if($GFUser->checkUserName($user) === false){
	                  //El usuario ya está en uso
	                  echo 900;
	              }else{
	                  $GFUser->registerUserProspect($email, $name, $password, $user, $sex);
	                 
	              }
	          }
	      }

	}

	//Registro de vacante nueva
	  if(isset($_POST['ot']) && $_POST['ot'] === 'registerVacante'){
	      $name = $_POST['name'];
	      $requisitos = $_POST['requisitos'];
	      $image = $_POST['image'];


	      if(empty($name)){
	      		//Si el nombre viene vacío
	          echo 5;
	      }else if(empty($requisitos)){
	      		//Si los requisitos vienen vacíos
	          echo 6;
	      }else{
	      		$GFVacante->registerVacante($name, $requisitos, $image);
	      }

	}

	//Actualización de vacante 
	  if(isset($_POST['ot']) && $_POST['ot'] === 'editVacante'){
	      $name = $_POST['name'];
	      $requisitos = $_POST['requisitos'];
	      $image = $_POST['image'];
	      $vacante_id = $_POST['vacante_id'];


	      if(empty($name)){
	      		//Si el nombre viene vacío
	          echo 5;
	      }else if(empty($requisitos)){
	      		//Si los requisitos vienen vacíos
	          echo 6;
	      }else{
	      		$GFVacante->updateVacante($vacante_id, $name, $image, $requisitos);
	      }

	}

	//Borrar vacante 
	  if(isset($_POST['ot']) && $_POST['ot'] === 'deleteVacante'){
	      $vacante_id = $_POST['vacante_id'];
 
	      $GFVacante->deleteVacante($vacante_id);

	}

	//Datos del usuario
  	if(isset($_POST['ot']) && $_POST['ot'] === 'deleteUser'){
  	    $user_id = $_POST['data_user'];

  	    $GFUser->deleteUser($user_id);
  	}




?>