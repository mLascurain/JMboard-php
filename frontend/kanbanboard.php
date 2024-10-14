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
    $id_tablero = $_GET['id'];
    $nombre_tablero = $_GET['name'];
    //Consulta de conexion con las tablas
    $consultaColumnas = mysqli_query($conexion, "SELECT id, nombre, fecha_creacion FROM columnas WHERE columnas.tablero_id = $id_tablero");
    $resultadoColumnas = mysqli_num_rows($consultaColumnas);
    ?>
    <H1 class='title-board'><?php echo $nombre_tablero ?></H1>
    <div class='columnas'>
        <?php
            for ($i=0; $i < $resultadoColumnas; $i++) {
                $respuestaColumnas = mysqli_fetch_assoc($consultaColumnas);
                $id_columna = $respuestaColumnas['id'];
                $consultaTareas = mysqli_query($conexion, "SELECT id, titulo, estado,descripcion, fecha_creacion FROM tareas WHERE tareas.columna_id = $respuestaColumnas[id]");
                $resultadoTareas = mysqli_num_rows($consultaTareas);
                echo"
                    <div class='columna'>
                            <span class='titulo-columna'>
                                <h2>$respuestaColumnas[nombre]</h2>
                                <form action='../backend/remove-column.php' method='post'>
                                <input type='hidden' name='nombre-tablero' value='$nombre_tablero'>
                                <input type='hidden' name='id' value='$respuestaColumnas[id]'>
                                <input type='hidden' name='id_tablero' value='$id_tablero'>
                                    <button class='btn-remove-col'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                        </svg>
                                    </button>
                                </form>
                            </span>
                            <div class='tareas'>
                                <div class='tareas-container'>";
                                    if($resultadoTareas>0)
                                    {
                                        for ($j=0; $j < $resultadoTareas; $j++) {
                                            $respuestaTareas = mysqli_fetch_assoc($consultaTareas);
                                            echo"
                                                <div class='tarea'>
                                                    <div id='nombre-tarea'>
                                                        <p>$respuestaTareas[titulo]</p>
                                                        <p>$respuestaTareas[fecha_creacion]</p>
                                                    </div>
                                                    <form action='../backend/remove-task.php' method='post'>
                                                        <input type='hidden' name='id' value='$respuestaTareas[id]'>
                                                        <input type='hidden' name='id_tablero' value='$id_tablero'>
                                                        <input type='hidden' name='nombre-tablero' value='$nombre_tablero'>
                                                        <button class='btn-remove-task'>
                                                            <i class='bi bi-dash-circle'></i>
                                                        </button>
                                                    </form>        
                                                </div>
                                            ";   
                                        }
                                    
                                    }
                                    else{
                                        echo"<p id='no-tasks'>No hay tareas</p>";
                                    }
                                    echo"
                                </div>
                            </div>";
                            ?>
                                <div class='add-task'>
                                    <form action='../backend/add-task.php' method='post'>
                                        <input id="name-new-task" name="add-task" placeholder="Titulo de la tarea" type="text" maxlength="30" />
                                        <input type="hidden" name="id-columna" value="<?php echo $id_columna; ?>">
                                        <input type="hidden" name="nombre-tablero" value="<?php echo $nombre_tablero; ?>">
                                        <input type="hidden" name="id-tablero" value="<?php echo $id_tablero; ?>">
                                        <input id="btn-new-task" type='submit' value='+'>
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
                <input id="name-new-column" name="add-column" placeholder="Titulo de la columna" required type="text" maxlength="30" />
                <input type="hidden" name="nombre-tablero" value="<?php echo $nombre_tablero; ?>">
                <input type="hidden" name="id_tablero" value="<?php echo $id_tablero; ?>">
                <input id="btn-new-column" type='submit' value='+'>
            </form>
        </div>
    </div>
</body>
</html>