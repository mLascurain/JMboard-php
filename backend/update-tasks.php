<?php
// Verificar que se haya enviado la solicitud mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por fetch
    $id_tarea = $_POST['tarea'];
    $id_columna = $_POST['columna'];

    // Conectar con la base de datos
    include('conexion.php'); // Asegúrate de tener la conexión a la BD
    $update = mysqli_query($conexion, "UPDATE tareas SET columna_id = '$id_columna' WHERE id = '$id_tarea'");
} else {
    echo "Método no permitido";
}
?>


