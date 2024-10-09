<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 

 $email=$_POST['email'];
 $password=$_POST['password'];

 include("conexion.php");

 $consulta=mysqli_query($conexion, "SELECT usuario, email FROM usuarios WHERE email='$email' AND contrasenia='$password'");

 $resultado=mysqli_num_rows($consulta);

 if($resultado!=0){
    
    $respuesta=mysqli_fetch_assoc($consulta);

    $_SESSION['usuario']=$respuesta['usuario'];

    echo "Hola " .$_SESSION['usuario'];

 }else{
    $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
    header("location:../frontend/formulario_login.php");
 }?>
</body>
</html>