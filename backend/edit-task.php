<?php 

$id = $_POST['id'];
$id_tablero = $_POST['id_tablero'];
$nombre_tablero = $_POST['nombre-tablero'];
$descripcion = $_POST['descripcion'];
$titulo = $_POST['titulo'];
$prioridad = $_POST['prioridad'];

echo "</br>" . $id . "</br>" . $id_tablero . "</br>" . $nombre_tablero . "</br>" . $descripcion . "</br>" . $titulo . "</br>" . $prioridad;


include("../backend/conexion.php");

$consulta = mysqli_query($conexion, "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion', prioridad = '$prioridad' WHERE id = $id");

header("Location: ../frontend/kanbanboard.php?id=$id_tablero&name=$nombre_tablero");

mysqli_close($conexion);

?>
