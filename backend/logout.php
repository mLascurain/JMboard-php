<?php session_start();?>

    <?php 
    $_SESSION['logeado']=false;
    unset($_SESSION['logeado']);
    session_destroy(); 
    header("location:../frontend/index.php");?>
    