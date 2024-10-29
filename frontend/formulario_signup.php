<?php session_start();?>
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
    <article class="article-form-signup">
        <h2 class="title-form">Registrarse</h2>
        <form action="../backend/signup.php" method="post" class="form-login">
        <label>Nombre de usuario
        	<input name="usuario" required type="text" maxlength="30" />
        </label>
        <label>Mail
        	<input name="email" required type="email" maxlength="30" />
        </label>
        <label>Contraseña
        	<input type="password" required name="password" minlength="6" maxlength="12" />
        </label>
        	<input id="btn-signup" type="submit" value="Registrarse"/>
            <a class="register" href="formulario_login.php">Iniciar Sesion</a>	
        </form>

        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        
    </article>
</body>
</html>