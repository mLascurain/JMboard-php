<?php session_start();?>

<?php 

 $email=$_POST['email'];
 $password=($_POST['password']);
 $usuario=$_POST['usuario'];
 $passwordEncriptada=password_hash($password, PASSWORD_BCRYPT);
 
 include("conexion.php");

 $consulta=mysqli_query($conexion, "SELECT usuario, email FROM usuarios WHERE email='$email'");

 $resultado=mysqli_num_rows($consulta);

 if($resultado==0){
    $registro=mysqli_query($conexion, "INSERT INTO usuarios (usuario, email, contrasenia) VALUES ('$usuario', '$email', '$passwordEncriptada')");
    $consulta=mysqli_query($conexion, "SELECT usuario, id, email FROM usuarios WHERE email='$email'");
    $respuesta=mysqli_fetch_assoc($consulta);
    $_SESSION['usuario']=$respuesta['usuario'];
    $_SESSION['id']=$respuesta['id'];
    $_SESSION['logeado']=true;
    mysqli_free_result($consulta);
    header("location:../frontend/index.php");
 }else{
    $_SESSION['error'] = "E-mail ya registrado.";
    mysqli_free_result($consulta);
    header("location:../frontend/formulario_signup.php");
 }?>

    
