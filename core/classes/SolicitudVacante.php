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

	public function newSolicitudVacante($user_id,$vacante_id){
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_vacante (vacante_id) VALUES (:vacante_id)");
		$stmt->bindParam(":vacante_id",$vacante_id, PDO::PARAM_STR);
		$stmt->execute();
		$solicitud_vacante_id = $this->pdo->lastInsertId();

		echo $solicitud_vacante_id;

		//Asignamos solictud al usuario
		$this->asignarSolicitud($user_id, $vacante_id, $solicitud_vacante_id);

	}

	public function asignarSolicitud($user_id, $vacante_id, $solicitud_vacante_id){
		$stmt = $this->pdo->prepare("INSERT INTO solicitud_r_vacante_user (user_id, vacante_id, solicitud_vacante_id) VALUES (:user_id, :vacante_id, :solicitud_vacante_id)");
		$stmt->bindParam(":user_id",$user_id, PDO::PARAM_STR);
		$stmt->bindParam(":vacante_id",$vacante_id, PDO::PARAM_STR);
		$stmt->bindParam(":solicitud_vacante_id",$solicitud_vacante_id, PDO::PARAM_STR);
		$stmt->execute();
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

	public function solicitudData($solicitudID){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_vacante 
			WHERE solicitud_vacante.id = :solicitud_id 
		");
		$stmt->bindParam(":solicitud_id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);

		
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
			WHERE id = :id
			");
		$stmt->bindParam(":esposa_hijos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepPadres($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET padres=:padres
			WHERE id = :id
			");
		$stmt->bindParam(":padres",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepHermanos($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET hermanos=:hermanos
			WHERE id = :id
			");
		$stmt->bindParam(":hermanos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepOtros($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET otros=:otros
			WHERE id = :id
			");
		$stmt->bindParam(":otros",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function saveDataDepNumHijos($solicitudID, $val){
		$stmt = $this->pdo->prepare("
			UPDATE solicitud_dependientes 
			SET num_hijos=:num_hijos
			WHERE id = :id
			");
		$stmt->bindParam(":num_hijos",$val, PDO::PARAM_STR);
		$stmt->bindParam(":id",$solicitudID, PDO::PARAM_STR);
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

		echo 1;
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

		echo 1;

		$error = $stmt->errorInfo();
		var_dump($error);
	}

}
