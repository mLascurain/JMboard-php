<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/kanbanboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("layout/header.php");?>
    <?php
    include("../backend/conexion.php");
    $id_tablero = $_SESSION['id_tablero'];
    //Consulta de conexion con las tablas
    $consultaColumnas = mysqli_query($conexion, "SELECT id, nombre, fecha_creacion FROM columnas WHERE columnas.tablero_id = $id_tablero");
    $resultadoColumnas = mysqli_num_rows($consultaColumnas);
    ?>
    <dddiv class='columnas'>
    
    <?php
        for ($i=0; $i < $resultadoColumnas; $i++) {
            $respuestaColumnas = mysqli_fetch_assoc($consultaColumnas);
            $consultaTareas = mysqli_query($conexion, "SELECT id, titulo, estado,descripcion, fecha_creacion FROM tareas WHERE tareas.columna_id = $respuestaColumnas[id]");
            $resultadoTareas = mysqli_num_rows($consultaTareas);
            echo"
                <div class='columna'>
                        <h2>$respuestaColumnas[nombre]</h2>
                        <div class='Tareas'>
                            <div class='tareas-container'>";
                                for ($j=0; $j < $resultadoTareas; $j++) {
                                    $respuestaTareas = mysqli_fetch_assoc($consultaTareas);
                                    echo"
                                        <div class='tarea'>
                                            <p><strong>$respuestaTareas[titulo]</strong></p>
                                            <p>$respuestaTareas[fecha_creacion]</p>
                                        </div>
                                    ";
                                }
                                echo"
                            </div>
                        </div>";
                        ?>
        <div class='add-task'>
            <form action='../backend/add-task.php' method='post'>
                <input name="add-task" placeholder="Titulo de la tarea" type="text" maxlength="30" />
                <input type="hidden" name="id-columna" value="$respuestaColumnas[id]">
                <input type='submit' value='+'>
            </form>
        </div>
                        <?php
                        echo"
                </div>
            ";
        }
    ?>
        <div class='add-column'>
            <form action='../backend/add-column.php' method='post'>
                <input name="add-column" placeholder="Titulo de la columna" type="text" maxlength="30" />
                <input type="hidden" name="id-tablero" value="$id_tablero">
                <input type='submit' value='+'>
            </form>
        </div>
    </div>
</body>
</html>