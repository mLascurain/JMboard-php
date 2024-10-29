<?php

include("../backend/conexion.php");
$email = $_POST['email'];
$name = $_POST['name'];
$opinion = $_POST['opinion'];

$consulta = mysqli_query($conexion, "INSERT INTO opiniones (nombre_usuario, email_usuario, opinion) VALUES ('$email', '$name', '$opinion')");

header("Location: ../frontend/opiniones.php");
?>