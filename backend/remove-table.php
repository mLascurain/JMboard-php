<?php session_start();?>
<?php
include("../backend/conexion.php");
$id = $_POST['id'];
$consulta = mysqli_query($conexion, "DELETE FROM tableros WHERE id = $id");
header("location:../frontend/index.php");
mysqli_free_result($consulta);
?>