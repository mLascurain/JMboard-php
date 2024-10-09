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
        </section>
        <section class="tablas">
        
        <?php  
        if (isset($_SESSION['id'])) {
            $id=$_SESSION['id'];
            // código para traer el nombre de los tableros
        } else {
            // código para manejar el caso en que la clave "id" no esté definida
        }
        $consulta=mysqli_query($conexion, "SELECT nombre, fecha_creacion FROM tableros WHERE tableros.usuario_id=$id");
        $resultado=mysqli_num_rows($consulta);
        ?>
        <?php 
            for ($i=0; $i < $resultado; $i++) { 
                $respuesta=mysqli_fetch_assoc($consulta);
                echo"
                <a href='../frontend/formulario_login.php'>
                    <div class='tabla'>
                        <h3>$respuesta[nombre]</h3>
                        <p>$respuesta[fecha_creacion]</p>
                    </div>
                </a>";
            }

        ?>
        </section>

    </article>
</body>
</html>