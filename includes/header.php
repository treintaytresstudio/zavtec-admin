<?php include_once '../core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.css">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- data tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.4.2/b-html5-1.4.2/r-2.2.0/datatables.min.css"/>

    <!-- uppy -->
    <link href="https://unpkg.com/uppy/dist/uppy.min.css" rel="stylesheet">
    
    <!-- lecxa admin css -->
    <link rel="stylesheet" href="../assets/css/lecxa_admin.css">

    <!-- upload care -->
    <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.2.1/uploadcare.full.min.js"></script>
               
    <title><?php echo $page; ?></title>
</head>
<body>

<?php 
    //Horario

    //Si el usuario no está logueado, lo regresamos al login
    if($GFUser->loggedIn() === true){
        //Usuario conectado
        $user_id = $_SESSION['id'];
        //Datos del usuario almacenados en $user ej. $user->name
        $user = $GFUser->userData($user_id);
        //Incluimos el menu top
        include_once '../includes/menu-top.php';
    }
?>





