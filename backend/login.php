<?php session_start();?>
<?php 

 $email=$_POST['email'];
 $password=$_POST['password'];
 include("conexion.php");

 $consulta=mysqli_query($conexion, "SELECT id,usuario, email, contrasenia FROM usuarios WHERE email='$email'");
 
 $resultado=mysqli_num_rows($consulta);

 if($resultado!=0)
   {
    $respuesta=mysqli_fetch_assoc($consulta);
    if(password_verify($password, $respuesta['contrasenia'])){
      $_SESSION['usuario']=$respuesta['usuario'];
      $_SESSION['logeado']=true;
      $_SESSION['id']=$respuesta['id'];
      mysqli_free_result($consulta);
      header("location:../frontend/index.php");
      }
      else{
         $_SESSION['errorPassword'] = "Contraseña incorrecta.";
         mysqli_free_result($consulta);
         header("location:../frontend/formulario_login.php");
      }
   }else{
    $_SESSION['errorEmail'] = "E-mail incorrecto.";
    mysqli_free_result($consulta);
    header("location:../frontend/formulario_login.php");
 }?>
