<?php session_start();?>
<?php
include("../backend/conexion.php");

$id = $_POST['id'];
$nombre = $_POST['titulo'];
$nombre_tablero = $_POST['nombre-tablero'];
$id_tablero = $_POST['id_tablero'];
$consulta = mysqli_query($conexion, "UPDATE columnas SET nombre = '$nombre' WHERE id = $id");

header("Location: ../frontend/kanbanboard.php?id=$id_tablero&name=$nombre_tablero");

mysqli_close($conexion);

?>


