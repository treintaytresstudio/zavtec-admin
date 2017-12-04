<?php

class Vacante{
	
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	//Registro de vacante
	public function registerVacante($name, $requisitos, $image){
	    $registerTime = date('Y-m-d');
	    $stmt = $this->pdo->prepare("INSERT INTO vacantes (name, requisitos, image, register_date) VALUES (:name, :requisitos, :image,:register_date)");
	    $stmt->bindParam(":name", $name , PDO::PARAM_STR);
	    $stmt->bindParam(":requisitos", $requisitos , PDO::PARAM_STR);
	    $stmt->bindParam(":image", $image , PDO::PARAM_STR);
	    $stmt->bindParam(":register_date", $registerTime , PDO::PARAM_STR);
	    $stmt->execute();

	    echo 1;
	}

	//Muestra todas las vacantes
	public function allVacantes(){
	    $stmt = $this->pdo->prepare("SELECT * FROM vacantes");
	    $stmt->execute();

	    $vacantes = $stmt->fetchAll(PDO::FETCH_OBJ);

	    foreach ($vacantes as $vacante) {
	    	$requisitos = substr($vacante->requisitos, 0, 50)."...";
	    	$fecha = strftime("%A, %d de %B del %Y", strtotime($vacante->register_date));
	        echo'
	            <tr>
	              <td>'.$vacante->id.'</td>
	              <td>'.$vacante->name.'</td>
	              <td>'.$fecha.'</td>';
	              
	        echo  '<td>
	                <span class="deleteVacanteBtn waves-effect waves-light btn bg-main" data-vacante-id="'.$vacante->id.'">Borrar</span>
	                <a href="index.php?editVacante=1&id='.$vacante->id.'" class="editVacanteBtn waves-effect waves-light btn bg-blue" data-vacante-id="'.$vacante->id.'">Editar</a>
	              </td>
	            </tr>
	        ';
	    }

	}

	//Regresa datos de la vacante
	public function vacanteData($vacante_id){
	    $stmt = $this->pdo->prepare("SELECT * FROM vacantes WHERE id = :id");
	    $stmt->bindParam(":id", $vacante_id, PDO::PARAM_INT);
	    $stmt->execute();
	    return $stmt->fetch(PDO::FETCH_OBJ);

	}

	//Actualizamos los datos de la vacante
	public function updateVacante($vacante_id, $name, $image, $requisitos){
	    $stmt = $this->pdo->prepare("UPDATE vacantes SET name=:name, image=:image, requisitos=:requisitos WHERE id=:id");
	    $stmt->bindParam(":id", $vacante_id , PDO::PARAM_STR);
	    $stmt->bindParam(":name", $name , PDO::PARAM_STR);
	    $stmt->bindParam(":requisitos", $requisitos , PDO::PARAM_STR);
	    $stmt->bindParam(":image", $image , PDO::PARAM_STR);
	    $stmt->execute();

	    echo 1;
	}

	//Borrar vacante
	public function deleteVacante($vacante_id){
	    $stmt = $this->pdo->prepare("DELETE FROM vacantes WHERE id = :id");
	    $stmt->bindParam(":id", $vacante_id, PDO::PARAM_STR);
	    $stmt->execute();

	    echo 1;
	}

	//Total de vacantes
	public function vacantesNum(){
		$stmt = $this->pdo->prepare("SELECT * FROM vacantes");
		$stmt->bindParam(":id", $vacante_id, PDO::PARAM_STR);
		$stmt->execute();

		$total = $stmt->rowCount();

		echo $total;
	}

	public function printVacantes(){
		$stmt = $this->pdo->prepare("SELECT * FROM vacantes ORDER BY id DESC");
		$stmt->execute();

		$vacantes = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($vacantes as $vacante) {
			$fecha = strftime("%A, %d de %B del %Y", strtotime($vacante->register_date));
			$requisitos = str_replace(",", "</br>", $vacante->requisitos);
		    echo'<div class="vacante z-depth-2">';

		    		if($vacante->image !== ''){
		    			echo '<div class="img">
								<img src="'.$vacante->image.'" alt="">
							 </div>';
		    		}

		    echo'<div class="header">
						<h2>'.$vacante->name.'</h2>
						<p>'.$requisitos.'</p>
					</div>
					<div class="footer">
						<a href="aplicar.php?vacante_id='.$vacante->id.'" class="btn bg-accent">Aplicar para esta vacante</a>
					</div>
				</div>';
		}
	}

}