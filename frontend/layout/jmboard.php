<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jmboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tableros</title>
    <link rel="icon" href="../frontend/imagenes/ico.png">
</head>
<body>
    <?php include("../backend/conexion.php"); ?>
    <article class="tablero">
        <section class="user-name">
            <h2>Hola <?php echo $_SESSION['usuario']; ?>!</h2>
        </section>
        <section class="tablas">
            <?php  
                if (isset($_SESSION['id'])) {
                    $id=$_SESSION['id'];
                }
                $consulta=mysqli_query($conexion, "SELECT nombre, id, fecha_creacion FROM tableros WHERE tableros.usuario_id=$id");
                $resultado=mysqli_num_rows($consulta);
            ?>
            <?php 
                for ($i=0; $i < $resultado; $i++) { 
                    $respuesta=mysqli_fetch_assoc($consulta);
                    $_SESSION['id_tablero']=$respuesta['id'];
                    echo "
                    <div class='tablero-container'>
                        <div class='tablero-header'>
                            <h3 class='tablero-title'>$respuesta[nombre]</h3>
                            <form action='../backend/remove-table.php' method='post' class='delete-form'>
                                <input type='hidden' name='id' value='$respuesta[id]'>
                                <button class='btn-delete-tabla' type='submit'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <p class='tablero-description'>Fecha: $respuesta[fecha_creacion]</p>
                        <a class='tablero-link' href='../frontend/kanbanboard.php?id=$respuesta[id]&name=$respuesta[nombre]'>Abrir Tablero</a>
                    </div>";
                }
            ?>
            <button class='button-new-table tablero-container new-tablero'>+ Crear Tablero</button>
        </section>
        <?php if ($resultado==0){echo "<p class='tablero-empty'>No hay tableros creados</p>"; }?>
    </article>
    <dialog id="dialog">
        <div class='backdrop'>
            <div class="create-board-section">
                <form action="../backend/tablero.php" method="post">
                    <input id="name-new-table" required name="nombre" placeholder="Nombre del tablero" type="text" maxlength="30" />
                    <input id="btn-new-table" type="submit" value="+ Crear Tablero"/>
                </form>
            </div>
        </div>
    </dialog>
    <script>
        const modal = document.querySelector("#dialog");
        const btn = document.querySelector(".button-new-table");
        btn.addEventListener("click", function(){
            modal.showModal();
        });

        const formElements = document.querySelector(".create-board-section");
        formElements.addEventListener("click", function(event) {
          event.stopPropagation();
        });

        const backdrop = document.querySelector(".backdrop");
        backdrop.addEventListener("click", function(){
            modal.close();
        });
    </script>
</body>
</html>