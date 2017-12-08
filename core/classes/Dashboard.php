<?php

class Dashboard{
	
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	//Solicitud vacantes
	public function compTotalSolicitudesVacantes(){
		$stmt = $this->pdo->prepare("
			SELECT * FROM solicitud_cursos 
		");
		$stmt->execute();

		$solicitudesCount = $stmt->rowCount();
		
		echo '
		<!-- box -->
		<div class="col s12 m12 l4 xl4 box-info">
			<div class="box-container z-depth-1">
				<div class="header">
					<h4>Solicitudes de vacantes</h4>
				</div>
				<div class="middle">
					<i class="material-icons">assignment</i>
					<span>'.$solicitudesCount.'</span>
				</div>
				<div class="footer">
					<a href="../solicitudes/solicitudes-vacantes.php" class="btn">Ver solicitudes</a>
				</div>
			</div>
		</div>
		';
	
	}

	//Saludo
	public function hello($hora){
		if($hora > 11 && $hora < 17){
			echo '
				<img src="../assets/img/sunny.png" alt="">
				<span>Buenas tardes</span>
			';
		}else if($hora > 18 && $hora < 23){
			echo '
				<img src="../assets/img/sky.png" alt="">
				<span>Buenas Noches</span>
			';
		}else if($hora > 1 && $hora < 11){
			echo '
				<img src="../assets/img/sunny.png" alt="">
				<span>Buenos Días</span>
			';
		}
	}

	//Mejor raking
	public function solicitudesRanking(){
		$stmt= $this->pdo->prepare("
			SELECT
			solicitud_vacante.id AS vid,
			solicitud_vacante.nombre,
			solicitud_vacante.email,
			solicitud_vacante.telefono,
			solicitud_vacante.calificacion,
			solicitud_vacante.user_id,
			users.imagen,
			vacantes.id,
			vacantes.name
			FROM solicitud_vacante
			JOIN vacantes ON solicitud_vacante.vacante_id = vacantes.id
			JOIN users ON solicitud_vacante.user_id = users.id
			ORDER BY calificacion DESC
			LIMIT 5
		");
		$stmt->execute();

		$solicitudes = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($solicitudes as $solicitud) {

			if($solicitud->imagen == ''){
				$imagen = '../assets/img/man.png';
			}else{
				$imagen = $solicitud->imagen;
			}

			echo '
					<li class="collection-item avatar">
					  <img src="'.$imagen.'" alt="" class="circle">
					  <span class="title">'.$solicitud->nombre.'</span>
					  <p>Vacante: '.$solicitud->name.'</p>
					  <p>Teléfono: '.$solicitud->telefono.'<br>
					     Email: '.$solicitud->email.'
					  </p>
					  <p>
						<a href="../solicitudes/solicitud-vacante.php?solicitudID='.$solicitud->vid.'" style="font-size:18px; display:block; padding:10px 0;">Ver solicitud</a>
					  </p>
					  <a href="#!" class="secondary-content">'.$solicitud->calificacion.' <small>Calificación</small></a>
					</li>
				';
		}

	}

}