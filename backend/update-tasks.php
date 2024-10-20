<?php
// Verificar que se haya enviado la solicitud mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por fetch
    $id_tarea = $_POST['tarea'];
    $id_columna = $_POST['columna'];

    // Conectar con la base de datos
    include('conexion.php'); // Asegúrate de tener la conexión a la BD

    $update = mysqli_query($conexion, "UPDATE tareas SET columna_id = '$id_columna' WHERE id = '$id_tarea'");
    // // Actualizar la columna de la tarea en la base de datos
    // $query = "UPDATE tareas SET columna_id = ? WHERE id = ?";
    // $stmt = $conexion->prepare($query);
    // $stmt->bind_param("ii", $id_columna, $id_tarea); // 'ii' indica que ambos parámetros son enteros
    //
    // if ($stmt->execute()) {
    //     echo "Tarea actualizada con éxito $id_tarea, $id_columna";
    // } else {
    //     echo "Error al actualizar la tarea: " . $stmt->error;
    // }
    //
    // // Cerrar la conexión
    // $stmt->close();
    // $conexion->close();
} else {
    echo "Método no permitido";
}
?>

// <?php
//   include("../backend/conexion.php");
//   $tarea = $_POST['tarea'];
//   $columna = $_POST['columna'];
//
//   $update = mysqli_query($conexion, "UPDATE tareas SET columna_id = $columna WHERE id = $tarea")
// ?>
