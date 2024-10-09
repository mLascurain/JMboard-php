<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    $_SESSION['logeado']=false;
    unset($_SESSION['logeado']);
    session_destroy(); 
    header("location:../frontend/index.php");?>
    
</body>
</html>