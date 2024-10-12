<?php session_start();?>
<?php
include("../backend/conexion.php");
$id_columna = $_POST['id'];
$consulta = "SELECT COUNT(*) AS num_tareas FROM tareas WHERE columna_id = '$id_columna'";
$resultado = mysqli_query($conexion, $consulta);
$num_tareas = mysqli_fetch_assoc($resultado)['num_tareas'];
mysqli_free_result($resultado);

for ($i = 0; $i < $num_tareas; $i++) {
    // Hay tareas asociadas a la columna, borrarlas aquí
    $consultaTareas = "SELECT id FROM tareas WHERE columna_id = '$id_columna'";
    $resultadoTareas = mysqli_query($conexion, $consultaTareas);
    $tarea = mysqli_fetch_assoc($resultadoTareas);
    $id_tarea = $tarea['id'];
    mysqli_free_result($resultadoTareas);

    $consultaBorrarTareas = "DELETE FROM tareas WHERE id = '$id_tarea'";
    mysqli_query($conexion, $consultaBorrarTareas);
}
// Borrar la columna
$consulta = "DELETE FROM columnas WHERE id = '$id_columna'";
mysqli_query($conexion, $consulta);

// Redirigir a index.php
$id_tablero = $_POST['id_tablero'];
header("Location: ../frontend/kanbanboard.php?id=$id_tablero");
mysqli_close($conexion); // Cierra la conexión con la base de datos
exit;
?>
