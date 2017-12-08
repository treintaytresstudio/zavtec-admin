<?php

class SolicitudVacante{
	
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function totalSolicitudes($user_id){
		$stmt = $this->pdo->prepare("
			SELECT
			vacante_id.
			FROM 
			solicitud_r_vacante_user 
			WHERE user_id = :user_id
		");

		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->execute();
	}


	public function vacanteImagen($solicitudID){
		$stmt= $this->pdo->prepare("
			SELECT
			solicitud_vacante.id,
			solicitud_vacante.user_id,
			users.imagen,
			users.id
			FROM solicitud_vacante
			JOIN users ON solicitud_vacante.user_id = users.id
			WHERE solicitud_vacante.id = :vacante_id
			
		");
		$stmt->bindParam(":vacante_id", $solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_OBJ);

		return $data->imagen;
		
		
	}

	public function newSolicitudVacante($user_id,$vacante_id){
		$fecha = date('Y-m-d');
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_vacante (vacante_id,fecha_inicio_proceso,user_id) VALUES (:vacante_id,:fecha_inicio_proceso,:user_id)");
		$stmt->bindParam(":vacante_id",$vacante_id, PDO::PARAM_STR);
		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio_proceso",$fecha, PDO::PARAM_STR);
		$stmt->execute();
		$solicitud_vacante_id = $this->pdo->lastInsertId();

		echo $solicitud_vacante_id;

		//Asignamos solictud al usuario
		$this->asignarSolicitud($user_id, $vacante_id, $solicitud_vacante_id);

		//Creamos dependientes
		$this->asignarDependientes($solicitud_vacante_id);

	}

	//Saber estado de la calificación de la solicitud
	public function statusCalificacion($solicitudID){
		$stmt= $this->pdo->prepare("SELECT calificacion FROM solicitud_vacante WHERE id =:id");
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$res = $stmt->fetch(PDO::FETCH_OBJ);

		if($res->calificacion == 0){
			echo "<h4>No se ha asignado calificación para esta solicitud</h4>";
		}else{
			echo "<h4>La calificación para esta solicitud es de <span style='font-weight:bold;'>".$res->calificacion."</span></h4>";
		}
	}

	//Agregar calificación
	public function addCalificacion($calificacion,$solicitud_id){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_vacante 
			SET calificacion=:calificacion
			WHERE id = :id
			");
		$stmt->bindParam(":calificacion",$calificacion, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitud_id, PDO::PARAM_STR);
		$stmt->execute();

		$error = $stmt->errorInfo();
		var_dump($error);

	}

	//Agregar comentario
	public function addComment($comentario, $user_id,$solicitud_id){
		$fecha = date('Y-m-d');
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_comentarios (comentario,user_id,fecha,solicitud_id) VALUES (:comentario,:user_id,:fecha,:solicitud_id)");
		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitud_id, PDO::PARAM_STR);
		$stmt->bindParam(":comentario",$comentario, PDO::PARAM_STR);
		$stmt->bindParam(":fecha",$fecha, PDO::PARAM_STR);
		$stmt->execute();

		$comentario_id = $this->pdo->lastInsertId();

		echo $comentario_id;

	}

	public function comentariosList($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT
			solicitud_comentarios.id,
			solicitud_comentarios.comentario,
			solicitud_comentarios.fecha,
			users.name,
			users.id
			FROM solicitud_comentarios
			JOIN users ON solicitud_comentarios.user_id = users.id
			WHERE solicitud_id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$comentarios = $stmt->fetchAll(PDO::FETCH_OBJ);

		if(empty($comentarios)){
			echo '
			<div class="comentarios-no" style="margin-bottom:5px;">
				<span>No existen comentarios aún</span>
			</div>
			';
		}else{
			foreach ($comentarios as $comentario) {
			$fecha_formato = strftime("%A, %d de %B del %Y", strtotime($comentario->fecha));
			echo '
				<li class="collection-item avatar" style="padding-top: 25px !important;">
				  <img src="../assets/img/man.png" alt="" class="circle">
				  <span class="title">'.$comentario->name.'</span>
				  <p style="padding: 15px 0;">
				  	'.$comentario->comentario.'
				  </p>
				  <a href="#!" class="secondary-content">'.$fecha_formato.'</a>
				</li>
			';
			}
		}
	}

	public function asignarDependientes($solicitud_vacante_id){
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_dependientes (solicitud_id) VALUES (:solicitud_id)");
		$stmt->bindParam(":solicitud_id",$solicitud_vacante_id, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function asignarSolicitud($user_id, $vacante_id, $solicitud_vacante_id){
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_r_vacante_user (user_id, vacante_id, solicitud_vacante_id) VALUES (:user_id, :vacante_id, :solicitud_vacante_id)");
		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->bindParam(":vacante_id",$vacante_id, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_vacante_id",$solicitud_vacante_id, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function porcentajeLlenado($id){
		$stmt= $this->pdo->prepare("SELECT * FROM solicitud_vacante WHERE id =:id");
		$stmt->bindParam(":id",$id, PDO::PARAM_STR);
		$stmt->execute();

		$porcentaje = $stmt->fetch(PDO::FETCH_OBJ);
		$query = $stmt->columnCount();
		
		
	}

	public function hasSolicitud($user_id){
		$stmt= $this->pdo->prepare("SELECT * FROM solicitud_r_vacante_user WHERE user_id =:user_id");
		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->rowCount();

	}

	public function misSolicitudesList($user_id){
		$stmt= $this->pdo->prepare("
			SELECT
			solicitud_vacante.id,
			solicitud_vacante.fecha_inicio_proceso,
			solicitud_r_vacante_user.user_id,
			vacantes.name
			FROM solicitud_r_vacante_user
			JOIN solicitud_vacante ON solicitud_r_vacante_user.solicitud_vacante_id = solicitud_vacante.id
			JOIN vacantes ON solicitud_r_vacante_user.vacante_id = vacantes.id
			WHERE solicitud_r_vacante_user.user_id = :user_id
			ORDER BY id DESC
		");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
		$stmt->execute();

		$solicitudes = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($solicitudes as $solicitud) {
			echo '
					<tr>
					  <td>'.$solicitud->id.'</td>
					  <td>'.$solicitud->name.'</td>
					  <td>'.$solicitud->fecha_inicio_proceso.'</td>
					  <td>50%</td>
					  <td><a href="solicitud.php?solicitudID='.$solicitud->id.'"><span class="btn bg-main">Completar</span></a></td>
					</tr>
				';
		}

	}

	public function todasSolicitudesList(){
		$stmt= $this->pdo->prepare("
			SELECT
			solicitud_vacante.id,
			solicitud_vacante.nombre,
			solicitud_vacante.email,
			solicitud_vacante.telefono,
			solicitud_vacante.calificacion,
			solicitud_vacante.fecha_inicio_proceso,
			solicitud_r_vacante_user.user_id,
			vacantes.name
			FROM solicitud_r_vacante_user
			JOIN solicitud_vacante ON solicitud_r_vacante_user.solicitud_vacante_id = solicitud_vacante.id
			JOIN vacantes ON solicitud_r_vacante_user.vacante_id = vacantes.id
			ORDER BY id DESC
		");
		$stmt->execute();

		$solicitudes = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($solicitudes as $solicitud) {
			echo '
					<tr>
					  <td>'.$solicitud->id.'</td>
					  <td>'.$solicitud->name.'</td>
					  <td>'.$solicitud->nombre.'</td>
					  <td>'.$solicitud->email.'</td>
					  <td>'.$solicitud->telefono.'</td>
					  <td>'.$solicitud->calificacion.'</td>
					  <td>'.$solicitud->fecha_inicio_proceso.'</td>
					  <!--<td>50%</td>-->
					  <td>
					  <a href="solicitud-vacante.php?solicitudID='.$solicitud->id.'"><span class="btn bg-main">Ver</span></a>
					  </td>
					</tr>
				';
		}

	}

	public function solicitudData($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_vacante 
			WHERE solicitud_vacante.id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);

		
	}

	public function solicitudDependientes($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_dependientes 
			WHERE solicitud_id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);

		
	}

	public function cursos($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_cursos
			WHERE solicitud_id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$cursos = $stmt->fetchAll(PDO::FETCH_OBJ);

		if(empty($cursos)){
			echo '
			<div class="cursos-no" style="margin-bottom:5px;">
				<span>No existen cursos agregados</span>
			</div>
			';
		}else{
			foreach ($cursos as $curso) {
			echo '
				<div class="cursos-data" id="curso'.$curso->id.'">
				<h5>'.$curso->nombre_curso.'</h5>
				<span class="eliminarCursoBtn" data-curso-id="'.$curso->id.'">Eliminar curso</span>
				</div>
			';
			}
		}
			
	}

	public function experiencia($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_experiencia
			WHERE solicitud_id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$experiencias = $stmt->fetchAll(PDO::FETCH_OBJ);

		if(empty($experiencias)){
			echo '
			<div class="cursos-no" style="margin-bottom:5px;">
				<span>No existen cursos agregados</span>
			</div>
			';
		}else{
			foreach ($experiencias as $experiencia) {
			echo '
				<div class="experiencia-data" id="experiencia'.$experiencia->id.'">
				<div>
				<h5>Empresa: '.$experiencia->empresa.'</h5>
				<ul>
					<li> Puesto: '.$experiencia->puesto.' </li>
					<li> Actividades: '.$experiencia->actividades.' </li>
					<li> Salario: '.$experiencia->salario.' </li>
					
				</ul>
				</div>
				<span class="eliminarExperienciaBtn" data-experiencia-id="'.$experiencia->id.'">Eliminar experiencia</span>
				</div>
			';
			}
		}
			
	}

	public function deleteCurso($cursoID){
		$stmt = $this->pdo->prepare("
			DELETE FROM solicitud_cursos 
			WHERE id = :id 
		");
		$stmt->bindParam(":id",$cursoID, PDO::PARAM_STR);
		$stmt->execute();
	}

	//Borrar solicitud
	public function deleteSolicitud($solicitud_id){
		$stmt = $this->pdo->prepare("
			DELETE FROM solicitud_vacante 
			WHERE id = :id 
		");
		$stmt->bindParam(":id",$solicitud_id, PDO::PARAM_STR);
		$stmt->execute();

		echo 1;
	}

	public function deleteExperiencia($experienciaID){
		$stmt = $this->pdo->prepare("
			DELETE FROM solicitud_experiencia 
			WHERE id = :id 
		");
		$stmt->bindParam(":id",$experienciaID, PDO::PARAM_STR);
		$stmt->execute();
	}


	public function solicitudExperiencia($solicitud_id){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_experiencia 
			WHERE solicitud_id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitud_id, PDO::PARAM_STR);
		$stmt->execute();

		$experiencias = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($experiencias as $experiencia) {
			
	}

		

		
	}

	public function saveData($campo, $solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_vacante 
			SET $campo=:val
			WHERE id = :id
			");
		$stmt->bindParam(":val",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$error = $stmt->errorInfo();
		var_dump($error);
	}

	public function saveDataDepEsposaHijos($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET esposa_hijos=:esposa_hijos
			WHERE solicitud_id = :solicitud_id
			");
		$stmt->bindParam(":esposa_hijos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepPadres($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET padres=:padres
			WHERE solicitud_id = :solicitud_id
			");
		$stmt->bindParam(":padres",$val, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepHermanos($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET hermanos=:hermanos
			WHERE solicitud_id = :id
			");
		$stmt->bindParam(":hermanos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepOtros($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET otros=:otros
			WHERE solicitud_id = :solicitud_id
			");
		$stmt->bindParam(":otros",$val, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepNumHijos($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET num_hijos=:num_hijos
			WHERE solicitud_id = :solicitud_id
			");
		$stmt->bindParam(":num_hijos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		$error = $stmt->errorInfo();
		var_dump($error);
	}

	public function addCurso($nombre_curso, $lugar_curso,$fecha_curso, $solicitudID){
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_cursos (nombre_curso,fecha_curso,lugar_curso,solicitud_id) VALUES (:nombre_curso,:fecha_curso,:lugar_curso,:solicitud_id)");
		$stmt->bindParam(":nombre_curso",$nombre_curso, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_curso",$fecha_curso, PDO::PARAM_STR);
		$stmt->bindParam(":lugar_curso",$lugar_curso, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		echo $this->pdo->lastInsertId();
	}

	public function addExperiencia(
		$empresa, 
		$trabajo_actual_val,
		$ramo,
		$solicitudID,
		$fecha_inicio_trabajo,
		$puesto,
		$personas_cargo,
		$actividades,
		$salario,
		$jefe_directo,
		$telefono_jefe,
		$prestaciones
	){

		$stmt = $this->pdo->prepare("INSERT INTO solicitud_experiencia 
			(empresa,
			trabajo_actual_val,
			ramo,
			solicitud_id,
			fecha_inicio_trabajo,
			puesto,
			personas_cargo,
			actividades,
			salario,
			jefe_directo,
			telefono_jefe,
			prestaciones) 
			VALUES 
			(
			:empresa,
			:trabajo_actual_val,
			:ramo,
			:solicitud_id,
			:fecha_inicio_trabajo,
			:puesto,
			:personas_cargo,
			:actividades,
			:salario,
			:jefe_directo,
			:telefono_jefe,
			:prestaciones)
			");
		
		$stmt->bindParam(":empresa",$empresa, PDO::PARAM_STR);
		$stmt->bindParam(":trabajo_actual_val",$trabajo_actual_val, PDO::PARAM_STR);
		$stmt->bindParam(":ramo",$ramo, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio_trabajo",$fecha_inicio_trabajo, PDO::PARAM_STR);
		$stmt->bindParam(":puesto",$puesto, PDO::PARAM_STR);
		$stmt->bindParam(":personas_cargo",$personas_cargo, PDO::PARAM_STR);
		$stmt->bindParam(":actividades",$actividades, PDO::PARAM_STR);
		$stmt->bindParam(":salario",$salario, PDO::PARAM_STR);
		$stmt->bindParam(":jefe_directo",$jefe_directo, PDO::PARAM_STR);
		$stmt->bindParam(":telefono_jefe",$telefono_jefe, PDO::PARAM_STR);
		$stmt->bindParam(":prestaciones",$prestaciones, PDO::PARAM_STR);
		$stmt->execute();

		return  $this->pdo->lastInsertId();

	}

}
