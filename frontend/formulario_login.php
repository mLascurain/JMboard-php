<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularios.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php include("layout/header.php");?>
    
    <article class="article-form-login">
        <h2 class="title-form">Iniciar Sesion</h2>
        <form action="../backend/login.php" method="post" class="form-login">
        <label>Nombre de usuario
        	<input name="email" type="text" maxlength="30" />
        </label>
        <label>Contraseña
        	<input type="password" name="password" maxlength="12" />
        </label>
        	<input type="submit" value="Login"/>
        <a href="formulario_signup.php">Registrarse</a>	
        </form>
        

        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    </article>

    <?php include("layout/footer.php"); ?>
</body>
</html>