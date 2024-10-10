<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jmboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("../backend/conexion.php"); ?>
    <article class="tablero">
        <section>
            <H2>Hola <?php echo $_SESSION['usuario']; ?>!</H2>
            <h2>id <?php echo $_SESSION['id']; ?></h2>
        </section>
        <section class="create-board-section">
            <form action="../backend/tablero.php" method="post">
                <input name="nombre" placeholder="Nombre del tablero" type="text" maxlength="30" />
                <input type="submit" value="Crear Tablero"/>
            </form>
        </section>
        <section class="tablas">
        <?php  
        if (isset($_SESSION['id'])) {
            $id=$_SESSION['id'];
            // código para traer el nombre de los tableros
        } else {
            // código para manejar el caso en que la clave "id" no esté definida
        }
        $consulta=mysqli_query($conexion, "SELECT nombre, id, fecha_creacion FROM tableros WHERE tableros.usuario_id=$id");
        $resultado=mysqli_num_rows($consulta);
        ?>
        <?php 
            for ($i=0; $i < $resultado; $i++) { 
                $respuesta=mysqli_fetch_assoc($consulta);
                $_SESSION['id_tablero']=$respuesta['id'];
                echo"
                    <div class='tabla-container'>
                        <a href='../frontend/kanbanboard.php'>
                        <div class='tabla'>
                            <h3>$respuesta[nombre]</h3>
                            <p>$respuesta[fecha_creacion]</p>
                        </div>
                        </a>
                        <div>
                            <form action='../backend/remove-table.php' method='post'>
                            <input type='hidden' name='id' value='$respuesta[id]'>
                                <button class='btn-tabla'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>";               
            }
        ?>
            </section>
    </article>
</body>
</html>