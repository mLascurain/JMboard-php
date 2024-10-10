<?php session_start();?>
<?php
include("../backend/conexion.php");
if (!$conexion) {
    echo "Error: no se puedo conectar al servidor.";
    exit;
}

$nombre = $_POST['add-column'];
if (empty($nombre)) {
    echo "Error: el nombre de la columna es requerido.";
    exit;
}
$tablero_id = $_POST['id-tablero'];
if (empty($tablero_id)) {
    echo "Error: el id del tablero es requerido.";
    exit;
}

$id = $_SESSION['id'];
if (empty($id)) {
    echo "Error: El servidor no pudo identificar la columna.";
    exit;
}
$fechaActual = new DateTime();
$fechaFormateada = $fechaActual->format('Y-m-d');
$orden = 1;

$consulta = mysqli_query($conexion, "INSERT INTO columnas ( id, nombre, tablero_id, orden, fecha_creacion ) VALUES ('$id', '$nombre', '$tablero_id', '$orden', '$fechaFormateada')");
header("location:../frontend/kanbanboard.php");
mysquli_free_result($consulta);
?>