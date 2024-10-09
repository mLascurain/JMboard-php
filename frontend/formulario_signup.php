<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularios.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <?php include("layout/header.php");?>
    
    <article class="article-form-login">    
        <h2 class="title-form">Registrarse</h2>
        <form action="../backend/signup.php" method="post" class="form-login">
        <label>Nombre de usuario
        	<input name="usuario" type="text" maxlength="30" />
        </label>
        <label>Mail
        	<input name="email" type="text" maxlength="30" />
        </label>
        <label>Contraseña
        	<input type="password" name="password" maxlength="12" />
        </label>
        	<input type="submit" value="Registrarse"/>
        <a href="formulario_login.php">Iniciar Sesion</a>	
        </form>
    </article>

    <?php include("layout/footer.php"); ?>
</body>
</html>