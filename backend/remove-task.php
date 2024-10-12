<?php session_start();?>
<?php
include("../backend/conexion.php");
$id_tablero = $_POST['id_tablero'];
$id = $_POST['id'];
$consulta = "DELETE FROM tareas WHERE id = '$id'";
mysqli_query($conexion, $consulta);

// Redirigir a tablero
header("Location: ../frontend/kanbanboard.php?id=$id_tablero");
mysqli_free_result($consulta);
mysqli_close($conexion); // Cierra la conexión con la base de datos
exit;
?>