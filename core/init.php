<?php
	include 'config.php';
    include 'database/connection.php';
    include 'classes/User.php';
    include 'classes/Vacante.php';

    //GLOBAL 
    global $pdo;

    
    //Zona horaria
    date_default_timezone_set("America/Monterrey");
    // Unix
    setlocale(LC_TIME, 'es_ES.UTF-8');
    // En windows
    setlocale(LC_TIME, 'spanish');

    //Fechas
    $fecha = date('Y-m-d');
    $mes = date('m');
    $ano = date('Y');
    $hoy = strftime("%A, %d de %B del %Y", strtotime($fecha));

    //Session start --> iniciamos sesión
    session_start();

    //Include classes -> instanciamos las clases
    $GFUser = new User($pdo);
    $GFVacante = new Vacante($pdo);
   
    //Dir -->directorio dónde se encuentra instalada la aplicación
    define("BASE_URL", $_SERVER['DOCUMENT_ROOT']."/zavtec-admin");
?>