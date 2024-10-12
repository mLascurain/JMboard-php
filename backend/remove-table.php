<?php session_start();?>
<?php
include("../backend/conexion.php");
$id_tablero = $_POST['id'];
$consulta = "SELECT COUNT(*) AS num_columnas FROM columnas WHERE tablero_id = '$id_tablero'";
$resultado = mysqli_query($conexion, $consulta);
$num_columnas = mysqli_fetch_assoc($resultado)['num_columnas'];
mysqli_free_result($resultado);

for ($i = 0; $i < $num_columnas; $i++) { 
    // Hay columnas asociadas al tablero, borrarlas también
    $consultaColumnas = "SELECT id FROM columnas WHERE tablero_id = '$id_tablero'";
    $resultadoColumnas = mysqli_query($conexion, $consultaColumnas);
    $columna = mysqli_fetch_assoc($resultadoColumnas);
    $id_columna = $columna['id'];
    mysqli_free_result($resultadoColumnas);

    // Comprobar si la columna tiene tareas
    $consultaTareas = "SELECT COUNT(*) AS num_tareas FROM tareas WHERE columna_id = '$id_columna'";
    $resultadoTareas = mysqli_query($conexion, $consultaTareas);
    $num_tareas = mysqli_fetch_assoc($resultadoTareas)['num_tareas'];
    mysqli_free_result($resultadoTareas);
    for ($j = 0; $j < $num_tareas; $j++) {
        // La columna tiene tareas, borrarlas también
        $consultaBorrarTareas = "DELETE FROM tareas WHERE columna_id = '$id_columna'";
        mysqli_query($conexion, $consultaBorrarTareas);
    }

    // Borrar la columna
    $consultaBorrarColumna = "DELETE FROM columnas WHERE id = '$id_columna'";
    mysqli_query($conexion, $consultaBorrarColumna);
}

// Borrar el tablero
$consulta = "DELETE FROM tableros WHERE id = '$id_tablero'";
mysqli_query($conexion, $consulta);

// Redirigir a index.php
header("Location: ../frontend/index.php");
mysqli_close($conexion); // Cierra la conexión con la base de datos
exit;
?>