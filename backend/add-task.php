<?php session_start();?>
<?php
include("../backend/conexion.php");
$titulo = $_POST['add-task'];
$columna_id = $_POST['id-columna'];
$nombre_tablero = $_POST['nombre-tablero'];
$id_tablero = $_POST['id-tablero'];
if (empty($columna_id)) {
    echo "Error: el id de la columna es requerido.";
    exit;
}

echo $columna_id;
$fechaActual = new DateTime();
$fechaFormateada = $fechaActual->format('Y-m-d');

$consulta = mysqli_query($conexion, "INSERT INTO tareas ( titulo, descripcion, columna_id, prioridad, fecha_creacion ) VALUES ( '$titulo', '', '$columna_id', '1', '$fechaFormateada')");
header("location:../frontend/kanbanboard.php?id=$id_tablero&name=$nombre_tablero");
?>