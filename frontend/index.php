<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include("layout/header.php");
    
    if (isset($_SESSION['logeado']) && ($_SESSION['logeado'])==true) {
        include("layout/jmboard.php");
    } else {
        echo 'hola';
    }

    
    include("layout/footer.php"); 
    ?>
</body>
</html>