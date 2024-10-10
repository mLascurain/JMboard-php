<?php session_start();?>
<?php
include("../backend/conexion.php");
$titulo = $_POST['add-task'];
$columna_id = $_POST['id-columna'];
if (empty($columna_id)) {
    echo "Error: el id de la columna es requerido.";
    exit;
}
$id = $_SESSION['id'];
$fechaActual = new DateTime();
$fechaFormateada = $fechaActual->format('Y-m-d');

$consulta = mysqli_query($conexion, "INSERT INTO tareas ( id, titulo, descripcion, columna_id, estado, fecha_creacion ) VALUES ('$id', '$titulo', '', '1', 'pendiente', '$fechaFormateada')");

header("location:kanbanboard.php");
mysquli_free_result($consulta);
?>