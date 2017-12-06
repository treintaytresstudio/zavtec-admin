<?php
    include_once '../core/init.php';
    $GFUser->logOut();
    header('Location: login.php');
?>