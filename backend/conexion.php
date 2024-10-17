<?php 
  require '../vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
  $dotenv->safeLoad();
  $name = $_ENV['JM_NAME'];
  $key = $_ENV['JM_KEY'];  
  $host = $_ENV['JM_HOST'];
  $bd = $_ENV['JM_BD'];
  $conexion = mysqli_connect("$host", "$name", "$key", "$bd") or die ('No se pudo conectar a la base de datos, por favor comuníquese con el administrador del sistema');
?>
