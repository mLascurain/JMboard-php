<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/kanbanboard.css">
    <link rel="stylesheet" href="css/modal.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("layout/header.php");?>
    <?php
    include("../backend/conexion.php");
    $id_usuario = $_SESSION['id'];
    $id_tablero = $_GET['id']; //Obtiene el id del tablero
    $nombre_tablero = $_GET['name']; //Obtiene el nombre del tablero
    $tasks = array(); //Se genera un Array para almacenar las tareas
    

    //Obtiene el nombre del tablero
    $consultaTableros = mysqli_query($conexion, "SELECT id, nombre FROM tableros WHERE usuario_id = $id_usuario");
    $resultadoTableros = mysqli_num_rows($consultaTableros);
    

    //Consulta de conexion con las tablas
    $consultaColumnas = mysqli_query($conexion, "SELECT id, nombre, fecha_creacion FROM columnas WHERE columnas.tablero_id = $id_tablero");
    $resultadoColumnas = mysqli_num_rows($consultaColumnas);
    ?>
    <div class="board">
        <div class="tablero-aside">
            <H3 >Tus tableros</H3>
            <div class="tableros-list">
                <?php
                for ($k=0; $k < $resultadoTableros; $k++) {
                    $respuestaTableros = mysqli_fetch_assoc($consultaTableros);
                    echo "
                    <a href='kanbanboard.php?id=$respuestaTableros[id]&name=$respuestaTableros[nombre]'>-$respuestaTableros[nombre]</a>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="tablero-main">
        <H1 class='title-board'><?php echo $nombre_tablero ?></H1>
        <div class='columnas'>
            <?php
                for ($i=0; $i < $resultadoColumnas; $i++) {
                    $respuestaColumnas = mysqli_fetch_assoc($consultaColumnas);
                    $id_columna = $respuestaColumnas['id'];
                    $consultaTareas = mysqli_query($conexion, "SELECT id, titulo, prioridad,descripcion, columna_id, fecha_creacion FROM tareas WHERE tareas.columna_id = $respuestaColumnas[id]");
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
                                    <div class='tareas-container' id='$respuestaColumnas[id]'>";
                                        if($resultadoTareas>0)
                                        {
                                            for ($j=0; $j < $resultadoTareas; $j++) {
                                                $actualTask = mysqli_fetch_assoc($consultaTareas);
                                            
                                               echo"
                                                <div class='tarea'id='$actualTask[id]' draggable='true'> 
                                                    <div class='tarea-title' onclick='abrirTarea($j, $i)'>
                                                        <p>$actualTask[titulo]</p>
                                                    </div>     
                                                    <form action='../backend/remove-task.php' method='post'>
                                                        <input type='hidden' name='id' value='$actualTask[id]'>
                                                        <input type='hidden' name='id_tablero' value='$id_tablero'>
                                                        <input type='hidden' name='nombre-tablero' value='$nombre_tablero'>
                                                        <button class='btn-remove-task'>
                                                            <i class='bi bi-dash-circle'></i>
                                                        </button>
                                                    </form>   
                                                </div>
                                                <div id='edit-task-$j-$i' class='modal' onMouseDown='enviarForm($j, $i)'>
                                                    <div class='modal-content' onMouseDown='event.stopPropagation()'>
                                                        <form id='edit-title-task-$j-$i' class='edit-title' action='../backend/edit-task.php' method='post'>
                                                            <input type='hidden' name='id' value='$actualTask[id]'>
                                                            <input type='hidden' name='id_tablero' value='$id_tablero'>
                                                            <input type='hidden' name='nombre-tablero' value='$nombre_tablero'>
                                                            <div class='modal-header'>
                                                                <h2 id='title-task-$j-$i' onclick='editarTitulo($j, $i)' class='modal-title'>$actualTask[titulo]</h2>
                                                                <input id='input-title-task-$j-$i' class='-hidden' onBlur='editarTitulo($j, $i)' type='text' name='titulo' maxlength='50' value='$actualTask[titulo]' placeholder='Ingresar Titulo'>
                                                                <button class='close' type='submit'>
                                                                    <i class='bi bi-x'></i>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <span>
                                                                    <h4 class='modal-title'>Descripción</h4>
                                                                    <textarea id='descripcion-task' type='text-area' name='descripcion' maxlength='300' placeholder='Ingresar Descripcion'>$actualTask[descripcion]</textarea>
                                                                </span>
                                                                <span>
                                                                    <h4>Prioridad</h4>
                                                                    <select class='select-priority' name='prioridad'>";
                                                                    if($actualTask['prioridad'] == 1){
                                                                        echo" 
                                                                        <option value='1' selected>Baja</option>
                                                                        <option value='2'>Media</option>
                                                                        <option value='3'>Alta</option>
                                                                        ";
                                                                    }else if($actualTask['prioridad'] == 2){
                                                                        echo "
                                                                        <option value='1'>Baja</option>
                                                                        <option value='2' selected>Media</option>
                                                                        <option value='3'>Alta</option>
                                                                        ";
                                                                    }else if($actualTask['prioridad'] == 3){
                                                                        echo "
                                                                        <option value='1'>Baja</option>
                                                                        <option value='2'>Media</option>
                                                                        <option value='3' selected>Alta</option>
                                                                        ";
                                                                    }
                                                                    echo"
                                                                    </select>
                                                                </span>
                                                                <span>
                                                                    <h4>Fecha de creación</h4>
                                                                    <p>$actualTask[fecha_creacion]</p>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            ";   
                                            }
                                            $tasks = []; // Limpiar el arreglo de tareas
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
        </div>
    </div>
<script src="../frontend/js/drag-and-drop.js"></script>
    <script src="../frontend/js/main.js"></script>
</body>
</html>
