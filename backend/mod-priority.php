<?php

$priority = $_POST['prioridad'];
$id_tarea = $_POST['id_tarea'];
$nombre_tablero = $_POST['nombre-tablero'];
$id_tablero = $_POST['id_tablero'];
include("../backend/conexion.php");

$consulta = mysqli_query($conexion, "UPDATE tareas SET prioridad = '$priority' WHERE id = '$id_tarea'");
header("location:../frontend/kanbanboard.php?id=$id_tablero&name=$nombre_tablero");



;?>