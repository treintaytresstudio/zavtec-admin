<?php
/*
	Attributes
	-id
	-name
	-user
	-password
	-rol
	-pp (profile pircture)
	-email
*/
class User{
	
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	//Iniciar sesión
    public function login($user, $password){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE user = :user AND password = :password");
        $passwordHash = md5($password); //Convertimos password a MD5
        $stmt->bindParam(":user", $user,  PDO::PARAM_STR);
        $stmt->bindParam(":password", $passwordHash, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();

        if($count > 0){
            $_SESSION['id'] = $user->id;
            echo 1;
        }else{
            return false;
        }
    }

    //Regresa datos del usuario
    public function userData($user_id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    //Registro de usuario
    public function registerUser($email, $name, $password, $user, $rol){
        $hashPassword = md5($password);
        $registerTime = date('Y-m-d');
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password, name, user, rol,register_date) VALUES (:email, :password, :name, :user,:rol,:register_date)");
        $stmt->bindParam(":email", $email , PDO::PARAM_STR);
        $stmt->bindParam(":password", $hashPassword , PDO::PARAM_STR);
        $stmt->bindParam(":name", $name , PDO::PARAM_STR);
        $stmt->bindParam(":user", $user , PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol , PDO::PARAM_STR);
        $stmt->bindParam(":register_date", $registerTime , PDO::PARAM_STR);
        $stmt->execute();

        /*$user_id = $this->pdo->lastInsertId();
        $_SESSION['user_id'] = $user_id;*/
        echo 1;
    }

    //Registro de usuario prospecto
    public function registerUserProspect($email, $name, $password, $user, $sex){
        $hashPassword = md5($password);
        $registerTime = date('Y-m-d');
        $rol = 3;
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password, name, user, rol,register_date,sex) VALUES (:email, :password, :name, :user,:rol,:register_date,:sex)");
        $stmt->bindParam(":email", $email , PDO::PARAM_STR);
        $stmt->bindParam(":password", $hashPassword , PDO::PARAM_STR);
        $stmt->bindParam(":name", $name , PDO::PARAM_STR);
        $stmt->bindParam(":user", $user , PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol , PDO::PARAM_STR);
        $stmt->bindParam(":register_date", $registerTime , PDO::PARAM_STR);
        $stmt->bindParam(":sex", $sex , PDO::PARAM_STR);
        $stmt->execute();

        //Iniciamos sesión
        $id = $this->pdo->lastInsertId();
        $_SESSION['id'] = $id;
        echo 1;
    }

    //Actualizamos los datos del usuario
    public function updateSettings($user_id, $screenName, $bio, $country ,$username){
        $stmt = $this->pdo->prepare("UPDATE users SET screenName=:screenName, bio=:bio, country=:country, username=:username WHERE user_id=:user_id");
        $stmt->bindParam(":user_id", $user_id , PDO::PARAM_STR);
        $stmt->bindParam(":screenName", $screenName , PDO::PARAM_STR);
        $stmt->bindParam(":bio", $bio , PDO::PARAM_STR);
        $stmt->bindParam(":country", $country , PDO::PARAM_STR);
        $stmt->bindParam(":username", $username , PDO::PARAM_STR);
        $stmt->execute();
    }

    //Actualizamos la foto de perfil
    public function updateProfileImage($user_id, $imagen){
        $stmt = $this->pdo->prepare("UPDATE users SET profileImage=:profileImage WHERE user_id=:user_id");
        $stmt->bindParam(":profileImage", $imagen , PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id , PDO::PARAM_STR);
        $stmt->execute();
    }

    //Cerrar sesión
    public function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: '.BASE_URL.'index.php');
    }

    //Se asegura que el email no esté en uso
    public function checkEmail($email){
        $stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    //Verificar si es mi username actual
    public function checkMyUserName($user_id){
        
        $stmt = $this->pdo->prepare("SELECT username FROM users WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user->username;
    }

    //Se asegura que el username no esté en uso
    public function checkUserName($user){

        $stmt = $this->pdo->prepare("SELECT user FROM users WHERE user = :user");
        $stmt->bindParam(":user", $user, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            //el usuario ya está en uso
            return false;
        }else{
            //el usuario si está disponible
            return true;
        }
    }

    //Sacar el id del usuario según el username
    public function userIdByUsername($username){
        $stmt = $this->pdo->prepare(" SELECT user_id FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username , PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user->user_id;
    }

    //Sabemos si el usuario está logueado o no
    public function loggedIn(){
        return (isset($_SESSION['id'])) ? true : false;
    }

    //Buscar usuarios
    public function search($search){
        $searchM = $search.'%';
        $stmt = $this->pdo->prepare("(SELECT t_search, screenName as name FROM users
        WHERE screenName LIKE ?)
        UNION
        (SELECT t_search,  hashtag_name AS name  FROM hashtags
        WHERE hashtag_name LIKE ?)");
        $stmt->bindParam(1, $searchM, PDO::PARAM_STR);
        $stmt->bindParam(2, $searchM, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Muestra todos los usuarios
    public function allUsers(){
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($users as $user) {
            echo'
                <tr>
                  <td>'.$user->id.'</td>
                  <td>'.$user->user.'</td>
                  <td>'.$user->name.'</td>
                  <td>'.$user->email.'</td>';

                  if($user->rol == 1){
                    echo '<td>Administrador</td>';
                  }else if($user->rol == 2){
                    echo '<td>Empleado</td>';
                  }else if($user->rol == 3){
                    echo '<td>Prospecto</td>';
                  }
                  
            echo  '<td>
                    <span class="deleteUserBtn waves-effect waves-light btn bg-main" data-user-id="'.$user->id.'">Borrar</span>
                  </td>
                </tr>
            ';
        }

    }

    //Borrar usuario
    public function deleteUser($user_id){
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
        $stmt->execute();

        echo 1;
    }

    //Es prospecto
    public function isProspect($user_id){
        $stmt = $this->pdo->prepare("SELECT rol From users WHERE id = :id");
        $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if($user->rol == 3){
            return true;
        }
    }

}
?>