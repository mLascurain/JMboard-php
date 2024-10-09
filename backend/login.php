<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/header.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

 $email=$_POST['email'];
 $password=$_POST['password'];
 include("conexion.php");

 $consulta=mysqli_query($conexion, "SELECT usuario, email, contrasenia FROM usuarios WHERE email='$email'");
 
 $resultado=mysqli_num_rows($consulta);

 if($resultado!=0)
   {
    $respuesta=mysqli_fetch_assoc($consulta);
    if(password_verify($password, $respuesta['contrasenia'])){
      $_SESSION['usuario']=$respuesta['usuario'];
      $_SESSION['logeado']=true;
      mysqli_free_result($consulta);
      header("location:../frontend/index.php");
      }
      else{
         $_SESSION['error'] = "Contraseña incorrecta.";
         mysqli_free_result($consulta);
         header("location:../frontend/formulario_login.php");
      }
   }else{
    $_SESSION['error'] = "E-mail incorrecto.";
    mysqli_free_result($consulta);
    header("location:../frontend/formulario_login.php");
 }?>
</body>
</html>