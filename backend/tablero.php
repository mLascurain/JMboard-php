<?php session_start();?>
<?php
include("../backend/conexion.php");
$nombre = $_POST['nombre'];
$id = $_SESSION['id'];
$fechaActual = new DateTime();
$fechaFormateada = $fechaActual->format('Y-m-d');
$consulta = mysqli_query($conexion, "INSERT INTO tableros ( nombre, usuario_id, fecha_creacion ) VALUES ('$nombre', '$id', '$fechaFormateada')");
header("location:../frontend/index.php");
mysquli_free_result($consulta);
?>
